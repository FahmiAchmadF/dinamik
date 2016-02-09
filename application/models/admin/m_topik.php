<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_topik extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }

    function selecttopik() {
        $q = $this->db->select('*')
                      ->from('tb_topik')
                      ->join('tb_topik_language', 'tb_topik.id = tb_topik_language.id_topik')
                      ->join('tb_user', 'tb_topik.id_user = tb_user.id')
                      ->join('tb_kategori_forum', 'tb_topik.id_kategori_forum = tb_kategori_forum.id')
                      ->group_by('tb_topik.id')
                      ->get()
                      ->result();
        return $q;
    }



}