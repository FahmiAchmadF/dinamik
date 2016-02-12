<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_login'); //memasukkan file model m_login.php ke dalam controller
    }
    
    function index()
    {
        $session = $this->session->userdata('isLoginUser'); //mengabil dari session apakah sudah login atau belum
        if($session == FALSE) //jika session false maka akan menampilkan halaman login
        {
            $this->load->view('user/user_login');
        }else 
        {
            $this->load->view('user/index');
        }
    }
    
    function do_login()
    {
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $status_user='0';
        $cek = $this->m_login->cek_user($username,$password,$status_user); //melakukan persamaan data dengan database
        // var_dump($cek);
        // exit();
        if(count($cek) == 1){ //cek data berdasarkan username & pass
            foreach ($cek as $cek) {
                $status = $cek['hak']; //mengambil data(level/hak akses) dari database
            }
            $this->session->set_userdata(array(
                'isLoginUser'   => TRUE, //set data telah login
                'username_user'  => $username, //set session username
                'sts_user'      => $status, //set session hak akses
            ));               
            redirect('user/index','refresh');  //redirect ke halaman dashboard
        }else{ //jika data tidak ada yng sama dengan database
            echo" <script>
                    alert('Cek username dan password dengan benar');
                  </script>";    
            redirect('user/index#popup1','refresh');
        }    
    }
}