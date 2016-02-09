<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_forum extends CI_Model{
    function __construct()
    {
        parent::__construct();
        $this->tbl = "tb_artikel";
        $this->tb_user = "tb_user";
    }

    function data_artikel()
    {
        $this->db->select('*');
        $this->db->from('tb_artikel_language');
        $this->db->join('tb_artikel', 'tb_artikel.id = tb_artikel_language.id_artikel');
        $this->db->join('tb_admin', 'tb_admin.id_admin = tb_artikel.id_admin');
        // $this->db->join('tb_kategori_forum', 'tb_kategori_forum.id = tb_artikel_language.id_kategori_forum');
        $this->db->join('tb_language', 'tb_language.id = tb_artikel_language.id_language'); 
        $this->db->order_by('judul');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function topik_top()
    {
        $this->db->select('*');
        $this->db->from('tb_topik_language');
        $this->db->join('tb_topik', 'tb_topik.id = tb_topik_language.id_topik');
        $this->db->join('tb_user', 'tb_user.id = tb_topik.id_user');
        $this->db->join('tb_kategori_forum', 'tb_kategori_forum.id = tb_topik.id_kategori_forum');
        $this->db->join('tb_language', 'tb_language.id = tb_topik_language.id_language'); 
        $this->db->order_by('judul');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
        function topik_populer()
    {
        $this->db->select('*');
        $this->db->from('tb_topik_language');
        $this->db->join('tb_topik', 'tb_topik.id = tb_topik_language.id_topik');
        $this->db->join('tb_user', 'tb_user.id = tb_topik.id_user');
        $this->db->join('tb_kategori_forum', 'tb_kategori_forum.id = tb_topik.id_kategori_forum');
        $this->db->join('tb_language', 'tb_language.id = tb_topik_language.id_language'); 
        $this->db->limit(3);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function topik_kategori($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('tb_topik_language');
        $this->db->join('tb_topik', 'tb_topik.id = tb_topik_language.id_topik');
        $this->db->join('tb_user', 'tb_user.id = tb_topik.id_user');
        $this->db->join('tb_kategori_forum', 'tb_kategori_forum.id = tb_topik.id_kategori_forum');
        $this->db->join('tb_language', 'tb_language.id = tb_topik_language.id_language'); 
        $this->db->order_by('judul');
        $this->db->where('tb_kategori_forum.id',$id_kategori);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function tampil_kategori($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('tb_kategori_forum');
        $this->db->where('id',$id_kategori);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function ambil_id_user($id_user)
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where('id_user',$id_user);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function lihat_forum($id_forum,$status)
    {
        $this->db->select('*');
        $this->db->from('tb_forum');
        $this->db->join('tb_artikel', 'tb_artikel.id_artikel = tb_forum.id_artikel');
        $this->db->join('tb_user', 'tb_user.id_user = tb_artikel.id_user');
        $this->db->order_by('judul_artikel');
        $this->db->where('id_forum',$id_forum);
        $this->db->where('tb_forum.status',$status);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function lihat_topik($id_topik,$status)
    {
         $this->db->select('*');
        $this->db->from('tb_topik_language');
        $this->db->join('tb_topik', 'tb_topik.id = tb_topik_language.id_topik');
        $this->db->join('tb_user', 'tb_user.id = tb_topik.id_user');
        $this->db->join('tb_kategori_forum', 'tb_kategori_forum.id = tb_topik.id_kategori_forum');
        $this->db->join('tb_language', 'tb_language.id = tb_topik_language.id_language'); 
        $this->db->order_by('judul');
        $this->db->where('tb_topik_language.id_topik',$id_topik);
        $this->db->where('tb_topik.status',$status);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function lihat_komentar_artikel($id_artikel)
    {
        $this->db->select('tb_komentar.id as id_komentar,tb_artikel_language.id_artikel as id_artikel_language,
            tb_artikel.id as id_artikel,tb_komentar.id_user as id_user_komentar,tb_user.nama_panggilan as nama_panggilan_komentar,
            tb_komentar.isi_komentar as isi_komentar,tb_komentar.tanggal as tanggal_komentar');
        // $this->db->select('*');
        $this->db->from('tb_komentar');
        $this->db->join('tb_artikel_language', 'tb_artikel_language.id_artikel = tb_komentar.id_artikel');
        $this->db->join('tb_artikel', 'tb_artikel.id = tb_artikel_language.id_artikel');
        $this->db->join('tb_kategori_forum', 'tb_kategori_forum.id = tb_artikel.id_kategori_forum');
        $this->db->join('tb_user', 'tb_user.id = tb_komentar.id_user');
        $this->db->where('tb_artikel_language.id_artikel',$id_artikel);
        $this->db->group_by('tb_artikel_language.id_artikel');
        $this->db->group_by('tb_komentar.isi_komentar');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function lihat_komentar_berita($id_berita)
    {
        $this->db->select('tb_komentar_berita.id as id_komentar,tb_berita_language.id_berita as id_berita_language,
            tb_berita.id as id_berita,tb_komentar_berita.id_user as id_user_komentar,tb_user.nama_panggilan as nama_panggilan_komentar,
            tb_komentar_berita.isi_komentar as isi_komentar,tb_komentar_berita.tanggal as tanggal_komentar,tb_user.id as id_user,
            tb_user.nama_depan as nama_depan, tb_user.nama_belakang as nama_belakang,tb_user.photo as photo');
        $this->db->from('tb_komentar_berita');
        $this->db->join('tb_berita_language','tb_berita_language.id_berita = tb_komentar_berita.id_berita');
        $this->db->join('tb_berita', 'tb_berita.id = tb_berita_language.id_berita');
        // $this->db->join('tb_kategori_forum', 'tb_kategori_forum.id = tb_berita_language.id_kategori_forum');
        $this->db->join('tb_user', 'tb_user.id = tb_komentar_berita.id_user');
        $this->db->where('tb_berita_language.id_berita',$id_berita);
        $this->db->group_by('tb_berita_language.id_berita');
        $this->db->group_by('tb_komentar_berita.isi_komentar');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
     function lihat_komentar_topik($id_topik)
    {
        $this->db->select('tb_komentar_topik.id as id_komentar,tb_topik_language.id_topik as id_topik_language,
            tb_topik.id as id_topik,tb_komentar_topik.id_user as id_user_komentar,tb_user.nama_panggilan as nama_panggilan_komentar,
            tb_komentar_topik.isi_komentar as isi_komentar,tb_komentar_topik.tanggal as tanggal_komentar');
        // $this->db->select('*');
        $this->db->from('tb_komentar_topik');
        $this->db->join('tb_topik_language', 'tb_topik_language.id_topik = tb_komentar_topik.id_topik');
        $this->db->join('tb_topik', 'tb_topik.id = tb_topik_language.id_topik');
        $this->db->join('tb_kategori_forum', 'tb_kategori_forum.id = tb_topik.id_kategori_forum');
        $this->db->join('tb_user', 'tb_user.id = tb_komentar_topik.id_user');
        $this->db->where('tb_topik_language.id_topik',$id_topik);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    
    function ubah_simpan($id_artikel,$data)
    {
        $this->db->where('id_artikel', $id_artikel);
        $this->db->update('tb_artikel', $data);
    }

    function hapus_artikel($id_artikel)
    {
        $this->db->where('id_artikel', $id_artikel);
        $this->db->delete('tb_artikel');
    }
}