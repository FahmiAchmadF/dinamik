<?php include('include/header.php');?>
<div class="panel panel-default">
    <div class="panel-heading">
        <strong>Ubah Provinsi</strong>
    </div>
    <div class="panel-body">
        <form method="post" action="<?php echo base_url() . "admin/c_provinsi/ubah/". $id .""?>" class="form-horizontal form-label-left">
        <?php foreach ($data as $data) { ?>
            <div class="form-group">
                <label for="provinsi" class="control-label col-md-3 col-sm-3 col-xs-12">Provinsi</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="provinsi" class="form-control col-md-7 col-xs-12" type="text" name='provinsi' value="<?php echo $data->provinsi ?>">
                </div>
            </div>

        <?php } ?>

            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <td>   <input type="submit" id="submit" value="Simpan"  name="simpan" class="btn btn-success"></td>
                </div>
            </div>
        </form>
    </div>
    <div class="panel-footer">
    </div>                       
<?php include('include/footer.php');?>