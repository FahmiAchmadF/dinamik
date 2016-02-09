<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_map extends CI_Model
{
	function __construct()
	{
		parent::__construct();
        $this->tb_provinsi = "tb_provinsi";
	}
    function provinsi($id_provinsi)
    {
        $this->db->select('*');
        $this->db->from('tb_provinsi');
        $this->db->order_by('provinsi');
        $this->db->join('tb_language', 'tb_language.id = tb_provinsi.id_language'); 
        $this->db->where('tb_provinsi.id',$id_provinsi);
        $query = $this->db->get();
        $result = $query->result();
        return $result;   
    }
    function cari_provinsi($id_provinsi)
    {
        $this->db->select('*');
        $this->db->from('tb_provinsi');
        $this->db->order_by('provinsi');
        $this->db->join('tb_language', 'tb_language.id = tb_provinsi.id_language'); 
        $this->db->where('tb_provinsi.id',$id_provinsi);
        $query = $this->db->get();
        $result = $query->result();
        return $result;   
    }
    function bahasa($id_bahasa)
    {
        $this->db->select('*');
        $this->db->order_by('language');
        $this->db->from('tb_language');
        $this->db->where('tb_language.id',$id_bahasa);
        $query = $this->db->get();
        $result = $query->result();
        return $result;   
    }
    function bahasa_where($bahasa)
    {
        $this->db->select('*');
        $this->db->order_by('language');
        $this->db->from('tb_language');
        $this->db->where('tb_language.language',$bahasa);
        $query = $this->db->get();
        $result = $query->result();
        return $result;   
    }
    
}