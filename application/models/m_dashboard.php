<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_dashboard extends CI_Model {
    function __construct()
    {
        // Call the Model constructor
        $this->tb_user = 'tb_user';
        $this->tb_artikel = 'tb_artikel';
        $this->tbl_admin = 'tb_admin';
        parent::__construct();
    }

    function data_user($status_all)
    {   
        $query = $this->db->get_where($this->tb_user, array('status' => $status_all));
        $query = $query->result_array();
        return $query;
    }
    function data_artikel()
    {   
        $query = $this->db->get($this->tb_artikel);
        $query = $query->result_array();
        return $query;
    }

    function cari_siswa($kd)
    {
        $query = $this->db->get_where($this->tbl_siswa, array('username' => $kd));
        $query = $query->result_array();
        return $query;
    }
    function cari_admin($kd)
    {   
        $query = $this->db->get_where($this->tbl_admin, array('username' => $kd));
        $query = $query->result_array();
        return $query;
    }
    function cari_guru($kd)
    {   
        $query = $this->db->get_where($this->tbl_guru, array('username' => $kd));
        $query = $query->result_array();
        return $query;
    }
    function ambil_kode($ini)
    {
        $query = $this->db->get_where($this->tbl_siswa,array('id_siswa' => $ini));
        $query = $query->result_array();
        if($query){
            return $query[0];
        }
    } 
    function ambil_awal_akhir($awal="",$akhir="")
    {
        $query = $this->db->get($this->tbl_siswa,$awal,$akhir);
        $query = $query->result_array();
        return $query;
    }
    function cek_n($nisn)
    {
        $query = $this->db->get_where($this->tbl_siswa,array('NISN' => $nisn));
        $ceknisn = array();
        if ($query->num_rows() >= 1){
            foreach ($query->result() as $row){
                $ceknisn[] = $row;
            }
        }
        return $ceknisn;
    } 
    function cek_u($us)
    {
        $query = $this->db->get_where($this->tbl_siswa,array('username' => $us));
        $ceknisn = array();
        if ($query->num_rows() >= 1){
            foreach ($query->result() as $row){
                $ceknisn[] = $row;
            }
        }
        return $ceknisn;
    }
    function dat_guru()
    {   
        $query = $this->db->get($this->tbl_guru);
        $query = $query->result_array();
        return $query;
    }
    function dat_pelajaran()
    {   
        $query = $this->db->get($this->tbl_pelajaran);
        $query = $query->result_array();
        return $query;
    }   
    function dat_siswa()
    {   
        $query = $this->db->get($this->tbl_siswa);
        $query = $query->result_array();
        return $query;
    }  
    function dat_kelas()
    {   
        $query = $this->db->get($this->tbl_kelas);
        $query = $query->result_array();
        return $query;
    }  
    function simpan($data = array())
    {
        $query = $this->db->insert($this->tbl_siswa, $data); 
    }  
    function ubah($data = array(),$idna=array())
    {
        $this->db->where($idna);
        $this->db->update($this->tbl_siswa,$data);
    }
    function hapus($idna=array()) 
    {
       $this->db->delete($this->tbl_siswa,$idna); 
    }
    function ambil_semua()
    {
        $query = $this->db->get($this->tbl_siswa);
        $query = $query->result_array();
        return $query;
    }
    function halaman()
    {
        $query = $this->db->get($this->tbl_siswa);
        $query = $query->result();
        return $query;
    }
    function ambil_jumlah_hal()
    {
        $query  = $this->db->get($this->tbl_siswa);
        $jumlah = array();
        if ($query->num_rows() >= 1){
            foreach ($query->result() as $row){
                $jumlah[] = $row;
            }
        }
        return $jumlah;
    }




}