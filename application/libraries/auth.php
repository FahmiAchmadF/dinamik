<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth {
	public function cek_auth_user()
	{
		$this->ci =& get_instance();
		$this->sesi  = $this->ci->session->userdata('isLoginUser');
		$this->hak = $this->ci->session->userdata('stat_user');
		if($this->sesi != TRUE){
			redirect('user/login','refresh');
			exit();
		}
	}
	
	public function hak_akses($kecuali="")
	{	
    	if($this->hak==$kecuali){ 
    		echo "<script>alert('Anda tidak berhak mengakses halaman ini!');</script>";
    		redirect('dashboard');
    	}elseif ($this->hak=="") {
    		echo "<script>alert('Anda belum login!');</script>";
    		redirect('login');
    	}else{

    	}
	}
}