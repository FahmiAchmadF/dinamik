<?php include('include/header.php');?>
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <a href="<?php echo site_url('admin/c_user');?>" class="btn btn-round btn-success"> Data User </a> 
                        <small>Smk Negeri 2 Cimahi</small>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                    <br />
                        <?php foreach ($lihat_user as $sonice): ?>
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url() . "index.php/con_update_siswa/update_id1"?>">
                       <div class="profile_pic">
                            <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" name='gambar_dlt' value="<?php echo $sonice->photo; ?>"  type="hidden">
                            <br>
                            <hr style="display:block;margin-top:0.5em;margin-right:1%;border-style:solid;border-width:2px;border-color:#C8C8C8;"/>
                            <center><img src="<?php echo base_url().'images/'.$sonice->photo;?>" id="gambar_nodin" width="100%" height="400" alt="Preview Gambar" /></center>
                            <br />
                       </div>
            
                        <div class="form-group">
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <br>
                             <label>Username
                             </label> <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="<?php echo $sonice->username; ?>">
                            </div>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                             <br>
                             <label>Nama
                             </label> <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="<?php echo $sonice->nama_depan; echo" "; echo $sonice->nama_belakang; ?>">
                            </div>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                             <br>
                             <label>Nama Panggilan
                             </label> <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="<?php echo $sonice->nama_panggilan; ?>">
                            </div>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                             <br>
                             <label>Email
                             </label> <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="<?php echo $sonice->email; ?>">
                            </div>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                             <br>
                             <label>No Hp
                             </label> <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="<?php echo $sonice->no_hp; ?>">
                            </div>
                        </div>
                        </form>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('include/footers.php');?>