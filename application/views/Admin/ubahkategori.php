<?php include('include/header.php');?>
	<div class="panel panel-default">
	<div class="panel-heading">
		<strong>Ubah Kategori Quiz</strong>
	</div>
	<div class="panel-body">
	<?php 
	foreach ($mydata as $mydata) {
		?>
	
		<form method="POST" action="<?php echo base_url();?>admin/c_quiz/ubahkategoripost/<?php echo $mydata->id;?>">
		<div class="form-group">
			<label for="kategori_quiz">Nama Kategori</label>
			
			<input type="text" name="kategori_quiz" class="form-control" value="<?php echo $mydata->kategori_quiz;?>">
		</div>

		
		<div class="form-group">
			
			<input type="submit" value="Submit" class="btn btn-success">
		</div>
		</form>
	<?php }?>
	</div>
	<div class="panel-footer">
		
	</div>
</div>
	
<?php include('include/footer.php');?>