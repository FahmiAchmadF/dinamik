<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_artikel extends CI_Model{
    var $gallery_path;
    var $gallery_path_url;
    function __construct()
    {
        parent::__construct();
        $this->tbl = "tb_artikel";
        $this->tb_user = "tb_user";
        $this->gallery_path = realpath(APPPATH. '../images');
        $this->gallery_path_url = base_url(). 'images/';
    }

    function data_artikel($id_admin)
    {
        $this->db->select('*');
        $this->db->from('tb_artikel_language');
        $this->db->join('tb_artikel', 'tb_artikel.id = tb_artikel_language.id_artikel');
        $this->db->join('tb_admin', 'tb_admin.id_admin = tb_artikel.id_admin');
        $this->db->join('tb_kategori_forum', 'tb_kategori_forum.id = tb_artikel.id_kategori_forum');
        $this->db->join('tb_language', 'tb_language.id = tb_artikel_language.id_language'); 
        $this->db->order_by('judul');
        $this->db->group_by('tb_artikel.id');
        // $this->db->where('tb_artikel.id_admin',$id_admin);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function tampil_provinsi() {
        $this->db->select('*');
        $this->db->from('tb_provinsi');
        $q = $this->db->get();
        $q = $q->result();

        return $q;
    }

    function ambil_id_user($id_user)
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where('id_user',$id_user);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function tampil_kategori()
    {
        $this->db->select('*');
        $this->db->from('tb_kategori_forum');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function lihat_artikel($id_artikel)
    {
        $this->db->select('*');
        $this->db->from('tb_artikel');
        $this->db->where('id',$id_artikel);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function lihat_artikel_language($id_artikel){
        $this->db->select('*');
        $this->db->from('tb_artikel_language');
        $this->db->where('id_artikel',$id_artikel);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function simpan(){
        $this->load->model('Admin/m_quiz');
                $id_admin = $this->input->post('id_admin');
        $id_provinsi = $this->input->post('id_provinsi');
        $id_kategori = $this->input->post('id_kategori_forum');
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
                'id_provinsi'   =>  $id_provinsi,
                'id_kategori_forum'   =>  $id_kategori,
                'cover' => $this->upload->file_name,
                'tanggal'       =>  $tanggal
                );

                $exe1 = $this->db->insert('tb_artikel', $data1);
        }
        else
        {

            $data1 = array(
                'id_admin' =>   $id_admin,
                'id_provinsi'   =>  $id_provinsi,
                'id_kategori_forum'   =>  $id_kategori,
                'cover' => $this->upload->file_name,
                'tanggal'       =>  $tanggal
                );

            $exe1 = $this->db->insert('tb_artikel', $data1);
        }

        for ($a=1; $a <= $jumlah_lang; $a++) {
            ${"judul$a"} = $this->input->post('judul'.$a.'');
            ${"isi$a"} = $this->input->post('isi'.$a.'');
        }

            $q = $this->db->select_max('id');
            $q = $this->db->get('tb_artikel');
            $q = $q->result(); 
            $last_id = $q['0']->id;

                for ($b=1; $b <= $jumlah_lang ; $b++) { 
                    $exe2 = $this->db->query("INSERT INTO tb_artikel_language(id_artikel,judul,isi,id_language) VALUES 
                    ('".$last_id."','".${"judul$b"}."','".${"isi$b"}."','".$b."')");
                }
        return true;            
    }

    function ubah_simpan($id_artikel)
    {
        $this->load->model('Admin/m_quiz');
        $id_admin = $this->input->post('id_admin');
        $id_provinsi = $this->input->post('id_provinsi');
        $id_kategori = $this->input->post('id_kategori_forum');
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
                'id_provinsi'   =>  $id_provinsi,
                'id_kategori_forum'   =>  $id_kategori,
                'cover' => $this->upload->file_name,
                'tanggal'       =>  $tanggal
                );
            
                $exe1 = $this->db->where('id', $id_artikel);
                $exe1 = $this->db->update('tb_artikel', $data1);
        }
        else
        {
            $map = $_SERVER['DOCUMENT_ROOT'];
            $path = $map . '/kebudayaan_indonesia/images/';
            $nama_photo = $this->input->post('gambar_dlt');
            $image = $path.$nama_photo;
                //hapus image
            unlink($image);

            $data1 = array(
                'id_admin' =>   $id_admin,
                'id_provinsi'   =>  $id_provinsi,
                'id_kategori_forum'   =>  $id_kategori,
                'cover' => $this->upload->file_name,
                'tanggal'       =>  $tanggal
                );
            
                $exe1 = $this->db->where('id', $id_artikel);
                $exe1 = $this->db->update('tb_artikel', $data1);
        }


        for ($a=1; $a <= $jumlah_lang; $a++) {
            ${"judul$a"} = $this->input->post('judul'.$a.'');
            ${"isi$a"} = $this->input->post('isi'.$a.'');
        }

                for ($b=1; $b <= $jumlah_lang ; $b++) { 

                    $exe2 = $this->db->query("UPDATE tb_artikel_language SET judul='".${"judul$b"}."',isi='".${"isi$b"}."' 
                        WHERE id_artikel='".$id_artikel."' AND id_language='".$b."'");
                    
                }
                
    return true;
    }

    function hapus_artikel($id_artikel)
    {
        $exe1 = $this->db->where('id', $id_artikel);
        $exe1 = $this->db->delete('tb_artikel');
            $exe2 = $this->db->where('id_artikel', $id_artikel);
            $exe2 = $this->db->delete('tb_artikel_language');

    return true;
    }
}