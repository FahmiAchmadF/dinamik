<?php
class c_topik extends CI_Controller
{
	function __construct()
    {
        parent::__construct(); 
        $this->load->helper(array('url','form'));
        // $this->load->model('user/mod_index');
        $this->load->model('m_login');
        $this->load->model('admin/m_artikel');
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
        // var_dump($stat);
        // exit();
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
        $this->load->model('Admin/m_topik');
        $this->m_topik->selecttopik();
        $data = array(
        'user'  => $this->seson,
        'topik' => $this->m_topik->selecttopik()
        );

        $this->load->view('Admin/v_topik', $data);
        
    }

}