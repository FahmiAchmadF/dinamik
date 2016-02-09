<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_ajax extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }

    function getsoalList($search) {
    	$this->db->select('tb_soal.id, tb_soal_language.soal');
    	$this->db->from('tb_soal');
    	$this->db->join('tb_soal_language', 'tb_soal.id = tb_soal_language.id_soal');
    	$this->db->where('tb_soal.kategori_quiz', $search);
    	$this->db->where('tb_soal_language.id_language', '1');
    	$query = $this->db->get();
    	return $query->result();
    }

}