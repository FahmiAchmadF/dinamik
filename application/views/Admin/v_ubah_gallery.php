<form action="<?php echo base_url();?>admin/c_gallery/ubah_simpan" method="POST" enctype="multipart/form-data">
<?php foreach ($data as $i): ?>	
<img src="<?php echo base_url().'images/gallery/'.$i->image;?>" id="gambar_nodin" width="220" height="280" alt="Preview Gambar"/>
	<input type="hidden" name="id_gallery" value="<?php echo $i->id_gallery;?>">
	<input type="hidden" name="photo" value="<?php echo $i->image;?>">
	Image<br>
	<input type="file" accept="image/*" name="userfile">
	Caption <br>
	<input type="text" name="caption" value="<?php echo $i->caption;?>">
	<br>
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
	<?php endforeach ?>
</form>