<?php include('include/header.php');?>
<div class="panel panel-default">
	<div class="panel-heading">
		<strong>Keterangan Soal</strong>
	</div>
	<div class="panel-body">
	 <form action="<?php echo base_url();?>admin/c_quiz/tambahsoalpost" method="POST">
			<div class="form-group">
				<label for="kategori">Kategori</label>
				<select class="form-control" name="kategori">
				<?php foreach ($kategori as $kategori) {?>
					<option value="<?php echo $kategori->id;?>"><?php echo $kategori->kategori_quiz;?></option>

				<?php }?>
				</select>
			</div>

			<div class="form-group">
				<label for="xp">XP</label>
				<input type="number" name="xp" class="form-control">
			</div>

			<div class="form-group">
				<label for="jawabanbenar">Opsi Pilihan Benar Untuk Soal Ini</label>
				<select class="form-control" name="jawabanbenar">
					<option value="A">A</option>
					<option value="B">B</option>
					<option value="C">C</option>
					<option value="D">D</option>
				</select>
			</div>
	</div>
	<div class="panel-footer">
		
</div>
</div>


<?php for ($b=1; $b <= $jumlah_lang ; $b++) { ?>
<div class="panel panel-default">
	<div class="panel-heading">
			<strong>
			<?php 
			$bahasanya = $b-1;
				echo $lang[$bahasanya]->language; 
			?>
			</strong>
	</div>
	<div class="panel-body">
	 <div class="form-group">
				<label for="soal<?php echo $b?>">Soal</label>
				<input type="text" name="soal<?php echo $b?>" class="form-control">
			</div>
			<div class="form-group">
				<div class="input-group">
			      <span class="input-group-addon">
			      	A
			      </span>
			      <input type="text" class="form-control" name="jawabana<?php echo $b?>">
			    </div><!-- /input-group -->
			</div>
			<div class="form-group">
				<div class="input-group">
			      <span class="input-group-addon">
			      	B
			      </span>
			      <input type="text" class="form-control" name="jawabanb<?php echo $b?>">
			    </div><!-- /input-group -->	
			</div>
			<div class="form-group">
				<div class="input-group">
			      <span class="input-group-addon">
			      	C
			      </span>
			      <input type="text" class="form-control" name="jawabanc<?php echo $b?>">
			    </div><!-- /input-group -->
			</div>
			<div class="form-group">
				<div class="input-group">
			      <span class="input-group-addon">
			      	D
			      </span>
			      <input type="text" class="form-control" name="jawaband<?php echo $b?>">
			    </div><!-- /input-group -->
			</div>

	</div>
	<div class="panel-footer">	

</div>
</div>
<?php } ?>

			<div class="form-group">
				<input type="submit" value="Submit" class="btn btn-success col-lg-12 col-md-12 col-sm-12 col-xs-12">
			</div>
		</form>
		<br><br>
<?php include('include/footer.php');?>