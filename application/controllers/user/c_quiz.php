<?php
Class c_quiz extends CI_Controller {    
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

    public function pilihquiz() {
        $this->load->model('Admin/m_quiz');

        $jumlah= $this->m_quiz->jumlah('tb_quiz');
 
        $config['base_url'] = base_url().'Admin/c_quiz/daftarsoal/';
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