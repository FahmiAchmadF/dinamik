<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Con_guru extends CI_Controller{
	var $gallery_path;
	var $gallery_path_url;
	var $urls;
	public $data = Array();

	public function __Construct()
	{
			parent::__construct();
			$this->gallery_path = realpath(APPPATH. '../images');
			$this->gallery_path_url = base_url(). 'images/';
			$urls=$this->gallery_path_url = base_url(). 'images/';
			//Model Loader
			$this->load->model('mod_guru');
			$this->load->model('m_login');
			// $this->cek();
			//Library Loader
			$this->load->library('session');
	}
	private function cek()
	{
		$stat = $this->session->userdata('sts');
    	if($stat=='guru')
    	{ //admin
    		echo "<script>alert('Anda tidak berhak mengakses halaman ini!');</script>";
    		redirect('dashboard','refresh');
    	}
    	elseif ($stat=="") 
    	{
    		echo "<script>alert('Anda belum login!');</script>";
    		redirect('login','refresh');
    	}
	}

	public function index()
	{
		$this->cek();
		$data['judul'] = 'Menampilkan Data dari Database Menggunakan Codeigniter';
		$data_guru = $this->mod_guru->semua_data_guru();
		$ambil_akun = $this->m_login->ambil_user($this->session->userdata('username'));
		$status_confirm = '0';
        $confirm_guru = $this->m_login->confirm_guru($status_confirm);
        $jumlah_status_confirm = count($this->m_login->confirm_guru($status_confirm));
        if(empty($confirm_guru))
        {
        	$c_id_guru = '';
       		$c_nip	= '';
       		$c_nama_guru = '';
       		$c_photo = '';
        	$confirm = '0';
        }
        else
        {
        	foreach ($confirm_guru as $data) {
        		$c_id_guru = $data['id_guru'];
        		$c_nip	= $data['nip'];
        		$c_nama_guru = $data['nama_guru'];
        		$c_photo = $data['photo'];
            	$confirm = $data['status_confirm'];
        	}
        }

        $pesan_confirm='ingin mendaftarkan sebagai guru.';
        $total_confirm = count($confirm);
		$data = array(
			'data_guru'	=> $data_guru,
		'pesan_confirm' =>$pesan_confirm,
				'nip'	=>$c_nip,
				'confirm'	=>$confirm_guru,
				'nama_guru'=>$c_nama_guru,
				'photo'	=> $c_photo,
				'total_confirm'=>$jumlah_status_confirm,
				'user'	=>$ambil_akun
				);
		$this->load->view('admin/views_guru', $data);
	}
	public function do_upload()
	{
		$config = array(
		'allowed_types' => 'jpg|jpeg|gif|png',
		'upload_path' =>$this->gallery_path,
		'max_size' => 2000,
		'file_name' => url_title($this->input->post('userfile')),
		);
		$this->load->library('upload',$config);
		$this->upload->initialize($config); //meng set config yang sudah di atur
		 if( !$this->upload->do_upload('userfile'))
 		{
 			$nips = $this->input->post('nip');   
 	        $jumlah['ceknip'] = $this->mod_guru->cek_n($nips);
        	$jumlah['cekn'] = count($jumlah['ceknip']);
         if ($jumlah['cekn']>=1)
         {
               echo" <script>
            			   alert('Nip sudah terdaftar, harap cek kembali');
       		          </script>";   
				redirect("admin/con_guru/add");              	  

         }
        else
        {
			$data = array(
			'id_guru'=>$this->input->post('id_guru'),
			'nip' => $nips,
			'username' =>$this->input->post('username'),
			'password' => $this->input->post('password'),
			'status' => $this->input->post('status'),
			'nama_guru' => $this->input->post('nama_guru'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'agama' => $this->input->post('agama'),
			'status_pegawai' => $this->input->post('status_pegawai'),
			'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
			'jurusan' => $this->input->post('jurusan'),
			'lulusan_akademik' => $this->input->post('lulusan_akademik'),
			'no_telepon' => $this->input->post('no_telepon'),
			'alamat' => $this->input->post('alamat_lengkap'),
			'photo' => $this->upload->file_name,
			 );
			$this->db->insert('guru',$data);
			echo"<script> alert('Data Berhasil di Simpan'); </script>";
					redirect("admin/con_guru/add" , "refresh");
 		}
		}
 	else
 	{
 		$nips = $this->input->post('nip');   
 	    $jumlah['ceknip'] = $this->mod_guru->cek_n($nips);
        $jumlah['cekn'] = count($jumlah['ceknip']);
        if ($jumlah['cekn']>=1)
        {
 	       echo" <script>
           		     alert('Nip sudah terdaftar, harap cek kembali');
                  </script>";   
		   redirect("admin/con_guru/add");              	  
        }
        else
        {
 			$data = array(
 			'id_guru'=>$this->input->post('id_guru'),
			'nip' => $nips,
			'username' =>$this->input->post('username'),
			'password' => $this->input->post('password'),
			'status' => $this->input->post('status'),
			'nama_guru' => $this->input->post('nama_guru'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'agama' => $this->input->post('agama'),
			'status_pegawai' => $this->input->post('status_pegawai'),
			'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
			'jurusan' => $this->input->post('jurusan'),
			'lulusan_akademik' => $this->input->post('lulusan_akademik'),
			'no_telepon' => $this->input->post('no_telepon'),
			'alamat' => $this->input->post('alamat_lengkap'),
			'photo' => $this->upload->file_name,
 			);
			$this->db->insert('guru',$data);
			echo"<script> alert('Data Berhasil di Simpan'); </script>";
					redirect("admin/con_guru/add" , "refresh");
 		}
 		}
	}

	function toExcelAll() 
	{
		$query['sonice'] = $this->mod_guru->ToExcelAll(); 
		$this->load->view('excel/excel_guru',$query);
	}

	function add() 
	{
		$this->cek();
	    $data['hasil'] = $this->mod_guru->getall();
	    $data = array(
	    'data' => $data['hasil'],
	    'kodeid'    => $this->mod_guru->getKodeguru()
	 	);
        $ambil_akun = $this->m_login->ambil_user($this->session->userdata('username'));
		$data['user'] = $ambil_akun;
        $this->load->view('admin/views_add_guru', $data);
    }

	function update() 
	{
		$config = array(
		'allowed_types' => 'jpg|jpeg|gif|png',
		'upload_path' =>$this->gallery_path,
		'max_size' => 2000,
		'file_name' => url_title($this->input->post('userfile')),
		);
		$this->load->library('upload',$config);
		$this->upload->initialize($config); //meng set config yang sudah di atur
		 if( !$this->upload->do_upload('userfile'))
 		{
 			$id_guru= $this->input->post('did_guru');
 			$data = array(
			'nip' => $this->input->post('dnip'),
			'username' => $this->input->post('dusername'),
			'password' => $this->input->post('dpassword'),
			'status' => $this->input->post('dstatus'),
			'nama_guru' => $this->input->post('dnama_guru'),
			'jenis_kelamin' => $this->input->post('djenis_kelamin'),
			'tempat_lahir' => $this->input->post('dtempat_lahir'),
			'tanggal_lahir' => $this->input->post('dtanggal_lahir'),
			'agama' => $this->input->post('dagama'),
			'status_pegawai' => $this->input->post('dstatus_pegawai'),
			'pendidikan_terakhir' => $this->input->post('dpendidikan_terakhir'),
			'jurusan' => $this->input->post('djurusan'),
			'lulusan_akademik' => $this->input->post('dlulusan_akademik'),
			'no_telepon' => $this->input->post('dno_telepon'),
			'alamat' => $this->input->post('dalamat_lengkap'),				
			 );
			$this->mod_guru->update($id_guru,$data);
			$this->show_id();
			redirect('admin/con_guru');
		}
	 else
	 {
		$id_guru= $this->input->post('did_guru');
 	  	$map = $_SERVER['DOCUMENT_ROOT'];
        $path = $map . '/pengolahannilai/images/';
        $nama_photo = $this->input->post('gambar_dlt');
		$image = $path.$nama_photo;
                //hapus image
        unlink($image);
		$data = array(
		'nip' => $this->input->post('dnip'),
		'username' => $this->input->post('dusername'),
		'password' => $this->input->post('dpassword'),
		'status' => $this->input->post('dstatus'),
		'nama_guru' => $this->input->post('dnama_guru'),
		'jenis_kelamin' => $this->input->post('djenis_kelamin'),
		'tempat_lahir' => $this->input->post('dtempat_lahir'),
		'tanggal_lahir' => $this->input->post('dtanggal_lahir'),
		'agama' => $this->input->post('dagama'),
		'status_pegawai' => $this->input->post('dstatus_pegawai'),
		'pendidikan_terakhir' => $this->input->post('dpendidikan_terakhir'),
		'jurusan' => $this->input->post('djurusan'),
		'lulusan_akademik' => $this->input->post('dlulusan_akademik'),
		'no_telepon' => $this->input->post('dno_telepon'),
		'alamat' => $this->input->post('dalamat_lengkap'),
		'photo' => $this->upload->file_name,
 		);	
		$this->mod_guru->update($id_guru,$data);
		$this->show_id();
		redirect('admin/con_guru');
	}

 	}

 	function ganti_password() 
 	{
		$id_guru= $this->input->post('id_password_baru');
		$data = array(
		'password' => $this->input->post('password_baru'),
 		);
		$this->mod_guru->update($id_guru,$data);
	}

	 public function hapus($param = "")
	 {
        if($param != "")
        {
                //cek nama image dari database
            $this->db->select('*');
			$this->db->where(array('id_guru'=>$param));
			$data =  $this->db->get('guru');
            $result =  $data->first_row('array');
            $nama_photo = $result['photo'];  
                //hapus image dari server
                    // lokasi folder image
            $map = $_SERVER['DOCUMENT_ROOT'];
            $path = $map . '/pengolahannilai/images/';  
                //lokasi gambar secara spesifik
            $image = $path.$nama_photo;
                //hapus image
            unlink($image);
                        //script untuk delete data di database
            $this->db->delete('guru', array('id_guru'=>$param));
            $id_guru = $this->uri->segment(3);
            $this->mod_guru->hapus1($id_guru);
			echo"<script> alert('Data Berhasil di Hapus'); </script>";
                redirect('admin/con_guru','refresh');
        }
        else
        {
            redirect('/');
        }
     }
   




	function show_id() 
	{
		$this->cek();
		$status_confirm = '0';
        $confirm_guru = $this->m_login->confirm_guru($status_confirm);
        $jumlah_status_confirm = count($this->m_login->confirm_guru($status_confirm));
        if(empty($confirm_guru))
        {
        	$c_id_guru = '';
       		$c_nip	= '';
       		$c_nama_guru = '';
       		$c_photo = '';
        	$confirm = '0';
        }
        else
        {
        	foreach ($confirm_guru as $data) {
        		$c_id_guru = $data['id_guru'];
        		$c_nip	= $data['nip'];
        		$c_nama_guru = $data['nama_guru'];
        		$c_photo = $data['photo'];
            	$confirm = $data['status_confirm'];
        	}
        }

        $pesan_confirm='ingin mendaftarkan sebagai guru.';
        $total_confirm = count($confirm);

		$nip = $this->uri->segment(4);
		$single_guru = $this->mod_guru->show_id($nip);
		$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama_guru'));
		$data = array(
				'pesan_confirm' =>$pesan_confirm,
				'nip'	=>$c_nip,
				'confirm'	=>$confirm_guru,
				'nama_guru'=>$c_nama_guru,
				'photo'	=> $c_photo,
				'single_guru'	=>$single_guru,
				'total_confirm'=>$jumlah_status_confirm,
				'user'	=>$ambil_akun
				);
		$this->load->view('admin/views_update_guru', $data);
	}

	function delete_id() 
	{
		$id_guru = $this->uri->segment(4);
		$this->mod_guru->delete_id($id_guru);
		redirect('admin/con_guru');
	}

	function show_id_guru()
 	{
 		$this->cek();
		$id_guru = $this->uri->segment(4);
		$status_confirm = '0';
        $confirm_guru = $this->m_login->confirm_guru($status_confirm);
        $jumlah_status_confirm = count($this->m_login->confirm_guru($status_confirm));
        if(empty($confirm_guru))
        {
        	$c_id_guru = '';
       		$c_nip	= '';
       		$c_nama_guru = '';
       		$c_photo = '';
        	$confirm = '0';
        }
        else
        {
        	foreach ($confirm_guru as $data) {
        		$c_id_guru = $data['id_guru'];
        		$c_nip	= $data['nip'];
        		$c_nama_guru = $data['nama_guru'];
        		$c_photo = $data['photo'];
            	$confirm = $data['status_confirm'];
        	}
        }

        $pesan_confirm='ingin mendaftarkan sebagai guru.';
        $total_confirm = count($confirm);
		$data_guru = $this->mod_guru->show_id_gr($id_guru);
		// Ignore Down here
		$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama_guru'));
		$data = array(
				'data_guru'	=> $data_guru,
				'pesan_confirm' =>$pesan_confirm,
				'nip'	=>$c_nip,
				'confirm'	=>$confirm_guru,
				'nama_guru'=>$c_nama_guru,
				'photo'	=> $c_photo,
				'total_confirm'=>$jumlah_status_confirm,
				'user'	=>$ambil_akun
				);
// Ignore Up here
		$this->load->view('admin/views_data_guru', $data);
	}
// Views loader
	function load_import_guru()
	{
		$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama_guru'));
		$data['user'] = $ambil_akun;
		$this->load->view('excel/excel_guru', $data);
	}
// Download File

	function get_excel_guru()
	{
		$this->load->helper('download');
		$name = 'Excel Guru.xls';
		$data = file_get_contents('excel/excelGuru.xls'); // letak file pada aplikasi kita
		force_download($name, $data);
	}
// Import Excel Function for Guru
	public function import_excel_guru()
	{
		$config['upload_path'] = './temp_upload/';
		$config['allowed_types'] = 'xls';
		$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload())
			{
				$data = array('error' => $this->upload->display_errors());
			}
			else
			{
				$data = array('error' => false);
				$upload_data = $this->upload->data();
				$this->load->library('excel_reader');
				$this->excel_reader->setOutputEncoding('230787');
				$file = $upload_data['full_path'];
				$this->excel_reader->read($file);
				error_reporting(E_ALL ^ E_NOTICE);
				$data = $this->excel_reader->sheets[0];
				$data_excel = Array();
				for ($i = 3; $i <= $data['numRows']; $i++){
					$data_excel[$i-3]['nip'] = $data['cells'][$i][1];
					$data_excel[$i-3]['username'] = $data['cells'][$i][2];
                	$data_excel[$i-3]['password'] = $data['cells'][$i][3];
                	$data_excel[$i-3]['status'] = $data['cells'][$i][4];
                	$data_excel[$i-3]['nama_guru'] = $data['cells'][$i][5];
                	$data_excel[$i-3]['jenis_kelamin'] = $data['cells'][$i][6];
                	$data_excel[$i-3]['tempat_lahir'] = $data['cells'][$i][7];
                	$data_excel[$i-3]['tanggal_lahir'] = $data['cells'][$i][8];
                	$data_excel[$i-3]['agama'] = $data['cells'][$i][9];
                	$data_excel[$i-3]['status_pegawai'] = $data['cells'][$i][10];
                	$data_excel[$i-3]['pendidikan_terakhir'] = $data['cells'][$i][11];
                	$data_excel[$i-3]['jurusan'] = $data['cells'][$i][12];
                	$data_excel[$i-3]['lulusan_akademik'] = $data['cells'][$i][13];
                	$data_excel[$i-3]['no_telepon'] = $data['cells'][$i][14];
                	$data_excel[$i-3]['alamat'] = $data['cells'][$i][15];
				}
				delete_files($upload_data['file_path']);
				$this->load->model('mod_guru');
				$this->mod_guru->import_tambah_guru($data_excel);
			}
			header('location:'.base_url().'admin');
		}

		// Profile Function
		public function edit_profile()
		{
			$username = $this->m_login->ambil_user($this->session->userdata('username'));
			$id_guru = $username['id_guru'];
			$status_confirm = '0';
        	$confirm_guru = $this->m_login->confirm_guru($status_confirm);
        	$jumlah_status_confirm = count($this->m_login->confirm_guru($status_confirm));
        if(empty($confirm_guru))
        {
        	$c_id_guru = '';
       		$c_nip	= '';
       		$c_nama_guru = '';
       		$c_photo = '';
        	$confirm = '0';
        }
        else
        {
        	foreach ($confirm_guru as $data) {
        		$c_id_guru = $data['id_guru'];
        		$c_nip	= $data['nip'];
        		$c_nama_guru = $data['nama_guru'];
        		$c_photo = $data['photo'];
            	$confirm = $data['status_confirm'];
        	}
        }

        $pesan_confirm='ingin mendaftarkan sebagai guru.';
        $total_confirm = count($confirm);
            // foreach ($data as $data) 
            // {
            // 	$id_guru = $data['id_guru'];
            // 	$nip = $data['nip'];
            // 	$nama = $data['nama_guru'];
            // 	$photo = $data['photo'];
            // }
			$stat = $this->session->userdata('sts');
    		if($stat=='guru')
    		{ //admin
    			$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama_guru'));
				$user = $this->session->userdata('username');
				$datal['profile_data'] = $this->mod_guru->get_profile_data($user);
			// var_dump($data['profile_data']);
			// exit();
				$data = array(
				'photo' => $photo,
				'nama_guru' => $nama,
				'profile_data'=>$datal['profile_data'],
				);
				$this->load->view('guru/views_profil_guru2',$data);
			}
	    	else
	    	{

    			$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama_guru'));
				$user = $this->session->userdata('username');
				$profile_data = $this->mod_guru->get_profile_data($user);
					$data = array(
				'id_guru'	=>$id_guru,
                'pesan_confirm' =>$pesan_confirm,
				'nip'	=>$c_nip,
				'profile_data'	=>$profile_data,
				'confirm'	=>$confirm_guru,
				'nama_guru'=>$c_nama_guru,
				'photo'	=> $c_photo,
				'total_confirm'=>$jumlah_status_confirm,
            	'user'=>$ambil_akun,
            );
				$this->load->view('admin/views_profile_guru', $data);
    		}		
		}
}
