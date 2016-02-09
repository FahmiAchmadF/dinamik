<?php
Class C_daftar extends CI_Controller {    
    var $gallery_path;
    var $gallery_path_url;
    public $data = Array();
    
    public function __Construct()
    {
        parent::__construct(); 
        $this->gallery_path = realpath(APPPATH . '../images');
        $this->gallery_path_url = base_url(). 'images/';
        $this->load->model('user/m_daftar');
        $this->load->model('user/mod_index');  
        $this->load->model('m_login');
        $this->load->library('upload');
        $this->load->model('mod_autonumber');
        $this->lang->load('home','indonesia');
        $session = $this->session->userdata('isLoginUser');
        if($session==True)
        {
            $ambil_akun = $this->m_login->ambil_member($this->session->userdata('username_user'));    
        }
        else
        {
            $username='';
            $ambil_akun = $this->m_login->ambil_member($username);
        }
        $this->seson = $ambil_akun;
        $this->home = $this->lang->line('text_home');
        $this->about = $this->lang->line('text_about');
        $this->profil = $this->lang->line('text_profil');
        $this->login= $this->lang->line('text_login');
        $this->signup = $this->lang->line('text_signup');
        $this->tampil_kategori = $this->mod_index->tampil_kategori_forum();
        // $this->cek();
    }

    private function cek()
    {
        $stat = $this->session->userdata('sts');
        if($stat=='guru'){ //admin
            echo "<script>alert('Anda tidak berhak mengakses halaman ini!');</script>";
            redirect('dashboard','refresh');
        }elseif ($stat=="") {
            echo "<script>alert('Anda belum login!');</script>";
            redirect('login','refresh');
        }
    }
    function index() {

        $data = array(
        // 'autonumbersiswa'    => $this->mod_autonumber->autonumber("id_user","tb_user",4,"IDU"),
        'user'=>$this->seson,
        'tampil_kategori_forum' =>$this->tampil_kategori
        );
         $this->load->view('user/v_daftar_user', $data);
    }


     
    function submit() {
        if($this->input->post('submit')){
            $username  = $this->input->post('username');
            $password = $this->input->post('password');
            // var_dump($password);
            // exit();
            $hak = 'user';
            $jumlah['cekusername'] = $this->m_daftar->cek_n($username);
            $jumlah['cekusername2'] = count($jumlah['cekusername']);
            // $nama_depan = $this->input->post('nama');
            // $nama_belakang = $this->input->post('nama_belakang');
            // $nama_panggilan = $this->input->post('nama_panggilan');
            // $jk  = $this->input->post('jk');
            // $tempat_lahir = $this->input->post('tempat_lahir');
            // $tanggal_lahir  = $this->input->post('tanggal_lahir');
            // $agama = $this->input->post('agama');
            // $alamat  = $this->input->post('alamat');
            $email  = $this->input->post('email');
            $tanggal_daftar = date('Y-m-d');
            // $no_hp = $this->input->post('no_hp');
            // $tanggal_daftar = $this->input->post('tanggal_daftar');
            $status ='0';

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
            if ($jumlah['cekusername2']>=1){
                echo" <script>
                        alert('Username terdaftar, harap cek kembali');
                    </script>";    
                    redirect("user/c_daftar" ,"refresh");
            }
            else
            {
                $data = array (
                'username'  => $username,
                'password' =>$password,
                'hak'       =>$hak,
                // 'nama_depan'=> $nama_depan,
                // 'nama_belakang'=> $nama_belakang,
                // 'nama_panggilan'=> $nama_panggilan,
                // 'jk'=> $jk,
                // 'agama'=> $agama,
                // 'tempat_lahir'=> $tempat_lahir,
                // 'tanggal_lahir'=> $tanggal_lahir,
                // 'alamat'=> $alamat,
                'email' =>$email,
                // 'no_hp'=> $no_hp,
                // 'photo' => $this->upload->file_name,
                'tanggal_daftar' =>$tanggal_daftar,
                'status'    =>$status,
                    );
                $this->db->insert('tb_user',$data);
                echo"<script> alert('Anda sudah terdaftar, Silahkan Login'); </script>";
                        redirect("user/index" ,"refresh");
            }
        }
        else
        {
            if ($jumlah['cekusername2']>=1){
                echo" <script>
                    alert('Username sudah terdaftar, harap cek kembali');
                  </script>";    
            }
            else
            {
            $data = array (
            'username'  => $username,
            'password' =>$password,
            'nama_depan'=> $nama_depan,
            // 'nama_belakang'=> $nama_belakang,
            // 'nama_panggilan'=> $nama_panggilan,
            // 'jk'=> $jk,
            // 'agama'=> $agama,
            // 'tempat_lahir'=> $tempat_lahir,
            // 'tanggal_lahir'=> $tanggal_lahir,
            // 'alamat'=> $alamat,
            'email' =>$email,
            // 'no_hp'=> $no_hp,
            // 'photo' => $this->upload->file_name,
            'tanggal_daftar'    =>$tanggal_daftar,
            'status'    =>$status,
                    );
            $this->upload->do_upload();
            $this->db->insert('tb_user',$data);
            echo"<script> alert('Anda sudah terdaftar, Silahkan Login'); </script>";
                    redirect("user/index" , "refresh");
        }
    }
}
}

        
       
          
                
        }
    

?>
