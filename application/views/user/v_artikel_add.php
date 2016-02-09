
<?php include('include/header.php');?>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="<?php echo site_url('dashboard');?>" class="site_title"><img src="<?php echo base_url();?>assets/images/cimahi.jpg" width="40" height="40"> <span>Kebudayaan</span></a>
                    </div>
                    <div class="clearfix"></div>
                  </div>
            </div>
            <div class="right_col" role="main">
              <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h3>Form Artikel</h3>  </a> <small>Kebudayaan</small>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <form id="demo-form2" method="post" action="<?php echo base_url()."user/c_artikel/simpan"?>" data-parsley-validate class="form-horizontal form-label-left">
                                        <div class="form-group">
                                         <div class="col-md-9 col-sm-9 col-xs-12">

   <?php 
        $no=1;
        $lebar = 4;
        $nomor = intval(substr($autonumberartikel,strlen("IDL")))+$no-1;
        if($lebar>0){
            $angka = "IDL".str_pad($nomor,$lebar,"0",STR_PAD_LEFT);
        }else{
            $angka = "IDL".$nomor;
        }
            echo "          
               <input type='hidden'  name='id_artikel' value='".$angka."'>";
        $no++;
    ?>
     <?php 
        $no=1;
        $lebar = 9;
        $nomor = intval(substr($autonumberforum,strlen("IDF")))+$no-1;
        if($lebar>0){
            $angka = "IDF".str_pad($nomor,$lebar,"0",STR_PAD_LEFT);
        }else{
            $angka = "IDF".$nomor;
        }
            echo "          
               <input type='hidden'  name='id_forum' value='".$angka."'>";
        $no++;
    ?>
                                            </select>
                                            </div>
                                        </div>

                                        <input type="hidden" name='id_user' value="<?php echo $user['id_user'];?>">
                                         <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Penulis <span class="required"></span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="date-picker form-control col-md-7 col-xs-12"  maxlength='12'  required="required" readonly type="text" value="<?php echo $user['nama_depan']; echo ' '; echo $user['nama_belakang'];?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Judul <span class="required"></span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="last-name" name='judul_artikel' maxlength='40' required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Kategori</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select class="select2_single form-control" required name='kategori' >
                                                    <option value="">----Pilih Kategori----</option>
                                                    <option value="adat istiadat">Adat Istiadat</option>
                                                    <option value="alat musik">Alat Musik</option>
                                                    <option value="kesenian">Kesenian</option>
                                                    <option value="tradisi">Tradisi</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Isi <span class="required"></span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea class="form-control" rows="3" name='isi_artikel'></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal <span class="required"></span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="date" value="<?php echo date('Y-m-d'); ?>" name='tanggal' 
                                                maxlength='20' required="required" readonly class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>

                                   <div class="x_content">
                                </div>
                            </div>
                        </div>


                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                           <table>       <td width="100"> </td>     <td>  <input type="reset" class="btn btn-primary" value="Batal"></td>
                                             <td>   <input type="submit" id="submit" value="Simpan"  name="submit" class="btn btn-success"></td>
                                          </table>
                                            </div>
                                        </div>

                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
</div>


<?php include('include/footers.php');?>