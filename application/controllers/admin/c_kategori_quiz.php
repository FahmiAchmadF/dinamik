<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_kategori_quiz extends CI_Controller {

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
        $this->load->model('Admin/m_kategori_quiz');

        $data=array(
            'user' => $this->seson,
            'list' => $this->m_kategori_quiz->listkategori_quiz()
            );
        
        $this->load->view('Admin/v_kategori_quiz', $data);
    }

    public function tambah_kategori_quiz() {
        $data = array(
            'user' => $this->seson
            );

        $this->load->view('Admin/v_tambahkategori_quiz', $data);
    }

    public function simpan() {
        $this->load->model('Admin/m_kategori_quiz');

        $this->m_kategori_quiz->tambah();

        redirect('admin/c_kategori_quiz');
    }

    public function ubah_kategori_quiz() {
        $id = $this->uri->segment(4);
        $this->load->model('Admin/m_kategori_quiz');
        $data = array(
            'user' => $this->seson,
            'data' => $this->m_kategori_quiz->ubahdata($id),
            'id' => $id
            );

        $this->load->view('Admin/v_ubahkategori_quiz', $data);
    }

    public function ubah() {
        $id = $this->uri->segment(4);
        $this->load->model('Admin/m_kategori_quiz');
        $this->m_kategori_quiz->ubah($id);

        redirect('admin/c_kategori_quiz');
    }

    public function hapus_kategori_quiz() {
        $id = $this->uri->segment(4);
        $this->load->model('Admin/m_kategori_quiz');
        $this->m_kategori_quiz->hapus($id);

        redirect('admin/c_kategori_quiz');
    }

    

}