<?php include('include/header.php');?>
            <div class="right_col" role="main">
              <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                Konfirmasi Guru
                                </div>
                                <div class="x_content">
                                    <br />
                                                                        <?php foreach ($confirm as $sonice): ?>
                                    <form id="demo-form2"  method="post" action="<?php echo base_url() . "admin/c_confirm_guru/konfirmasi_simpan"?>" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                                             <div class="profile_pic">
                                                <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" name='gambar_dlt' value="<?php echo $sonice['photo']; ?>"  type="hidden">
                                              <br>                                                                                                                                                 
<hr style="display:block;margin-top:0.5em;margin-right:1%;border-style:solid;border-width:2px;border-color:#C8C8C8;"/>
<center><img src="<?php echo base_url().'images/'.$sonice['photo'];?>" id="gambar_nodin" width="100%" height="400" alt="Preview Gambar" /></center>
    <br />

                                     
    <script>

        function bacaGambar(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#gambar_nodin').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#preview_gambar").change(function(){
            bacaGambar(this);
        });
    </script>                                

                                           <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                            </div>

    

                                            <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                             <br>  <label>NIP
                                            </label> <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name='dnip' value="<?php echo $sonice['nip']; ?>">
                                            <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="hidden" name='id_guru' value="<?php echo $sonice['id_guru']; ?>">
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            <br><label> Nama </label>    <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name='dnama_guru' value="<?php echo $sonice['nama_guru']; ?>">
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                           <br> <label>Tempat Lahir</label>
                                                <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" value="<?php echo $sonice['tempat_lahir']; ?>" type="text" name='dtempat_lahir'  placeholder='Example : Bandung'>
                                            </div>
                                          
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                           <br> <label>Pendidikan Terakhir</label>
                                                <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" value="<?php echo $sonice['pendidikan_terakhir']; ?>" name='dpendidikan_terakhir' maxlength='20'  placeholder='Example : S1' required="required" type="text">
                                            </div>
                                        
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                           <br> <label>Jurusan </label>
                                                <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" value="<?php echo $sonice['jurusan']; ?>" name='djurusan' maxlength='12'  placeholder='Example : Sarjana Hukum' required="required" type="text">
                                            </div>
                                        
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                           <br> <label >Lulusan Akademik</label>
                                                <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" name='dlulusan_akademik' value="<?php echo $sonice['lulusan_akademik']; ?>" maxlength='12'  placeholder='Example : UPI' required="required" type="text">
                                            </div>
                                        
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                           <br> <label>No Telepon</label>
                                                <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" value="<?php echo $sonice['no_telepon'];?>" name='dno_telepon' maxlength='12'  placeholder='Example : 08978378381' required="required" type="text">
                                            </div>
                                        
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                           <br> <label>Alamat
                                            </label>
                                                <textarea class="form-control" rows="3" name="dalamat_lengkap"><?php echo $sonice['alamat']; ?></textarea>
                                            </div>
                                        </div>
                                        <hr>                                                                                
                                </div>
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                             <table>       <td width="100"> </td>     <td>  <input type="reset" class="btn btn-primary" value="Tolak"></td>
                                             <td>   <input type="submit" id="submit" value="Simpan"  name="dsubmit" class="btn btn-success"></td>
                                          </table>  </div>
                                        </div>
                                    </form>
<?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
              </div>
<?php include('include/footers.php');?>