 </section>

      </div>


	
	

<script src="<?php echo base_url();?>asset/ckeditor/jquery/jQuery-2.1.4.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/app.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/demo.js"></script>
<!-- DATA TABES SCRIPT -->
    <script src="<?php echo base_url();?>asset/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>asset/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
	<script type="text/javascript">
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
</body>
</html>