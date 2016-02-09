<?php include('include/header.php');?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<strong>Tambah Quiz</strong>
		</div>
		<div class="panel-body">
			<form action="<?php echo base_url();?>admin/c_quiz/tambahquizpost" method="POST">
				<div class="form-group">
					<label for="judul">Judul</label>
					<input type="text" name="judul" class="form-control">
				</div>
				<div class="form-group">
					<label for="keterangan">Keterangan</label>
					<textarea name="keterangan" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<label for="kategori">Kategori</label>
						<select class="form-control" name="kategori" id="kategori" onchange="myFunction(this.value)">
						<option value="0">-----PILIH KATEGORI-----</option>
						<?php foreach ($kategori as $kategori) {?>
							<option value="<?php echo $kategori->id;?>"><?php echo $kategori->kategori_quiz;?></option>

						<?php }?>
						</select>
				</div>
				<div class="form-group">
                    <label for="tanggal">Tanggal <span class="required"></span>
                    </label>
                        <input type="date" value="<?php echo date('Y-m-d'); ?>" name='tanggal' 
                        maxlength='20' required="required" readonly class="form-control">
                        
                </div>

				<div class="form-group">
					<label for="soal1">Soal 1</label>
					<select class="form-control soal" name="soal1" id="select0">
						
					</select>
				</div>
				<div class="form-group">
					<label for="soal2">Soal 2</label>
					<select class="form-control" name="soal2" id="select1">
						
					</select>
				</div>
				<div class="form-group">
					<label for="soal3">Soal 3</label>
					<select class="form-control" name="soal3" id="select2">
						
					</select>
				</div>
				<div class="form-group">
					<label for="soal4">Soal 4</label>
					<select class="form-control" name="soal4" id="select3">
						
					</select>
				</div>
				<div class="form-group">
					<label for="soal5">Soal 5</label>
					<select class="form-control" name="soal5" id="select4">
						
					</select>
				</div>
				<div class="form-group">
					<ul id="finalResult"></ul>	
				</div>
				

				<div class="form-group">
					<input type="submit" class="btn btn-success" value="Submit">
				</div>
			</form>
		</div>
		<div class="panel-footer">
			
		</div>
	</div>

<script src="<?php echo base_url();?>asset/ckeditor/jquery/jQuery-2.1.4.min.js"></script>
<script type="text/javascript">
	function myFunction(obj)
  {
  	var idkategori = obj;

  	var sel0 = $("#select0");
			    sel0.empty();
			    var sel1 = $("#select1");
			    sel1.empty();	
            	var sel2 = $("#select2");
			    sel2.empty();
              	var sel3 = $("#select3");
			    sel3.empty();
			    var sel4 = $("#select4");
			    sel4.empty();

    $.ajax({
            url:"<?=base_url()?>admin/c_quiz/search_ajax/"+idkategori, 
            type:'post',
            dataType: 'json',
            success: function(data) {
            	
            	var sel0 = $("#select0");
			    sel0.empty();
			    var sel1 = $("#select1");
			    sel1.empty();	
            	var sel2 = $("#select2");
			    sel2.empty();
              	var sel3 = $("#select3");
			    sel3.empty();
			    var sel4 = $("#select4");
			    sel4.empty();

			    for (var i=0; i< data.length; i++) {
			    sel0.append('<option value="' + data[i].id + '">' + data[i].soal + '</option>');
			    sel1.append('<option value="' + data[i].id + '">' + data[i].soal + '</option>');
			    sel2.append('<option value="' + data[i].id + '">' + data[i].soal + '</option>');
			    sel3.append('<option value="' + data[i].id + '">' + data[i].soal + '</option>');
			    sel4.append('<option value="' + data[i].id + '">' + data[i].soal + '</option>');
			 	}
            }
    });
  }
</script>
<?php include('include/footer.php');?>