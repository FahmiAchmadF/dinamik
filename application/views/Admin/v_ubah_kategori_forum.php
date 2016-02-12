<?php include('include/header.php');?>
<div class="panel panel-default">
    <div class="panel-heading">
        <strong>Ubah Bahasa</strong>
    </div>
    <div class="panel-body">
        <form method="post" action="<?php echo base_url() . "admin/c_kategori_forum/ubah_simpan/". $id?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
        <?php foreach ($data as $data) { ?>
            <div class="form-group">
                <label for="bahasa" class="control-label col-md-3 col-sm-3 col-xs-12">Logo</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="hidden" name="id" value="<?php echo $data->id;?>">
                    <input type="hidden" name="photo" value="<?php echo $data->logo;?>">
                    <input type="file" accept="image/*" class="form-control col-md-7 col-xs-12" name="userfile">
                </div>
            </div>
        
            <div class="form-group">
                <label for="bahasa" class="control-label col-md-3 col-sm-3 col-xs-12">Kategori</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input class="form-control col-md-7 col-xs-12" type="text" name='kategori' value="<?php echo $data->kategori; ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <td>   <input type="submit" id="submit" value="Simpan"  name="simpan" class="btn btn-success"></td>
                </div>
            </div>
            
        <?php } ?>
        </form>
    </div>
    <div class="panel-footer">
    </div>                       
<?php include('include/footer.php');?>