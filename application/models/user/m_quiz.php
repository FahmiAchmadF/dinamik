<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_quiz extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->admin = 'tb_admin';
	}

public function ambilsoaldariquiz($idquiz) {
			$exe1 = $this->db->select('*')
							 ->from('tb_quiz')
							 ->join('tb_quiz_language', 'tb_quiz.id = tb_quiz_language.id_quiz')
							 ->where('id', $idquiz)
							 ->get()
							 ->result();
				
			return array(
				'soal1' => $idsoal = $exe1['0']->soal1,
				'soal2' => $idsoal = $exe1['0']->soal2,
				'soal3' => $idsoal = $exe1['0']->soal3,
				'soal4' => $idsoal = $exe1['0']->soal4,
				'soal5' => $idsoal = $exe1['0']->soal5
				);
		}


		function inibarusoal($idsoal, $lang) {
			
			for ($uhuy=1; $uhuy <= 5 ; $uhuy++) { 
				
				${"exe$uhuy"} = $this->db->select('*')
										 ->from('tb_soal')
										 ->join('tb_soal_language', 'tb_soal.id = tb_soal_language.id_soal')
										 ->join('tb_jawaban', 'tb_soal.id = tb_jawaban.id_soal')
										 ->where('tb_soal.id', $idsoal["soal".$uhuy])
										 ->where('tb_soal_language.id_language', $lang)
										 ->where('tb_jawaban.id_language', $lang)
										 ->get()
										 ->result();
			}
			
			$arraysoal = array();
			for ($i=1; $i <= 5 ; $i++) { 
				foreach (${"exe$i"} as ${"exe$i"}) {
						$arraysoal[] =  ${"exe$i"};
				}
			}
			
			return $arraysoal;
		}

		function tb_disable($iduser, $idquiz) {
			$data = array(
				'id_user' => $iduser,
				'id_quiz' => $idquiz
				);

				$q = $this->db->insert('tb_disable', $data);
			return true;
		}

		function cek_disable($iduser, $idquiz) {
			$q = $this->db->select('*')
						  ->from('tb_disable')
						  ->where('id_user', $iduser)
						  ->where('id_quiz', $idquiz)
						  ->get()
						  ->result();
			return count($q);
		}

		function ambilidlang($language) {
			$q = $this->db->select('*')
						  ->from('tb_language')
						  ->where('language', $language)
						  ->get()
						  ->result()[0];
			return $q->id;
		}

		function lihatdaftarquiz(){
		$this->db->select('*');
		$this->db->from('tb_quiz');
			$this->db->join('tb_quiz_language', 'tb_quiz.id = tb_quiz_language.id_quiz');
				$this->db->join('tb_kategori_quiz', 'tb_kategori_quiz.id = tb_quiz_language.id_kategori_quiz');
		$query = $this->db->get();
		
		return $query->result();
		}

		function jumlah($namatabel){
			return $this->db->get($namatabel)->num_rows();
		}


		

	}