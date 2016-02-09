<?php
class C_artikel extends CI_Controller
{
	function __construct()
    {
        parent::__construct(); 
        $this->load->helper(array('url','form'));
        $this->load->model('user/mod_index');
        $this->load->model('m_login');
        $this->load->model('user/m_artikel');
        $this->load->model('user/m_forum');
        $this->load->model('mod_autonumber');
        $this->load->library('session');
        $this->link = '/kebudayaan/user';
          $session = $this->session->userdata('bahasa');
        $bahasa = $this->session->userdata('language');
        // var_dump($bahasa);
        // exit();
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
        else
        {
            $this->bhs= "Indonesia";
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

            //forum
            $this->text_cari = $this->lang->line('text_cari');
            $this->kategori_forum = $this->lang->line('text_kategori_forum');
            $this->post_last_forum = $this->lang->line('text_post_last');
            $this->berita_forum = $this->lang->line('text_berita_forum');

            $this->kategori_forum2 = $this->lang->line('text_kategori_forum2');
            $this->komentar_forum2 = $this->lang->line('text_komentar_forum2');
            $this->pemulai_post_forum2 = $this->lang->line('text_pemulai_post_forum2');

            //artikel
            $this->artikel_judul = $this->lang->line('text_artikel_judul');
            $this->artikel_populer = $this->lang->line('text_artikel_populer');
            // $this-> = $this->lang->line('');
            // $this-> = $this->lang->line('');
            // $this-> = $this->lang->line('');


        $this->tampil_kategori = $this->mod_index->tampil_kategori_forum();
        $this->tampil_bahasa = $this->mod_index->tampil_bahasa();
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
        
        $this->seson=$ambil_akun;
        $this->data_kosong = $data_kosong ='Data Belum Ada';
    }

	function index()
	{
        // $ambil_akun = $this->m_login->ambil_admin($this->session->userdata('username'));
        $url = '/kebudayaan_indonesia/';
        $this->link ='c_artikel';
        $artikel = $this->m_artikel->data_artikel();
        $data_artikel = $this->mod_index->data_artikel($this->bhs);
        $data_berita = $this->mod_index->data_berita($this->bhs);

        $data = array(
            'url'   =>$url,
        'user'      =>$this->seson,
        'tampil_kategori_forum'   =>$this->tampil_kategori,
        'artikel'   => $artikel,
        'data_artikel'   => $data_artikel,
        'data_berita'   => $data_berita,
        'link'  =>$this->link,
        'tampil_kategori_forum' =>$this->tampil_kategori,
        'tampil_bahasa' =>$this->tampil_bahasa,
        );
		$this->load->view('user/v_artikel', $data);
	}

    function tampil_artikel()
    {
        $id_kategori = $this->uri->segment(4);
        $this->link ='c_artikel/tampil_artikel/'.$id_kategori.'';
        $artikel_kategori = $this->m_artikel->data_artikel_kategori($id_kategori,$this->bhs);
        foreach ($artikel_kategori as $data) {
            $kategori= $data->kategori;
        }
        // var_dump($artikel_kategori);
        // exit();
        $data_artikel = $this->mod_index->data_artikel($this->bhs);
        $data_berita = $this->mod_index->data_berita($this->bhs);

        $data = array(
        'user'      =>$this->seson,
        'tampil_kategori_forum'   =>$this->tampil_kategori,
        'artikel_kategori'   => $artikel_kategori,
        'nama_kategori'   =>$kategori,
        'data_artikel'   => $data_artikel,
        'data_berita'   => $data_berita,
        'link'  =>$this->link,
        'tampil_kategori_forum' =>$this->tampil_kategori,
        'tampil_bahasa' =>$this->tampil_bahasa,
        );
        $this->load->view('user/v_artikel_tampil', $data);

    }

    function tambah_artikel()
    {
        $ambil_akun = $this->m_login->ambil_member($this->session->userdata('username'));
        // $ambil_id_user = $this->m_artikel->ambil_id_user($ambil_akun['id_user']);
        $data = array(
        'user'      =>$ambil_akun,
        'autonumberartikel'    => $this->mod_autonumber->autonumber("id_artikel","tb_artikel",4,"IDL"),
        'autonumberforum'    => $this->mod_autonumber->autonumber("id_forum","tb_forum",9,"IDF"),
        );
        $this->load->view('user/v_artikel_add', $data);
    }

    function simpan()
    {
        if($this->input->post('submit'))
        {
            $id_artikel = $this->input->post('id_artikel');
            $id_user = $this->input->post('id_user');
            $judul_artikel = $this->input->post('judul_artikel');
            $isi_artikel = $this->input->post('isi_artikel');
            $kategori = $this->input->post('kategori');
            $status ='0';
            $tanggal = $this->input->post('tanggal');
            $id_forum = $this->input->post('id_forum');
            $data = array(
                'id_artikel'    =>$id_artikel,
                'id_user'       =>$id_user,
                'kategori'      =>$kategori,
                'judul_artikel' =>$judul_artikel,
                'isi_artikel'   =>$isi_artikel,
                'tanggal'       =>$tanggal,
                'status'        =>$status
                );
            $data2 = array(
                'id_forum'      =>$id_forum,
                'id_artikel'    =>$id_artikel,
                'status'        =>$status
                );
            $this->db->insert('tb_artikel',$data);
            $this->db->insert('tb_forum',$data2);
            echo"<script>alert('Data berhasil di tambahkan');</script>";
            redirect('user/c_artikel/tambah_artikel','refresh');
        }
    }
    function simpan_komen()
    {
        if($this->input->post('submit'))
        {
            $id_artikel = $this->input->post('id_artikel');
            $id_user = $this->input->post('id_user');
            $isi_komentar = $this->input->post('isi_komentar');
            $tanggal = $this->input->post('tanggal');
            $status = '1';

            $data = array(
                'id_artikel'          =>$id_artikel,
                'id_user'           =>$id_user,
                'isi_komentar'      =>$isi_komentar,
                'tanggal'           =>$tanggal,
                'status'            =>$status
                );
            $this->db->insert('tb_komentar',$data);
            echo"<script>alert('Komentar berhasil di tambahkan');</script>";
            redirect('user/c_artikel/lihat_artikel/'.$id_artikel.' ','refresh');
        }
    }

    function lihat_artikel()
    {
        $id_artikel = $this->uri->segment(4);
        $this->link ='c_artikel/lihat_artikel/'.$id_artikel.'';
        $lihat_artikel = $this->m_artikel->lihat_artikel($id_artikel,$this->bhs);
        // $tampil_artikel = $this->m_artikel->tampil_artikel($id_artikel);
        $lihat_komentar = $this->m_forum->lihat_komentar_artikel($id_artikel);
        
        $data_artikel = $this->mod_index->data_artikel($this->bhs);
        $data_berita = $this->mod_index->data_berita($this->bhs);
        $data = array(
            'tampil_kategori_forum'   =>$this->tampil_kategori,
            'link'  =>$this->link,
            'id_artikel'    =>$id_artikel,
            'lihat_artikel' =>$lihat_artikel,
            'data_berita'   => $data_berita,
            'postingan_populer' =>$data_artikel,
            'lihat_komentar'    =>$lihat_komentar,
            // 'id_komentar'   =>$id_komentar,
                    'tampil_kategori_forum' =>$this->tampil_kategori,
        'tampil_bahasa' =>$this->tampil_bahasa,
            'user'  =>$this->seson);
        $this->load->view('user/v_artikel_lihat',$data);
    }

    function ubah_artikel()
    {
        $id_artikel = $this->uri->segment(4);
        $ambil_akun = $this->m_login->ambil_member($this->session->userdata('username'));
        $lihat_artikel = $this->m_artikel->lihat_artikel($id_artikel);
        $data = array(
            'lihat_artikel' =>$lihat_artikel,
            'user'  =>$ambil_akun);
        $this->load->view('user/v_artikel_ubah',$data);        
    }

    function ubah_simpan()
    {
        if($this->input->post('submit'))
        {
            $id_artikel = $this->input->post('id_artikel');
            $id_user = $this->input->post('id_user');
            $judul_artikel = $this->input->post('judul_artikel');
            $isi_artikel = $this->input->post('isi_artikel');
            $status ='0';
            $kategori = $this->input->post('kategori');
            $tanggal = $this->input->post('tanggal');
            $data=array(
                'id_user'   => $id_user,
                'kategori'  =>$kategori,
                'judul_artikel' =>$judul_artikel,
                'isi_artikel'   =>$isi_artikel,
                'tanggal'   =>$tanggal,
                'status'    =>$status
                );
            $this->m_artikel->ubah_simpan($id_artikel,$data);
            echo"<script>alert('Data berhasil di Ubah');</script>";
            redirect('user/c_artikel','refresh');
        }
    }

    function hapus_artikel()
    {
        $id_artikel = $this->uri->segment(4);
        $this->m_artikel->hapus_artikel($id_artikel);
        echo"<script> alert('Data berhasil di hapus');</script>";
        redirect('user/c_artikel','refresh');
    } 

}
?>