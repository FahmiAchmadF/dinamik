
<?php include('include/header.php');?>
<div class="row">
            <div class="col-xs-4 col-xs-offset-4">

                <div class="box-header with-border">

                </div><!-- /.box-header -->
                <div class="box-body">
                  <?php if($pesan==1)
                  {
                    echo '
                    <div class="alert alert-danger alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h4><i class="icon fa fa-ban"></i> Peringatan!</h4>
                      Data berhasil di hapus.
                    </div>
                    ';
                                          

                  }
                  elseif($pesan==2)
                  {
                    echo '
                    <div class="alert alert-info alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h4><i class="icon fa fa-info"></i> Peringatan!</h4>
                      Data berhasil di ubah.
                    </div>
                    ';                  
                  }
                  elseif($pesan==3)
                  {
                    echo '
                    <div class="alert alert-success alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h4>  <i class="icon fa fa-check"></i> Peringatan!</h4>
                      Data berhasil di tambahkan.
                    </div>
                    ';                    
                  }
                  ?>
                </div>
              </div>
            </div>
        <section class="content-header">
          <h1>
            Daftar Gallery
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Gallery</li>
          </ol>
        </section>

    <div class="panel panel-default">
    <div class="panel-heading">
        <strong></strong>
    </div>
    <div class="panel-body">
    <h2> <a href="<?php echo base_url();?>admin/c_gallery/tambah" class="btn btn-success">Tambah </a></h2>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <th>No </th>
                <th>ID</th>
                <th>Caption</th>
                <th>Image</th>
                <th>Provinsi </th>
                <th class=" no-link last"><span class="nobr">Pilihan</span>
            </thead>
                <tbody>
                <?php
                    if(empty($data))
                    {
                    echo"
	                    <td> Data tidak ada </td>
                    ";
                    }
                    else
                    {
                    $no = 1;
                        foreach ($data as $i){
                            echo "                                  
                            <tr class='even pointer'>
                            <td>".$no."</td>
                            <td>".$i->id_gallery."</td>
                            <td>".$i->caption."</td>
                            <td>".$i->image."</td>
                            <td>".$i->provinsi."</td>
                            <td>
                            <a href='".base_url()."admin/c_gallery/ubah/".$i->id_gallery."'>
                            <button title='Ubah' class='btn btn-default'><i class='fa fa-dot-circle-o'></i></button>
                            </a>
                            <a href='".base_url()."admin/c_gallery/hapus/".$i->id_gallery."'>
                            <button title='Hapus' class='btn btn-default'><i class='fa fa-trash-o'></i></button>
                            </a>   
                            </td>
                            </tr>";
                            $no++;
                        } 
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
    </div>
    
<?php include('include/footer.php');?>