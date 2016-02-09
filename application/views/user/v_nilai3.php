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
         <br><br><br>         <br>


                                            <div class="blog_box1">
<br>
                              
									<?php 
      

if(empty($data)){
      echo "                          
                                <table border='3' class='table table-striped responsive-utilities jambo_table'>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Mata Pelajaran</th>
                                            <th>KKM </th>
                                            <th>Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    ";
    $no=1;
    foreach ($kelas_mapel as $row) {
echo "
<tr>
	<td>".$no.".</td>
    <td>".$row['nama_mapel']."</td>
    <td>".$row['kkm']."</td>
    <td>Kosong</td>
</tr>
	";
    $no++;
}
}else{

      echo "                          
                                <table border='3' class='table table-striped responsive-utilities jambo_table'>
                                    <thead>
                                        <tr>
                                            <th rowspan='2'>No</th>
                                            <th rowspan='2'>Mata Pelajaran</th>
                                            <th rowspan='2' align='left'>KKM </th>
                                            <th colspan='3'>Pengetahuan</th>
                                            <th colspan='3'> keterampilan </th>
                                            <th rowspan='2'> Sikap </th>

                                        </tr>
                                        <tr>
                                            <th>Nilai</th>
                                            <th>Angka</th>
                                            <th>Prefikat </th>
                                            <th>Nilai</th>
                                            <th>Angka</th>
                                            <th>Predikat </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    ";
	$no=1;
    echo" <h4 align='right'> ";

	foreach ($data as $data) {
		
        if($data['p_nilai'] < $data['kkm'])
        {
            echo "<tr>
            <td>".$no."</td>
            <td>".$data['nama_mapel']."</td>
            <td>".$data['kkm']."</td>
            <td><p style='color:red'>".$data['p_nilai']."</td>
            <td><p style='color:red'>".$data['p_angka']."</td>
            <td><p style='color:red'>".$data['p_predikat']."</td>
            <td><p style='color:red'>".$data['k_nilai']."</td>
            <td><p style='color:red'>".$data['k_angka']."</td>
            <td><p style='color:red'>".$data['k_predikat']."</td>
            <td><p style='color:red'>".$data['sikap']."</td>
                 </tr>
                    ";   
        $no++;
        }else
        {
            echo "<tr>
            <td>".$no."</td>
            <td>".$data['nama_mapel']."</td>
            <td>".$data['kkm']."</td>
            <td><p style='color:green'>".$data['p_nilai']."</td>
            <td><p style='color:green'>".$data['p_angka']."</td>
            <td><p style='color:green'>".$data['p_predikat']."</td>
            <td><p style='color:green'>".$data['k_nilai']."</td>
            <td><p style='color:green'>".$data['k_angka']."</td>
            <td><p style='color:green'>".$data['k_predikat']."</td>
            <td><p style='color:green'>".$data['sikap']."</td>
        </tr>
        ";
        $no++;
        }
			
		
	}
}
?>
									</tbody>
								</table>
						</div>
							</div><br>
						</div>
					</div>
		                                
                                </div>
                            </div>
<?php include('footer.php');?>