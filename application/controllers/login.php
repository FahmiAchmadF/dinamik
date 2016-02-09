<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_login'); //memasukkan file model m_login.php ke dalam controller
    }
    function index()
    {
        $session = $this->session->userdata('isLogin'); //mengabil dari session apakah sudah login atau belum
        if($session == FALSE) //jika session false maka akan menampilkan halaman login
        {
            $this->load->view('login_form');
        }else //jika session true maka di redirect ke halaman dashboard
        {
            redirect('dashboard/index_admin');
        }
    }
    function do_login()
    {
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $status='1';
        $cek = $this->m_login->cek_admin($username,$password); //melakukan persamaan data dengan database
        // var_dump($cek);
        // exit();
        if(count($cek) == 1){ //cek data berdasarkan username & pass
            foreach ($cek as $cek) {
                $hak = $cek['hak']; //mengambil data(level/hak akses) dari database
            }
            $this->session->set_userdata(array(
                'isLogin'   => TRUE, //set data telah login
                'username'  => $username, //set session username
                'sts_admin'      => $hak, //set session hak akses
            ));               
            redirect('dashboard/index_admin','refresh');  //redirect ke halaman dashboard
        }
        else{ //jika data tidak ada yng sama dengan database
            echo" <script>
                    alert('Cek username dan password dengan benar');
                  </script>";    
            redirect('login','refresh');
        }
        
    }
}