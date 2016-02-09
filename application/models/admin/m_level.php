<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_level extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->admin = 'tb_admin';
	}

	function ambiluser($idsuer) {
		$q = $this->db->select('*')
					  ->from('tb_user')
					  ->where('id', $idsuer)
					  ->get()
					  ->result();
		return $q;
	}

	function ambiltblevel() {
		$q = $this->db->select('*')
					->from('tb_level')
					->get();
		$q = $q->result();
		return $q;
	}

	function ambilbatasxp($level) {
		$q = $this->db->select('*')
					  ->from('tb_level')
					  ->where('level', $level)
					  ->get()
					  ->result();
		return $q;
	}

	function autolevel() {
		$q = $this->db->select_max('level')
					  ->from('tb_level')
					  ->get();
		$q = $q->result();
		return $q[0]->level;
	}

	function tambah() {
        $data = array(
            'level' => $this->input->post('level'),
            'batasxp' => $this->input->post('batasxp'),
            'julukan' => $this->input->post('julukan')
            );

            $exe = $this->db->insert('tb_level', $data);

        return true;
    }

    function ubahdata($id) {
        $this->db->select('*');
        $this->db->from('tb_level');
        $this->db->where('id', $id);
        $q = $this->db->get();

        return $q = $q->result();
    }

    function ubah($id) {
        $data = array(
            'level' => $this->input->post('level'),
            'batasxp' => $this->input->post('batasxp'),
            'julukan' => $this->input->post('julukan')
            );

            $exe = $this->db->where('id', $id);
            $exe = $this->db->update('tb_level', $data);

        return true;
    }

    function hapus($id) {
        $exe = $this->db->where('id', $id);
        $exe = $this->db->delete('tb_level');
    }


}