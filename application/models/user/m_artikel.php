<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_artikel extends CI_Model{
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
        $this->db->join('tb_kategori_forum', 'tb_kategori_forum.id = tb_artikel.id_kategori_forum');
        $this->db->join('tb_language', 'tb_language.id = tb_artikel_language.id_language'); 
        $this->db->order_by('judul');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function data_artikel_kategori($id_kategori,$bahasa)
    {
        $this->db->select('*');
        $this->db->from('tb_artikel_language');
        $this->db->join('tb_artikel', 'tb_artikel.id = tb_artikel_language.id_artikel');
        $this->db->join('tb_admin', 'tb_admin.id_admin = tb_artikel.id_admin');
        $this->db->join('tb_kategori_forum', 'tb_kategori_forum.id = tb_artikel.id_kategori_forum');
        $this->db->join('tb_language', 'tb_language.id = tb_artikel_language.id_language'); 
        $this->db->order_by('judul');
        $this->db->where('tb_kategori_forum.id',$id_kategori);
        $this->db->where('tb_language.language',$bahasa);
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

    function lihat_artikel($id_artikel,$bahasa)
    {
        $this->db->select('*');
        $this->db->from('tb_artikel_language');
        $this->db->join('tb_artikel', 'tb_artikel.id = tb_artikel_language.id_artikel');
        $this->db->join('tb_admin', 'tb_admin.id_admin = tb_artikel.id_admin');
        $this->db->join('tb_kategori_forum', 'tb_kategori_forum.id = tb_artikel.id_kategori_forum');
        $this->db->join('tb_language', 'tb_language.id = tb_artikel_language.id_language'); 
        $this->db->order_by('judul');
        $this->db->where('tb_artikel.id',$id_artikel);
        $this->db->where('tb_language.language',$bahasa);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function tampil_artikel($id_artikel)
    {
        $this->db->select('tb_artikel_language.id_artikel as id_artikel');
        $this->db->from('tb_artikel_language');
        $this->db->join('tb_artikel', 'tb_artikel.id = tb_artikel_language.id_artikel');
        $this->db->join('tb_kategori_forum', 'tb_kategori_forum.id = tb_artikel_language.id_kategori_forum');
        $this->db->where('tb_artikel_language.id_artikel',$id_artikel);
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