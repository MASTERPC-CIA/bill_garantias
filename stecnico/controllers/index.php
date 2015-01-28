<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends MX_Controller {

	public function __construct()
	{
            	parent::__construct();
	}

    public function index(){
        $res['view'] = $this->load_view();
        $this->load->view('dashboard',$res);
    }
        
    private function load_view() {
        $this->load->model('empleadocapacidad_model');
        $res['tecnicos'] = $this->empleadocapacidad_model->get('vendedor');
        $res['tiposservicio'] = $this->generic_model->get('bill_sttiposervicio');
        $res['estadosequ'] = $this->generic_model->get('bill_stequestado');
        $res['eqattrlist'] = $this->generic_model->get('bill_stequipoattr');
        $res['marcas'] = $this->generic_model->get('billing_marca');
        $output = $this->load->view('new_ingreso',$res,TRUE);
        return $output;
    }
    
    public function search_client_view() {
        $this->load->view('client_search');
    }
    
    public function find_client_by_ci() {
        $ci = $this->input->post('ci');
        $res['ci'] = $ci;
        $res['cliente'] = $this->generic_model->get_by_id('billing_cliente', $ci, '', 'PersonaComercio_cedulaRuc');
        $this->load->view('client',$res);                
    }
        
    public function get_crud_clients() {
        $this->config->load('grocery_crud');
        $this->config->set_item('grocery_crud_dialog_forms',true);
                $crud = new grocery_CRUD();
                $like = $this->input->post('search_text');

                if(!empty($like)){

                    $parambuscaprod = explode(' ', $like);
                    $where = '';
                    $and = '';
                    foreach ( $parambuscaprod as $val ) {
                        $where .= $and.'(UPPER(billing_cliente.nombres) LIKE "'.strtoupper($val).'%" OR UPPER(billing_cliente.apellidos) LIKE "'.strtoupper($val).'%" )';
                        $and = ' AND ';    
                    }
                    $crud->where($where, null, false);
                }

                $crud->set_table('billing_cliente');
                $crud->display_as('PersonaComercio_cedulaRuc','CI/RUC')
                     ->display_as('clientetipo_idclientetipo','Tipo');
                $crud->set_subject('Clientes');
                $crud->set_relation('clientetipo_idclientetipo','billing_clientetipo','tipo');
                $crud->set_relation('docidentificacion_id','billing_docidentificaciontipo','nombre');
                $crud->set_relation('vendedor_id','billing_empleado','{nombres} {apellidos}');
                $crud->columns('PersonaComercio_cedulaRuc','nombres','apellidos','select','razonsocial','direccion','telefonos','celular','email','clientetipo_idclientetipo');
                $crud->field_type('fecha', 'hidden', date('Y-m-d',time()));
                $crud->unset_fields('fecha');
                $crud->callback_column('select',array($this,'call_client_selected'));
                
                $crud->unset_delete()->unset_read(); 
                $add_fields = array('es_pasaporte','PersonaComercio_cedulaRuc','nombres','apellidos','razonsocial','direccion','telefonos','celular','email','clientetipo_idclientetipo','vendedor_id');
                $ver_datos_especiales = $this->user->check_permission( array('admin'), $this->user->id );

                if( $ver_datos_especiales OR ($this->user->essuperusuario == 1) ){
                    array_push($add_fields, 'diasCredito','cupocredito','descuentomaxporcent');
                }

                $crud->add_fields2( $add_fields );
                $output = $crud->render();
                $this->load->view('crud_view_datatable', $output);  
    }
    
    public function call_client_selected($value, $row) {
        $output = '';
        $output .= Open('form', array('method'=>'post','action'=>  base_url('stecnico/index/find_client_by_ci')));
            $output .= tagcontent('span', tagcontent('button', 'Cliente <span class="glyphicon glyphicon-ok"></span>', array('class'=>'btn btn-default','type'=>'submit','data-target'=>'client_by_id_out','id'=>'ajaxformbtn')), array('class'=>'input-group-btn'));
            $output .= input(array('type'=>'hidden','name'=>'ci','value'=>$row->PersonaComercio_cedulaRuc));
        $output .= Close('form'); //cierra form de buscar proveedor     
        
        return $output;
    }
    
}