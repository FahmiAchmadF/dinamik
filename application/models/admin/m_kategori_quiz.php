<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_kategori_quiz extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }

    function listkategori_quiz() {
        $this->db->select('*');
        $this->db->from('tb_kategori_quiz');
        $q = $this->db->get();
        
        return $q = $q->result();
    }

    function tambah() {
        $data = array(
            'kategori_quiz' => $this->input->post('kategori_quiz')
            );

            $exe = $this->db->insert('tb_kategori_quiz', $data);

        return true;
    }

    function ubahdata($id) {
        $this->db->select('*');
        $this->db->from('tb_kategori_quiz');
        $this->db->where('id', $id);
        $q = $this->db->get();

        return $q = $q->result();
    }

    function ubah($id) {
        $data = array(
            'kategori_quiz' => $this->input->post('kategori_quiz')
            );

            $exe = $this->db->where('id', $id);
            $exe = $this->db->update('tb_kategori_quiz', $data);

        return true;
    }

    function hapus($id) {
        $exe = $this->db->where('id', $id);
        $exe = $this->db->delete('tb_kategori_quiz');
    }

}