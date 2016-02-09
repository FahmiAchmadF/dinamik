<?php include('include/header.php');?>
<div class="panel panel-default">
    <div class="panel-heading">
        <strong>Tambah Level</strong>
    </div>
    <div class="panel-body">
        <form method="post" action="<?php echo base_url() . "admin/c_level/simpan"?>" class="form-horizontal form-label-left">
            <div class="form-group">
                <label for="level" class="control-label col-md-3 col-sm-3 col-xs-12">Level</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input class="form-control col-md-7 col-xs-12" type="text" name='level' value="<?php echo $autolevel; ?>" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="batasxp" class="control-label col-md-3 col-sm-3 col-xs-12">Batas XP</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input class="form-control col-md-7 col-xs-12" type="number" name='batasxp'>
                </div>
            </div>
            <div class="form-group">
                <label for="julukan" class="control-label col-md-3 col-sm-3 col-xs-12">Julukan</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input class="form-control col-md-7 col-xs-12" type="text" name='julukan'>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <input type="submit" value="Simpan"  name="simpan" class="btn btn-success">
                </div>
            </div>
        </form>
    </div>
    <div class="panel-footer">
    </div>                       
<?php include('include/footer.php');?>