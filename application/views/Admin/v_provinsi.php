<?php include('include/header.php');?>
    <div class="panel panel-default">
    <div class="panel-heading">
        <strong>Daftar provinsi</strong>
    </div>
    <div class="panel-body">
    <h2> <a href="<?php echo base_url();?>admin/c_provinsi/tambah_provinsi" class="btn btn-success">Tambah</a> </h2>
        <table id="tabel" class="table table-striped responsive-utilities jambo_table">
            <thead>
                <th>No </th>
                <th>Nama Provinsi</th>
                <th>Bahasa</th>
                    <th class=" no-link last"><span class="nobr">Pilihan</span>
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
    </div>
    <div class="panel-footer">
    </div>

    <!-- DATA TABES SCRIPT -->
    <script src="<?php echo base_url();?>asset/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>asset/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(function () {
        $("#tabel").DataTable();
      });
    </script>
    
<?php include('include/footer.php');?>