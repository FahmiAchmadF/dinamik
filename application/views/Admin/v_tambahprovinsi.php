<?php include('include/header.php');?>
<div class="panel panel-default">
    <div class="panel-heading">
        <strong>Tambah Provinsi</strong>
    </div>
    <div class="panel-body">
        <form method="post" action="<?php echo base_url() . "admin/c_provinsi/simpan"?>" class="form-horizontal form-label-left">
            <div class="form-group">
                <label for="provinsi" class="control-label col-md-3 col-sm-3 col-xs-12">Provinsi</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="provinsi" class="form-control col-md-7 col-xs-12" type="text" name='provinsi'>
                </div>
            </div>
            <div class="form-group">
                <label for="bahasa" class="control-label col-md-3 col-sm-3 col-xs-12">Bahasa</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select class="form-control col-md-7 col-xs-12" name="bahasa">
                        <?php foreach ($bahasa as $bahasa) { ?>
                            <option value="<?php echo $bahasa->id; ?>"><?php echo $bahasa->language; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <td>   <input type="submit" id="submit" value="Simpan"  name="simpan" class="btn btn-success"></td>
                    </table>
                </div>
            </div>
        </form>
    </div>
    <div class="panel-footer">
    </div>                       
<?php include('include/footer.php');?>