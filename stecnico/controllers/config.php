<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config extends MX_Controller {

	public function __construct()
	{
            	parent::__construct();
	}

    public function index(){
        $res['view'] = $this->load_view();
        $this->load->view('dashboard',$res);
    }
        
    private function load_view() {
        $output = $this->load->view('config','',TRUE);
        return $output;
    }    
    
    public function get_crud_equestado() {
        $this->config->load('grocery_crud');
        $this->config->set_item('grocery_crud_dialog_forms',true);
        $crud = new grocery_CRUD();
        $crud->set_table('bill_stequestado');
        $crud->set_subject('Estados Equipo');
        $output = $crud->render();
        $this->load->view('crud_view_datatable', $output);
    }
    
    public function get_crud_tipos_servicio() {
        $this->config->load('grocery_crud');
        $this->config->set_item('grocery_crud_dialog_forms',true);
        $crud = new grocery_CRUD();
        $crud->set_table('bill_sttiposervicio');
        $crud->set_subject('Tipos de Servicio');
        $output = $crud->render();
        $this->load->view('crud_view_datatable', $output);
    }

    public function get_crud_equipoattr() {
        $this->config->load('grocery_crud');
        $this->config->set_item('grocery_crud_dialog_forms',true);
        $crud = new grocery_CRUD();
        $crud->set_table('bill_stequipoattr');
        $crud->set_subject('Atributos Equipo');
        $output = $crud->render();
        $this->load->view('crud_view_datatable', $output);
    }
    
}