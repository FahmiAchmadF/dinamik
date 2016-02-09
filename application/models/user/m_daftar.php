<?php
class M_daftar extends CI_Model { 
     function __construct()
    {
        // Call the Model constructor
        $this->tbl          = "ruang_kelas";
        $this->siswa          = "siswa";
        $this->tb_user          = "tb_user";
        $this->kelas     = "kelas";
        $this->kelas_baru ="kelas_baru";
        $this->semester ="semester";
        parent::__construct();
    }
   
 function ambil_semua()
    {
           // $query = $this->db->select('kelas.tingkat as tingkat,kelas.jurusan as jurusan,kelas.tingkat as tingkat,kelas_baru.tingkat AS tingkat,kelas_baru.jurusan AS jurusan');
        $query = $this->db->join($this->siswa, 'siswa.id_siswa = ruang_kelas.id_siswa');
        $query = $this->db->join($this->kelas, 'kelas.id_kelas = ruang_kelas.id_kelas');
        $query = $this->db->join($this->semester, 'semester.id_semester = ruang_kelas.id_semester');
        $query = $this->db->get($this->tbl);
        $query = $query->result_array();
        return $query;
    }

 function ambil_kelas()
    {
        $query = $this->db->get($this->kelas);
        $query = $query->result_array();
        return $query;
    }
     function ambil_smt()
    {

        $this->db->group_by('tahun_ajaran','asc');
        $query = $this->db->get($this->semester);
        $query = $query->result_array();
        return $query;
    }

function ambil_kelas_baru()
    {
        $query = $this->db->get($this->kelas_baru);
        $query = $query->result_array();
        return $query;
    }


    function semua_data_nilai()
{
// $this->tbl       = "ruang_kelas";
// $this->kelas     = "kelas";

$this->db->select('*');    
$this->db->from('siswa');
$query=$this->db->join("kelas","kelas.id_kelas=siswa.id_kelas");
$query=$this->db->get();
return $query->result();
}

    function cek_n($username)
    {
        $query = $this->db->get_where($this->tb_user,array('username' => $username));
        $cekusername = array();
        if ($query->num_rows() >= 1){
            foreach ($query->result() as $row){
                $cekusername[] = $row;
            }
        }
        return $cekusername;
    } 
 
}
?>