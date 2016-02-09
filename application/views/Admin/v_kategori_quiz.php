<?php include('include/header.php');?>
    <div class="panel panel-default">
    <div class="panel-heading">
        <strong>Daftar Kategori Quiz</strong>
    </div>
    <div class="panel-body">
    <h2> <a href="<?php echo base_url();?>admin/c_kategori_quiz/tambah_kategori_quiz" class="btn btn-success">Tambah</a> </h2>
        <table id="example" class="table table-striped responsive-utilities jambo_table">
            <thead>
                <th>No </th>
                <th>Nama Kategori Quiz</th>
                    <th class=" no-link last"><span class="nobr">Pilihan</span>
            </thead>
                <tbody>
                <?php
                    if(empty($list))
                    {
                    echo"
                    <td>  </td>
                    <td> Data tidak ada </td>

                    ";
                    }
                    else
                    {
                    $no = 1;
                        foreach ($list as $data){
                            echo "                                  
                            <tr class='even pointer'>
                            <td>".$no."</td>
                            <td>".$data->kategori_quiz."</td>
                            <td>
                            <a href='".base_url()."admin/c_kategori_quiz/ubah_kategori_quiz/".$data->id."'>
                            <button title='Lihat' class='btn btn-default'><i class='fa fa-dot-circle-o'></i></button>
                            </a>
                            <a href='".base_url()."admin/c_kategori_quiz/hapus_kategori_quiz/".$data->id."'>
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