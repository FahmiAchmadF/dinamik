
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
                                    <h3> Form Ubah Artikel </h3> </a> <small>Kebudayaan</small>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <?php foreach ($lihat_artikel as $data): ?>
                                    <form id="demo-form2" method="post" action="<?php echo base_url()."user/c_artikel/ubah_simpan"?>" 
                                    data-parsley-validate class="form-horizontal form-label-left">
                                         <input type="hidden" name='id_artikel' value="<?php echo $data->id_artikel;?>">
                                         <input type="hidden" name='id_user' value="<?php echo $data->id_user;?>">
                                         <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Penulis <span class="required"></span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="date-picker form-control col-md-7 col-xs-12"  maxlength='12'  required="required" readonly type="text" value="<?php echo $data->nama_depan; echo ' '; echo $data->nama_belakang;?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Judul <span class="required"></span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name='judul_artikel' maxlength='20' class="form-control col-md-7 col-xs-12" value="<?php echo $data->judul_artikel;?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Kategori</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select class="select2_single form-control" required name='kategori' >
                                                    <?php if ($data->kategori == ''): ?>
                                                    <option value="">----Pilih Kategori----</option>
                                                    <option value="adat istiadat">Adat Istiadat</option>
                                                    <option value="alat musik">Alat Musik</option>
                                                    <option value="kesenian">Kesenian</option>
                                                    <option value="tradisi">Tradisi</option>
                                                    <?php elseif ($data->kategori == 'adat istiadat'): ?>
                                                    <option value="adat istiadat" selected>Adat Istiadat</option>
                                                    <option value="alat musik">Alat Musik</option>
                                                    <option value="kesenian">Kesenian</option>
                                                    <option value="tradisi">Tradisi</option>
                                                    <?php elseif ($data->kategori == 'alat musik'): ?>
                                                    <option value="adat istiadat">Adat Istiadat</option>
                                                    <option value="alat musik" selected>Alat Musik</option>
                                                    <option value="kesenian">Kesenian</option>
                                                    <option value="tradisi">Tradisi</option>
                                                    <?php elseif ($data->kategori == 'kesenian'): ?>
                                                    <option value="adat istiadat">Adat Istiadat</option>
                                                    <option value="alat musik">Alat Musik</option>
                                                    <option value="kesenian" selected>Kesenian</option>
                                                    <option value="tradisi">Tradisi</option>
                                                    <?php elseif ($data->kategori == 'tradisi'): ?>
                                                    <option value="adat istiadat">Adat Istiadat</option>
                                                    <option value="alat musik">Alat Musik</option>
                                                    <option value="kesenian">Kesenian</option>
                                                    <option value="tradisi" selected>Tradisi</option>
                                                    <?php else: ?>
                                                    <option value="adat istiadat">Adat Istiadat</option>
                                                    <option value="alat musik">Alat Musik</option>
                                                    <option value="kesenian">Kesenian</option>
                                                    <option value="tradisi">Tradisi</option>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Isi <span class="required"></span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea class="col-md-7 col-xs-12" rows="6" name='isi_artikel'>
                                                    <?php echo $data->isi_artikel;?>
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal <span class="required"></span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" value="<?php echo date('Y-m-d'); ?>" name='tanggal' 
                                                maxlength='20' required="required" readonly class="form-control col-md-7 col-xs-12">
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
                                    <?php endforeach; ?>
                            </div>
                        </div>


                                </div>
                            </div>
                        </div>
                    </div>
</div>


<?php include('include/footers.php');?>