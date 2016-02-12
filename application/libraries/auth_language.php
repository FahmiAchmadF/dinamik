<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_language {
    public function cek_auth()
	{
		$this->ci =& get_instance();
		$this->sesi_bahasa  = $this->ci->session->userdata('bahasa');
		$this->bhs = $this->ci->session->userdata('language');
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
