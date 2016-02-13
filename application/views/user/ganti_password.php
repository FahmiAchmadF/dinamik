<form action="<?php echo base_url();?>user/index/ganti_password/" method="POST">
	Username <input type="text" name="username" value="<?php echo $username;?>">
	Password <input type="text" name="password">
	<input type="submit" name="submit" value="Ubah">
</form>