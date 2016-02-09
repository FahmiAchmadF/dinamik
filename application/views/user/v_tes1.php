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

                     <table border="3" class="table table-striped responsive-utilities jambo_table">
									<thead>
										<tr>
											<th>No</th>
											<th>Tahun Ajaran</th>
										</tr>
									</thead>
									<tbody>
										<?php
if(empty($data)){
	echo "
		<tr>
			<td colspan='2'>Data Tidak Ada</td>
		</tr>
	";
}else{
	$no = 1;
	foreach ($data as $data) {
		echo "
		<tr>
			<td>".$no."</td>
			<td><a href='".$url."/kadua/?ajaran=".$data['id_semester']."&siswa=".$data['id_siswa']."'>".$data['tahun_ajaran']." Semester ".$data['semester']."</a></td>
		</tr>
		";
		$no++;
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
                            </div>
<?php include('footer.php');?>