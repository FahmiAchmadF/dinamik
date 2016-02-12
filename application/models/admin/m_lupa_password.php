<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_lupa_password extends CI_Model{
 function __construct()
    {
        parent::__construct();
        $this->tbl = 'tb_admin';
    }

    function data_pertanyaan()
    {
        $this->db->select('*');
        $this->db->from('tb_pertanyaan');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function cari_data($username,$id,$jawaban)
    {
        $query = $this->db->get_where($this->tbl,array('username' => $username, 'id_pertanyaan' => $id, 'jawaban' => $jawaban));
        $query = $query->result_array();
        return $query;
    }
    function ubah()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data = array(
            'password' => $password
            );
        $exe = $this->db->where('username', $username);
        $exe = $this->db->update('tb_admin', $data);
        return true;
    }
}
?>