<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_user extends CI_Controller{
  public function __Construct()
  {
    parent::__construct();
    $this->load->model('admin/m_user');
    $this->load->model('m_login');
    $this->cek();
  }
  
  private function cek()
	{
		$stat = $this->session->userdata('sts');
    if ($stat=="")
    {
    		echo "<script>alert('Harap Login Terlebih Dahulu!');</script>";
    		redirect('login','refresh');
  	}
	}

  public function index()
  {
    $url = '/kebudayaan/admin/c_user';
    $data_user = $this->m_user->tampil_user();
    $ambil_akun = $this->m_login->ambil_user($this->session->userdata('username'));
    $data = array(
      'user'=>$ambil_akun,
      'data_user' =>$data_user,
      'url'       =>$url
            );
    $this->load->view('admin/v_user', $data);
  }
  public function lihat_user()
  {
    $id_user = $this->uri->segment(4);
    $lihat_user = $this->m_user->show_id($id_user);
    // var_dump($lihat_user);
    // exit();
    $ambil_akun = $this->m_login->ambil_user($this->session->userdata('username'));
    $data = array(
     'lihat_user'  =>$lihat_user,
     'user'=>$ambil_akun,
            );
     $this->load->view('admin/v_lihat_user', $data);
  }

  function show_id() 
  {
    $id_mapel = $this->uri->segment(3);
    $data['mapel'] = $this->mod_lihatdata_mapel->show_id();
    $data['single_mapel'] = $this->mod_lihatdata_mapel->show_id($id_mapel);
    $this->load->view('admin/views_update_kelas', $data);
  }

  function delete_id() 
  {
  $id_mapel = $this->uri->segment(4);
  $this->mod_lihatdata_mapel->delete_id($id_mapel);
  echo"<script> alert('Data berhasil di hapus');</script>";
  redirect('admin/con_lihatdata_mapel','refresh');
  }

}
