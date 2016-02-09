<?php include('include/header.php');?>
	

	<form id="comment" method="post">
		<div class="form-group">
			<label>Name: </label><input type="text" id="name" class="form-control" name="name"><br>				
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-default" value="Submit!">
		</div>
	</form>


	<div id="write"></div>


	<script src="<?php echo base_url();?>asset/ckeditor/jquery/jQuery-2.1.4.min.js"></script>
	<script type="text/javascript">
	$(function() {
		$("#comment").submit(function(){

			var name = $("#name").val();


			$.ajax({
				type:"POST",
				url: "<?php echo base_url();?>admin/c_ajax/buat",
				data: "name"+name,
				dataType: 'json',

				success: function(result) {
					$('#write').html(result.returnValue);
				},
				error: function(xhr, status, error) {
					alert('Error: '+ xhr.status + ' - ' + error);
				},
			});
			return false;
		});
	});
	</script>
<?php include('include/footer.php');?>