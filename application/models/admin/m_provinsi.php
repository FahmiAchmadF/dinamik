<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_provinsi extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }

    function listprovinsi() {
        $this->db->select('*');
        $this->db->from('tb_provinsi');
        $this->db->join('tb_language', 'tb_language.id = tb_provinsi.id_language');
        $q = $this->db->get();
        return $q = $q->result();
    }

    function ambilbahasa() {
        $q = $this->db->select('*')
                      ->from('tb_language')
                      ->get()
                      ->result();
        return $q;
    }

    function tambah() {
        $data = array(
            'provinsi' => $this->input->post('provinsi'),
            'id_language' => $this->input->post('bahasa')
            );

            $exe = $this->db->insert('tb_provinsi', $data);

        return true;
    }

    function ubahdata($id) {
        $this->db->select('*');
        $this->db->from('tb_provinsi');
        $this->db->where('id', $id);
        $q = $this->db->get();

        return $q = $q->result();
    }

    function ubah($id) {
        $data = array(
            'provinsi' => $this->input->post('provinsi'),
            'id_language' => $this->input->post('bahasa')
            );

            $exe = $this->db->where('id', $id);
            $exe = $this->db->update('tb_provinsi', $data);

        return true;
    }

    function hapus($id) {
        $exe = $this->db->where('id', $id);
        $exe = $this->db->delete('tb_provinsi');
    }

}