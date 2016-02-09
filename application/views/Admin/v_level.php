<?php include('include/header.php');?>
	
	
	<div class="panel panel-default">
		<div class="panel-heading"><strong>Daftar level</strong></div>
			<div class="panel-body">
			<h2> <a href="<?php echo base_url();?>admin/c_level/tambah_level" class="btn btn-success">Tambah</a> </h2>
			
					<?php

					
					
					echo "<table id='tabel' class='table table-hover' >
						<thead>
						<tr>
						<th>No</th>
						<th>Level</th>
						<th>Batas XP</th>
						<th>Julukan</th>
						<th colspan='2'> Aksi </th>
						</tr>
						</thead>
						<tbody>";
				 $no=1;
					foreach($list as $a){
						echo "
						<tr>
						<td>".$no."</td>
						<td>".$a->level."</td>
						<td>".$a->batasxp."</td>
						<td>".$a->julukan."</td>
						<td>
							<a href='".base_url()."admin/c_level/ubah_level/".$a->id."'>
                            <button title='Lihat' class='btn btn-default'><i class='fa fa-dot-circle-o'></i></button>
                            </a>
                            <a href='".base_url()."admin/c_level/hapus_level/".$a->id."'>
                            <button title='Hapus' class='btn btn-default'><i class='fa fa-trash-o'></i></button>
                            </a>  
                        </td>
						</tr>";
						
					$no++;		
					}
					echo "
					</tbody>
					</table>";
					
					?>
			</div>

		<div class="panel-footer"></div>
	</div>


	<!-- DATA TABES SCRIPT -->
    <script src="<?php echo base_url();?>asset/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>asset/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(function () {
        $("#tabel").DataTable();
      });
    </script>
<?php include('include/footer.php');?>