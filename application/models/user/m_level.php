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

	function lvlup($id, $lvl) {
			$data = array(
				'level' => $lvl,
				);

				$this->db->where('id', $id);
				$this->db->update('tb_user', $data);

		return true; 
		}

		function dapetxp($id, $xp) {
			$data = array(
				'xp' => $xp,
				);

				$this->db->where('id', $id);
				$this->db->update('tb_user', $data);

		return true;
		}

		function levelup($id, $level, $xp) {
			$data = array(
				'level' => $level,
				'xp' => $xp,
				);

				$this->db->where('id', $id);
				$this->db->update('tb_user', $data);

		return true;
		}


}