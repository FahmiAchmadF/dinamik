<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_user extends CI_Model{

	function tampil_user()
	{
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->GROUP_BY('id_user');
		$this->db->ORDER_BY('nama_panggilan');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	function show_id($id_user)
	{
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where('id_user', $id_user);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
function show_id_mapel($data){
$this->db->select('*');
$this->db->from('mata_pelajaran');
$this->db->where('id_mapel', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}

function delete_id($id_mapel){
$this->db->where('id_mapel', $id_mapel);
$this->db->delete('mata_pelajaran');

}
}
?>


