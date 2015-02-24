<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Productoattr extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('grocery_CRUD');                
	}
                
    public function get_crud()
    {
        $this->config->load('grocery_crud');
        $this->config->set_item('grocery_crud_dialog_forms',true);
//		$this->config->set_item('grocery_crud_default_per_page',10);            
        $crud = new grocery_CRUD();
        
        $valor_attr = $this->input->post('valor_attr');
        $tipotransaccion_cod = $this->input->post('tipotransaccion_cod');

        if(!empty($valor_attr)){
            $crud->where('UPPER(valor_attr)', strtoupper($valor_attr));
        }
        if($tipotransaccion_cod != -1){
            $crud->where('tipotransaccion_cod', $tipotransaccion_cod);
        }
        
        $columns = array(
            'producto_id',
            'prodattr_id',
            'valor_attr',
            'tipotransaccion_cod',
            'doc_id',
            'fecha',
            'usuario_name'
        );
        $crud->columns2($columns);
            $crud->display_as('producto_id','Producto')
                 ->display_as('prodattr_id','Atr.')
                 ->display_as('valor_attr','Valor')
                 ->display_as('tipotransaccion_cod','Transaccion')
                 ->display_as('usuario_name','Usuario');

        $crud->callback_column('doc_id',array($this,'open_fact'));

        $crud->set_table('bill_productoattr');
        $crud->set_relation('producto_id', 'billing_producto', '{codigo} - {nombreUnico}');
        $crud->set_relation('prodattr_id', 'bill_prodattr', '{attr}');
        $crud->set_relation('tipotransaccion_cod', 'billing_tipotransaccion', '{nombre}');
        $crud->unset_add()->unset_delete()->unset_edit()->unset_read();
        $crud->set_subject('Atributos de Producto');
        $output = $crud->render();
        $this->load->view('common/crud/crud_view_datatable', $output);
    }
                
    public function open_fact($value, $row){
        
        if($row->tipotransaccion_cod == '01'){ /*es venta*/
            $fields = 'puntoventaempleado_establecimiento,puntoventaempleado_puntoemision,secuenciafactventa';
            $fact = $this->generic_model->get_by_id('billing_facturaventa', $row->doc_id, $fields, 'codigofactventa');
            $nro_fact = tagcontent('a', $fact->puntoventaempleado_establecimiento.$fact->puntoventaempleado_puntoemision.'-'.$fact->secuenciafactventa, array('id'=>'ajaxpanelbtn','data-url'=>base_url().'ventas/ventas/open_fact/'.$row->doc_id,'data-target'=>'container-fluid','href'=>'#'));
            return $nro_fact;            
        }elseif($row->tipotransaccion_cod == '02'){ /*es compra*/
//            $fields = 'puntoventaempleado_establecimiento,puntoventaempleado_puntoemision,secuenciafactventa';
//            $fact = $this->generic_model->get_by_id('billing_facturaventa', $row->doc_id, $fields, 'codigofactventa');
            $fact = $this->generic_model->get_by_id('billing_facturacompra', $row->doc_id, 'codigoFacturaCompra,pa_sriautorizaciondocs_establecimiento,pa_sriautorizaciondocs_puntoemision,noFacturaCompra,proveedor_id', 'codigoFacturaCompra');
//            print_r($fact);
            
            $nro_fact = tagcontent('a', $fact->pa_sriautorizaciondocs_establecimiento.$fact->pa_sriautorizaciondocs_puntoemision.'-'.$fact->noFacturaCompra, array('id'=>'ajaxpanelbtn','data-url'=>base_url('compras/compras/open_compra/'.$row->doc_id),'data-target'=>'container-fluid','href'=>'#'));
            return $nro_fact;            
        }

    }

}