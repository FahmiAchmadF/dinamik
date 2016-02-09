<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mod_index extends CI_Model
{
	function __construct()
	{
		parent::__construct();
        $this->tb_kategori_forum = "tb_kategori_forum";
	}
    function tampil_kategori_forum()
    {
        $this->db->select('*');
        $this->db->order_by('kategori');
        $this->db->from('tb_kategori_forum');
        $query = $this->db->get();
        $result = $query->result();
        return $result;   
    }
    function tampil_bahasa()
    {
        $this->db->select('*');
        $this->db->order_by('language');
        $this->db->from('tb_language');
        $query = $this->db->get();
        $result = $query->result();
        return $result;   
    }
    function data_artikel($bahasa)
    {
        $limit =3;
        $this->db->select('*');
        $this->db->from('tb_artikel_language');
        $this->db->join('tb_artikel', 'tb_artikel.id = tb_artikel_language.id_artikel');
        $this->db->join('tb_admin', 'tb_admin.id_admin = tb_artikel.id_admin');
        $this->db->join('tb_kategori_forum', 'tb_kategori_forum.id = tb_artikel.id_kategori_forum');
        $this->db->join('tb_language', 'tb_language.id = tb_artikel_language.id_language'); 
        $this->db->limit(3);
        $this->db->order_by('judul');
        $this->db->where('tb_language.language',$bahasa);
        $query = $this->db->get();
        $result = $query->result();
        return $result;      
    }
    
    function data_topik()
    {
        $this->db->select('*');
        $this->db->from('tb_topik_language');
        $this->db->join('tb_topik', 'tb_topik.id = tb_topik_language.id_topik');
        $this->db->join('tb_user', 'tb_user.id = tb_topik.id_user');
        $this->db->join('tb_kategori_forum', 'tb_kategori_forum.id = tb_topik.id_kategori_forum');
        $this->db->join('tb_language', 'tb_language.id = tb_topik_language.id_language'); 
        $this->db->limit(3);
        $this->db->order_by('judul');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
        function data_berita($bahasa)
    {
        $limit =3;
        $this->db->select('*');
        $this->db->from('tb_berita_language');
        $this->db->join('tb_berita', 'tb_berita.id = tb_berita_language.id_berita');
        $this->db->join('tb_admin', 'tb_admin.id_admin = tb_berita.id_admin');
        $this->db->join('tb_language', 'tb_language.id = tb_berita_language.id_language'); 
        $this->db->limit(3);
        $this->db->order_by('judul');
        $this->db->where('tb_language.language',$bahasa);
        $query = $this->db->get();
        $result = $query->result();
        return $result;      
    }
    function data_member($username)
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where('username',$username);
        $query = $this->db->get();
        $result = $query->result();
        return $result;      
    }
    function ubah_profile($username,$data)
    {
        $this->db->where('username', $username);
        $this->db->update('tb_user', $data);
    }
}