<?php
class C_quiz extends CI_Controller
{
    var $gallery_path;
    var $gallery_path_url;
    var $urls;
    public $data = Array();

	function __construct()
    {
        parent::__construct(); 
        $this->gallery_path = realpath(APPPATH. '../images');
        $this->gallery_path_url = base_url(). 'images/';
        $this->load->model('user/mod_index');
        $this->load->model('m_login');

        $session_login = $this->session->userdata('isLoginUser');
        if($session_login==True)
        {
            $ambil_akun = $this->m_login->ambil_member($this->session->userdata('username_user'));    
            $username=$this->session->userdata('username_user');
        }
        else
        {
            $username='';
            $ambil_akun = $this->m_login->ambil_member($username);
        }

        $this->seson = $ambil_akun;
        $this->username = $username;
        $session = $this->session->userdata('bahasa');
        $bahasa = $this->session->userdata('language');
        if($bahasa == 'Indonesia')
        {
            $this->bhs=$bahasa;
            $this->lang->load('home','indonesia');                        
        }
        elseif($bahasa == 'English')
        {
            $this->bhs=$bahasa;
            $this->lang->load('home','english');
        }
        elseif($bahasa == 'Sunda')
        {
            $this->bhs=$bahasa;
            $this->lang->load('home','sunda');
        }
        elseif($bahasa == 'Jawa')
        {
            $this->bhs=$bahasa;
            $this->lang->load('home','jawa');
        }
        else
        {
            $this->bhs ='Indonesia';
            $this->lang->load('home','indonesia');                         
        }
            //index
            //menu
            $this->home = $this->lang->line('text_home');
            $this->about = $this->lang->line('text_about');
            $this->topik= $this->lang->line('text_topik');
            $this->berita= $this->lang->line('text_berita');
            $this->artikel= $this->lang->line('text_artikel');
            $this->keluar= $this->lang->line('text_keluar');
            $this->bahasa= $this->lang->line('text_bahasa');
            $this->profil = $this->lang->line('text_profil');
            $this->login= $this->lang->line('text_login');
            $this->signup = $this->lang->line('text_signup'); 
            $this->berita = $this->lang->line('text_berita');
            //text di gambar
            $this->head_gambar = $this->lang->line('text_head_gambar_index');
            $this->head_gambar1 = $this->lang->line('text_head_gambar_index1');
            $this->head_gambar2 = $this->lang->line('text_head_gambar_index2');
            $this->head_gambar3 = $this->lang->line('text_head_gambar_index3');
            $this->head_gambar4 = $this->lang->line('text_head_gambar_index4');
            //text di konten
            $this->text_konten1 = $this->lang->line('text_konten_1');
            $this->text_konten2 = $this->lang->line('text_konten_2');
            $this->text_konten3 = $this->lang->line('text_konten_3');
            $this->budaya_indonesia = $this->lang->line('text_gambar_budaya_indonesia');
            $this->artikel_kuis = $this->lang->line('text_artikel_dan_kuis');
            $this->text_bawah1 = $this->lang->line('text_bawah_1');
            $this->text_bawah2 = $this->lang->line('text_bawah_2');
            $this->text_selengkapnya = $this->lang->line('text_selengkapnya');

            //text Forum
            
        $this->tampil_kategori = $this->mod_index->tampil_kategori_forum();
        $this->tampil_bahasa = $this->mod_index->tampil_bahasa();

        $this->cek();
    }
    function cek()
    {
        $session_login = $this->session->userdata('isLoginUser');
         if ($session_login==false) 
        {
            echo "<script>alert('Harap Login Terlebih Dahulu. Terimakasi');</script>";
            redirect('user/#popup1','refresh');
        }
    }

    function index()
    {
        $this->link ='c_quiz';
        $data_artikel = $this->mod_index->data_artikel($this->bhs);
        $data_berita = $this->mod_index->data_berita($this->bhs);
        $data_topik = $this->mod_index->data_topik();
        // var_dump($data_berita);
        // exit();
        $data = array(
        'user'=>$this->seson,
        'data_artikel'  =>$data_artikel,
        'data_berita'  =>$data_berita,
        'data_topik'  =>$data_topik,
        'tampil_kategori_forum'=>$this->tampil_kategori,
        'tampil_bahasa'=>$this->tampil_bahasa,
        );
		$this->load->view('user/v_quiz', $data);
	}
    function edit_profile()
    {
        $this->link ='index';

        $data_user = $this->mod_index->data_member($this->username);
        $data = array(
        'member'  =>$data_user,
        'user'=>$this->seson,
        'tampil_kategori_forum'=>$this->tampil_kategori,
        'tampil_bahasa'=>$this->tampil_bahasa,
        );
        $this->load->view('user/edit_profile',$data);
    }

    function ubah_profile()
    {
        $hak ="user";
        if($this->input->post('submit'))
        {
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
            $username= $this->input->post('username');
            $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'hak' => $hak,
            'nama_depan' => $this->input->post('nama_depan'),
            'nama_belakang' => $this->input->post('nama_belakang'),
            'nama_panggilan' => $this->input->post('nama_panggilan'),
            'jk' => $this->input->post('jk'),
            'tentang' => $this->input->post('tentang'),
            'alamat' => $this->input->post('alamat'),
            'email' => $this->input->post('email'),
            'no_hp' => $this->input->post('no_hp'),
             );
            $this->mod_index->ubah_profile($username,$data);
            // var_dump($data);
            // exit();
            redirect('user/index/edit_profile');
        }
        else
        {
            $username= $this->input->post('username');
            $map = $_SERVER['DOCUMENT_ROOT'];
            $path = $map . '/kebudayaan_indonesia/images/';
            $nama_photo = $this->input->post('gambar_dlt');
            $image = $path.$nama_photo;
            unlink($image);
            $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'hak' => $hak,
            'nama_depan' => $this->input->post('nama_depan'),
            'nama_belakang' => $this->input->post('nama_belakang'),
            'nama_panggilan' => $this->input->post('nama_panggilan'),
            'jk' => $this->input->post('jk'),
            'tentang' => $this->input->post('tentang'),
            'alamat' => $this->input->post('alamat'),
            'email' => $this->input->post('email'),
            'no_hp' => $this->input->post('no_hp'),
            'photo' => $this->upload->file_name,
        );  
        $this->mod_index->ubah_profile($username,$data);
        redirect('user/index/edit_profile');
        }
      }
    }

    function logout_user()
    {
        // $this->session->sess_destroy();
        $this->session->unset_userdata('isLoginUser');  
        redirect('user/index','refresh');
    }
}


?>