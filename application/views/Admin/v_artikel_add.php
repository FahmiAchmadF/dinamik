<?php include('include/header.php');?>
<div class="panel panel-default">
    <div class="panel-heading">
        <strong>Tambah Artikel</strong>
    </div>
    <div class="panel-body">
        <form id="demo-form2" method="post" action="<?php echo base_url();?>admin/c_artikel/simpan" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
            <input type="hidden" name='id_admin' value="<?php echo $user['id_admin'];?>">
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Penulis <span class="required"></span>
                    </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="date-picker form-control col-md-7 col-xs-12"  maxlength='12'  required="required" readonly type="text" value="<?php echo $user['nama_depan']; echo ' '; echo $user['nama_belakang'];?>">
                        </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Provinsi</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="select2_single form-control" id="provinsi" required name='id_provinsi' onchange="prov(this.value)">
                            <?php
                            foreach ($provinsi as $provinsi) 
                            {
                                echo "<option value='".$provinsi->id."'>".$provinsi->provinsi."</option>";
                            }
                            ?>
                            </select>
                        </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Kategori</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="select2_single form-control" required name='id_kategori_forum'>
                            <?php
                            foreach ($kategori as $data) 
                            {
                                echo "<option value='".$data->id."'>".$data->kategori."</option>";
                            }
                            ?>
                            </select>
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
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Cover <span class="required"></span>
                    </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" name="userfile" id="preview_gambar" class="form-control col-md-7 col-xs-12" />
                        </div>
                </div>


    </div>
    <div class="panel-footer">
    </div>
    </div>

    <?php for ($b=1; $b <= $jumlah_lang ; $b++) { ?>
    <div class="panel panel-default">
        <div class="panel-heading">
                <strong>
                <?php 
                $bahasanya = $b-1;
                    echo $lang[$bahasanya]->language; 
                ?>
                </strong>
        </div>
        <div class="panel-body">
            <div class="form-group">
                    <label for="judul<?php echo $b; ?>">Judul <span class="required"></span>
                    </label>
                        
                         <input type="text" id="last-name" name='judul<?php echo $b ;?>' maxlength='225' required="required" class="form-control col-md-7 col-xs-12">
                        
            </div>
            
            <div class="form-group">
                    <label>Isi <span class="required"></span>
                    </label>
                        <textarea id="editor<?php echo $b; ?>" name="isi<?php echo $b ;?>">
                        </textarea>
            </div>
        
        </div>



        <div class="panel-footer"></div>
    </div>
    <?php }?>

    <div id="tampungan" class="panel panel-default"></div>            


                <div class="form-group">
                    <input type="submit" class="btn btn-success col-xs-12 col-sm-12 col-md-12 col-lg-12" value="Simpan">
                </div>
                <br><br><br>
        </form>

<script src="<?php echo base_url();?>asset/ckeditor/jquery/jQuery-2.1.4.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/ckeditor/ckeditor.js"></script>                                  
<script type="text/javascript">
    function prov(obj){
    

    var idprov = obj;
    
    var sel0 = $("#tampungan");
                sel0.empty();
    
    $.ajax({
            url:"<?=base_url()?>admin/c_artikel/ambillangprov/"+idprov, 
            type:'post',

            success: function(data) {
                
                var sel0 = $("#tampungan");
                sel0.empty();

                $('#tampungan').append(data);
                <?php $jml=$jumlah_lang+1?>
                CKEDITOR.replace('editor<?php echo $jml ?>');
                
            }

    });
  }
  
  $(function () {
        prov(1);
        <?php for ($ab=1; $ab <= $jumlah_lang ; $ab++) { ?>
            CKEDITOR.replace('editor<?php echo $ab;?>');
        <?php }?>


        
      });

  </script>

<?php include('include/footer.php');?>