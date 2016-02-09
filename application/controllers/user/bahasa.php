<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Bahasa extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_login'); //memasukkan file model m_login.php ke dalam controller
    }
    
    
    function simpan_session()
    {
        // $bahasa = $this->uri->segment(4);
        $bahasa=$_GET['bahasa'];
        $link=$_GET['link'];

            $this->session->set_userdata(array(
                'bahasa'   => TRUE, //set data telah login
                'language'  => $bahasa, //set session username
            ));               

            redirect('user/'.$link.' ','refresh');

    }
}