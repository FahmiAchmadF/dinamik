<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_berita extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('m_login');
        $this->load->model('admin/m_berita');
        $this->load->model('mod_autonumber');
        $this->load->library('session');
        $this->link = '/kebudayaan_indonesia/admin';
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

    public function index()
    {
        $berita = $this->m_berita->data_berita($this->seson['id_admin']);
        $data = array(
        'user'      =>$this->seson,
        'berita'   => $berita,
        'url'  =>$this->link
        );
        $this->load->view('Admin/v_berita', $data);
    }

    public function tambah_berita() {
        $this->load->model("Admin/m_quiz");

        $data = array(
        'user'      =>  $this->seson,
        'lang' =>   $this->m_quiz->language(),
        'jumlah_lang' => $this->m_quiz->jumlahbahasa()
        );

        $this->load->view('admin/v_berita_add', $data);
    }

    public function simpan() {
        $this->m_berita->simpan();

        redirect('admin/c_berita');
    }

    public function ubah_berita()
    {
        $id_berita = $this->uri->segment(4);
        $this->load->model('Admin/m_quiz');   
        $data = array(
            'user'  => $this->seson,
            'id' => $id_berita,
            'lang' => $this->m_quiz->language(),
            'jumlah_lang' => $this->m_quiz->jumlahbahasa(),
            'berita' => $this->m_berita->lihat_berita($id_berita),
            'berita_lang' => $this->m_berita->lihat_berita_language($id_berita)
            );

        $this->load->view('admin/v_berita_ubah',$data);
    }

    public function ubah_simpan()
    {
        $id_berita = $this->uri->segment(4);
        $this->m_berita->ubah_simpan($id_berita);

        redirect('admin/c_berita');
    }

    public function hapus_berita()
    {
        $id_berita = $this->uri->segment(4);
        $this->m_berita->hapus_berita($id_berita);

        redirect('admin/c_berita');
    }

}