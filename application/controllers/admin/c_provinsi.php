<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_provinsi extends CI_Controller {

	function __construct() {
		parent::__construct();
        $this->load->model('m_login');
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
        $this->load->model('Admin/m_provinsi');

        $data=array(
            'user' => $this->seson,
            'list' => $this->m_provinsi->listprovinsi()
            );
        
        $this->load->view('Admin/v_provinsi', $data);
    }

    public function tambah_provinsi() {
        $this->load->model('Admin/m_provinsi');
        $data = array(
            'user' => $this->seson,
            'bahasa' => $this->m_provinsi->ambilbahasa()
            );

        $this->load->view('Admin/v_tambahprovinsi', $data);
    }

    public function simpan() {
        $this->load->model('Admin/m_provinsi');

        $this->m_provinsi->tambah();

        redirect('admin/c_provinsi');
    }

    public function ubah_provinsi() {
        $id = $this->uri->segment(4);
        $this->load->model('Admin/m_provinsi');
        $data = array(
            'user' => $this->seson,
            'data' => $this->m_provinsi->ubahdata($id),
            'id' => $id
            );

        $this->load->view('Admin/v_ubahprovinsi', $data);
    }

    public function ubah() {
        $id = $this->uri->segment(4);
        $this->load->model('Admin/m_provinsi');
        $this->m_provinsi->ubah($id);

        redirect('admin/c_provinsi');
    }

    public function hapus_provinsi() {
        $id = $this->uri->segment(4);
        $this->load->model('Admin/m_provinsi');
        $this->m_provinsi->hapus($id);

        redirect('admin/c_provinsi');
    }

}