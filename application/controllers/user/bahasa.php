<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Bahasa extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
        $this->load->model('user/m_map'); 
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

    function session_bahasa_provinsi()
    {
        // $bahasa = $this->uri->segment(4);
        $id_provinsi=$_GET['kode_provinsi'];
        $link=$_GET['link'];
        $data_provinsi = $this->m_map->provinsi($id_provinsi);
        foreach ($data_provinsi as $data)
        {
            $id_bahasa = $data->id_language;
            $provinsi = $data->provinsi;
        }

        $data_bahasa = $this->m_map->bahasa($id_bahasa);
        foreach ($data_bahasa as $data)
        {
            $bahasa = $data->language;
        }
        // var_dump($link);
        // exit();
            $this->session->set_userdata(array(
                'bahasa'   => TRUE, //set data telah login
                'language'  => $bahasa, //set session username
            ));               

            redirect('user/'.$link.'/'.$provinsi.' ','refresh');
    }
    function simpan_session_bahasa_provinsi()
    {
        // $bahasa = $this->uri->segment(4);
        $bahasa=$_GET['bahasa'];
        $link=$_GET['link'];
        $provinsi=$_GET['provinsi'];
        // var_dump($provinsi);
        // exit();
            $this->session->set_userdata(array(
                'bahasa'   => TRUE, //set data telah login
                'language'  => $bahasa, //set session username
            ));               

            redirect('user/'.$link.'/'.$provinsi.' ','refresh');
    }
}