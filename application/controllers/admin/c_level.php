<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_level extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_login');
        $this->load->model('Admin/m_level');
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
        $this->load->model('Admin/m_level');

        $data=array(
            'user' => $this->seson,
            'list' => $this->m_level->ambiltblevel()
            );
        
        $this->load->view('Admin/v_level', $data);
    }

    public function tambah_level() {
        $level = $this->m_level->autolevel();
        $data = array(
            'user' => $this->seson,
            'autolevel' => $level+1
            );

        $this->load->view('Admin/v_tambahlevel', $data);
    }

    public function simpan() {
        $this->load->model('Admin/m_level');

        $this->m_level->tambah();

        redirect('admin/c_level');
    }

    public function ubah_level() {
        $id = $this->uri->segment(4);
        $this->load->model('Admin/m_level');
        $data = array(
            'user' => $this->seson,
            'data' => $this->m_level->ubahdata($id),
            'id' => $id
            );

        $this->load->view('Admin/v_ubahlevel', $data);
    }

    public function ubah() {
        $id = $this->uri->segment(4);
        $this->load->model('Admin/m_level');
        $this->m_level->ubah($id);

        redirect('admin/c_level');
    }

    public function hapus_level() {
        $id = $this->uri->segment(4);
        $this->load->model('Admin/m_level');
        $this->m_level->hapus($id);

        redirect('admin/c_level');
    }

    

}