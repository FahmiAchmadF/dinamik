<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_gallery extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('m_login');
        $this->load->model('Admin/m_gallery');
        $this->load->model('mod_autonumber');
        $this->load->model('Admin/m_level');
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
        $alert = $this->session->userdata('alert');
        if($alert=='3')
        {
            $pesan = '3';
        }
        elseif($alert=='2')
        {
            $pesan = '2';
        }
        elseif($alert=='1')
        {
            $pesan = '1';
        }
        else
        {
            $pesan ='';
        }
        $data=array(
            'user' => $this->seson,
            'data' => $this->m_gallery->getImage(),
            'pesan'=> $pesan
            );
        $this->session->unset_userdata('alert');
        $this->load->view('Admin/v_gallery', $data);
    }

    public function tambah() {
        $data = array(
            'user' => $this->seson,
            'provinsi'  =>$this->m_gallery->provinsi(),
            );
        $this->load->view('Admin/v_tambah_gallery', $data);
    }

    public function simpan() {
        $this->m_gallery->tambah();
        $this->session->set_userdata(array(
                'peringatan'   => TRUE, //set data telah login
                'alert'  => 3, //set session username
            ));   
        redirect('Admin/c_gallery','refresh');
    }

    public function ubah() {
        $id = $this->uri->segment(4);
        $data = array(
            'user' => $this->seson,
            'data' => $this->m_gallery->ubahdata($id),
            'id' => $id,
            'provinsi'  =>$this->m_gallery->provinsi()
            );
        $this->load->view('Admin/v_ubah_gallery', $data);
    }

    public function ubah_simpan() {
        $this->m_gallery->ubah();
         $this->session->set_userdata(array(
                'peringatan'   => TRUE, //set data telah login
                'alert'  => 2, //set session username
            ));   
        redirect('admin/c_gallery','refresh');
    }

    public function hapus() {
        $id = $this->uri->segment(4);
        $this->m_gallery->hapus($id);
        $this->session->set_userdata(array(
                'peringatan'   => TRUE, //set data telah login
                'alert'  => 1, //set session username
            ));   
        redirect('admin/c_gallery','refresh');
    }

    

}