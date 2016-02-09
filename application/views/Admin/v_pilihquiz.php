<?php include('include/header.php');?>
	

	<div class="panel panel-default">
		<div class="panel-heading"><strong>Daftar Quiz</strong></div>

			<div class="panel-body">
	
					<?php

					
					
					echo "<table class='table table-hover'>
						<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Keterangan</th>
						<th>Kategori</th>
						<th </th>
						</tr>";
				 $no=1;
					foreach($kategori as $a){
						echo "
						<tr>
						<td>".$no."</td>
						<td>".$a->judul_quiz."</td>
						<td>".$a->keterangan."</td>
						<td>".$a->kategori_quiz."</td>
						<td><a href='".base_url()."admin/c_quiz/jawab/".$a->id_quiz."' class='btn btn-info'>Jawab</a></td>
						</tr>";
						
					$no++;		
					}
					echo "</table>";
					
					echo $this->pagination->create_links();
					?>
			</div>

		<div class="panel-footer"></div>
	</div>
    
<?php include('include/footer.php');?>