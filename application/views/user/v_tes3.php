<?php include('header2.php');?>
<hr><br>
	 <div class="right_col" role="main">
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2 align="center">Data Nilai <small>Smk Negeri 2 Cimahi</small></h2>
                                    
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

			<div id="breadcrumb">

			</div>

<hr>
<br><br>
									
                                        <div class="container">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Siswa </label>
                                           <div class="col-md-6 col-sm-6 col-xs-12" align="center">
                                               <input type="text" disabled name='nama' class="form-control" value="<?php echo $nama; ?>">
                                            </div>
                                    

<br><br><br>
                                            <div class="blog_box1">
                            <?php   
    
        $satu = $tes1;
        $dua= $tes2;
        $tiga= $tes3;
        $empat= $tes4;
        $lima= $tes5;
        $enam= $tes6;
        $tujuh= $tes7;
        $delapan= $tes8;
        $sembilan= $tes9;
        $sepuluh= $tes10;
        $sebelas=$tes11;
        $duabelas=$tes12;
        // $sebelas= 'asaas';
     echo"   <table border='3' class='table table-striped responsive-utilities jambo_table'> <thead><tr></tr>
    ";       
        if(empty($tes1)){
        echo "                          
<tr>
                                      <th><h2 align='left'> No </h2> </th>
                                      <th> <h5 align='center'>Tes  </h5></th>
                                 </tr>
                                 <tr>
                                    </tr>"; 
                                }
        elseif(empty($dua)){
        echo "                                                              
<tr>
                                      <th><h2 align='left'> No </h2> </th>
                                      <th> <h5 align='center'>Tes 1 </h5></th>
                                      <th> <h5 align='center'>Rata-rata </h5></th>

                                 </tr>"; 
                                }
                                elseif(empty($tiga)){
        echo "                          
                                      <tr>
                                      <th><h4 align='left'> No </h4> </th>
                                      <th><h4 align='center'>Tes 1 </h4></th>
                                      <th><h4 align='center'>Tes 2 </h4></th>
                                      <th> <h4 align='center'>Rata-rata </h4></th>
                                 </tr>"; 
                                }
                               elseif(empty($empat)){
        echo "                          <tr>
                                      <th><h2 align='left'> No </h2> </th>
                                      <th><h5 align='center'>Tes 1 </h5></th>
                                      <th><h5 align='center'>Tes 2 </h5></th>
                                      <th><h5 align='center'>Tes 3 </h5></th>
                                      <th> <h5 align='center'>Rata-rata </h5></th>
                                 </tr>"; 
                                }
                                elseif(empty($lima)){
        echo "                          
<tr>
                                      <th><h2 align='left'> No </h2> </th>
                                      <th><h5 align='center'>Tes 1 </h5></th>
                                      <th><h5 align='center'>Tes 2 </h5></th>
                                      <th><h5 align='center'>Tes 3 </h5></th>
                                      <th><h5 align='center'>Tes 4 </h5></th>
                                      <th> <h5 align='center'>Rata-rata </h5></th>
                                 </tr>"; 
                                }
                              elseif(empty($enam)){
        echo "                          
                                    <tr>
                                      <th><h2 align='left'> No </h2> </th>
                                      <th><h5 align='center'>Tes 1 </h5></th>
                                      <th><h5 align='center'>Tes 2 </h5></th>
                                      <th><h5 align='center'>Tes 3 </h5></th>
                                      <th><h5 align='center'>Tes 4 </h5></th>
                                      <th><h5 align='center'>Tes 5 </h5></th>
                                      <th> <h5 align='center'>Rata-rata </h5></th>
                                 </tr>
                                    "; 
                                }
                               elseif(empty($tujuh)){
        echo "                          
                                    <tr>
                                      <th><h2 align='left'> No </h2> </th>
                                      <th><h5 align='center'>Tes 1 </h5></th>
                                      <th><h5 align='center'>Tes 2 </h5></th>
                                      <th><h5 align='center'>Tes 3 </h5></th>
                                      <th><h5 align='center'>Tes 4 </h5></th>
                                      <th><h5 align='center'>Tes 5 </h5></th>
                                      <th><h5 align='center'>Tes 6 </h5></th>
                                    <th> <h5 align='center'>Rata-rata </h5></th>
                                 </tr>
                                    "; 
                                }
                                elseif(empty($delapan)){
        echo "                          
        <tr>
                                      <th><h2 align='left'> No </h2> </th>
                                      <th><h5 align='center'>Tes 1 </h5></th>
                                      <th><h5 align='center'>Tes 2</h5></th>
                                      <th><h5 align='center'>Tes 3 </h5></th>
                                      <th><h5 align='center'>Tes 4 </h5></th>
                                      <th><h5 align='center'>Tes 5 </h5></th>
                                      <th><h5 align='center'>Tes 6 </h5></th>
                                      <th><h5 align='center'>Tes 7 </h5></th>
                                    <th> <h5 align='center'>Rata-rata </h5></th>
                                 </tr>
                                    "; 
                                }
                                elseif(empty($sembilan)){
        echo "                          
                                         <tr>
                                      <th><h2 align='left'> No </h2> </th>
                                      <th><h5 align='center'>Tes 1 </h5></th>
                                      <th><h5 align='center'>Tes 2</h5></th>
                                      <th><h5 align='center'>Tes 3 </h5></th>
                                      <th><h5 align='center'>Tes 4 </h5></th>
                                      <th><h5 align='center'>Tes 5 </h5></th>
                                      <th><h5 align='center'>Tes 6 </h5></th>
                                      <th><h5 align='center'>Tes 7 </h5></th>
                                      <th><h5 align='center'>Tes 8 </h5></th>
                                    <th> <h5 align='center'>Rata-rata </h5></th>


                                 </tr>   "; 
                                }
                                elseif(empty($sepuluh)){
        echo "                          
<tr>
                                      <th><h2 align='left'> No </h2> </th>
                                      <th><h5 align='center'>Tes 1 </h5></th>
                                      <th><h5 align='center'>Tes 2</h5></th>
                                      <th><h5 align='center'>Tes 3 </h5></th>
                                      <th><h5 align='center'>Tes 4 </h5></th>
                                      <th><h5 align='center'>Tes 5 </h5></th>
                                      <th><h5 align='center'>Tes 6 </h5></th>
                                      <th><h5 align='center'>Tes 7 </h5></th>
                                      <th><h5 align='center'>Tes 8 </h5></th>
                                      <th><h5 align='center'>Tes 9</h5></th>
                                      <th> <h5 align='center'>Rata-rata </h5></th>


                                 </tr>
                                    "; 
                                }
                                elseif(empty($sebelas)){
        echo "                          
<tr>
                                      <th><h2 align='left'> No </h2> </th>
                                      <th><h5 align='center'>Tes 1 </h5></th>
                                      <th><h5 align='center'>Tes 2</h5></th>
                                      <th><h5 align='center'>Tes 3 </h5></th>
                                      <th><h5 align='center'>Tes 4 </h5></th>
                                      <th><h5 align='center'>Tes 5 </h5></th>
                                      <th><h5 align='center'>Tes 6 </h5></th>
                                      <th><h5 align='center'>Tes 7 </h5></th>
                                      <th><h5 align='center'>Tes 8 </h5></th>
                                      <th><h5 align='center'>Tes 9</h5></th>
                                      <th><h5 align='center'>Tes 10 </h5></th>
<th> <h5 align='center'>Rata-rata </h5></th>

                                 </tr>
                                    "; 
                                }
                                                                elseif(empty($duabelas)){
        echo "                          
<tr>
                                      <th><h5 align='left'> No </h2> </th>
                                      <th><h5 align='center'>Tes 1 </h5></th>
                                      <th><h5 align='center'>Tes 2</h5></th>
                                      <th><h5 align='center'>Tes 3 </h5></th>
                                      <th><h5 align='center'>Tes 4 </h5></th>
                                      <th><h5 align='center'>Tes 5 </h5></th>
                                      <th><h5 align='center'>Tes 6 </h5></th>
                                      <th><h5 align='center'>Tes 7 </h5></th>
                                      <th><h5 align='center'>Tes 8</h5></th>
                                      <th><h5 align='center'>Tes 9 </h5></th>
                                      <th><h5 align='center'>Tes 10 </h5></th>
                                      <th><h5 align='center'>Tes 11 </h5></th>
                                      <th> Rata-rata </th>
                                 </tr>
                                    "; 
                                }

                                elseif(!empty($duabelas)){
        echo "                          
                                     <tr>
                                      <th><h2 align='left'> No </h2> </th>
                                      <th><h5 align='center'>Tes 1 </h5></th>
                                      <th><h5 align='center'>Tes 2</h5></th>
                                      <th><h5 align='center'>Tes 3 </h5></th>
                                      <th><h5 align='center'>Tes 4 </h5></th>
                                      <th><h5 align='center'>Tes 5 </h5></th>
                                      <th><h5 align='center'>Tes 6 </h5></th>
                                      <th><h5 align='center'>Tes 7 </h5></th>
                                      <th><h5 align='center'>Tes 8 </h5></th>
                                      <th><h5 align='center'>Tes 9 </h5></th>
                                      <th><h5 align='center'>Tes 10 </h5></th>
                                      <th><h5 align='center'>Tes 11 </h5></th>
                                      <th><h5 align='center'>Tes 12 </h5></th>
                                    <th> <h5 align='center'>Rata-rata </h5></th>
                                 </tr>"; 
                                }
                                echo"
                                 </thead>
                                    <tbody>";
                                

if(empty($data)){
  $no = 1;
        foreach ($siswa_kelas as $data){
echo "
                               
                                    <tr>
                                    <td><h5 align='center'>Kosong</h5></td>
                                    </tr>";
                            $no++;
                             }
    
}else{    
    $no = 1;
    
if(empty($satu)){

     foreach ($data as $row){
        $satu = $row['tes_1'];
        $dua= $row['tes_2'];
        $tiga= $row['tes_3'];
        $empat= $row['tes_4'];
        $lima= $row['tes_5'];
        $enam= $row['tes_6'];
        $tujuh= $row['tes_7'];
        $delapan= $row['tes_8'];
        $sembilan= $row['tes_9'];
        $sepuluh= $row['tes_10'];
        $sebelas=$row['tes_11'];
        $duabelas=$row['tes_12'];
        $tigabelas= 'asaas';
        $jumlah='12';
                              
              if(empty($satu)){
                                  echo"                              
                                    <tr>
                                    <td><h6 align='center'>Kosong</h6></td>
                                  </td>
                                    </tr>";
                                    $no++;
                             }
        elseif(empty($dua)){
                                  echo"                              
                                    <tr>
                                    <td>".$no."</td>
                                    <td><h6 align='center'>".$row['tes_1']."</h6></td>
                                    <td> <h5 align='center'>".$rata_rata."</h5> </td>
                                  </td>
                                    </tr>";
                                    $no++;
                             }
                             elseif(empty($tiga)){
                                  echo"                              
                                    <tr>
                                    <td>".$no."</td>
                                    <td><h6 align='center'>".$row['tes_1']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_2']."</h6></td>
                                    <td> <h5 align='center'>".$rata_rata."</h5> </td>
                                  </td>
                                    </tr>";
                                    $no++;
                             }
                             elseif(empty($empat)){
                                  echo"                              
                                    <tr>
                                    <td>".$no."</td>
                                    <td><h6 align='center'>".$row['tes_1']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_2']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_3']."</h6></td>
                                    <td> <h5 align='center'>".$rata_rata."</h5> </td>
                                  </td>
                                    </tr>";
                                    $no++;
                             }
                             elseif(empty($lima)){
                                  echo"                              
                                    <tr>
                                    <td>".$no."</td>
                                    <td><h6 align='center'>".$row['tes_1']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_2']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_3']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_4']."</h6></td>
                                    <td> <h5 align='center'>".$rata_rata."</h5> </td>
                                  </td>
                                    </tr>";
                                    $no++;
                             }
                                                          elseif(empty($enam)){
                                  echo"                              
                                    <tr>
                                    <td>".$no."</td>
                                    <td><h6 align='center'>".$row['tes_1']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_2']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_3']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_4']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_5']."</h6></td>
                                    <td> <h5 align='center'>".$rata_rata."</h5> </td>
                                  </td>
                                    </tr>";
                                    $no++;
                             }
                             elseif(empty($tujuh)){
                                  echo"                              
                                    <tr>
                                    <td>".$no."</td>
                                    <td><h6 align='center'>".$row['tes_1']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_2']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_3']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_4']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_5']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_6']."</h6></td>
                                    <td> <h5 align='center'>".$rata_rata."</h5> </td>
                                  </td>
                                    </tr>";
                                    $no++;
                             }

                             elseif(empty($delapan)){
                                  echo"                              
                                    <tr>
                                    <td>".$no."</td>
                                    <td><h6 align='center'>".$row['tes_1']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_2']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_3']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_4']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_5']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_6']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_7']."</h6></td>
                                    <td> <h5 align='center'>".$rata_rata."</h5> </td>

                                  </td>
                                    </tr>";
                                    $no++;
                             }

                             elseif(empty($sembilan)){
                                  echo"                              
                                    <tr>
                                    <td>".$no."</td>
                                    <td><h6 align='center'>".$row['tes_1']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_2']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_3']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_4']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_5']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_6']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_7']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_8']."</h6></td>
                                    <td> <h5 align='center'>".$rata_rata."</h5> </td>

                                  </td>
                                    </tr>";
                                    $no++;
                             }

                             elseif(empty($sepuluh)){
                                  echo"                              
                                    <tr>
                                    <td>".$no."</td>
                                    <td><h6 align='center'>".$row['tes_1']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_2']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_3']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_4']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_5']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_6']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_7']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_8']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_9']."</h6></td>
                                    <td> <h5 align='center'>".$rata_rata."</h5> </td>
                                  </td>
                                    </tr>";
                                    $no++;
                             }
                             elseif(empty($sebelas)){
                                  echo"                              
                                    <tr>
                                    <td>".$no."</td>
                                    <td><h6 align='center'>".$row['tes_1']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_2']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_3']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_4']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_5']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_6']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_7']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_8']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_9']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_10']."</h6></td>
                                    <td> <h5 align='center'>".$rata_rata."</h5> </td>
                                  </td>
                                    </tr>";
                                    $no++;
                             }
                             elseif(empty($duabelas)){
                                  echo"                              
                                    <tr>
                                    <td>".$no."</td>
                                    <td><h6 align='center'>".$row['tes_1']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_2']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_3']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_4']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_5']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_6']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_7']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_8']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_9']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_10']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_11']."</h6></td>
                                    <td> <h5 align='center'>".$rata_rata."</h5> </td>
                                  </td>
                                    </tr>";
                                    $no++;
                             }
                             elseif(!empty($duabelas)){
                              
                              // var_dump($rata_rata);
                              // exit();
                                  echo"                              
                                    <tr>
                                    <td>".$no."</td>
                                    <td><h6 align='center'>".$row['tes_1']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_2']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_3']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_4']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_5']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_6']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_7']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_8']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_9']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_10']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_11']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_12']."</h6></td>
                                    <td> <h5 align='center'>".$rata_rata."</h5> </td>
                                    </td>
                                    </tr>";
                                    $no++;
                             }
}
      } else{ 

        foreach ($data as $row){
        $satu = $row['tes_1'];
        $dua= $row['tes_2'];
        $tiga= $row['tes_3'];
        $empat= $row['tes_4'];
        $lima= $row['tes_5'];
        $enam= $row['tes_6'];
        $tujuh= $row['tes_7'];
        $delapan= $row['tes_8'];
        $sembilan= $row['tes_9'];
        $sepuluh= $row['tes_10'];
        $sebelas= 'asaas';
                              

        if(empty($satu)){

                                  echo"                              
                                    <tr>
                                    <td>".$no."</td>
                                    <td><h6 align='center'>Kosong</h6></td>
                                  </td>
                                    </tr>";
                                    $no++;
                             }
        elseif(empty($dua)){
          $h1=$row['tes_1'];

                              $rata_rata=$h1;
                                  echo"                              
                                    <tr>
                                    <td>".$no."</td>
                                    <td><h6 align='center'>".$row['tes_1']."</h6></td>
                                    <td> <h5 align='center'>".$rata_rata."</h5> </td>
                                  </td>
                                    </tr>";
                                    $no++;
                             }
                             elseif(empty($tiga)){

                              $h1=$row['tes_1'];
                              $h2=$row['tes_2'];
                              $total_nilai=$h1+$h2;
                              $jumlah_2='2';
                              $rata_rata = $total_nilai/$jumlah_2;
                                  echo"                              
                                    <tr>
                                    <td>".$no."</td>
                                    <td><h6 align='center'>".$row['tes_1']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_2']."</h6></td>
                                    <td><h5 align='center'>".$rata_rata."</h5></td>

                                  </td>
                                    </tr>";
                                    $no++;
                             }
                             elseif(empty($empat)){
                              $h1=$row['tes_1'];
                              $h2=$row['tes_2'];
                              $h3=$row['tes_3'];
                              $jumlah_3='3';
                              $total_nilai=$h1+$h2+$h3;
                              $rata_rata = $total_nilai/$jumlah_3;
                                  echo"                              
                                    <tr>
                                    <td>".$no."</td>
                                    <td><h6 align='center'>".$row['tes_1']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_2']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_3']."</h6></td>
                                    <td><h5 align='center'>".$rata_rata."</h5></td>
                                  </td>
                                    </tr>";
                                    $no++;
                             }
                             elseif(empty($lima)){
                              $h1=$row['tes_1'];
                              $h2=$row['tes_2'];
                              $h3=$row['tes_3'];
                              $h4=$row['tes_4'];
                              $jumlah_4='4';
                              $total_nilai=$h1+$h2+$h3+$h4;
                              $rata_rata = $total_nilai/$jumlah_4;
                                  echo"                              
                                    <tr>
                                    <td>".$no."</td>
                                    <td><h6 align='center'>".$row['tes_1']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_2']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_3']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_4']."</h6></td>
                                    <td> <h5 align='center'>".$rata_rata."</h5></td>
                                  </td>
                                    </tr>";
                                    $no++;
                             }
                                                          elseif(empty($enam)){
                                                            $h1=$row['tes_1'];
                              $h2=$row['tes_2'];
                              $h3=$row['tes_3'];
                              $h4=$row['tes_4'];
                              $h5=$row['tes_5'];
                              $jumlah_5='5';
                              $total_nilai=$h1+$h2+$h3+$h4+$h5;
                              $rata_rata = $total_nilai/$jumlah_5;
                                  echo"                              
                                    <tr>
                                    <td>".$no."</td>
                                    <td><h6 align='center'>".$row['tes_1']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_2']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_3']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_4']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_5']."</h6></td>
                                    <td><h5 align='center'>".$rata_rata."</h5></td>
                                  </td>
                                    </tr>";
                                    $no++;
                             }
                             elseif(empty($tujuh)){
                              $h1=$row['tes_1'];
                              $h2=$row['tes_2'];
                              $h3=$row['tes_3'];
                              $h4=$row['tes_4'];
                              $h5=$row['tes_5'];
                              $h6=$row['tes_6'];
                              $jumlah_6='6';
                              $total_nilai=$h1+$h2+$h3+$h4+$h5+$h6;
                              $rata_rata = $total_nilai/$jumlah_6;
                                  echo"                              
                                    <tr>
                                    <td>".$no."</td>
                                    <td><h6 align='center'>".$row['tes_1']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_2']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_3']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_4']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_5']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_6']."</h6></td>
                                    <td><h5 align='center'>".$rata_rata."</h5></td>

                                  </td>
                                    </tr>";
                                    $no++;
                             }

                             elseif(empty($delapan)){
                              $h1=$row['tes_1'];
                              $h2=$row['tes_2'];
                              $h3=$row['tes_3'];
                              $h4=$row['tes_4'];
                              $h5=$row['tes_5'];
                              $h6=$row['tes_6'];
                              $h7=$row['tes_7'];
                              $jumlah_7='7';
                              $total_nilai=$h1+$h2+$h3+$h4+$h5+$h6+$h7;
                              $rata_rata = $total_nilai/$jumlah_7;
                                  echo"                              
                                    <tr>
                                    <td>".$no."</td>
                                    <td><h6 align='center'>".$row['tes_1']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_2']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_3']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_4']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_5']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_6']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_7']."</h6></td>
                                    <td><h5 align='center'>".$rata_rata."</h5></td>

                                  </td>
                                    </tr>";
                                    $no++;
                             }

                             elseif(empty($sembilan)){
                              $h1=$row['tes_1'];
                              $h2=$row['tes_2'];
                              $h3=$row['tes_3'];
                              $h4=$row['tes_4'];
                              $h5=$row['tes_5'];
                              $h6=$row['tes_6'];
                              $h7=$row['tes_7'];
                              $h8=$row['tes_8'];
                              $jumlah_8='8';
                              $total_nilai=$h1+$h2+$h3+$h4+$h5+$h6+$h7+$h8;
                              $rata_rata = $total_nilai/$jumlah_8;
                                  echo"                              
                                    <tr>
                                    <td>".$no."</td>
                                    <td><h6 align='center'>".$row['tes_1']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_2']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_3']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_4']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_5']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_6']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_7']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_8']."</h6></td>
                                    <td><h5 align='center'>".$rata_rata."</h5></td>

                                  </td>
                                    </tr>";
                                    $no++;
                             }

                             elseif(empty($sepuluh)){
                              $h1=$row['tes_1'];
                              $h2=$row['tes_2'];
                              $h3=$row['tes_3'];
                              $h4=$row['tes_4'];
                              $h5=$row['tes_5'];
                              $h6=$row['tes_6'];
                              $h7=$row['tes_7'];
                              $h8=$row['tes_8'];
                              $h9=$row['tes_9'];
                              $jumlah_9='9';
                              $total_nilai=$h1+$h2+$h3+$h4+$h5+$h6+$h7+$h8+$h9;
                              $rata_rata = $total_nilai/$jumlah_9;
                                  echo"                              
                                    <tr>
                                    <td><h6 align='center'>".$row['tes_1']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_2']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_3']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_4']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_5']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_6']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_7']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_8']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_9']."</h6></td>
                                    <td><h5 align='center'>".$rata_rata."</h5></td>
                                  </td>
                                    </tr>";
                                    $no++;
                             }
                             elseif(empty($sebelas)){
                              $h1=$row['tes_1'];
                              $h2=$row['tes_2'];
                              $h3=$row['tes_3'];
                              $h4=$row['tes_4'];
                              $h5=$row['tes_5'];
                              $h6=$row['tes_6'];
                              $h7=$row['tes_7'];
                              $h8=$row['tes_8'];
                              $h9=$row['tes_9'];
                              $h10=$row['tes_10'];
                              $h11=$row['tes_11'];
                              $jumlah_10='10';
                              $total_nilai=$h1+$h2+$h3+$h4+$h5+$h6+$h7+$h8+$h9+$h10;
                              $rata_rata = $total_nilai/$jumlah_10;

                                  echo"                              
                                    <tr>
                                    <td>".$no."</td>
                                    <td><h6 align='center'>".$row['tes_1']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_2']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_3']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_4']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_5']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_6']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_7']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_8']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_9']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_10']."</h6></td>
                                    <td> <h5 align='center'>".$rata_rata."</h5></td>
                                  </td>
                                    </tr>";
                                    $no++;
                             }
                             elseif(empty($duabelas)){
                              $h1=$row['tes_1'];
                              $h2=$row['tes_2'];
                              $h3=$row['tes_3'];
                              $h4=$row['tes_4'];
                              $h5=$row['tes_5'];
                              $h6=$row['tes_6'];
                              $h7=$row['tes_7'];
                              $h8=$row['tes_8'];
                              $h9=$row['tes_9'];
                              $h10=$row['tes_10'];
                              $h11=$row['tes_11'];
                              $jumlah_11='11';
                              $total_nilai=$h1+$h2+$h3+$h4+$h5+$h6+$h7+$h8+$h9+$h10+$h11;
                              $rata_rata = $total_nilai/$jumlah_11;
                              
                                  echo"                              
                                    <tr>
                                    <td>".$no."</td>
                                    <td><h6 align='center'>".$row['tes_1']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_2']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_3']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_4']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_5']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_6']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_7']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_8']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_9']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_10']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_11']."</h6></td>
                                  <td> <h5 align='center'>".$rata_rata."</h5> </td>
                                  </td>
                                    </tr>";
                                    $no++;
                             }
                             elseif(!empty($duabelas)){
                              $h1=$row['tes_1'];
                              $h2=$row['tes_2'];
                              $h3=$row['tes_3'];
                              $h4=$row['tes_4'];
                              $h5=$row['tes_5'];
                              $h6=$row['tes_6'];
                              $h7=$row['tes_7'];
                              $h8=$row['tes_8'];
                              $h9=$row['tes_9'];
                              $h10=$row['tes_10'];
                              $h11=$row['tes_11'];
                              $h12=$row['tes_12'];
                              $jumlah_12='12';
                              $total_nilai=$h1+$h2+$h3+$h4+$h5+$h6+$h7+$h8+$h9+$h10+$h11+$h12;
                              $rata_rata = number_format($total_nilai/$jumlah_12,2);

                                  echo"                              
                                    <tr>
                                    <td>".$no."</td>
                                    <td><h6 align='center'>".$row['tes_1']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_2']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_3']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_4']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_5']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_6']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_7']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_8']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_9']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_10']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_11']."</h6></td>
                                    <td><h6 align='center'>".$row['tes_12']."</h6></td>
                                  <td> <h5 align='center'>".$rata_rata."</h5> </td>
                                    </tr>";
                                    $no++;
                             }

                            }
                         }
                            }?>                                 </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                                </div>
                            </div></div>
<?php include('footer.php');?>