<?php include('include/header.php');?>
<div class="panel panel-default">
    <div class="panel-heading">
        <strong>Tambah Kategori Quiz</strong>
    </div>
    <div class="panel-body">
        <form method="post" action="<?php echo base_url() . "admin/c_kategori_forum/simpan_kategori_forum"?>" enctype="multipart/form-data" class="form-horizontal form-label-left">
            <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Logo <span class="required"></span>
                    </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" name="userfile" id="preview_gambar" class="form-control col-md-7 col-xs-12" />
                        </div>
                </div>
            <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Kategori</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="middle-name" onKeyPress="return hurufonly(this, event)" class="form-control col-md-7 col-xs-12" type="text" name='kategori' maxlength='25'>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <table>       <td width="100"> </td>     <td>  <input type="reset" class="btn btn-primary" value="Batal"></td>
                        <td>   <input type="submit" id="submit" value="Simpan"  name="simpan" class="btn btn-success"></td>
                    </table>
                </div>
            </div>
        </form>
    </div>
    <div class="panel-footer">
    </div>                       
<?php include('include/footer.php');?>