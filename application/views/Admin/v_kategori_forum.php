<?php include('include/header.php');?>
    <div class="panel panel-default">
    <div class="panel-heading">
        <strong>Tambah Kategori Quiz</strong>
    </div>
    <div class="panel-body">
    <h2> <a href="<?php echo base_url();?>admin/c_kategori_forum/tambah_kategori_forum" class="btn btn-success">Tambah</a> </h2>
        <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <th>No </th>
                    <th>Kategori</th>
                    <th class=" no-link last"><span class="nobr">Pilihan</span>
                </thead>
            <tbody>
            <?php
            if(empty($kategori_forum))
            {
            echo"
            <td>  </td>
            <td>  </td>
            <td> Data tidak ada </td>
            <td>  </td>
            <td> </td>
            ";
            }
            else
            {
            $no = 1;
                foreach ($kategori_forum as $data){
                echo "                                  
                <tr class='even pointer'>
                <td>".$no."</td>
                <td>".$data->kategori."</td>
                <td>
                <a href='".$url."c_kategori_forum/lihat_user/".$data->id."'>
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
<?php include('include/footer.php');?>