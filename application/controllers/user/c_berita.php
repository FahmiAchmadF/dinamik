<?php
class C_berita extends CI_Controller
{
	function __construct()
    {
        parent::__construct(); 
        $this->load->helper(array('url','form'));
        $this->load->model('user/mod_index');
        $this->load->model('m_login');
        $this->load->model('user/m_berita');
        $this->load->model('user/m_forum');
        $this->load->model('mod_autonumber');
        $this->link = 'c_berita';
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
            $this->posting_populer_forum = $this->lang->line('text_posting_populer');
            

            $this->kategori_forum2 = $this->lang->line('text_kategori_forum2');
            $this->komentar_forum2 = $this->lang->line('text_komentar_forum2');
            $this->pemulai_post_forum2 = $this->lang->line('text_pemulai_post_forum2');

            //artikel
            $this->artikel_judul = $this->lang->line('text_artikel_judul');
            $this->artikel_populer = $this->lang->line('text_artikel_populer');

            //berita
            $this->berita_judul = $this->lang->line('text_berita_judul');

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
        $this->tampil_kategori = $this->mod_index->tampil_kategori_forum();
        $this->tampil_bahasa = $this->mod_index->tampil_bahasa();
    }

	function index()
	{
        $berita = $this->m_berita->data_berita($this->bhs);
        $data = array(
        'user'      =>$this->seson,
        'tampil_kategori_forum'   =>$this->tampil_kategori,
        'berita'   => $berita,
        'link'  =>$this->link,
        'tampil_kategori_forum' =>$this->tampil_kategori,
        'tampil_bahasa' =>$this->tampil_bahasa,
        );
		$this->load->view('user/v_berita', $data);
	}



    function simpan_komen()
    {
        if($this->input->post('submit'))
        {
            $id_berita = $this->input->post('id_berita');
            $id_user = $this->input->post('id_user');
            $isi_komentar = $this->input->post('isi_komentar');
            $tanggal = $this->input->post('tanggal');
            $status = '1';

            $data = array(
                'id_berita'          =>$id_berita,
                'id_user'           =>$id_user,
                'isi_komentar'      =>$isi_komentar,
                'tanggal'           =>$tanggal,
                'status'            =>$status
                );
            $this->db->insert('tb_komentar_berita',$data);
            echo"<script>alert('Komentar berhasil di tambahkan');</script>";
            redirect('user/c_berita/lihat_berita/'.$id_berita.' ','refresh');
        }
    }

    function lihat_berita()
    {
        $id_berita = $this->uri->segment(4);
        $lihat_berita = $this->m_berita->lihat_berita($id_berita,$this->bhs);
        $lihat_komentar = $this->m_forum->lihat_komentar_berita($id_berita);
        $postingan_populer = $this->m_forum->topik_populer();
        $data_berita = $this->mod_index->data_berita($this->bhs);

        $data = array(
            'link'  =>$this->link,
            'id_berita'    =>$id_berita,
            'lihat_berita' =>$lihat_berita,
            'tampil_kategori_forum'   =>$this->tampil_kategori,
            'lihat_komentar'    =>$lihat_komentar,
            'tampil_kategori_forum' =>$this->tampil_kategori,
            'data_berita'   => $data_berita,
            'postingan_populer' =>$postingan_populer,
            'tampil_bahasa' =>$this->tampil_bahasa,
            'user'  =>$this->seson);
        $this->load->view('user/v_berita_lihat',$data);
    }

    function ubah_artikel()
    {
        $id_berita = $this->uri->segment(4);
        $lihat_berita = $this->m_berita->lihat_berita($id_berita,$this->bhs);
        $data = array(
            'lihat_be' =>$lihat_artikel,
            'user'  =>$this->seson);
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