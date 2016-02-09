<?php
class C_forum extends CI_Controller
{
	function __construct()
    {
        parent::__construct(); 
        $this->load->helper(array('url','form'));
        $this->load->model('user/mod_index');
        $this->load->model('m_login');
        $this->load->model('admin/m_artikel');
        $this->load->model('user/m_forum');
        $this->load->model('mod_autonumber');
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
        elseif($bahasa == 'Jawa')
        {
            $this->bhs=$bahasa;

            $this->lang->load('home','jawa');
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
            $this->buat_topik_forum = $this->lang->line('text_create_topik');
            $this->posting_populer_forum = $this->lang->line('text_posting_populer');
            $this->berita_forum = $this->lang->line('text_berita_forum');

            //forum 2
            $this->kategori_forum2 = $this->lang->line('text_kategori_forum2');
            $this->komentar_forum2 = $this->lang->line('text_komentar_forum2');
            $this->pemulai_post_forum2 = $this->lang->line('text_pemulai_post_forum2');

            //forum tambah topik
            $this->buat_topik_baru = $this->lang->line('text_buat_topik');
            $this->penulis_forum = $this->lang->line('text_penulis_forum');
            $this->nama_postingan = $this->lang->line('text_nama_postingan'); 
            $this->pilih_kategori = $this->lang->line('text_pilih_kategori'); 
            $this->buton_simpan = $this->lang->line('text_buton_simpan'); 

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

    // fungsi ini untuk menampilkan view
	function index()
	{
        $this->link ='c_forum';

        $topik_top = $this->m_forum->topik_top();
        $artikel_top = $this->m_forum->data_artikel();
        $postingan_populer = $this->m_forum->topik_populer();
        $data_berita = $this->mod_index->data_berita($this->bhs);

        $data = array(  
        'user'      =>$this->seson,
        'artikel'   => $artikel_top,
        'data_berita'   => $data_berita,
        'postingan_populer' =>$postingan_populer,
        'topik_top' =>$topik_top,
        'data_kosong'   =>$this->data_kosong,
        'tampil_kategori_forum' =>$this->tampil_kategori,
        'tampil_bahasa' =>$this->tampil_bahasa,
        'link'  =>$this->link
        );
		$this->load->view('user/v_forum', $data);
	}
    function tampil_kategori()
    {
        $id_kategori = $this->uri->segment(4);
        $this->link ='c_forum/tampil_kategori/'.$id_kategori.'';
        $data_kategori = $this->m_forum->tampil_kategori($id_kategori);
        foreach ($data_kategori as $data) {
            $kategori= $data->kategori;
        }

        $topik_kategori = $this->m_forum->topik_kategori($id_kategori);
        $data = array(
        'user'      =>$this->seson,
        'topik_top' =>$topik_kategori,
        'nama_kategori' =>$kategori,
        'data_kosong'   =>$this->data_kosong,
        'tampil_kategori_forum' =>$this->tampil_kategori,
        'tampil_bahasa' =>$this->tampil_bahasa,
        'link'  =>$this->link
        );
        $this->load->view('user/v_forum_kategori', $data);   
    }

    function tampil_forum()
    {
        $id_forum = $this->uri->segment(4);
        $status ='1';
        $lihat_forum = $this->m_forum->lihat_forum($id_forum,$status);
        $lihat_komentar = $this->m_forum->lihat_komentar($id_forum);
        foreach ($lihat_komentar as $data) 
        {
            $id_user_komentar = $data->id_user_komentar;
        }
        
        $data = array(
            'lihat_forum' =>$lihat_forum,
            'lihat_komentar'    =>$lihat_komentar,
            'user'  =>$this->seson,
            'id_forum'  =>$id_forum,
            'tampil_bahasa' =>$this->tampil_bahasa,
            'autonumberkomen'    => $this->mod_autonumber->autonumber("id_komentar","tb_komentar",9,"IDK"),
            'tampil_kategori_forum' =>$this->tampil_kategori,
            'tampil_bahasa' =>$this->tampil_bahasa,
            );
        $this->load->view('user/v_forum_tampil',$data);
    }
    function tampil_topik()
    {
        $id_topik = $this->uri->segment(4);
        $this->link ='c_forum/tampil_topik/'.$id_topik.'';
        $status ='0';
        $lihat_topik = $this->m_forum->lihat_topik($id_topik,$status);
        $lihat_komentar = $this->m_forum->lihat_komentar_topik($id_topik);
        $postingan_populer = $this->m_forum->topik_populer();
        $data_berita = $this->mod_index->data_berita($this->bhs);
        
        $data = array(
            'lihat_topik' =>$lihat_topik,
            'lihat_komentar'    =>$lihat_komentar,
            'user'  =>$this->seson,
            'data_berita'   => $data_berita,
            'postingan_populer' =>$postingan_populer,
            'id_topik'  =>$id_topik,
            'tampil_kategori_forum' =>$this->tampil_kategori,
            'tampil_bahasa' =>$this->tampil_bahasa,

            // 'autonumberkomen'    => $this->mod_autonumber->autonumber("id_komentar","tb_komentar",9,"IDK"),
            );
        $this->load->view('user/v_topik_tampil',$data);
    }
    function tambah_topik()
    {
        $this->link ='c_forum/tambah_topik';
        $tampil_kategori = $this->m_artikel->tampil_kategori();
        $postingan_populer = $this->m_forum->topik_populer();
        $data_berita = $this->mod_index->data_berita($this->bhs);
        $data = array(
            'tampil_kategori_forum' =>$this->tampil_kategori,
            'user'  =>$this->seson,
            'data_berita'   => $data_berita,
            'postingan_populer' =>$postingan_populer,
            'kategori'  =>$tampil_kategori,
            'tampil_kategori_forum' =>$this->tampil_kategori,
            'tampil_bahasa' =>$this->tampil_bahasa,

            );
        $this->load->view('user/v_topik_tambah',$data);
    }
    function simpan_topik()
    {
        if($this->input->post('submit'))
        {
            $id_user = $this->input->post('id_user');
            $id_language = '1';
            $status='0';
            $id_kategori = $this->input->post('id_kategori_forum');
            $judul = $this->input->post('judul');
            $isi = $this->input->post('isi');
            // var_dump($isi);
            // exit();
            $status ='0';
            $tanggal = $this->input->post('tanggal');
            $data_head = array(
                'id_user'       =>$id_user,
                'id_kategori_forum' =>$id_kategori,
                'tanggal'       =>$tanggal,
                'status'        =>$status
                );
            $this->db->insert('tb_topik',$data_head);
            $id_lg = $this->db->select_max('id');
            $id_lg = $this->db->get('tb_topik');
            $id_lg = $id_lg->result();
            $id_topik_lg = $id_lg['0']->id;            
            $data_master = array(
                'id_topik'      =>$id_topik_lg,
                'judul'   =>$judul,
                'isi'       =>$isi,
                'id_language'        =>$id_language
                );
            $this->db->insert('tb_topik_language',$data_master);
            echo"<script>alert('Topik berhasil di tambahkan');</script>";
            redirect('user/c_forum','refresh');
        }
    }

    function simpan_komen()
    {
        if($this->input->post('submit'))
        {
            $id_komentar = $this->input->post('id_komentar');
            $id_forum = $this->input->post('id_forum');
            $id_user = $this->input->post('id_user');
            $isi_komentar = $this->input->post('isi_komentar');
            $tanggal = $this->input->post('tanggal');
            $status = '1';

            $data = array(
                'id_komentar'       =>$id_komentar,
                'id_forum'          =>$id_forum,
                'id_user'           =>$id_user,
                'isi_komentar'      =>$isi_komentar,
                'tanggal'           =>$tanggal,
                'status'            =>$status
                );
            $this->db->insert('tb_komentar',$data);
            echo"<script>alert('Komentar berhasil di tambahkan');</script>";
            redirect('user/c_forum/tampil_forum/'.$id_forum.' ','refresh');
        }
    }
    function simpan_komen_topik()
    {
        if($this->input->post('submit'))
        {
            $id_komentar = $this->input->post('id_komentar');
            $id_topik = $this->input->post('id_topik');
            $id_user = $this->input->post('id_user');
            $isi_komentar = $this->input->post('isi_komentar');
            $tanggal = $this->input->post('tanggal');
            $status = '1';

            $data = array(
                'id_topik'          =>$id_topik,
                'id_user'           =>$id_user,
                'isi_komentar'      =>$isi_komentar,
                'tanggal'           =>$tanggal,
                'status'            =>$status
                );
            $this->db->insert('tb_komentar_topik',$data);
            echo"<script>alert('Komentar berhasil di tambahkan');</script>";
            redirect('user/c_forum/tampil_topik/'.$id_topik.' ','refresh');
        }
    }
}
?>