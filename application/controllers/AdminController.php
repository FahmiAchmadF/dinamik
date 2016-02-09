<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdminController extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library(array('form_validation','pagination'));
	}



	//halaman login admin
	public function index()
	{
		$this->load->view('Admin/index');
	}


	//halaman register admin
	public function register()
	{
		$this->load->view('Admin/register');
	}


	//halaman register admin
	public function postregister()
	{
		$this->load->model('Admin/admin');
		$exe = $this->admin->saveregister();
		if ($exe) {
			redirect('admincontroller/index');
		}

	}


	//fungsi untuk login
	public function dologin() {

		$this->load->model('Admin/Admin');
		$q = $this->Admin->login();

		if (count($q) == 1) { 

			

			//$this->session->all_userdata();
			//echo $this->session->userdata('username');
			redirect('admincontroller/dashboard');		
		} else {
			$this->session->set_flashdata('flashdata', 'Username Atau Password Salah');
			redirect('AdminController/index');
		}
		
	}


	//fungsi untuk logout admin
	public function dologout() {	

		$this->session->sess_destroy();
		$data['logout'] = 'You have been logged out.';		
		$this->load->view('Admin/index', $data);
	
	}


	//halaman dashboard
	public function dashboard() {

		
		$this->load->view('Admin/dashboard');
	}


	//halaman tambah soal
	public function tambahsoal() {
		$this->load->model('Admin/Admin');
		$listkategori = array(
			'kategori' => $this->Admin->listkategori()
		);
		//var_dump($listkategori);
		$this->load->view('Admin/tambahsoal', $listkategori);
	}


	//halaman tambah kategoti
	public function tambahkategori() {
		$this->load->view('Admin/tambahkategori');
	}


	//halaman tambah quiz
	public function tambahquiz() {
		$this->load->view('Admin/tambahquiz');
	}


	//fungsi untuk menambahkan kategori
	public function tambahkategoripost() {
		$this->load->model('Admin/Admin');
		$this->Admin->simpankategori();

		redirect('admincontroller/tambahkategori');
	}

	//fungsi melihat semua soal
	public function daftarsoal() {
		$this->load->model('Admin/Admin');

        $jumlah= $this->Admin->jumlah('soal');
 
		$config['base_url'] = base_url().'admincontroller/daftarsoal/';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 10;
		$config['attributes'] = array('class' => 'btn btn-default');
        $config['full_tag_open'] = '<div class="btn-group">';
        $config['full_tag_close'] = '</div>';
        $config['cur_tag_open'] = '<button type="button" class="btn btn-danger">';
        $config['cur_tag_close'] = '</button>';
        $config['first_link'] = 'Awal';
        $config['last_link'] = 'Akhir'; 		
 
		
		$dari = $this->uri->segment('3');
		$data['kategori'] = $this->Admin->lihat($config['per_page'],$dari,'soal');
		$this->pagination->initialize($config); 

		$kategorinya['data'] = $this->Admin->kategorinya(); 

        $this->load->view('Admin/daftarsoal', $data);
	}



	//fungsi melihat semua kategori
	public function daftarkategori() {
		$this->load->model('Admin/Admin');

        $jumlah= $this->Admin->jumlah('kategori_quiz');
 
		$config['base_url'] = base_url().'admincontroller/daftarsoal/';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 10;
		$config['attributes'] = array('class' => 'btn btn-default');
        $config['full_tag_open'] = '<div class="btn-group">';
        $config['full_tag_close'] = '</div>';
        $config['cur_tag_open'] = '<button type="button" class="btn btn-danger">';
        $config['cur_tag_close'] = '</button>';
        $config['first_link'] = 'Awal';
        $config['last_link'] = 'Akhir'; 		
 
		
		$dari = $this->uri->segment('3');
		$data['kategori'] = $this->Admin->lihat($config['per_page'],$dari,'kategori_quiz');
		$this->pagination->initialize($config); 

        $this->load->view('Admin/daftarkategori', $data);
	}



	//fungsi untuk menambahkan soal
	public function tambahsoalpost() {
		$this->load->model('Admin/Admin');
		$this->Admin->simpansoal();

		redirect('admincontroller/tambahsoal');
	}


	//halaman untuk mengubah kategori quiz
	public function ubahkategori(){
		$id = $this->uri->segment(3);
		$this->load->model('Admin/Admin');
		$data['mydata'] = $this->Admin->ubahkategori($id);
		$this->load->view('Admin/ubahkategori', $data);
	}


	//fungsi untuk mengubah kategori quiz
	public function ubahkategoripost(){
		$id = $this->uri->segment(3);
		$this->load->model('Admin/Admin');
		$this->Admin->ubahkategoripost($id);
		redirect('admincontroller/daftarkategori');
	}


	//untuk menghapus kategori quiz
	public function hapuskategori(){
		$id = $this->uri->segment(3);
		$this->load->model('Admin/Admin');
		$this->Admin->hapuskategori($id);
		redirect('admincontroller/daftarkategori');
	}
}




/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */