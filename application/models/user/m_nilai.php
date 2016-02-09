<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_nilai extends CI_Model {
    
    function __construct()
    {

        $this->tbl = 'nilai_walikelas';
        $this->ruang_kelas = 'ruang_kelas';
        parent::__construct();
    }
    

     function getKodemapel(){
        $q = $this->db->query('select MAX(RIGHT(id_ruang,5)) as code_max from ruang_kelas');
        $code = '';
        if($q->num_rows()>0){
            foreach($q->result() as $cd){
                $tmp = ((int)$cd->code_max)+1;
                $code = sprintf('%05s', $tmp);
            }
        }else{
            $code = '00001';
        }
        return 'RK'.$code;
    }

    function ambil_pertama($id_siswa)
    {
        $query = $this->db->query("SELECT siswa.id_siswa as id_siswa,siswa.nama as nama , semester.tahun_ajaran AS tahun_ajaran, semester.semester as semester, semester.id_semester as id_semester
            FROM ((ruang_kelas INNER JOIN siswa ON ruang_kelas.id_siswa = siswa.id_siswa) 
            INNER JOIN kelas ON ruang_kelas.id_kelas = kelas.id_kelas) 
            INNER JOIN semester ON ruang_kelas.id_semester = semester.id_semester
            WHERE siswa.id_siswa='".$id_siswa."' group by semester.id_semester ");
        $query = $query->result_array();
        return $query;
    }
    function ambil_id_siswa($nisn)
     {
        $query = $this->db->query("SELECT * FROM siswa WHERE  siswa.nisn='".$nisn."' ");
        $query = $query->result_array();
        return $query;
    }
     function tmpilsiswa($id_siswa)
     {
        $query = $this->db->query("SELECT siswa.nisn as nisn , siswa.nama as nama
                FROM siswa WHERE  siswa.id_siswa='".$id_siswa."'  ");
        $query = $query->result_array();
        return $query;
    }
         function look_smt()
     {
        $query = $this->db->query("SELECT *
                FROM semester ");
        $query = $query->result_array();
        return $query;
    }
    function look_smt_choice($id_semester)
     {
        $query = $this->db->query("SELECT *
                FROM semester where id_semester='".$id_semester."' ");
        $query = $query->result_array();
        return $query;
    }

        function look_kelas()
     {
        $query = $this->db->query("SELECT *
                FROM kelas ");
        $query = $query->result_array();
        return $query;
    }
    function look_kelas_choice($idkel)
     {
        $query = $this->db->query("SELECT *
                FROM kelas where id_kelas='".$idkel."' ");
        $query = $query->result_array();
        return $query;
    }
    function import_tambah_nilai($data = array())
    {
        $query = $this->db->insert($this->tbl, $data); 
    } 
         function cek_siswa($i_nisn)
     {
        $query = $this->db->query("SELECT siswa.id_siswa as id_siswa , siswa.nama as nama
                FROM siswa WHERE  siswa.nisn='".$i_nisn."'  ");
        $query = $query->result_array();
        return $query;
    }
    function cek_kelas($i_tingkat,$i_jurusan,$i_kelas)
     {
        $query = $this->db->query("SELECT kelas.id_kelas as id_kelas 
                FROM kelas WHERE  kelas.tingkat='".$i_tingkat."' and kelas.jurusan='".$i_jurusan."' and kelas.kelas='".$i_kelas."'  ");
        $query = $query->result_array();
        return $query;
    }
    function cek_semester($i_semester,$i_tahunajaran)
     {
        $query = $this->db->query("SELECT semester.id_semester as id_semester 
                FROM semester WHERE  semester.semester='".$i_semester."' and semester.tahun_ajaran='".$i_tahunajaran."' ");
        $query = $query->result_array();
        return $query;
    }
        function cek_nilai($idsiswa,$idkelas,$idsemester)
     {
        $query = $this->db->query("SELECT nilai_walikelas.wk_nilai as wk_nilai 
                FROM nilai_walikelas WHERE  nilai_walikelas.id_siswa='".$idsiswa."' and nilai_walikelas.idkelas='".$idkelas."' 
                and nilai_walikelas.idsemester='".$idsemester."'  ");
        $query = $query->result_array();
        return $query;
    }



     function naik_kelas($jurusan)
     {
        $query = $this->db->query("SELECT kelas.id_kelas as id_kelas , kelas.tingkat as tingkat, kelas.jurusan as jurusan, kelas.kelas as kelas ,kelas.id_kelasbaru as id_kelasbaru
                FROM kelas where kelas.jurusan='".$jurusan."' GROUP BY tingkat ");
        $query = $query->result_array();
        return $query;
    }
 
    function ambil_kedua($id_siswa,$id_semester)
    {
        $query = $this->db->query("SELECT siswa.id_siswa as id_siswa,siswa.nama as nama , semester.tahun_ajaran AS tahun_ajaran, semester.semester as semester, semester.id_semester as id_semester,
            kelas.id_kelas as id_kelas , kelas.tingkat as tingkat , kelas.jurusan as jurusan , kelas.kelas as kelas, kelas.id_kelasbaru as id_kelasbaru
            FROM ((ruang_kelas INNER JOIN siswa ON ruang_kelas.id_siswa = siswa.id_siswa) 
            INNER JOIN kelas ON ruang_kelas.id_kelas = kelas.id_kelas) 
            INNER JOIN semester ON ruang_kelas.id_semester = semester.id_semester
            WHERE siswa.id_siswa='".$id_siswa."' and semester.id_semester='".$id_semester."' group by tingkat,kelas,jurusan order by tingkat,kelas,jurusan ");
        $query = $query->result_array();
        return $query;
    }

    function ambil_ketiga($id_semester="",$id_siswa="",$id_kelas="")
    {
             $query = $this->db->query("SELECT kelas.tingkat as tingkat,kelas.jurusan as jurusan,kelas.kelas as kelas, kelas.id_kelasbaru as id_kelasbaru, kelas.id_kelas as id_kelas , 
                semester.tahun_ajaran AS tahun_ajaran, semester.semester as semester 
                FROM ((wali_kelas INNER JOIN guru ON wali_kelas.id_guru = guru.id_guru) 
                INNER JOIN kelas ON wali_kelas.id_kelas = kelas.id_kelas) 
                INNER JOIN semester ON wali_kelas.id_semester = semester.id_semester
            WHERE semester.id_semester='".$id_semester."' and guru.id_guru='".$id_guru."' 
            and kelas.id_kelas='".$id_kelas."' ");
        $query = $query->result_array();
        return $query;
    }
     function ambil_keempat($id_semester="",$id_siswa="",$id_kelas="")
    {
     $query = $this->db->query("SELECT siswa.id_siswa as id_siswa,siswa.nama as nama , semester.tahun_ajaran AS tahun_ajaran, semester.semester as semester, semester.id_semester as id_semester,
            kelas.id_kelas as id_kelas , kelas.tingkat as tingkat , kelas.jurusan as jurusan , kelas.kelas as kelas, kelas.id_kelasbaru as id_kelasbaru
            FROM ((ruang_kelas INNER JOIN siswa ON ruang_kelas.id_siswa = siswa.id_siswa) 
            INNER JOIN kelas ON ruang_kelas.id_kelas = kelas.id_kelas) 
            INNER JOIN semester ON ruang_kelas.id_semester = semester.id_semester
            WHERE siswa.id_siswa='".$id_siswa."' and semester.id_semester='".$id_semester."' and kelas.id_kelas='".$id_kelas."' group by tingkat,kelas,jurusan order by tingkat,kelas,jurusan ");
        $query = $query->result_array();
        return $query;
    }

        function ambil_siswa($idkel,$id_semester)
    {   
      $query = $this->db->query("SELECT ruang_kelas.id_ruang as id_ruang , ruang_kelas.id_siswa as id_siswa , siswa.nisn AS nisn, siswa.nama AS nama,siswa.jenis_kelamin AS jenis_kelamin, 
        kelas.id_kelas as id_kelas, semester.id_semester as id_semester ,semester.tahun_ajaran AS tahun_ajaran, semester.semester AS semester,
        kelas.tingkat AS tingkat,kelas.jurusan AS jurusan,kelas.kelas AS kelas
             FROM ((ruang_kelas INNER JOIN siswa ON ruang_kelas.id_siswa = siswa.id_siswa)
                INNER JOIN kelas ON ruang_kelas.id_kelas = kelas.id_kelas) 
             INNER JOIN semester ON ruang_kelas.id_semester = semester.id_semester where kelas.id_kelas='".$idkel."' AND semester.id_semester='".$id_semester."' 
                group by siswa.nisn order by nama");
        $query = $query->result_array();
        return $query;
    }
     function ambil_mapel($id_kelasbaru)
    {   
      $query = $this->db->query("SELECT mata_pelajaran.id_mapel as id_mapel , mata_pelajaran.nama_mapel as nama_mapel, mata_pelajaran.kkm as kkm, mata_pelajaran.id_kelas as id_kelas
            FROM mata_pelajaran where mata_pelajaran.id_kelas='".$id_kelasbaru."' ");
        $query = $query->result_array();
        return $query;
    }
        function tambahnilai1($hitung_table,$dataarray,$id_mapel,$id_kelas,$id_semester,$id_guru,$id_siswa)
    {


        for($i=0;$i<count($id_mapel);$i++){
             $data = array(
                // 'id_kelas'=>$id_kelas,
                // 'id_semester'=>$id_semester,
                'id_guru'=>$id_guru,
                // 'id_mapel'=>$id_mapel[3]['id_mapel'],
                'nilai'=>$dataarray[$i]['nilai']
            );
               $siswa = array(
                'id_mapel'=>$id_mapel[$i]['id_mapel']
            );
            $this->db->where($siswa);
            $this->db->where('id_siswa',$id_siswa);
            $this->db->where('id_kelas',$id_kelas);
            $this->db->where('id_semester',$id_semester);
            $this->db->update('nilai_walikelas', $data);
        }        
}

    function ambil_nilaiwk($id_semester,$id_kelas,$id_siswa)
     {
        $query = $this->db->query("SELECT wk_nilai , siswa.nisn as nisn , siswa.nama as nama , mata_pelajaran.nama_mapel as nama_mapel  ,mata_pelajaran.kkm as kkm  ,
         p_nilai , p_angka, p_predikat , k_nilai , k_angka , k_predikat, sikap, tgl
            FROM ((nilai_walikelas INNER JOIN siswa ON nilai_walikelas.id_siswa = siswa.id_siswa) 
            INNER JOIN mata_pelajaran ON nilai_walikelas.id_mapel = mata_pelajaran.id_mapel) 
            WHERE nilai_walikelas.id_kelas='".$id_kelas."' and nilai_walikelas.id_semester='".$id_semester."' and nilai_walikelas.id_siswa='".$id_siswa."'
               ");
        $query = $query->result_array();
        return $query;
    }

    function ambil_smt($id_semester)
    {   

        $query = $this->db->query("SELECT ruang_kelas.id_siswa as id_siswa, tb_ruangan.id_kelas as id_kelas, tb_ruangan.id_ajaran as id_ajaran,
            tb_ajaran.thn_ajaran AS thn_ajaran, tb_ajaran.semester AS semester, tb_kelas.nama_kelas AS kelas, 
            tb_kelas.jurusan AS jurusan, tb_siswa.nisn AS nisn, tb_siswa.nama_siswa AS nama_siswa 
            FROM ((tb_ruangan INNER JOIN tb_siswa ON tb_ruangan.id_siswa = tb_siswa.id_siswa) 
            INNER JOIN tb_kelas ON tb_ruangan.id_kelas = tb_kelas.id_kelas) 
            INNER JOIN tb_ajaran ON tb_ruangan.id_ajaran = tb_ajaran.id_ajaran where tb_ajaran.id_ajaran='".$id_ajaran."' AND tb_kelas.id_kelas='".$id_kelas."'
            group by tb_siswa.id_siswa ");
        $query = $query->result_array();
        return $query;
    }


    function ambil_pelajaran($id_guru)
    {
        $query = $this->db->query("SELECT mata_pelajaran.id_mapel AS id_mapel, mata_pelajaran.nama_mapel AS nama_mapel
            FROM (((guru_ngajar INNER JOIN guru ON guru_ngajar.id_guru = guru.id_guru) 
            INNER JOIN mata_pelajaran ON guru_ngajar.id_mapel = mata_pelajaran.id_mapel) 
            INNER JOIN kelas ON guru_ngajar.id_kelas = kelas.id_kelas) 
            INNER JOIN semester ON guru_ngajar.id_semester = semester.id_semester
            WHERE guru.id_guru='".$id_guru."' group by mata_pelajaran.id_mapel");
        $query = $query->result_array();
        return $query;
    }
    function ambil_kelas($id_guru)
    {
        $query = $this->db->query("SELECT kelas.id_kelas as id_kelas, kelas.tingkat as tingkat, kelas.jurusan as jurusan,kelas.kelas as kelas
             FROM (((guru_ngajar INNER JOIN guru ON guru_ngajar.id_guru = guru.id_guru) 
            INNER JOIN mata_pelajaran ON guru_ngajar.id_mapel = mata_pelajaran.id_mapel) 
            INNER JOIN kelas ON guru_ngajar.id_kelas = kelas.id_kelas) 
            INNER JOIN semester ON guru_ngajar.id_semester = semester.id_semester
             WHERE guru.id_guru='".$id_guru."' group by kelas.id_kelas");
        $query = $query->result_array();
        return $query;
    }
    function ambil_ajaran($id_guru)
    {
        $query = $this->db->query("SELECT semester.id_semester AS id_semester, semester.tahun_ajaran AS tahun_ajaran,semester.semester as semester
              FROM (((guru_ngajar INNER JOIN guru ON guru_ngajar.id_guru = guru.id_guru) 
            INNER JOIN mata_pelajaran ON guru_ngajar.id_mapel = mata_pelajaran.id_mapel) 
            INNER JOIN kelas ON guru_ngajar.id_kelas = kelas.id_kelas) 
            INNER JOIN semester ON guru_ngajar.id_semester = semester.id_semester
              WHERE guru.id_guru='".$id_guru."' group by semester.id_semester");
        $query = $query->result_array();
        return $query;
    }

    function cari_sadayana($id_guru="",$id_semester="",$idkel="",$id_siswa="")
    {
    $query = $this->db->query("SELECT nilai_walikelas.wk_nilai as wk_nilai, siswa.nisn as nisn , siswa.nama as nama , mata_pelajaran.nama_mapel as nama_mapel  , nilai , tgl
            FROM ((nilai_walikelas INNER JOIN siswa ON nilai_walikelas.id_siswa = siswa.id_siswa) 
            INNER JOIN mata_pelajaran ON nilai_walikelas.id_mapel = mata_pelajaran.id_mapel) 
            WHERE nilai_walikelas.id_kelas='".$idkel."' and nilai_walikelas.id_semester='".$id_semester."' and nilai_walikelas.id_guru='".$id_guru."' 
            and nilai_walikelas.id_siswa='".$id_siswa."' ");
        $query = $query->result_array();
        return $query;
    }

    function toExcelAll($id_siswa,$id_guru){
         $query = $this->db->query("SELECT nilai_walikelas.wk_nilai as wk_nilai, guru.nip as nip, guru.nama_guru as nama_guru, siswa.nisn as nisn , siswa.nama as nama , kelas.tingkat as tingkat,
            kelas.jurusan as jurusan, kelas.kelas as kelas, mata_pelajaran.nama_mapel as nama_mapel  , semester.tahun_ajaran as tahun_ajaran,
            semester.semester as semester , nilai_walikelas.nilai as nilai, nilai_walikelas.tgl as tgl
            FROM (((((nilai_walikelas INNER JOIN siswa ON nilai_walikelas.id_siswa = siswa.id_siswa) 
            INNER JOIN kelas ON nilai_walikelas.id_kelas = kelas.id_kelas)
            INNER JOIN guru ON nilai_walikelas.id_guru = guru.id_guru)
            INNER JOIN mata_pelajaran ON nilai_walikelas.id_mapel = mata_pelajaran.id_mapel) 
            INNER JOIN semester ON nilai_walikelas.id_semester = semester.id_semester)
            WHERE nilai_walikelas.id_siswa='".$id_siswa."' and nilai_walikelas.id_guru='".$id_guru."' ");
            $query = $query->result_array();
            return $query;
}
 function toExcelAllImport2($id_kelas){
         $query = $this->db->query("SELECT mata_pelajaran.nama_mapel,kelas.tingkat as tingkat,kelas.jurusan as jurusan, kelas.kelas as kelas
          FROM (mata_pelajaran INNER JOIN kelas ON mata_pelajaran.id_kelas = kelas.id_kelasbaru) 
          WHERE mata_pelajaran.id_kelas='".$id_kelas."' GROUP BY nama_mapel");
            $query = $query->result_array();
            return $query;
}
 function toExcelAllImport($id_kelas,$id_guru){
         $query = $this->db->query("SELECT nilai_walikelas.wk_nilai as wk_nilai, guru.nip as nip, guru.nama_guru as nama_guru, siswa.nisn as nisn , siswa.nama as nama , kelas.tingkat as tingkat,
            kelas.jurusan as jurusan, kelas.kelas as kelas, mata_pelajaran.nama_mapel as nama_mapel  , semester.tahun_ajaran as tahun_ajaran,
            semester.semester as semester , nilai_walikelas.nilai as nilai, nilai_walikelas.tgl as tgl
            FROM (((((nilai_walikelas INNER JOIN siswa ON nilai_walikelas.id_siswa = siswa.id_siswa) 
            INNER JOIN kelas ON nilai_walikelas.id_kelas = kelas.id_kelas)
            INNER JOIN guru ON nilai_walikelas.id_guru = guru.id_guru)
            INNER JOIN mata_pelajaran ON nilai_walikelas.id_mapel = mata_pelajaran.id_mapel) 
            INNER JOIN semester ON nilai_walikelas.id_semester = semester.id_semester)
            WHERE nilai_walikelas.id_guru='".$id_guru."' ");
            $query = $query->result_array();
            return $query;
}

    function toExcelAll1($id_siswa,$id_guru){
         $query = $this->db->query("SELECT siswa.nisn as nisn , siswa.nama as nama , kelas.tingkat as tingkat,
            kelas.jurusan as jurusan, kelas.kelas as kelas, semester.tahun_ajaran as tahun_ajaran,
            semester.semester as semester 
            FROM (((ruang_kelas INNER JOIN siswa ON ruang_kelas.id_siswa = siswa.id_siswa) 
            INNER JOIN kelas ON ruang_kelas.id_kelas = kelas.id_kelas)
            INNER JOIN semester ON ruang_kelas.id_semester = semester.id_semester)
            WHERE siswa.id_siswa='".$id_siswa."' ");
            $query = $query->result_array();
            return $query;
    }


    function simpan_naik_kelas($data = array())
    {
        $query = $this->db->insert($this->ruang_kelas, $data); 
    }  
    function simpan_naik_kelas2($data = array())
    {
        $query = $this->db->insert($this->ruang_kelas, $data); 
    }  

      
    function simpan($data = array())
    {
        $query = $this->db->insert($this->tbl, $data); 
    }
    function ambil_kode($ini)
    {
        $query = $this->db->get_where($this->tbl,array('id_guru' => $ini));
        $query = $query->result_array();
        if($query){
            return $query[0];
        }
    }  
    function ubah($data = array(),$idna=array())
    {
        $this->db->where($idna);
        $this->db->update($this->tbl,$data);
    }
    function hapus($idna=array()) 
    {
       $this->db->delete($this->tbl,$idna); 
    }
    
}
