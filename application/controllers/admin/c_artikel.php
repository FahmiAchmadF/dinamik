<?php
class C_artikel extends CI_Controller
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

	function index()
	{
        // $fahmi['abjad']=array('1','A','B','C');
        // var_dump($fahmi['abjad']['2']);
        $artikel = $this->m_artikel->data_artikel($this->seson['id_admin']);
        $data = array(
        'user'      =>$this->seson,
        'artikel'   => $artikel,
        'url'  =>$this->link
        );
        
		$this->load->view('admin/v_artikel', $data);
	}

    function tambah_artikel()
    {
        $this->load->model("Admin/m_quiz");

        $tampil_kategori = $this->m_artikel->tampil_kategori();
        $data = array(
        'user'      =>$this->seson,
        'kategori'  =>$tampil_kategori,
        'provinsi'  =>  $this->m_artikel->tampil_provinsi(),
        'lang' => $this->m_quiz->language(),
        'jumlah_lang' => $this->m_quiz->jumlahbahasa()
        );

        $this->load->view('admin/v_artikel_add', $data);
    }

    function simpan()
    {
        $this->m_artikel->simpan();   
        redirect('admin/c_artikel');
    }

    function ubah_artikel()
    {
        $id_artikel = $this->uri->segment(4);
        $this->load->model('Admin/m_quiz');   
        $data = array(
            'user'  => $this->seson,
            'id' => $id_artikel,
            'kategori'  => $this->m_artikel->tampil_kategori(),
            'provinsi'  =>  $this->m_artikel->tampil_provinsi(),
            'lang' => $this->m_quiz->language(),
            'jumlah_lang' => $this->m_quiz->jumlahbahasa(),
            'artikel' => $this->m_artikel->lihat_artikel($id_artikel),
            'artikel_lang' => $this->m_artikel->lihat_artikel_language($id_artikel)
            );

        $this->load->view('admin/v_artikel_ubah',$data);
    }

    function ubah_simpan()
    {
        $id_artikel = $this->uri->segment(4);
        $this->m_artikel->ubah_simpan($id_artikel);

        redirect('admin/c_artikel');
    }

    function hapus_artikel()
    {
        $id_artikel = $this->uri->segment(4);
        $this->m_artikel->hapus_artikel($id_artikel);

        redirect('admin/c_artikel');
    } 

}
?>