<?php include('include/header.php');?>
<div class="panel panel-default">
	<div class="panel-heading">
		<strong>Daftar Kategori Quiz</strong>
	</div>
	<div class="panel-body">
	<h2> <a href="<?php echo base_url();?>admin/c_quiz/tambahkategori" class="btn btn-success">Tambah</a> </h2>

	<?php	
	echo "<table class='table table-hover'>
		<tr>
		<th>No</th>
		<th>ID</th>
		<th>Kategori</th>
		<th colspan='2'>Aksi</th>
		</tr>";
 $no=1;
	foreach($kategori as $a){
		echo "
		<tr>
		<td>".$no."</td>
		<td>".$a->id."</td>
		<td>".$a->kategori_quiz."</td>
		<td><a href='".base_url()."admin/c_quiz/ubahkategori/".$a->id."' class='btn btn-info'>Ubah</a></td>
		<td><a href='".base_url()."admin/c_quiz/hapuskategori/".$a->id."' class='btn btn-danger'>Hapus</a></td>
		</tr>";
		
	$no++;		
	}
	echo "</table>";
	?>

	<?php echo $this->pagination->create_links();?>
	</div>
	<div class="panel-footer">
		
	</div>
</div>
	
<?php include('include/footer.php');?>