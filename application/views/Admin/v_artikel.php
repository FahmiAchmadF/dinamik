<?php include('include/header.php');?>
    <div class="panel panel-default">
    <div class="panel-heading">
        <strong>Daftar Artikel</strong>
    </div>
    <div class="panel-body">
    <h2> <a href="<?php echo base_url();?>admin/c_artikel/tambah_artikel" class="btn btn-success">Tambah</a> </h2>
    
        <div class="table-responsive">
        <table id="tabel" class="table table-striped responsive-utilities jambo_table">
            <thead>
                <th>No </th>
                <th>Kategori</th>
                <th>Judul</th>
                <th>Isi </th>
                <th>Bahasa </th>
                <th>Tanggal </th>
                    <th class=" no-link last"><span class="nobr">Pilihan</span>
            </thead>
                <tbody>
                <?php
                    if(empty($artikel))
                    {
                    echo"
                    <td>  </td>
                    <td>  </td>
                    <td>  </td>
                    <td> Data tidak ada </td>
                    <td> </td>
                    <td> </td>

                    ";
                    }
                    else
                    {
                    $no = 1;
                        foreach ($artikel as $data){
                            echo "                                  
                            <tr class='even pointer'>
                            <td>".$no."</td>
                            <td>".$data->kategori."</td>
                            <td>".$data->judul."</td>
                            <td>".$data->isi."</td>
                            <td>".$data->language."</td>
                            <td>".$data->tanggal."</td>
                            <td>
                            <a href='".$url."/c_artikel/ubah_artikel/".$data->id_artikel."'>
                            <button title='Lihat' class='btn btn-default'><i class='fa fa-dot-circle-o'></i></button>
                            </a>
                            <a href='".$url."/c_artikel/hapus_artikel/".$data->id_artikel."'>
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