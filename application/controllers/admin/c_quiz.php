<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_quiz extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('m_login');
        $this->load->model('admin/m_artikel');
        $this->load->model('mod_autonumber');
        $this->load->library('session');
        $this->link = '/kebudayaan_admin/admin';
        $session = $this->session->userdata('isLogin');
        if($session==True)
        {
            $ambil_akun = $this->m_login->ambil_admin($this->session->userdata('username'));    
            $stat = $this->session->userdata('sts_admin');        
        }
        else
        {
            $username='';
            $ambil_akun = $this->m_login->ambil_admin($username);
            $stat = '';        
        }
        $this->seson = $ambil_akun;
        $this->cek_stat = $stat;
        $this->cek();
	}


	private function cek()
    {

        if ($this->cek_stat=="") 
        {
            echo "<script>alert('Anda belum login!');</script>";
            redirect('login','refresh');
        }
    }


    public function search_ajax() {
        $idkategori = $this->uri->segment(4);
		$fahmi = array();
		$this->db->select('*');
			$this->db->from('tb_soal');
				$this->db->join('tb_soal_language', 'tb_soal_language.id_soal = tb_soal.id');
					$this->db->where('tb_soal.id_kategori', $idkategori);
		
		$q = $this->db->get();
		$q = $q->result()[0];
				
				foreach ($q as $mi) {
					$fahmi = array(
							array(
							'id' => $q->id,
							'soal' => 	$q->soal,
							),
						);
				}
			
		echo json_encode($fahmi);
    }

	//halaman tambah soal
	public function tambahsoal() {
		$ambil_akun = $this->m_login->ambil_member($this->session->userdata('username'));
		$this->load->model('Admin/m_quiz');
		$listkategori = array(
			'kategori' => $this->m_quiz->listkategori(),
			'user'  => $this->seson,
			'lang' => $this->m_quiz->language(),
			'jumlah_lang' => $this->m_quiz->jumlahbahasa(),
			
		);
		//var_dump($listkategori['kategori']);
		$this->load->view('Admin/tambahsoal', $listkategori);
	}


	public function ubahsoal() {
		$id = $this->uri->segment(4);
		$ambil_akun = $this->m_login->ambil_member($this->session->userdata('username'));
		$this->load->model('Admin/m_quiz');
		$data = array(
			'kategori' => $this->m_quiz->listkategori(),
			'user'  => $this->seson,
			'id' => $id,
			'lang' => $this->m_quiz->language(),
			'jumlah_lang' => $this->m_quiz->jumlahbahasa(),
			'isiantbsoal' => $this->m_quiz->ambiltbsoal($id),
			'isiantbsoallang' => $this->m_quiz->ambiltbsoallang($id),
			'isiantbsoaljaw' => $this->m_quiz->ambiltbsoaljaw($id)
		);
		
		
		$this->load->view('Admin/v_ubahsoal', $data);
	}

	public function ubahsoalpost() {
		$id = $this->uri->segment(4);
		$ambil_akun = $this->m_login->ambil_member($this->session->userdata('username'));
		$this->load->model('Admin/m_quiz');
		$this->m_quiz->ubahsoalpost($id);

		redirect('admin/c_quiz/daftarsoal');
	}

	public function hapussoal() {
		$id = $this->uri->segment(4);
		$ambil_akun = $this->m_login->ambil_member($this->session->userdata('username'));
		$this->load->model('Admin/m_quiz');
		$this->m_quiz->hapussoal($id);

		redirect('admin/c_quiz/daftarsoal');
	}


	//halaman tambah kategori
	public function tambahkategori() {
		$data = array(
			'user' => $this->seson
			);
		$this->load->view('Admin/tambahkategori', $data);
	}


	//fungsi untuk menambahkan kategori
	public function tambahkategoripost() {
		$this->load->model('Admin/m_quiz');
		$this->m_quiz->simpankategori();

		redirect('admin/c_quiz/tambahkategori');
	}

	//fungsi melihat semua soal
	public function daftarsoal() {
		$ambil_akun = $this->m_login->ambil_member($this->session->userdata('username'));
		$this->load->model('Admin/m_quiz');

        $jumlah= $this->m_quiz->jumlah('tb_soal');
 		


        $config['base_url'] = base_url().'admin/c_quiz/daftarsoal/';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 10;
		$config['attributes'] = array('class' => 'btn btn-default');
        $config['full_tag_open'] = '<div class="btn-group">';
        $config['full_tag_close'] = '</div>';
        $config['cur_tag_open'] = '<button type="button" class="btn btn-danger">';
        $config['cur_tag_close'] = '</button>';
        $config['first_link'] = 'Awal';
        $config['last_link'] = 'Akhir'; 

		$dari = $this->uri->segment(4);
		$data = array(
			'kategori' => $this->m_quiz->lihatdaftarsoal($config['per_page'],$dari),
			'user' => $this->seson
			);
		$this->pagination->initialize($config); 

		// $kategorinya['data'] = $this->m_quiz->kategorinya(); 

        $this->load->view('Admin/daftarsoal', $data, $config);
	}


	public function daftarquiz() {
		$this->load->model('Admin/m_quiz');

        $jumlah= $this->m_quiz->jumlah('tb_quiz'); 		
 
		$dari = $this->uri->segment(4);
		$data = array(
			'kategori' => $this->m_quiz->lihatdaftarquiz(),
			'user' => $this->seson
			);
		

        $this->load->view('Admin/daftarquiz', $data);
	}



	//fungsi melihat semua kategori
	public function daftarkategori() {
		$this->load->model('Admin/m_quiz');

        $jumlah= $this->m_quiz->jumlah('tb_kategori_quiz');
 
		$config['base_url'] = base_url().'admin/c_quiz/daftarsoal/';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 10;
		$config['attributes'] = array('class' => 'btn btn-default');
        $config['full_tag_open'] = '<div class="btn-group">';
        $config['full_tag_close'] = '</div>';
        $config['cur_tag_open'] = '<button type="button" class="btn btn-danger">';
        $config['cur_tag_close'] = '</button>';
        $config['first_link'] = 'Awal';
        $config['last_link'] = 'Akhir'; 		
 
		
		$dari = $this->uri->segment(4);
		$data = array(
			'kategori' => $this->m_quiz->lihat($config['per_page'],$dari,'tb_kategori_quiz'),
			'user' => $this->seson
			);
		$this->pagination->initialize($config); 

        $this->load->view('Admin/daftarkategori', $data);
	}



	//fungsi untuk menambahkan soal
	public function tambahsoalpost() {
		$this->load->model('Admin/m_quiz');
		$this->m_quiz->simpansoal();

		redirect('admin/c_quiz/tambahsoal');
	}


	//halaman untuk mengubah kategori quiz
	public function ubahkategori(){
		$id = $this->uri->segment(4);
		$this->load->model('Admin/m_quiz');
		$data = array(
			'user' => $this->seson,
			'mydata' => $this->m_quiz->ubahkategori($id)
			); 
		$this->load->view('Admin/ubahkategori', $data);
	}


	//fungsi untuk mengubah kategori quiz
	public function ubahkategoripost(){
		$id = $this->uri->segment(4);
		$this->load->model('Admin/m_quiz');
		$this->m_quiz->ubahkategoripost($id);
		redirect('admin/c_quiz/daftarkategori');
	}


	//untuk menghapus kategori quiz
	public function hapuskategori(){
		$id = $this->uri->segment(4);
		$this->load->model('Admin/m_quiz');
		$this->m_quiz->hapuskategori($id);
		redirect('admin/c_quiz/daftarkategori');
	}

	public function tambahquiz(){
		$this->load->model('Admin/m_quiz');
		$data = array(
			'user' => $this->seson,
			'kategori' => $this->m_quiz->listkategori()
			);
		$this->load->view('Admin/tambahquiz', $data);
	}


	public function tambahquizpost() {
		$this->load->model('Admin/m_quiz');
		$this->m_quiz->buatquiz();

		redirect('admin/c_quiz/daftarquiz');
	}

	public function ubahquiz() {
		$this->load->model('Admin/m_quiz');
		$id = $this->uri->segment(4);
		$data = array(
			'id' => $id,
			'user' => $this->seson,
			'data' => $this->m_quiz->dataquiz($id),
			'kategori' => $this->m_quiz->listkategori(),
			'soal1' => $this->m_quiz->datasoaluntukquiz('soal1'),
			'soal2' => $this->m_quiz->datasoaluntukquiz('soal2'),
			'soal3' => $this->m_quiz->datasoaluntukquiz('soal3'),
			'soal4' => $this->m_quiz->datasoaluntukquiz('soal4'),
			'soal5' => $this->m_quiz->datasoaluntukquiz('soal5')
			);

		$this->load->view('Admin/v_ubahquiz', $data);
	}

	public function ubahquizpost() {
		$id = $this->uri->segment(4);
		$this->load->model('Admin/m_quiz');
		$this->m_quiz->ubahquiz($id);

		redirect('admin/c_quiz/daftarquiz');
	}

	public function hapusquiz() {
		$id = $this->uri->segment(4);
		$this->load->model('Admin/m_quiz');
		$this->m_quiz->hapusquiz($id);

		redirect('admin/c_quiz/daftarquiz');
	}

	public function pilihquiz() {
		$this->load->model('Admin/m_quiz');

        $jumlah= $this->m_quiz->jumlah('tb_quiz');
 
		$config['base_url'] = base_url().'admin/c_quiz/daftarsoal/';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 10;
		$config['attributes'] = array('class' => 'btn btn-default');
        $config['full_tag_open'] = '<div class="btn-group">';
        $config['full_tag_close'] = '</div>';
        $config['cur_tag_open'] = '<button type="button" class="btn btn-danger">';
        $config['cur_tag_close'] = '</button>';
        $config['first_link'] = 'Awal';
        $config['last_link'] = 'Akhir'; 		
 
		
		$dari = $this->uri->segment(4);
		$data = array(
			'kategori' => $this->m_quiz->lihatdaftarquiz($config['per_page'],$dari),
			'user' => $this->seson
			);
		$this->pagination->initialize($config); 

        $this->load->view('Admin/v_pilihquiz', $data);
	}

	public function jawab(){
		$idquiz = $this->uri->segment(4);
		$this->load->model('Admin/m_quiz');
		$getidsoal = $this->m_quiz->ambilsoaldariquiz($idquiz);
		$data = array(
			'user' => $this->seson,
			'soalsoal' => $this->m_quiz->inibarusoal($getidsoal),
			'idquiznya' => $idquiz
			);
		// var_dump($data['soalsoal']);
		// exit();
		$this->load->view('Admin/v_jawabquiz', $data);
	}

	public function quiz_ajax() {
		$idquiz = $this->uri->segment(4);
		$this->load->model('Admin/m_quiz');
		$getidsoal = $this->m_quiz->ambilsoaldariquiz($idquiz);	
		$soal = $this->m_quiz->inibarusoal($getidsoal);
		
		$i = 1;
		$benar = 0;
		$salah = 0;
		$takterjawab = 0;
		$xp = 0;

		foreach ($soal as $jawabeuy) {
			if($jawabeuy->jawaban == $_POST["jawaban".$i]){
				$benar++;
				$xp=$xp+$jawabeuy->xp;
			}else if($_POST["jawaban".$i] == "Z"){
				$takterjawab++;
			}else{
				$salah++;
			}
		$i++;	
		}

		//rumus matematika untuk lvling
		$cek = $this->m_quiz->cek_disable($iduser, $idquiz);
		if ($cek == 0) {
			$lvl = $this->m_level->ambiluser($iduser);
			$batasxp = $this->m_level->ambilbatasxp($lvl[0]->level);
			$xpnya = $lvl[0]->xp + $xp;

				if($xpnya == $batasxp){
					$lvlnya = $lvl[0]->level + 1;
				}else if($xpnya < $batasxp){
					$xpnya;
				}else if($xpnya > $batasxpnya){
					$lvlnya = $lvl[0]->level + 1;
					$realxp = $xpnya - $batasxp;
				}

			$this->load->model('Admin/m_quiz');
			$this->m_quiz->tb_disable($iduser, $idquiz);
			
			echo "<div id='hasil'>";

			 echo " Jawaban Benar  : <span class='highlight'>". $benar."</span><br>";

			 echo " Jawaban Salah  : <span class='highlight'>". $salah."</span><br>";

			 echo " Tidak Terjawab  : <span class='highlight'>". $takterjawab."</span><br>";

			 echo " XP Yang Diperoleh : ". $xp ." ";

			echo "</div>";

		} else if($cek > 0) {

		echo "<div id='hasil'>";

		 echo " Jawaban Benar  : <span class='highlight'>". $benar."</span><br>";

		 echo " Jawaban Salah  : <span class='highlight'>". $salah."</span><br>";

		 echo " Tidak Terjawab  : <span class='highlight'>". $takterjawab."</span><br>";

		 echo " XP Yang Diperoleh : ". $xp ." ";

		echo "</div>";
		}
		
	}

		
}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */