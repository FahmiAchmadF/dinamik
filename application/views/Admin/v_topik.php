<?php include('include/header.php');?>
    <div class="panel panel-default">
    <div class="panel-heading">
        <strong>Daftar Topik</strong>
    </div>
    <div class="panel-body">
        <table id="tabel" class="table table-striped responsive-utilities jambo_table">
                <thead>
                    <th>No </th>
                    <th>ID</th>
                    <th>User</th>
                    <th>Judul</th>
                    <th>Kategori Forum</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th class=" no-link last"><span class="nobr">Pilihan</span>
                </thead>
            <tbody>
            <?php
            if(empty($topik))
            {
            echo"
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td>Data Tidak Ada</td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
            ";
            }
            else
            {
            $no = 1;
                foreach ($topik as $data){
                echo "                                  
                <tr class='even pointer'>
                <td>".$no."</td>
                <td>".$data->id."</td>
                <td>".$data->username."</td>
                <td>".$data->judul."</td>
                <td>".$data->kategori."</td>
                <td>".$data->tanggal."</td>
                <td>".$data->status."</td>
                <td>
                <a href='".$url."c_topik/lihat_user/".$data->id."'>
                <button title='Lihat' class='btn btn-default'><i class='fa fa-dot-circle-o'></i></button>
                </a>
                <a href='".$url."delete_user/".$data->id."'>
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