<?php include('include/header.php');?>
    <div class="right_col" role="main">
        <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Data User <small>Smk Negeri 2 Cimahi</small></h2>                             
                                <div class="clearfix"></div>
                        </div>
                            <div class="x_content">
                                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                                        <thead>
                                            <th>No </th>
                                            <th>Username</th>
                                            <th>Nama</th>
                                            <th>email</th>
                                            <th class=" no-link last"><span class="nobr">Pilihan</span>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if(empty($data_user))
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
                                           foreach ($data_user as $data){
                                           echo "                                  
                                            <tr class='even pointer'>
                                                <td>".$no."</td>
                                                <td>".$data->username."</td>
                                                <td>".$data->nama_depan."</td>
                                                <td>".$data->email."</td>
                                                <td>
                                                    <a href='".$url."/lihat_user/".$data->id_user."'>
                                                        <button title='Lihat' class='btn btn-default'><i class='fa fa-dot-circle-o'></i></button>
                                                    </a>
                                                    <a href='".$url."/delete_user/".$data->id_user."'>
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
                        </div>

                        <br />
                        <br />
                        <br />
</div>
                    </div>
<?php include('include/footers.php');?>