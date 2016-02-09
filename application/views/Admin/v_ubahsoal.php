<?php include('include/header.php');?>
<div class="panel panel-default">
	<div class="panel-heading">
		<strong>Keterangan Soal</strong>
	</div>
	<div class="panel-body">
	 <form action="<?php echo base_url();?>admin/c_quiz/ubahsoalpost/<?php echo $id;?>" method="POST">
	 <?php foreach ($isiantbsoal as $isian) { ?>
	 	
	 
			<div class="form-group">
				<label for="kategori">Kategori</label>
				<select class="form-control" name="kategori">
				<?php foreach ($kategori as $kategori) {?>
					<option value="<?php echo $kategori->id;?>" 
					<?php if($kategori->id == $isian->id_kategori){ echo 'selected="selected"'; }?>><?php echo $kategori->kategori_quiz;?></option>

				<?php }?>
				</select>
			</div>

			<div class="form-group">
				<label for="xp">XP</label>
				<input type="number" name="xp" class="form-control" value="<?php echo $isian->xp;?>">
			</div>

			<div class="form-group">
				<label for="jawabanbenar">Opsi Pilihan Benar Untuk Soal Ini</label>
				<select class="form-control" name="jawabanbenar">
					<option value="A" <?php if($isian->jawaban == 'A'){ echo 'selected="selected"'; }?>>A</option>
					<option value="B" <?php if($isian->jawaban == 'B'){ echo 'selected="selected"'; }?>>B</option>
					<option value="C" <?php if($isian->jawaban == 'C'){ echo 'selected="selected"'; }?>>C</option>
					<option value="D" <?php if($isian->jawaban == 'D'){ echo 'selected="selected"'; }?>>D</option>
				</select>
			</div>
	<?php } ?>
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
				<input type="text" name="soal<?php echo $b?>" class="form-control" value="<?php echo $isiantbsoallang[$bahasanya]->soal?>">
			</div>
			<div class="form-group">
				<div class="input-group">
			      <span class="input-group-addon">
			      	A
			      </span>
			      <input type="text" class="form-control" name="jawabana<?php echo $b?>" value="<?php echo $isiantbsoaljaw[$bahasanya]->jawaban_texta?>">
			    </div><!-- /input-group -->
			</div>
			<div class="form-group">
				<div class="input-group">
			      <span class="input-group-addon">
			      	B
			      </span>
			      <input type="text" class="form-control" name="jawabanb<?php echo $b?>" value="<?php echo $isiantbsoaljaw[$bahasanya]->jawaban_textb?>">
			    </div><!-- /input-group -->	
			</div>
			<div class="form-group">
				<div class="input-group">
			      <span class="input-group-addon">
			      	C
			      </span>
			      <input type="text" class="form-control" name="jawabanc<?php echo $b?>" value="<?php echo $isiantbsoaljaw[$bahasanya]->jawaban_textc?>">
			    </div><!-- /input-group -->
			</div>
			<div class="form-group">
				<div class="input-group">
			      <span class="input-group-addon">
			      	D
			      </span>
			      <input type="text" class="form-control" name="jawaband<?php echo $b?>" value="<?php echo $isiantbsoaljaw[$bahasanya]->jawaban_textd?>">
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