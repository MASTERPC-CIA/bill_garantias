<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
	}

    public function index(){
        $res['view'] = $this->load_view();
        $res['slidebar'] = $this->load->view('slidebar','',TRUE);
        $this->load->view('templates/dashboard',$res);
    }
        
    private function load_view() {
        $res['prod_attr'] = $this->generic_model->get('bill_prodattr');
        $res['tipo_transaccion'] = $this->generic_model->get('billing_tipotransaccion');
        $output = $this->load->view('productoattr_search',$res,TRUE);
        return $output;
    }
                
}