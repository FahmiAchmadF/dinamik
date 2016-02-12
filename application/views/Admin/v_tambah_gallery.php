<form action="<?php echo base_url();?>admin/c_gallery/simpan" method="POST" enctype="multipart/form-data">
	Caption <br>
	<input type="text" name="caption">
	<br>
	Image<br>
	<input type="file" accept="image/*" name="userfile">
	<br>
	Provinsi 
	<select name="id_provinsi">
		<?php foreach ($provinsi as $p):?>
			<option value="<?php echo $p->id;?>"><?php echo $p->provinsi;?></option>
		<?php endforeach;?>
	</select>
	<br>
	<input type="submit" name="submit" value="Simpan">
	<input type="reset" name="batal" value="Batal">
</form>