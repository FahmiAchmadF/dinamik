<?php
class C_kategori_forum extends CI_Controller
{
    var $gallery_path;
    var $gallery_path_url;
	public function __Construct()
  	{
    	parent::__construct();
    	$this->load->model('admin/m_kategori_forum');
    	$this->load->model('m_login');
      $this->gallery_path = realpath(APPPATH. '../images');
      $this->gallery_path_url = base_url(). 'images/';
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
          $this->seson = $ambil_akun;
      $this->cek();

  	}

  	private function cek()
	  {
		  $stat = $this->session->userdata('sts_admin');
    	 if ($stat=="")
    	 {
    		echo "<script>alert('Harap Login Terlebih Dahulu!');</script>";
    		redirect('login','refresh');
  		  }
	  }

	function index()
	{
    $url = '/kebudayaan_indonesia/admin/';
		$kategori_forum = $this->m_kategori_forum->kategori_forum();
    $status_confirm = '0';
        $confirm_user = $this->m_login->confirm_user($status_confirm);
        $jumlah_status_confirm = count($this->m_login->confirm_user($status_confirm));
        if(empty($confirm_guru))
        {
          $c_id_user = '';
          $c_username = '';
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
            $c_username = $data['username'];
            $c_nama_depan = $data['nama_depan'];
            $c_nama_belakang =$data['nama_belakang'];
            $c_nama_panggilan = $data['nama_panggilan'];
            $c_photo = $data['photo'];
              $confirm = $data['status'];
          }
        }

        $pesan_confirm='';
        $total_confirm = count($confirm);

    $this->seson = $this->m_login->ambil_admin($this->session->userdata('username'));
	  $data = array(
     	'user'=>$this->seson,
     	'kategori_forum' =>$kategori_forum,
     	'url'       =>$url,
      'confirm' =>$confirm_user,
      'pesan_confirm' =>$pesan_confirm,
      'total_confirm'=>$jumlah_status_confirm,
        );
    $this->load->view('admin/v_kategori_forum', $data);
	}

  function tambah_kategori_forum()
  {
    $url = '/kebudayaan_indonesia/user/';
    $status_confirm = '0';
        $confirm_user = $this->m_login->confirm_user($status_confirm);
        $jumlah_status_confirm = count($this->m_login->confirm_user($status_confirm));
        if(empty($confirm_guru))
        {
          $c_id_user = '';
          $c_username = '';
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
            $c_username = $data['username'];
            $c_nama_depan = $data['nama_depan'];
            $c_nama_belakang =$data['nama_belakang'];
            $c_nama_panggilan = $data['nama_panggilan'];
            $c_photo = $data['photo'];
              $confirm = $data['status'];
          }
        }

        $pesan_confirm='';
        $total_confirm = count($confirm);

    $this->seson = $this->m_login->ambil_admin($this->session->userdata('username'));
    $data = array(
      'user'=>$this->seson,
      'url'       =>$url,
      'confirm' =>$confirm_user,
      'pesan_confirm' =>$pesan_confirm,
      'total_confirm'=>$jumlah_status_confirm,
        );
    $this->load->view('admin/v_kategori_forum_tambah', $data);

  }

  function simpan_kategori_forum()
  {
    if($this->input->post('simpan'))
    {
      $kategori = $this->input->post('kategori');
      $status ='1';
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
          $data = array(
            'logo' => $this->upload->file_name,
            'kategori'  =>$kategori,
            );
          $this->db->insert('tb_kategori_forum',$data);
          echo"<script> alert('Data Berhasil di Simpan'); </script>";
          redirect("admin/c_kategori_forum/tambah_kategori_forum" , "refresh");
      }
      else
      {
            $data = array(
            'logo' => $this->upload->file_name,
            'kategori'  =>$kategori,
            );
          $this->db->insert('tb_kategori_forum',$data);
          echo"<script> alert('Data Berhasil di Simpan'); </script>";
          redirect("admin/c_kategori_forum/tambah_kategori_forum" , "refresh");
      }

    } 
  }
}
?>