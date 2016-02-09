<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_bahasa extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }

    function ambiltbbahasa() {
    	$q = $this->db->select('*')
    				  ->from('tb_language')
    				  ->get()
    				  ->result();
    	return $q;
    }

    function tambah() {
        $data = array(
            'language' => $this->input->post('bahasa')
            );

            $exe = $this->db->insert('tb_language', $data);

        return true;
    }

    function ubahdata($id) {
        $this->db->select('*');
        $this->db->from('tb_language');
        $this->db->where('id', $id);
        $q = $this->db->get();

        return $q = $q->result();
    }

    function ubah($id) {
        $data = array(
            'language' => $this->input->post('bahasa')
            );

            $exe = $this->db->where('id', $id);
            $exe = $this->db->update('tb_language', $data);

        return true;
    }

    function hapus($id) {
        $exe = $this->db->where('id', $id);
        $exe = $this->db->delete('tb_language');
    }

}