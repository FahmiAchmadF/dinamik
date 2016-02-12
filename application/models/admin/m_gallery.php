<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_gallery extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->admin = 'tb_admin';
		$this->gallery_path = realpath(APPPATH. '../images/gallery');
		$this->gallery_path_url = base_url(). 'images/gallery/';
	}

	function ambiluser($idsuer) {
		$q = $this->db->select('*')
					  ->from('tb_user')
					  ->where('id', $idsuer)
					  ->get()
					  ->result();
		return $q;
	}

	function provinsi() {
		$q = $this->db->select('*')
					->from('tb_provinsi')
					->get();
		$q = $q->result();
		return $q;
	}
	function getImage() {
		$q = $this->db->select('*')
  				    ->join('tb_provinsi','tb_provinsi.id = tb_gallery.id_provinsi')
  					->from('tb_gallery')
					->get();
		$q = $q->result();
		return $q;
	}

	function tambah() {
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
			$data = array(
      	      	'caption' => $this->input->post('caption'),
			  	'image' => $this->upload->file_name,
            	'id_provinsi' => $this->input->post('id_provinsi')
        	    );
	            $exe = $this->db->insert('tb_gallery', $data);
    	    return true;
 		}
	 	else
 		{
 	        $data = array(
      	      	'caption' => $this->input->post('caption'),
			  	'image' => $this->upload->file_name,
            	'id_provinsi' => $this->input->post('id_provinsi')
        	    );
	            $exe = $this->db->insert('tb_gallery', $data);
    	    return true;
 		}

    }

    function ubahdata($id) {
        $q = $this->db->select('*')
  				    ->join('tb_provinsi','tb_provinsi.id = tb_gallery.id_provinsi')
  				    ->where('id_gallery', $id)
  					->from('tb_gallery')
					->get();
		$q = $q->result();
		return $q;
    }
   
    function ubah() {
    	$id = $this->input->post('id_gallery');
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
			 $data = array(
	            'caption' => $this->input->post('caption'),
	            'id_provinsi' => $this->input->post('id_provinsi')
	            );
	            $exe = $this->db->where('id_gallery', $id);
	            $exe = $this->db->update('tb_gallery', $data);
        	return true;
		}
		else
	 	{
			$id_gallery= $this->input->post('id_gallery');
	 	  	$map = $_SERVER['DOCUMENT_ROOT'];
	        $path = $map . ''.base_url().'images/gallery/';
	        $nama_photo = $this->input->post('photo');
			$image = $path.$nama_photo;

	        unlink($image);
	        $data = array(
	            'caption' => $this->input->post('caption'),
	            'image' => $this->upload->file_name,
	            'id_provinsi' => $this->input->post('id_provinsi')
	            );
	            $exe = $this->db->where('id_gallery', $id);
	            $exe = $this->db->update('tb_gallery', $data);
	        return true;
    	}
    }

    function hapus($id) {
    	$q = $this->db->select('*')
					  ->from('tb_gallery')
					  ->where('id_gallery', $id)
					  ->get()
					  ->result();
		$nama_photo = $q[0]->image;

                //hapus image dari server
                    // lokasi folder image
            $map = $_SERVER['DOCUMENT_ROOT'];
            $path = $map . ''.base_url().'images/gallery/';  
                //lokasi gambar secara spesifik
            $image = $path.$nama_photo;
                //hapus image
            unlink($image);
        $exe = $this->db->where('id_gallery', $id);
        $exe = $this->db->delete('tb_gallery');
    }


}