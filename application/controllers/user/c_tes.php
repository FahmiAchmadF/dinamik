<?php
class C_tes extends Ci_Controller
{
	function __construct()
	{
	  parent::__construct();
      $this->load->model('user/m_tes');
      $this->load->model('user/mod_index');
	  session_start();
            
	}

	function index()
	{
        if (empty($_SESSION['nisn'])) 
        {
        	echo"<script> alert('Login terlebih dahulu');</script>";
            redirect('user/login','refresh');
        }
        else
        {
        	$this->input();
        }
	}
	public function input($act="")
	{
	  $data['guru']= $this->mod_index->data_guru();
		$nisn = $_SESSION['nisn'];
		$ambil_id_siswa= $this->m_tes->ambil_id_siswa($nisn);
		if(empty($ambil_id_siswa))
		{
			$id_siswa = "Tidak Ada";
		}else
		{
			foreach ($ambil_id_siswa as $siswa) 
			{
				$id_siswa = $siswa['id_siswa'];
			}
		}
		//URL
		$url = base_url('user/c_tes/input');
		$query = $this->m_tes->ambil_pertama($id_siswa);

		if(empty($query))
		{
			$nama = "Tidak Ada";
		}else{
			foreach ($query as $siswa) {
				$nama = $siswa['nama'];
			}
		}
		if($act=="" || $act=="pertama"){//step1
			$datana = array(
				'nama' => $nama,
				'data' => $query,
				'url'	=> $url,
				'guru'=>$data['guru'],
				'aksi'	=> 'tambah'
			);
		
		$this->load->view('user/v_tes1',$datana);
		}elseif ($act=="kadua") {//step2
			if(isset($_GET['ajaran'])){$id_semester=$_GET['ajaran'];$id_siswa=$_GET['siswa'];}else{redirect('/c_nilai/input/',"refresh");}
			$kelas = $this->m_tes->ambil_kedua($id_siswa,$id_semester);
			if(empty($kelas)){
				$ajarannya = "Kosong";
			}else{
				foreach ($kelas as $sm) {
					$nama= $sm['nama']; 
					$thn = $sm['tahun_ajaran'];
					$smt = $sm['semester'];
					$ajarannya = $thn." (Semester ".$smt.")";;
				}
			}
			$data = array(
				'nama'	=> $nama,
				'tahun_ajaran' =>	$ajarannya,
				'id_semester' => $id_semester,
				'data' => $kelas,
				'url'	=> $url,
				'aksi'	=> "tambah",
				'guru'=>$data['guru']
				);
			$this->load->view('user/v_tes2',$data);
		}elseif ($act=="katilu") {
			if(isset($_GET['ajaran']) or isset($_GET['ajaran'])){$id_kelas=$_GET['kelas'];$id_semester=$_GET['ajaran'];$id_siswa=$_GET['siswa'];$id_mapel=$_GET['mapel'];}
			else{echo "<script>javascript:history.go(-1)</script>";}
			$tmpil_siswa = $this->m_tes->tmpilsiswa($id_siswa);
			if(empty($tmpil_siswa)){
				$tmpilsiswa = "Kosong";
			}else{	
				foreach ($tmpil_siswa as $sw) {
					$nama = $sw['nama'];
				}
			}	

			$semua = $this->m_tes->ambil_keempat($id_semester,$id_siswa,$id_kelas,$id_mapel);
			if(empty($semua)){
				$ajarannya = "Kosong";
				$pelajaran = "Kosong";
				$ajarannya = "Kosong";
				$kelas = "Kosong";
				$idkelas = "";
			}else{
				foreach ($semua as $semua) {
					$thn = $semua['tahun_ajaran'];
					$semester = $semua['semester'];
					$ajarannya = $thn." (Semester".$semester.")";
					$kelas = $semua['tingkat']." ".$semua['jurusan']." ".$semua['kelas'];
					$idkelas = $semua['id_kelas'];
					$id_semester = $semua['id_semester'];
					$id_kelasbaru = $semua['id_kelasbaru'];	
				}
			}	
			$kelas_mapel = $this->m_tes->ambil_mapel($id_kelasbaru);
			$data_mapel = $this->m_tes->ambil_tes($id_semester,$id_kelas,$id_siswa,$id_mapel);
			if(empty($data_mapel)){
					$id_tes = "Kosong";
					$tes_1 = "";
					$tes_2 = "";
					$tes_3 = "";
					$tes_4 = "";
					$tes_5 = "";
					$tes_6 = "";
					$tes_7 = "";
					$tes_8 = "";
					$tes_9 = "";
					$tes_10 = "";
					$tes_11 = "";
					$tes_12 = "";
			}else{
				foreach ($data_mapel as $tsemua) {
					$tes_1 = $tsemua['tes_1'];
					$tes_2 = $tsemua['tes_2'];
					$tes_3 = $tsemua['tes_3'];
					$tes_4 = $tsemua['tes_4'];
					$tes_5 = $tsemua['tes_5'];
					$tes_6 = $tsemua['tes_6'];
					$tes_7 = $tsemua['tes_7'];
					$tes_8 = $tsemua['tes_8'];
					$tes_9 = $tsemua['tes_9'];
					$tes_10 = $tsemua['tes_10'];
					$tes_11 = $tsemua['tes_11'];
					$tes_12 = $tsemua['tes_12'];
				}
			}
			$data = array(
				'url' => $url,
				'kelas_mapel' =>$kelas_mapel,
				'nama' => $nama,
				'tes1' =>$tes_1,
				'tes2' =>$tes_2,
				'tes3' =>$tes_3,
				'tes4' =>$tes_4,
				'tes5' =>$tes_5,
				'tes6' =>$tes_6,
				'tes7' =>$tes_7,
				'tes8' =>$tes_8,
				'tes9' =>$tes_9,
				'tes10' =>$tes_10,
				'tes11' =>$tes_11,
				'tes12' =>$tes_12,
				'tahun_ajaran' =>	$ajarannya,
				'id_semester' => $id_semester,
				'id_kelas'	=> $idkelas,
				'kelas'	=> $kelas,
				'id_siswa' => $id_siswa,
				'data' => $data_mapel,
				'stt'	=> "tambah",
				'jumlah' => count($data_mapel),
				'tgl' => date('Y-m-d'),
				'guru'=>$data['guru']
				);
			$this->load->view('user/v_tes3',$data);
		}elseif($act == "selesai"){
			$this->load->view('tes/finish',$data);
		}elseif ($act == "simpan") {
			$this->simpan();
		}
	}
}


?>