<?php include('include/header.php');?>
	

	<div class="panel panel-default">
		<div class="panel-heading"><strong>Daftar Quiz</strong></div>

			<div class="panel-body">
			<div id="hasil"></div>
					<form method="post" id="quiz_form">
						<?php $a=1;?>
						<?php foreach ($soalsoal as $soal) { ?>

							<div id="soal<?php echo $a?>" class="soal">
								<h2 id="soal<?php echo $a?>"><?php echo $soal->soal;?></h2>
									<input type="radio" value="A" id='radioa_<?php echo $a;?>' name='jawaban<?php echo $a;?>'>
									<label id='jawabanatext<?php echo $a;?>' for='jawaban<?php echo $a;?>'><?php echo $soal->jawaban_texta;?></label>
									<br/>
									<input type="radio" value="B" id='radiob_<?php echo $a;?>' name='jawaban<?php echo $a;?>'>
									<label id='jawabanbtext<?php echo $a?>' for='jawaban<?php echo $a;?>'><?php echo $soal->jawaban_textb;?></label>
									<br/>
									<input type="radio" value="C" id='radioc_<?php echo $a;?>' name='jawaban<?php echo $a;?>'>
									<label id='jawabanctext<?php echo $a;?>' for='jawaban<?php echo $a;?>'><?php echo $soal->jawaban_textc;?></label>
									<br/>
									<input type="radio" value="D" id='radiod_<?php echo $a;?>' name='jawaban<?php echo $a;?>'>
									<label id='jawabandtext<?php echo $a?>' for='jawaban<?php echo $a;?>'><?php echo $soal->jawaban_textd;?></label>
									<br/>
									
									<input type="radio" checked='checked' value="Z" style='display:none' id='radioz_<?php echo $a;?>' name='jawaban<?php echo $a;?>'>
									
									<br/>
									<input type="button" id='next<?php echo $a;?>' value='Selanjutnya!' name='soal' class='butt'/>
							</div>
							<?php $a++;?>
						<?php } ?>
					</form>
			</div>

		<div class="panel-footer"></div>
	</div>


<script src="<?php echo base_url();?>asset/ckeditor/jquery/jQuery-2.1.4.min.js"></script>
<script>
$(document).ready(function(){
	var steps = $('form').find(".soal");
	var count = steps.size();
	
	steps.each(function(i){
		
		hider=i+2;
		if (i == 0) { 	
    		$("#soal" + hider).hide();
    		createNextButton(i);
        }
		else if(count==i+1){
			var step=i + 1;
			//$("#next"+step).attr('type','submit');
            $("#next"+step).on('click',function(){

			   submit();

            });
	    }
		else{
			$("#soal" + hider).hide();
			createNextButton(i);
		}

	});
    function submit(){
    	var id = <?php echo $idquiznya;?> 
	     $.ajax({
						type: "POST",
						url: "<?=base_url()?>admin/c_quiz/quiz_ajax/"+id,
						data: $('form').serialize(),
						success: function(msg) {
						  $("#quiz_form").addClass("hide");
						  // alert(msg);
						  $('#hasil').show();
						  $('#hasil').append(msg);
						}
	     });

	}
	function createNextButton(i){
		var step = i + 1;
		var step1 = i + 2;
        $('#next'+step).on('click',function(){
        	$("#soal" + step).hide();
        	$("#soal" + step1).show();
        });
	}
});
</script>
<?php include('include/footer.php');?>