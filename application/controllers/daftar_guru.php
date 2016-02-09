<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Daftar_guru extends CI_Controller{
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
	public function index()
	{
		$data['judul'] = 'Menampilkan Data dari Database Menggunakan Codeigniter';
		$data['data_guru'] = $this->mod_guru->semua_data_guru();
		$ambil_akun = $this->m_login->ambil_user($this->session->userdata('username'));
		$data['user'] = $ambil_akun;
		$this->load->view('views_add_guru', $data);
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
				redirect("daftar_guru/add");              	  

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
			'status_confirm' => $this->input->post('status_confirm'),
			 );
			$this->db->insert('guru',$data);
			echo"<script> alert('Data Berhasil di Simpan'); </script>";
					redirect("dashboard" , "refresh");
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
		   redirect("daftar_guru/add");              	  
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
			'status_confirm' => $this->input->post('status_confirm'),
 			);
			$this->db->insert('guru',$data);
			echo"<script> alert('Data Berhasil di Simpan'); </script>";
				redirect("dashboard" , "refresh");
 			}
 		}
	}
	function add() 
	{
	    $data['hasil'] = $this->mod_guru->getall();
	    $data = array(
	    'data' => $data['hasil'],
	    'kodeid'    => $this->mod_guru->getKodeguru()
	 	);
        $ambil_akun = $this->m_login->ambil_user($this->session->userdata('username'));
		$data['user'] = $ambil_akun;
        $this->load->view('views_add_guru', $data);
    }


}
