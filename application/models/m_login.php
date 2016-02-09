<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_login extends CI_Model{
	function __construct()
	{
		parent::__construct();
		$this->tbl = "tb_admin";
		$this->tb_user = "tb_user";
	}

	function cek_admin($username="",$password="")
	{
		$query = $this->db->get_where($this->tbl,array('username' => $username, 'password' => $password));
		$query = $query->result_array();
		return $query;
	}
	function cek_user($username="",$password="",$status_user)
	{
		$query = $this->db->get_where($this->tb_user,array('username' => $username, 'password' => $password , 'status' => $status_user));
		$query = $query->result_array();
		return $query;
	}
	    function confirm_user($status_confirm)
    {   
        $this->db->select('*');
        $query = $this->db->where('status',$status_confirm);
        $query = $this->db->get($this->tb_user);
        $query = $query->result_array();
        return $query;
    }

	function ambil_admin($username)
    {
        $query = $this->db->get_where($this->tbl, array('username' => $username));
        $query = $query->result_array();
        if($query){
            return $query[0];
        }
    }

    function ambil_member($username)
    {
        $query = $this->db->get_where($this->tb_user, array('username' => $username));
        $query = $query->result_array();
        if($query){
            return $query[0];
        }
    }
}