<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_bahasa extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('m_login');
        $this->load->model('admin/m_artikel');
        $this->load->model('mod_autonumber');
        $this->load->library('session');
        $this->link = '/kebudayaan_admin/admin';
        $session = $this->session->userdata('isLogin');
        if($session==True)
        {
            $ambil_akun = $this->m_login->ambil_admin($this->session->userdata('username'));    
            $stat = $this->session->userdata('sts_admin');        
        }
        else
        {
            $username='';
            $ambil_akun = $this->m_login->ambil_admin($username);
            $stat = '';        
        }
        $this->seson = $ambil_akun;
        $this->cek_stat = $stat;
        $this->cek();
	}


	private function cek()
    {

        if ($this->cek_stat=="") 
        {
            echo "<script>alert('Anda belum login!');</script>";
            redirect('login','refresh');
        }
    }

    public function index() {
        $this->load->model('Admin/m_bahasa');

        $data=array(
            'user' => $this->seson,
            'list' => $this->m_bahasa->ambiltbbahasa()
            );

        $this->load->view('Admin/v_bahasa', $data);
    }

    public function tambah_bahasa() {
        $data = array(
            'user' => $this->seson,
            );

        $this->load->view('Admin/v_tambahbahasa', $data);
    }

    public function simpan() {
        $this->load->model('Admin/m_bahasa');

        $this->m_bahasa->tambah();

        redirect('admin/c_bahasa');
    }

    public function ubah_bahasa() {
        $id = $this->uri->segment(4);
        $this->load->model('Admin/m_bahasa');
        $data = array(
            'user' => $this->seson,
            'data' => $this->m_bahasa->ubahdata($id),
            'id' => $id
            );

        $this->load->view('Admin/v_ubahbahasa', $data);
    }

    public function ubah() {
        $id = $this->uri->segment(4);
        $this->load->model('Admin/m_bahasa');
        $this->m_bahasa->ubah($id);

        redirect('admin/c_bahasa');
    }

    public function hapus_bahasa() {
        $id = $this->uri->segment(4);
        $this->load->model('Admin/m_bahasa');
        $this->m_bahasa->hapus($id);

        redirect('admin/c_bahasa');
    }

}