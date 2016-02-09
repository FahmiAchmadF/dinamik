<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_ajax extends CI_Controller {

	function __construct() {
		parent::__construct();
	}


    public function index() {
        $data['user']=$this->seson;
        $this->load->view('Admin/cobaajax', $data);
    }

    public function search_ajax() {
        $this->load->model("Admin/m_ajax");
        $search = $this->input->post('search');
        $query = $this->m_ajax->getsoalList($search);
        echo json_encode($query);
    }

}