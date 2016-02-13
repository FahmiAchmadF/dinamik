<?php
Class C_lupa_password extends CI_Controller {    
    
    function __construct()
    {
        parent::__construct(); 
        $this->load->model('admin/m_lupa_password');
        $this->load->model('user/mod_index');
    }

    function index()
    {
        $pertanyaan = $this->m_lupa_password->data_pertanyaan();
        $data = array(
            'pertanyaan'    =>$pertanyaan,);
        $this->load->view('admin/lupa_password',$data);
    }

    function cari_user()
    {
        if($this->input->post('submit'))
        {
            $username = $this->input->post('username');
            $id = $this->input->post('id');
            $jawaban = $this->input->post('jawaban');
            $cari_data = $this->m_lupa_password->cari_data_user($username,$id,$jawaban);
            foreach ($cari_data as $data){
                $username_out = $data['username'];
                $password_out = $data['password'];
            }
            // var_dump($cari_data);
            // exit();
            if(empty($cari_data))
            {
                echo" <script>
                           alert('Harap periksa Username dan Hint anda dengan baik');
                      </script>";   
                redirect("user/#popup123",'refresh');
            }

            $this->link ='index';
            
            $data = array(
                'data'  =>$cari_data,
                'username'  =>$username);
            $this->load->view('user/ganti_password', $data);

        }
    }
    function ubah()
    {
        if($this->input->post('submit'))
        {
            $this->m_lupa_password->ubah();
            echo" <script>
                           alert('Harap ingat dengan baik username dan password anda');
                      </script>";   
                redirect("login",'refresh');
        }
        // else
        // {
            
        // }
    }
}
?>