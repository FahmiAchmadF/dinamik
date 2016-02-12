<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_alert {
    public function cek_auth()
	{
		$this->ci =& get_instance();
		$this->sesi_alert  = $this->ci->session->userdata('peringatan');
		$this->alert = $this->ci->session->userdata('alert');
	}
}
