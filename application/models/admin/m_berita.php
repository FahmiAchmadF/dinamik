<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_berita extends CI_Model{
    var $gallery_path;
    var $gallery_path_url;
    function __construct()
    {
        parent::__construct();
        $this->gallery_path = realpath(APPPATH. '../images');
        $this->gallery_path_url = base_url(). 'images/';
    }

    function data_berita($id_berita)
    {
        $this->db->select('*');
        $this->db->from('tb_berita_language');
        $this->db->join('tb_berita', 'tb_berita.id = tb_berita_language.id_berita');
        $this->db->join('tb_admin', 'tb_admin.id_admin = tb_berita.id_admin');
        $this->db->order_by('judul');
        $this->db->group_by('tb_berita.id');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function simpan()
    {
    	$this->load->model('Admin/m_quiz');
        $id_admin = $this->input->post('id_admin');
        $tanggal = $this->input->post('tanggal');
        $jumlah_lang = $this->m_quiz->jumlahbahasa();

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

            $data1 = array(
                'id_admin' =>   $id_admin,
                'cover' => $this->upload->file_name,
                'tanggal'       =>  $tanggal
                );
            $exe1 = $this->db->insert('tb_berita', $data1);
        }
        else
        {
             $data1 = array(
                'id_admin' =>   $id_admin,
                'cover' => $this->upload->file_name,
                'tanggal'       =>  $tanggal
                );
            $exe1 = $this->db->insert('tb_berita', $data1);

        }

        for ($a=1; $a <= $jumlah_lang; $a++) {
            ${"judul$a"} = $this->input->post('judul'.$a.'');
            ${"isi$a"} = $this->input->post('isi'.$a.'');
        }

            $q = $this->db->select_max('id');
            $q = $this->db->get('tb_berita');
            $q = $q->result(); 
            $last_id = $q['0']->id;

                for ($b=1; $b <= $jumlah_lang ; $b++) { 
                    $exe2 = $this->db->query("INSERT INTO tb_berita_language(id_berita,judul,isi,id_language) VALUES 
                    ('".$last_id."','".${"judul$b"}."','".${"isi$b"}."','".$b."')");
                }
    return true;
    }

    function ubah_simpan($id_berita)
    {
        $this->load->model('Admin/m_quiz');
        $id_admin = $this->input->post('id_admin');
        $tanggal = $this->input->post('tanggal');
        $jumlah_lang = $this->m_quiz->jumlahbahasa();

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
            $data1 = array(
                'id_admin' =>   $id_admin,
                'cover' => $this->upload->file_name,
                'tanggal'       =>  $tanggal
                );
            
                $exe1 = $this->db->where('id', $id_berita);
                $exe1 = $this->db->update('tb_berita', $data1);
        }
        else
        {
            $data1 = array(
                'id_admin' =>   $id_admin,
                'cover' => $this->upload->file_name,
                'tanggal'       =>  $tanggal
                );
            
                $exe1 = $this->db->where('id', $id_berita);
                $exe1 = $this->db->update('tb_berita', $data1);

        }

        for ($a=1; $a <= $jumlah_lang; $a++) {
            ${"judul$a"} = $this->input->post('judul'.$a.'');
            ${"isi$a"} = $this->input->post('isi'.$a.'');
        }

                for ($b=1; $b <= $jumlah_lang ; $b++) { 

                    $exe2 = $this->db->query("UPDATE tb_berita_language SET judul='".${"judul$b"}."',isi='".${"isi$b"}."' 
                        WHERE id_berita='".$id_berita."' AND id_language='".$b."'");
                    
                }
                
    return true;
    }

    function hapus_berita($id_berita)
    {
        $exe1 = $this->db->where('id', $id_berita);
        $exe1 = $this->db->delete('tb_berita');
            $exe2 = $this->db->where('id_berita', $id_berita);
            $exe2 = $this->db->delete('tb_berita_language');

    return true;
    }

    function lihat_berita($id_berita)
    {
        $this->db->select('*');
        $this->db->from('tb_berita');
        $this->db->where('id',$id_berita);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function lihat_berita_language($id_berita){
        $this->db->select('*');
        $this->db->from('tb_berita_language');
        $this->db->where('id_berita',$id_berita);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

}
