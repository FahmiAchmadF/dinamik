<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gallery extends CI_Controller{

	var $gallery_path;
	var $gallery_path_url;
		public function __Construct()
		{
			parent:: __construct();
			$this->gallery_path = realpath(APPPATH. '../images');
			$this->gallery_path_url = base_url(). 'images/';

		}

		public function index(){
			if($this->input->post('upload')){
				$config = array(
					'allowed_types' => 'jpg|jpeg|gif|png',
					'upload_path' =>$this->gallery_path,
					'max_size' => 2000
					);
				$this->load->library('upload',$config);
				$this->upload->do_upload();
			}
			$this->load->view('gallery/index');
		}
}


?>