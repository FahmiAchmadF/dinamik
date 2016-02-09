<?php include('include/header.php');?>
	

	<div class="panel panel-default">
		<div class="panel-heading"><strong>Daftar Quiz</strong></div>

			<div class="panel-body">
				<h2> <a href="<?php echo base_url();?>admin/c_quiz/tambahquiz" class="btn btn-success">Tambah</a> </h2>
				
					<?php

					
					
					echo "<table class='table table-hover' id='tabel'>
						<thead>
						<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Keterangan</th>
						<th>Kategori</th>
						<th colspan='2'>Aksi</th>
						</tr>
						</thead>
						<tbody>";
				 $no=1;
					foreach($kategori as $a){
						echo "
						<tr>
						<td>".$no."</td>
						<td>".$a->judul_quiz."</td>
						<td>".$a->keterangan."</td>
						<td>".$a->kategori_quiz."</td>
						<td><a href='".base_url()."admin/c_quiz/ubahquiz/".$a->id_quiz."' class='btn btn-info'>Ubah</a></td>
						<td><a href='".base_url()."admin/c_quiz/hapusquiz/".$a->id_quiz."' class='btn btn-danger'>Hapus</a></td>
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
        $('#tabel').dataTable({
       'bSort': false,
       'aoColumns': [
             { sWidth: "10%", bSearchable: false, bSortable: false },
             { sWidth: "20%", bSearchable: false, bSortable: false },
             { sWidth: "40%", bSearchable: false, bSortable: false },
             { sWidth: "10%", bSearchable: false, bSortable: false },
             { sWidth: "20%", bSearchable: false, bSortable: false }
       ],
       "scrollY":        "200px",
       "scrollCollapse": false,
       "info":           true,
       "paging":         true
   		});
      });
    </script>
    
<?php include('include/footer.php');?>