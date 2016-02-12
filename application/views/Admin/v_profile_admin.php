<?php include('include/header.php');?>
            <div class="right_col" role="main">
              <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                </div>
                                <div class="x_content">
                                    <br />
    <?php foreach ($profile_data as $sonice): ?>
                                    <form id="demo-form2"  method="post" action="<?php echo base_url() . "admin/c_profile_admin/update"?>" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                                             <div class="profile_pic">
                                                <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" name='gambar_dlt' value="<?php echo $sonice->photo; ?>"  type="hidden">
                                              <br>                                                                                                                                                 
<h3 style="margin-left:1%"> Hai <?php echo $sonice->nama_panggilan; ?>  </h3>
<hr style="display:block;margin-top:0.5em;margin-right:1%;border-style:solid;border-width:2px;border-color:#C8C8C8;"/>
<center><img src="<?php echo base_url().'images/'.$sonice->photo;?>" id="gambar_nodin" width="100%" height="400" alt="Preview Gambar" /></center>
<br />
<input class="btn btn-default" type="file" name="userfile" id="preview_gambar" />
                                     
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

                                           <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                            </div>

    

                                            <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                             <br>  <label>Username
                                            </label> <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name='dusername' value="<?php echo $sonice->username; ?>"  placeholder='Example : 0099090909090909'>
                                            </div>
                                            
                                             <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="hidden" name='did_admin' value="<?php echo $sonice->id_admin; ?>">
                                        
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                             <br>  <label>Password</label> <input id="middle-name" class="form-control col-md-7 col-xs-12" type="password" name="dpassword" value="<?php echo $sonice->password; ?>" maxlength='20'>
                                            </div>
                                        
                                            
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            <br><label> Nama Depan </label>    <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name='dnama_depan' value="<?php echo $sonice->nama_depan; ?>"  placeholder='Example : Soni'>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            <br><label> Nama Belakang</label>    <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name='dnama_belakang' value="<?php echo $sonice->nama_belakang; ?>"  placeholder='Example : Setiawan'>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            <br><label> Nama Panggilan </label>    <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name='dnama_panggilan' value="<?php echo $sonice->nama_panggilan; ?>"  placeholder='Example : Bedul'>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            
                                            <br><label>Jenis Kelamin</label><br>
                                             <div id="gender" class="btn-group" data-toggle="buttons">
                                                  <?php if ($sonice->jk == 'L'): ?>
                                                    <label class="btn btn-default active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default"> 
                                                        <input type='radio' name='djk' checked="checked" value="L">Laki-laki
                                                    </label>
                                                    <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                <input type='radio' name='djk' value="P">Perempuan
                                                <?php elseif ($sonice->jk == 'P'): ?>
                                                <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default"> 
                                                        <input type='radio' name='djk' value="L">Laki-laki
                                                    </label>
                                                    <label class="btn btn-default active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                <input type='radio' name='djk' checked="checked" value="P">Perempuan
                                                <?php else: ?>
                                                 <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default"> 
                                                        <input type='radio' name='djk' value="L">Laki-laki
                                                    </label>
                                                    <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                <input type='radio' name='djk' value="P">Perempuan
                                                <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                           <br> <label>Tempat Lahir</label>
                                                <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" value="<?php echo $sonice->tempat_lahir; ?>" type="text" name='dtempat_lahir'  placeholder='Example : Bandung'>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                           <br> <label>Tanggal Lahir</label>
                                                <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" value="<?php echo $sonice->tanggal_lahir; ?>" type="date" name='dtanggal_lahir' placeholder='Tempat lahir siswa'>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                          <br>  <label >Agama</label>
                                                <select class="select2_single form-control" name='dagama' value="<?php echo $sonice->agama; ?>"  tabindex="-1">
                                                  <?php if ($sonice->agama == 'islam'): ?>
                                                        <option value="islam" selected>Islam</option>
                                                        <option value="kristen">Kristen</option>
                                                        <option value="hindu">Hindu</option>
                                                        <option value="budha">Budha</option>
                                                        <option value="konghucu">Konghucu</option>
                                                    <?php elseif ($sonice->agama == 'kristen'): ?>
                                                        <option value="islam">Islam</option>
                                                        <option value="kristen" selected>Kristen</option>
                                                        <option value="hindu">Hindu</option>
                                                        <option value="budha">Budha</option>
                                                        <option value="konghucu">Konghucu</option>
                                                    <?php elseif ($sonice->agama == 'hindu'): ?>
                                                        <option value="islam">Islam</option>
                                                        <option value="kristen">Kristen</option>
                                                        <option value="hindu" selected>Hindu</option>
                                                        <option value="budha">Budha</option>
                                                        <option value="konghucu">Konghucu</option>
                                                    <?php elseif ($sonice->agama == 'budha'): ?>
                                                        <option value="islam">Islam</option>
                                                        <option value="kristen">Kristen</option>
                                                        <option value="hindu">Hindu</option>
                                                        <option value="budha" selected>Budha</option>
                                                        <option value="konghucu">Konghucu</option>
                                                    <?php elseif ($sonice->agama == 'konghucu'): ?>
                                                        <option value="islam">Islam</option>
                                                        <option value="kristen">Kristen</option>
                                                        <option value="hindu">Hindu</option>
                                                        <option value="budha">Budha</option>
                                                        <option value="konghucu" selected>Konghucu</option>
                                                    <?php else: ?>
                                                        <option value="islam">Islam</option>
                                                        <option value="kristen">Kristen</option>
                                                        <option value="hindu">Hindu</option>
                                                        <option value="budha">Budha</option>
                                                        <option value="konghucu">Konghucu</option>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                        
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                           <br> <label>No Telepon</label>
                                                <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" value="<?php echo $sonice->no_hp; ?>" name='dno_hp' maxlength='12'  placeholder='Example : 08978378381' required="required" type="text">
                                            </div>
                                         
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                           <br> <label>Email</label>
                                                <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" value="<?php echo $sonice->email; ?>" name='demail' maxlength='12'  placeholder='Example : example@gmail.com' required="required" type="text">
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                           <br> <label>Alamat
                                            </label>
                                                <textarea class="form-control" rows="3" name="dalamat"><?php echo $sonice->alamat; ?></textarea>
                                            </div>
                                        </div>
                                        <hr>                                                                                
                                </div>
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                             <table>       <td width="100"> </td>     <td>  <input type="reset" class="btn btn-primary" value="Batal"></td>
                                             <td>   <input type="submit" id="submit" value="Ubah"  name="dsubmit" class="btn btn-success"></td>
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