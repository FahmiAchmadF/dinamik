<?php include('include/header.php');?>
	<div class="panel panel-default">
	<div class="panel-heading">
		<strong>Tambah Kategori Quiz</strong>
	</div>
	<div class="panel-body">
		<form method="POST" action="<?php echo base_url();?>admin/c_quiz/tambahkategoripost">
		
			<div class="form-group">
				<label for="kategori_quiz">Nama Kategori</label>
				<input type="text" name="kategori_quiz" class="form-control">
			</div>
		

		
		<div class="form-group">
			
			<input type="submit" value="Submit" class="btn btn-success">
		</div>
		</form>
	</div>
	<div class="panel-footer">
		
	</div>
</div>

<?php include('include/footer.php');?>