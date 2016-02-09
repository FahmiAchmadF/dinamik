<?php include('include/header.php');?>
    <div class="panel panel-default">
    <div class="panel-heading">
        <strong>Daftar Bahasa</strong>
    </div>
    <div class="panel-body">
    <h2> <a href="<?php echo base_url();?>admin/c_bahasa/tambah_bahasa" class="btn btn-success">Tambah</a> </h2>
        <table id="example" class="table table-striped responsive-utilities jambo_table">
            <thead>
                <th>No </th>
                <th>ID</th>
                <th>Bahasa</th>
                    <th class=" no-link last" colspan="2"><span class="nobr">Pilihan</span>
            </thead>
                <tbody>
                <?php
                    if(empty($list))
                    {
                    echo"
                    <td>  </td>
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
                            <td>".$data->id."</td>
                            <td>".$data->language."</td>
                            <td>
                            <a href='".base_url()."admin/c_bahasa/ubah_bahasa/".$data->id."'>
                            <button title='Lihat' class='btn btn-default'><i class='fa fa-dot-circle-o'></i></button>
                            </a>
                            <a href='".base_url()."admin/c_bahasa/hapus_bahasa/".$data->id."'>
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