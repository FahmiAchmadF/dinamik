<?php include('include/header.php');?>
	

	<div class="panel panel-default">
		<div class="panel-heading"><strong>Daftar Quiz</strong></div>
			<div class="panel-body">
				<h2> <a href="<?php echo base_url();?>admin/c_quiz/tambahquiz" class="btn btn-success">Tambah</a> </h2>
					<?php		
					echo "
						<table id='example1' class='table table-bordered table-striped'>
						<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Keterangan</th>
						<th>Kategori</th>
						<th colspan='2'>Aksi</th>
						</tr>";
				 $no=1;
					foreach($kategori as $a){
						echo "
						<tr>
						<td>".$no."</td>
						<td>".$a->judul_quiz."</td>
						<td>".$a->keterangan."</td>
						<td>".$a->kategori_quiz."</td>
						<td><a href='".base_url()."admin/c_quiz/ubahquiz/".$a->id_quiz."' class='btn btn-info'>Ubah</a></td>
						<td><a href='".base_url()."admin/c_quiz/hapusquiz/".$a->id_quiz."' class='btn btn-danger'>Hapus</a></td>
						</tr>";
						
					$no++;		
					}
					echo "</table>";
					
					?>
			</div>

		<div class="panel-footer"></div>
	</div>
    
<?php include('include/footer.php');?>