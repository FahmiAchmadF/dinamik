<?php
class C_kebudayaan extends CI_Controller
{
	function __construct()
    {
        parent::__construct(); 
        $this->load->model('user/mod_index');
        $this->load->model('admin/m_artikel');
        $this->load->model('admin/m_berita');
        $this->load->model('m_login');
        $session = $this->session->userdata('bahasa');
        $bahasa = $this->session->userdata('language');
        // var_dump($session);
        // exit();
        if($bahasa == 'indonesia')
        {
            $this->lang->load('home','indonesia');                        
        }
        elseif($bahasa == 'english')
        {
            $this->lang->load('home','english');
        }
        else
        {
            $this->lang->load('home','indonesia');                         
        }
                    $this->home = $this->lang->line('text_home');
            $this->about = $this->lang->line('text_about');
            $this->topik= $this->lang->line('text_topik');
            $this->profil = $this->lang->line('text_profil');
            $this->login= $this->lang->line('text_login');
            $this->signup = $this->lang->line('text_signup'); 
            $this->berita = $this->lang->line('text_berita');
        $this->tampil_kategori = $this->mod_index->tampil_kategori_forum();
    }
	function index()
	{
        $session = $this->session->userdata('isLoginUser');
        if($session==True)
        {
            $ambil_akun = $this->m_login->ambil_member($this->session->userdata('username_user'));    
        }
        else
        {
            $username='';
            $ambil_akun = $this->m_login->ambil_member($username);
        }
        $data_berita = $this->m_berita->data_berita();
        $data_artikel = $this->m_artikel->data_artikel();

        $data = array(
        'user'=>$ambil_akun,
        'tampil_kategori_forum'=>$this->tampil_kategori,
        'berita'    =>$data_berita,
        'artikel'   =>$data_artikel,
        );
		$this->load->view('user/v_kebudayaan', $data);
	}
}


?>