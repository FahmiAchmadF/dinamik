<?php include('include/header.php');?>
        <section class="content-header">
          <h1>
            Daftar Provinsi
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
             <div class="box">
                <div class="box-header">
                  <!-- <h3 class="box-title"></h3> -->
                      <h4 align="right"> <a href="<?php echo base_url();?>admin/c_provinsi/tambah_provinsi" class="btn btn-success">Tambah</a> </h4>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                <th>No </th>
                <th>Nama Provinsi</th>
                <th>Bahasa</th>
                    <th class=" no-link last"><span class="nobr">Pilihan</span>
                      </tr>
                    </thead>
                    <tbody>
                  <?php
                    if(empty($list))
                    {
                    echo"
                    <td>  </td>
                    <td> Data tidak ada </td>
                    <td>  </td>
                    ";
                    }
                    else
                    {
                    $no = 1;
                        foreach ($list as $data){
                            echo "                                  
                            <tr class='even pointer'>
                            <td>".$no."</td>
                            <td>".$data->provinsi."</td>
                            <td>".$data->language."</td>
                            <td>
                            <a href='".base_url()."admin/c_provinsi/ubah_provinsi/".$data->id."'>
                            <button title='Lihat' class='btn btn-default'><i class='fa fa-dot-circle-o'></i></button>
                            </a>
                            <a href='".base_url()."admin/c_provinsi/hapus_provinsi/".$data->id."'>
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
                </div><!-- /.box-body -->
              </div><!-- /.box -->
             </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

<?php include('include/footer.php');?>