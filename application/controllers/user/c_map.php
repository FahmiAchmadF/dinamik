<?php
class C_map extends CI_Controller
{

	function __construct()
    {
        parent::__construct(); 
        $this->load->model('user/mod_index');
        $this->load->model('user/m_map');
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
            //text di konten provinsi
            $this->jawa_selamat_datang = $this->lang->line('jawa_selamat_datang');
            $this->jawa_text1 = $this->lang->line('jawa_text1');

            // index per provinsi
            //jawa barat sunda
            $this->sunda_tentang = $this->lang->line('sunda_tentang');
            $this->sunda_text1 = $this->lang->line('sunda_text1');
            $this->sunda_text2 = $this->lang->line('sunda_text2');
            $this->sunda_text3 = $this->lang->line('sunda_text3');
            $this->sunda_text4 = $this->lang->line('sunda_text4');
            $this->sunda_text5 = $this->lang->line('sunda_text5');
            $this->sunda_text6 = $this->lang->line('sunda_text6');
            $this->sunda_text7 = $this->lang->line('sunda_text7');
            $this->sunda_text8 = $this->lang->line('sunda_text8');
            $this->sunda_text9 = $this->lang->line('sunda_text9');



            //index per Provinsi
            //jawa jawa tengah
            $this->jateng_text1 = $this->lang->line('jateng_1');
            $this->jateng_text2 = $this->lang->line('jateng_2');
            $this->jateng_text3 = $this->lang->line('jateng_3');
            $this->jateng_text4 = $this->lang->line('jateng_4');
            $this->jateng_text5 = $this->lang->line('jateng_5');
            $this->jateng_text6 = $this->lang->line('jateng_6');
            $this->jateng_text7 = $this->lang->line('jateng_7');
            $this->jateng_text8 = $this->lang->line('jateng_8');
            $this->jateng_text9 = $this->lang->line('jateng_9');
                      
        $this->tampil_kategori = $this->mod_index->tampil_kategori_forum();
        // var_dump($this->sunda_text9);
        // exit();
    }
    function index()
    {
        $this->link ='c_map/provinsi';
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
        );
		$this->load->view('user/map', $data);
	}

    function provinsi()
    {
        $id_provinsi = $this->uri->segment(4);
        $data_provinsi = $this->m_map->cari_provinsi($id_provinsi);
        foreach ($data_provinsi as $data)
        {
            $id_bahasa = $data->id_language;
            $provinsi = $data->provinsi;
        }
        // var_dump($id_provinsi);
        // exit();

        $data_bahasa = $this->m_map->bahasa($id_bahasa);
        foreach ($data_bahasa as $data)
        {
            $bahasa = $data->language;
        }

        $this->tampil_bahasa_where = $this->m_map->bahasa_where($bahasa);
        $this->link ='c_map/provinsi';

        if($provinsi =='Daerah Istimewa Yogyakarta')
        {
            $data_artikel = $this->mod_index->data_artikel($this->bhs);
            $data_berita = $this->mod_index->data_berita($this->bhs);
            $data_topik = $this->mod_index->data_topik();
            $data_gallery = $this->mod_index->data_gallery($id_provinsi);

            $data = array(
            'user'=>$this->seson,
            'data_artikel'  =>$data_artikel,
            'data_berita'  =>$data_berita,
            'data_gallery' =>$data_gallery,
            'data_topik'  =>$data_topik,
            'tampil_kategori_forum'=>$this->tampil_kategori,
            'tampil_bahasa_where'=>$this->tampil_bahasa_where,
            'provinsi'  =>$provinsi,
            );
            $this->load->view('user/index_yogyakarta', $data);   
        }
        elseif($provinsi =='Jawa Barat')
        {
            $data_artikel = $this->mod_index->data_artikel($this->bhs);
            $data_berita = $this->mod_index->data_berita($this->bhs);
            $data_topik = $this->mod_index->data_topik();
            $data_gallery = $this->mod_index->data_gallery($id_provinsi);

            $data = array(
            'user'=>$this->seson,
            'data_artikel'  =>$data_artikel,
            'data_berita'  =>$data_berita,
            'data_topik'  =>$data_topik,
            'data_gallery' =>$data_gallery,
            'tampil_kategori_forum'=>$this->tampil_kategori,
            'tampil_bahasa_where'=>$this->tampil_bahasa_where,
            'provinsi'  =>$provinsi,
            );
            $this->load->view('user/index_jawabarat', $data);
        }
        elseif ($provinsi=='Jawa Tengah') 
        {
            $data_artikel = $this->mod_index->data_artikel($this->bhs);
            $data_berita = $this->mod_index->data_berita($this->bhs);
            $data_topik = $this->mod_index->data_topik();
            $data_gallery = $this->mod_index->data_gallery($id_provinsi);

            $data = array(
            'user'=>$this->seson,
            'data_artikel'  =>$data_artikel,
            'data_berita'  =>$data_berita,
            'data_gallery' =>$data_gallery,
            'data_topik'  =>$data_topik,
            'tampil_kategori_forum'=>$this->tampil_kategori,
            'tampil_bahasa_where'=>$this->tampil_bahasa_where,
            'provinsi'  =>$provinsi,
            );
            $this->load->view('user/index_jawatengah', $data);
        }

    }

}
?>