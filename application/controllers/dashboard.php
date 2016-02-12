<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
        $this->load->model('m_dashboard');
        $this->load->model('user/mod_index'); 
        $this->lang->load('home','indonesia');
        $this->home = $this->lang->line('text_home');
        $this->about = $this->lang->line('text_about');
        $this->topik= $this->lang->line('text_topik');
        $this->profil = $this->lang->line('text_profil');
        $this->login= $this->lang->line('text_login');
        $this->signup = $this->lang->line('text_signup');
        $this->tampil_kategori = $this->mod_index->tampil_kategori_forum();
	}
    
	// function index_user()
	// {
	// 	$this->auth->cek_auth_user(); //ngambil auth dari library
	// 	$session = $this->session->userdata('isLoginUser');
 //        if($session==True)
 //        {
 //            $ambil_akun = $this->m_login->ambil_member($this->session->userdata('username_user'));    
 //        }
 //        else
 //        {
 //            $username='';
 //            $ambil_akun = $this->m_login->ambil_member($username);
 //        }
	        
	// 	$stat_user = $this->session->userdata('sts_user');
	// 	// var_dump($ambil_akun);
	// 	// exit();
	// 	if($stat_user=='user')
	// 	{//admin
	// 		$data = array(
 //            	'user'=>$ambil_akun,
 //                'tampil_kategori_forum' =>$this->tampil_kategori
 //            );
 //            // redirect('user/index');
 //            $this->load->view('user/index', $data);
	// 	}
	// 	else
	// 	{ 
 //            echo" <script>
 //                    alert('Harap Login Terlebih Dahulu');
 //                  </script>";    
 //            redirect('user/index','refresh');
	//   	}
	// }

	function index()
	{
		$this->auth_admin->cek_auth(); //ngambil auth dari library
		$session = $this->session->userdata('isLogin');
        if($session==True)
        {
			$ambil_akun = $this->m_login->ambil_admin($this->session->userdata('username'));
        }
        else
        {
            $username='';
            $ambil_akun = $this->m_login->ambil_admin($username);
        }
		$status_confirm = '0';
        $confirm_user = $this->m_login->confirm_user($status_confirm);
        $jumlah_status_confirm = count($this->m_login->confirm_user($status_confirm));
        if(empty($confirm_guru))
        {
        	$c_id_user = '';
       		$c_username	= '';
       		$c_nama_depan = '';
       		$c_nama_belakang = '';
       		$c_nama_panggilan = '';
       		$c_photo = '';
        	$confirm = '0';
        }
        else
        {
        	foreach ($confirm_user as $data) {
        		$c_id_guru = $data['id_guru'];
        		$c_username	= $data['username'];
        		$c_nama_depan = $data['nama_depan'];
        		$c_nama_belakang =$data['nama_belakang'];
        		$c_nama_panggilan = $data['nama_panggilan'];
        		$c_photo = $data['photo'];
            	$confirm = $data['status'];
        	}
        }

        $pesan_confirm='';
        $total_confirm = count($confirm);
        $status_all ='1';
        $data_user = count($this->m_dashboard->data_user($status_all));
        $data_artikel = count($this->m_dashboard->data_artikel());
		$stat = $this->session->userdata('sts_admin');
		if($stat=='admin')
		{//admin
			$data = array(
				'pesan_confirm' =>$pesan_confirm,
				'username'	=>$c_username,
				'confirm'	=>$confirm_user,
				'nama_depan'=>$c_nama_depan,
				'nama_belakang'=>$c_nama_belakang,
				'nama_panggilan'=>$c_nama_panggilan,
				'photo'	=> $c_photo,
				'total_confirm'=>$jumlah_status_confirm,
            	'user'=>$ambil_akun,
                'data_user' =>$data_user,
                'data_artikel' =>$data_artikel,
            );
			$this->load->view('admin/dashboard_admin',$data);
		}
		else
		{ 
            echo" <script>
                    alert('Harap Login Terlebih Dahulu');
                  </script>";    
            redirect('login','refresh');
	  	}
	}
	
	function login()
	{
		$session = $this->session->userdata('isLogin');
    	if($session == FALSE)
    	{
      		$this->load->view('login_form');
    	}
    	else
    	{
      		redirect('dashboard');
    	}
	}
	function logout()
	{	// fungsi ini untuk mengahapus semua session
		// $this->session->sess_destroy();
		//fungsi ini untuk menghapus username ketika sudah logout
		$this->session->unset_userdata('isLogin');
		redirect('login','refresh');
	}
	function logout_user()
	{
		// $this->session->sess_destroy();
		$this->session->unset_userdata('isLoginUser');	
		redirect('user/index','refresh');
	}
}