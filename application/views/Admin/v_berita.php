<?php include('include/header.php');?>
    <div class="panel panel-default">
    <div class="panel-heading">
        <strong>Daftar Berita</strong>
    </div>
    <div class="panel-body">
    <h2> <a href="<?php echo base_url();?>admin/c_berita/tambah_berita" class="btn btn-success">Tambah</a> </h2>
        <table id="example" class="table table-striped responsive-utilities jambo_table">
            <thead>
                <th>No </th>
                <th>Judul</th>
                <th>Isi </th>
                <th>Tanggal </th>
                    <th class=" no-link last"><span class="nobr">Pilihan</span>
            </thead>
                <tbody>
                <?php
                    if(empty($berita))
                    {
                    echo"
                    <td>  </td>
                    <td> Data tidak ada </td>
                    <td> </td>
                    <td> </td>

                    ";
                    }
                    else
                    {
                    $no = 1;
                        foreach ($berita as $data){
                            echo "                                  
                            <tr class='even pointer'>
                            <td>".$no."</td>
                            <td>".$data->judul."</td>
                            <td>".$data->isi."</td>
                            <td>".$data->tanggal."</td>
                            <td>
                            <a href='".$url."/c_berita/ubah_berita/".$data->id_berita."'>
                            <button title='Lihat' class='btn btn-default'><i class='fa fa-dot-circle-o'></i></button>
                            </a>
                            <a href='".$url."/c_berita/hapus_berita/".$data->id_berita."'>
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