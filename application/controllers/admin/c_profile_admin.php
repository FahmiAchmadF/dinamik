<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_profile_admin extends CI_Controller{
	var $gallery_path;
	var $gallery_path_url;
	var $urls;
	public $data = Array();

	public function __Construct()
	{
			parent::__construct();
			$this->gallery_path = realpath(APPPATH. '../images');
			$this->gallery_path_url = base_url(). 'images/';
			$urls=$this->gallery_path_url = base_url(). 'images/';
			$this->load->model('admin/m_profile_admin');
			$this->load->model('m_login');
			$this->load->library('session');
			$this->cek();
	}
	private function cek()
	{
		$stat = $this->session->userdata('sts');
		if ($stat=="") 
    	{
    		echo "<script>alert('Anda belum login!');</script>";
    		redirect('login','refresh');
    	}
	}

	public function index()
	{

		$username = $this->m_login->ambil_user($this->session->userdata('username'));
		$stat = $this->session->userdata('sts');
   		$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama_guru'));
		$user = $this->session->userdata('username');
		$profile_data = $this->m_profile_admin->get_profile_data($user);
		$data = array(
			'profile_data'	=>$profile_data,
           	'user'=>$ambil_akun,
        );
			$this->load->view('admin/v_profile_admin', $data);
	}

		// Profile Function
	public function edit_profile()
	{
		$username = $this->m_login->ambil_user($this->session->userdata('username'));
		$stat = $this->session->userdata('sts');
   		$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama_guru'));
		$user = $this->session->userdata('username');
		$profile_data = $this->m_profile_admin->get_profile_data($user);
		$data = array(
			'profile_data'	=>$profile_data,
           	'user'=>$ambil_akun,
        );
		// var_dump($data);
		// exit();
			$this->load->view('admin/v_profile_admin', $data);
    }

    function update() 
	{
		// var_dump($this->input->post('dtanggal_lahir'));
		// exit();
		$config = array(
		'allowed_types' => 'jpg|jpeg|gif|png',
		'upload_path' =>$this->gallery_path,
		'max_size' => 2000,
		'file_name' => url_title($this->input->post('userfile')),
		);
		$this->load->library('upload',$config);
		$this->upload->initialize($config); //meng set config yang sudah di atur
		 if( !$this->upload->do_upload('userfile'))
 		{
 			$id_admin= $this->input->post('id_admin');
 			$data = array(
			'username' => $this->input->post('dusername'),
			'password' => $this->input->post('dpassword'),
			'nama_depan' => $this->input->post('dnama_depan'),
			'nama_belakang' => $this->input->post('dnama_belakang'),
			'nama_panggilan' => $this->input->post('dnama_panggilan'),
			'jk' => $this->input->post('djk'),
			'agama' => $this->input->post('dagama'),
			'tempat_lahir' => $this->input->post('dtempat_lahir'),
			'tanggal_lahir' => $this->input->post('dtanggal_lahir'),
			'email' => $this->input->post('demail'),
			'no_hp' => $this->input->post('dno_hp'),
			'alamat' => $this->input->post('dalamat'),				
			 );
			$this->m_profile_admin->update($id_admin,$data);
			echo "<script>alert('Data berhasil di ubah!');</script>";
			redirect('admin/c_profile_admin','refresh');
		}
	 else
	 {
		$id_guru= $this->input->post('did_guru');
 	  	$map = $_SERVER['DOCUMENT_ROOT'];
        $path = $map . '/pengolahannilai/images/';
        $nama_photo = $this->input->post('gambar_dlt');
		$image = $path.$nama_photo;
                //hapus image
        unlink($image);
		$data = array(
		'username' => $this->input->post('dusername'),
		'password' => $this->input->post('dpassword'),
		'nama_depan' => $this->input->post('dnama_depan'),
		'nama_belakang' => $this->input->post('dnama_belakang'),
		'nama_panggilan' => $this->input->post('dnama_panggilan'),
		'jk' => $this->input->post('djk'),
		'agama' => $this->input->post('dagama'),
		'tempat_lahir' => $this->input->post('dtempat_lahir'),
		'tanggal_lahir' => $this->input->post('dtanggal_lahir'),
		'email' => $this->input->post('demail'),
		'no_hp' => $this->input->post('dno_hp'),
		'alamat' => $this->input->post('dalamat'),
		'photo' => $this->upload->file_name,
 		);	
		$this->m_profile_admin->update($id_guru,$data);
		echo "<script>alert('Data berhasil di ubah!');</script>";
		redirect('admin/c_profile_admin','refresh');
	}

 	}		
}
