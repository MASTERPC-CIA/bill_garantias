<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Equipo extends MX_Controller {

	public function __construct()
	{
            	parent::__construct();
                $this->load->model('empleadocapacidad_model');
	}

    public function index(){
        $res['view'] = $this->load_view();
        $this->load->view('dashboard',$res);
    }
        
    public function cambio_estado_view($id){
        /* Obtenemos los datos del equipo registrado */
        $where_data = array( 'e.id'=>$id );
           $join_cluase = array(
               '0'=>array('table'=>'billing_cliente c','condition'=>'e.cliente_id = c.PersonaComercio_cedulaRuc'),
               '1'=>array('table'=>'bill_sttiposervicio ts','condition'=>'e.tiposervicio_id = ts.id'),
               '2'=>array('table'=>'billing_marca m','condition'=>'e.marca_id = m.id'),
               '3'=>array('table'=>'billing_empleado tec','condition'=>'e.tecnicoencargado = tec.id'),
           );
           $res['equipo'] = $this->generic_model->get_join( 'bill_stequipo e', $where_data, $join_cluase, $fields = 'e.*,c.PersonaComercio_cedulaRuc client_id,c.nombres client_nombres,c.apellidos client_apellidos, c.telefonos client_telefonos, c.email client_email, c.direccion client_direccion, c.celular client_celular, ts.tipo tipo_servicio, ts.prefix, m.nombre marca, tec.nombres tecnico_nombres, tec.apellidos tecnico_apellidos ', 1 );
           $res['estadosequ'] = $this->generic_model->get('bill_stequestado');
        
        $this->load->view('new_cambio_estado',$res);
    }
    
    public function save_new_estado() {
//        $print_r($_POST);
        $data = array(
            'equipo_id' => $this->input->post('equipo_id'),
            'detalle' => $this->input->post('detalle'),
            'equestado_id' => $this->input->post('estado_id'),
            'usuario_id' => $this->user->id,            
            'usuario_name' => $this->user->nombres.' '.$this->user->apellidos,
            'email' => $this->input->post('email'),
            'celular' => $this->input->post('celular'),
            'fecha' => date('Y-m-d',time()),
            'hora' => date('H:i:s',time()),            
        );
        $res = $this->generic_model->save($data,'bill_steqreparacion');
        
        if( $res > 0 ){
            echo tagcontent('strong', 'Datos almacenados correctamente', array('class'=>'text-success'));
        }else{
            echo tagcontent('strong', 'No fue posible almacenar los datos', array('class'=>'text-danger'));
        }
    }
    
    public function get_hist_estado() {
        $equipo_id = $this->input->post('equipo_id');
        
        $where_data = array( 'e.id'=>$equipo_id );
           $join_cluase = array(
               '0'=>array('table'=>'billing_cliente c','condition'=>'e.cliente_id = c.PersonaComercio_cedulaRuc'),
               '1'=>array('table'=>'bill_sttiposervicio ts','condition'=>'e.tiposervicio_id = ts.id'),
               '2'=>array('table'=>'billing_marca m','condition'=>'e.marca_id = m.id'),
               '3'=>array('table'=>'billing_empleado tec','condition'=>'e.tecnicoencargado = tec.id'),
           );
           $res['equipo'] = $this->generic_model->get_join( 'bill_stequipo e', $where_data, $join_cluase, $fields = 'e.*,c.PersonaComercio_cedulaRuc client_id,c.nombres client_nombres,c.apellidos client_apellidos, c.telefonos client_telefonos, c.email client_email, c.direccion client_direccion, ts.tipo tipo_servicio, ts.prefix, m.nombre marca, tec.nombres tecnico_nombres, tec.apellidos tecnico_apellidos ', 1 );
           
           
        $where_data = array( 'equipo_id'=>$equipo_id );
           $join_cluase = array(
               '0'=>array('table'=>'bill_stequestado e','condition'=>'r.equestado_id = e.id'),
           );
           $res['hist_estado'] = $this->generic_model->get_join( 'bill_steqreparacion r', $where_data, $join_cluase, $fields = 'r.*, e.estado estado_equ, e.color estado_color ', 0, array('id'=>'desc') );
        
//        $res['hist_estado'] = $this->generic_model->get('bill_steqreparacion',array('equipo_id'=>$equipo_id));
        $this->load->view('hist_estado',$res);
    }
        
    private function load_view() {
        $res['tecnicos'] = $this->empleadocapacidad_model->get('vendedor');
        $res['tiposservicio'] = $this->generic_model->get('bill_sttiposervicio');
        $res['estadosequ'] = $this->generic_model->get('bill_stequestado');
//        $res['eqattrlist'] = $this->generic_model->get('bill_stequipoattr');
        $res['marcas'] = $this->generic_model->get('billing_marca');        
        $res['empleados'] = $this->generic_model->get('billing_empleado');        
        $output = $this->load->view('equipo_search',$res,TRUE);
        return $output;
    }
    
    public function get_stequipo($id) {
//        $res['equipo'] = $this->generic_model->get_by_id('bill_stequipo', $id);
                
        /* Obtenemos los datos del equipo registrado */
        $where_data = array( 'e.id'=>$id );
           $join_cluase = array(
               '0'=>array('table'=>'billing_cliente c','condition'=>'e.cliente_id = c.PersonaComercio_cedulaRuc'),
               '1'=>array('table'=>'bill_sttiposervicio ts','condition'=>'e.tiposervicio_id = ts.id'),
               '2'=>array('table'=>'billing_marca m','condition'=>'e.marca_id = m.id'),
               '3'=>array('table'=>'billing_empleado tec','condition'=>'e.tecnicoencargado = tec.id'),
           );
           $res['equipo'] = $this->generic_model->get_join( 'bill_stequipo e', $where_data, $join_cluase, $fields = 'e.*,c.PersonaComercio_cedulaRuc client_id,c.nombres client_nombres,c.apellidos client_apellidos, c.telefonos client_telefonos, c.email client_email, c.direccion client_direccion, ts.tipo tipo_servicio, ts.prefix, m.nombre marca, tec.nombres tecnico_nombres, tec.apellidos tecnico_apellidos ', 1 );
           
           
        $where_data = array( 'equipo'=>$res['equipo']->id );
           $join_cluase = array(
               '0'=>array('table'=>'bill_stequipoattr ea','condition'=>'eae.equipoattr_id = ea.id'),
           );
           $res['equipoattrequipo'] = $this->generic_model->get_join( 'bill_stequipoattrequipo eae', $where_data, $join_cluase, $fields = '', 0 );        
        $this->load->view('equipo_ingreso',$res);
    }
    
    public function save_equipo() {
        $data = array(
            'anio' => date('Y',time()),
            'mes_id' => date('m',time()),
            'caracteristicas' => $this->input->post('caracteristicas'),
            'problema' => $this->input->post('problema'),
            'presupuesto' => $this->input->post('presupuesto'),
            'anticipocliente' => $this->input->post('anticipocliente'),
            'equipoenbodega' => $this->input->post('equipoenbodega'),
            'tecnicoencargado' => $this->input->post('tecnicoencargado'),
            'marca_id' => $this->input->post('marca_id'),
            'cliente_id' => $this->input->post('cliente_id'),
            'equestado_id' => $this->input->post('estado_id'),
            'tiposervicio_id' => $this->input->post('tiposervicio'),
            'fechaentrega' => $this->input->post('fechaentrega'),
            'horaentrega' => $this->input->post('horaentrega'),
            'fecha' => date('Y-m-d',time()),
            'hora' => date('H:i:s',time()),
            'user_id' => $this->user->id,
        );
        
        $res = $this->generic_model->save($data,'bill_stequipo');
        
        $equipoattr = $this->input->post('equipoattr');
        $equipoattrid = $this->input->post('equipoattrid');
        $cont = 0;
        foreach ($equipoattr as $attr) {
            if(!empty($equipoattr[$cont])){
                $valuesattr = array(
                    'equipoattr_id' => $equipoattrid[$cont],
                    'equipo' => $res,
                    'valor' => $equipoattr[$cont],
                );
                $res2 = $this->generic_model->save($valuesattr,'bill_stequipoattrequipo');
            }
            $cont++;
        }
        
        $this->get_stequipo($res);
    }    
    
    public function get_crud() {
        $this->config->load('grocery_crud');
        $this->config->set_item('grocery_crud_dialog_forms',true);
        $crud = new grocery_CRUD();
        
        $fecha_desde = $this->input->post('fecha_desde');
        $fecha_hasta = $this->input->post('fecha_hasta');
        
        $fecha_entr_desde = $this->input->post('fecha_entr_desde');
        $fecha_entr_hasta = $this->input->post('fecha_entr_hasta');
        
        if(!empty($fecha_desde) AND !empty($fecha_hasta)){
            $crud->where('fecha >=',$fecha_desde);
            $crud->where('fecha <=',$fecha_hasta);
        }
        
        if(!empty($fecha_entr_desde) AND !empty($fecha_entr_hasta)){
            $crud->where('fechaentrega >=',$fecha_entr_desde);
            $crud->where('fechaentrega <=',$fecha_entr_hasta);
        }
        
        $tiposervicio_id = $this->input->post('tiposervicio_id');
        if($tiposervicio_id != -1){
            $crud->where('tiposervicio_id',$tiposervicio_id);
        }

        $equestado_id = $this->input->post('equestado_id');
        if($equestado_id != -1){
            $crud->where('equestado_id',$equestado_id);
        }

        $marca_id = $this->input->post('marca_id');
        if($marca_id != -1){
            $crud->where('marca_id',$marca_id);
        }
        
        $tecnico_id = $this->input->post('tecnico_id');
        if($tecnico_id != -1){
            $crud->where('tecnicoencargado',$tecnico_id);
        }
        
        $user_id = $this->input->post('user_id');
        if($user_id != -1){
            $crud->where('user_id',$user_id);
        }
        
        $client_id = $this->input->post('client_id');
        if(!empty($client_id)){
            $crud->where('cliente_id',$client_id);
        }

        $id = $this->input->post('id');
        if(!empty($id)){
            $crud->where('bill_stequipo.id',$id);
        }
        
        $columns = array(
            'id',
            'cliente_id',
            'caracteristicas',
            'problema',
            'marca_id',
            'tecnicoencargado',
            'equestado_id',
            'tiposervicio_id',
            'fechaentrega',
            'fecha',
            'open',
        );
        $crud->columns2($columns);
        
        $crud->set_table('bill_stequipo');
        
        $crud->callback_column('open',array($this,'abrir_ingreso_equ'));
        $crud->set_relation('cliente_id', 'billing_cliente', '{nombres} {apellidos}, Tlf. {telefonos}');
        $crud->set_relation('tecnicoencargado', 'billing_empleado', '{nombres} {apellidos}');
        $crud->set_relation('marca_id', 'billing_marca', '{nombre}');
        $crud->set_relation('equestado_id', 'bill_stequestado', '{estado}');
        $crud->set_relation('tiposervicio_id', 'bill_sttiposervicio', '{tipo}');
        $crud->unset_delete()->unset_add();
        $crud->set_subject('Equipos Ingresados');
        $output = $crud->render();
        $this->load->view('crud_view_datatable', $output);
    }
    
    public function abrir_ingreso_equ($value, $row){
        $output = tagcontent('a', '<span class="glyphicon glyphicon-eye-open"></span>', array('id'=>'ajaxpanelbtn','data-url'=>base_url('stecnico/equipo/get_stequipo/'.$row->id),'data-target'=>'container-fluid','href'=>'#','title'=>'Ingreso de Equipo'));
        $output .= tagcontent('a', '<span>Estado</span>', array('id'=>'ajaxpanelbtn','data-url'=>base_url('stecnico/equipo/cambio_estado_view/'.$row->id),'data-target'=>'container-fluid','href'=>'#','title'=>'Ingreso de Equipo'));
        return $output;        
    }
    
}