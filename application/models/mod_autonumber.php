<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mod_autonumber extends CI_Model {    
    function autonumber($kolom='',$tabel='',$lebar=0, $awalan='')
    {
        $query = $this->db->query("select * from $tabel order by $kolom desc"); //or max 
        $jumlahrecord = $query->num_rows();
        if($jumlahrecord == 0){
            $nomor=1;
        }else{
            $row = $query->result_array();
            $row = $row[0];
            $nomor = intval(substr($row[$kolom],strlen($awalan)))+1;
        }
        if($lebar>0)
            $angka = $awalan.str_pad($nomor,$lebar,"0",STR_PAD_LEFT);
        else
            $angka = $awalan.$nomor;
        return $angka;
    }
}

