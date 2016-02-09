<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_profile_admin extends CI_Model{
 function __construct()
    {
        // Call the Model constructor
        $this->tbl ="guru";
        $this->kelas     = "kelas";
        $this->wali_kelas = "wali_kelas";

        parent::__construct();
    }
function semua_data_guru()
{
$query=$this->db->query("SELECT * FROM guru where status='guru' and status_confirm='1' ");
return $query->result();
}
 function getKodeguru(){
        $q = $this->db->query('select MAX(RIGHT(id_guru,5)) as code_max from guru');
        $code = '';
        if($q->num_rows()>0){
            foreach($q->result() as $cd){
                $tmp = ((int)$cd->code_max)+1;
                $code = sprintf('%05s', $tmp);
            }
        }else{
            $code = '00001';
        }
        return 'IG'.$code;
    }
function get_profile_data($user){
    $this->db->select('*');
    $this->db->from('tb_admin');
    $this->db->where('username', $user);
    $query = $this->db->get();
    $result = $query->result();
    return $result;
}


function toExcelAll() {
$this->db->select('*');
$this->db->from('guru');
$this->db->order_by('id_guru','asc');
$getData = $this->db->get();
if($getData->num_rows() > 0)
return $getData->result_array();
else
return null;
}


function update($id_admin,$data){
$this->db->where('id_admin', $id_admin);
$this->db->update('tb_admin', $data);
}


function getall() {
        $ambildata = $this->db->get('guru');
        //jika data ada (lebih dari 0)
        if ($ambildata->num_rows() > 0 ) {
            foreach ($ambildata->result() as $data) {
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
function show_id($data){
$this->db->select('*');
$this->db->from('guru');
$this->db->where('id_guru', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}

 function cek_n($nips2)
    {
        $query = $this->db->get_where($this->tbl,array('nip' => $nips2));
        $ceknips2 = array();
        if ($query->num_rows() >= 1){
            foreach ($query->result() as $row){
                $ceknips2[] = $row;
            }
        }
        return $ceknips2;
    } 

function show_id_gr($data){
$this->db->select('*');
$this->db->from('guru');
$this->db->where('id_guru', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}

function delete_id($id_guru){
$this->db->where('id_guru', $id_guru);
$this->db->delete('guru');

function dlt_walikelas($id_guru){
$this->db->where('id_guru',$id_guru);
$this->db->delete('wali_kelas', array('id_walikelas'));
}

}
function hapus1($id_guru){
$query = $this->db->join($this->wali_kelas, 'wali_kelas.id_guru=guru.id_guru');
$this->db->where('id_guru', $id_guru);
 $this->db->delete('wali_kelas', array('id_guru'=>$id_guru));

}
}
?>