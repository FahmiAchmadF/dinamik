<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_admin {
    public function cek_auth()
	{
		$this->ci =& get_instance();
		$this->sesi_admin  = $this->ci->session->userdata('isLogin');
		$this->hak = $this->ci->session->userdata('stat');
		if($this->sesi_admin != TRUE){
			redirect('login','refresh');
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
