<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_topik extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }

    function selecttopik() {
        $q = $this->db->select('*')
                      ->from('')
    }

}