<?php
class C_artikel extends CI_Controller
{
	function __construct()
    {
        parent::__construct(); 
        $this->load->helper(array('url','form'));
        // $this->load->model('user/mod_index');
        $this->load->model('m_login');
        $this->load->model('admin/m_artikel');
        $this->load->model('mod_autonumber');
        $this->load->library('session');
        $this->link = '/kebudayaan_indonesia/admin';
        $session = $this->session->userdata('isLogin');
        if($session==True)
        {
            $ambil_akun = $this->m_login->ambil_admin($this->session->userdata('username'));    
            $stat = $this->session->userdata('sts_admin');        
        }
        else
        {
            $username='';
            $ambil_akun = $this->m_login->ambil_admin($username);
            $stat = '';        
        }
        $this->seson = $ambil_akun;
        $this->cek_stat = $stat;
        $this->cek();
        // var_dump($stat);
        // exit();
    }

    private function cek()
    {

        if ($this->cek_stat=="") 
        {
            echo "<script>alert('Anda belum login!');</script>";
            redirect('login','refresh');
        }
    }

	function index()
	{
        
        $artikel = $this->m_artikel->data_artikel($this->seson['id_admin']);
        $data = array(
        'user'      =>$this->seson,
        'artikel'   => $artikel,
        'url'  =>$this->link
        );
        
		$this->load->view('admin/v_artikel', $data);
	}

    function tambah_artikel()
    {
        $this->load->model("Admin/m_quiz");

        $tampil_kategori = $this->m_artikel->tampil_kategori();
        $data = array(
        'user'      =>$this->seson,
        'kategori'  =>$tampil_kategori,
        'provinsi'  =>  $this->m_artikel->tampil_provinsi(),
        'lang' => $this->m_artikel->language("Indonesia", "English"),
        'jumlah_lang' => $this->m_artikel->jumlahbahasa("Indonesia", "English")
        );
        

        $this->load->view('admin/v_artikel_add', $data);
    }

    function simpan()
    {
        $this->m_artikel->simpan();   
        redirect('admin/c_artikel');
    }

    function ubah_artikel()
    {
        $id_artikel = $this->uri->segment(4);
        $this->load->model('Admin/m_quiz');   
        $data = array(
            'user'  => $this->seson,
            'id' => $id_artikel,
            'kategori'  => $this->m_artikel->tampil_kategori(),
            'provinsi'  =>  $this->m_artikel->tampil_provinsi(),
            'jumlah_lang' => $this->m_artikel->jumlahbahasaartikel($id_artikel),
            'artikel' => $this->m_artikel->lihat_artikel($id_artikel),
            'artikel_lang' => $this->m_artikel->lihat_artikel_language($id_artikel)
            );
        

        $this->load->view('admin/v_artikel_ubah',$data);
    }

    function ubah_simpan()
    {
        $id_artikel = $this->uri->segment(4);
        $this->m_artikel->ubah_simpan($id_artikel);

        redirect('admin/c_artikel');
    }

    function hapus_artikel()
    {
        $id_artikel = $this->uri->segment(4);
        $this->m_artikel->hapus_artikel($id_artikel);

        redirect('admin/c_artikel');
    }

    function ambillangprov() {
        $id_provinsi = $this->uri->segment(4);

            $langprov = $this->m_artikel->langprov($id_provinsi);
            $jumlah_langprov = $this->m_artikel->jumlah_langprov($id_provinsi);

        for ($bz=1; $bz <= $jumlah_langprov ; $bz++) { ?>
            
                <div class="panel-heading" id="prov">
                        <strong>
                        <?php 
                        $bahasanya = $bz-1;
                            echo $langprov[$bahasanya]->language; 
                            $bz = $bz + $jumlah_langprov + 1;
                        ?>
                        </strong>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                            <label for="judul<?php echo $bz; ?>">Judul <span class="required"></span>
                            </label>
                                
                                 <input type="text" id="last-name" name='judul<?php echo $bz ;?>' maxlength='225' required="required" class="form-control col-md-7 col-xs-12">
                                
                    </div>
                    
                    <div class="form-group">
                            <label>Isi <span class="required"></span>
                            </label>
                                <textarea id="editor<?php echo $bz; ?>" name="isi<?php echo $bz ;?>">
                                </textarea>
                    </div>
                
                </div>



                <div class="panel-footer"></div>
            
        <?php }?>  
   <?php } 


}
?>
