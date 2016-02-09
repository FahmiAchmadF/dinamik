<?php
class C_confirm_guru extends CI_Controller{
    function __construct(){
    parent::__construct();
    $this->load->model('mod_update_semester');
    $this->load->model('mod_add_semester');
    $this->load->model('m_login');
    $this->load->model('m_confirm_guru');
    $this->cek();
    }

    private function cek()
	{
		$stat = $this->session->userdata('sts');
    	if($stat=='guru'){ //admin
    		echo "<script>alert('Anda tidak berhak mengakses halaman ini!');</script>";
    		redirect('dashboard','refresh');
    	}elseif ($stat=="") {
    		echo "<script>alert('Anda belum login!');</script>";
    		redirect('login','refresh');
    	}
	}
function konfirmasi() {
$id_guru = $this->uri->segment(4);
$ambil_akun = $this->m_login->ambil_user($this->session->userdata('username'));
        $pesan_confrim='Apakah anda ';
        $status_confirm = '0';
        $confirm_guru = $this->m_login->confirm_guru($status_confirm);
        $jumlah_status_confirm = count($this->m_login->confirm_guru($status_confirm));
        if(empty($confirm_guru))
        {
            $c_id_guru = '';
            $c_nip  = '';
            $c_nama_guru = '';
            $c_photo = '';
            $confirm = '0';
        }
        else
        {
            foreach ($confirm_guru as $data) {
                $c_id_guru = $data['id_guru'];
                $c_nip  = $data['nip'];
                $c_nama_guru = $data['nama_guru'];
                $c_photo = $data['photo'];
                $confirm = $data['status_confirm'];
            }
        }

        $pesan_confirm='ingin mendaftarkan sebagai guru.';
        $total_confirm = count($confirm);
$data = array(
                'user'  => $ambil_akun,
                'confirm'   =>$confirm_guru,
                'nip'   =>$c_nip,
                'nama_guru'=>$c_nama_guru,
                'photo' => $c_photo,
                'total_confirm'=>$jumlah_status_confirm,
                'user'=>$ambil_akun);
$this->load->view('admin/views_konfirmasi_guru', $data);
}
function konfirmasi_simpan() {
$id_guru= $this->input->post('id_guru');
$status_confirm = '1';
$data = array(
            'status_confirm' => $status_confirm,
);
$this->m_confirm_guru->update_konfirmasi($id_guru,$data);
 echo "<script>alert('Data berhasil di ubah');</script>";
redirect('dashboard','refresh');
}
}

?>