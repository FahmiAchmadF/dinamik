<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mod_login extends CI_Model{
	function __construct()
	{
		parent::__construct();
		$this->tbl = "siswa";
        $this->guru_ngajar = "guru_ngajar";
		$this->mata_pelajaran = "mata_pelajaran";
        $this->ruang_kelas = "ruang_kelas";
		$this->siswa = "siswa";
        $this->wali_kelas = "wali_kelas";
		$this->kelas = "kelas";	
	}
	function cek_user($nisn="",$password="")
	{
		$query = $this->db->get_where($this->tbl,array('nisn' => $nisn, 'password' => $password));
		$query = $query->result_array();
		return $query;
	}

	function show_id($data){
	$this->db->select('*');
	$this->db->from('guru');
	$this->db->where('username', $data);
	$query = $this->db->get();
	$result = $query->result();
return $result;
}

	function ambil_user($username)
    {
        $query = $this->db->get_where($this->tbl, array('username' => $username));
        $query = $query->result_array();
        if($query){
            return $query[0];
        }
    }
}