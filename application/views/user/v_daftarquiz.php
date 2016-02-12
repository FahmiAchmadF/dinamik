<?php include('include/header.php');?>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>

					<?php		
					echo "
						<table id='example1' class='table' border='2'>
						<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Keterangan</th>
						<th>Kategori</th>
						<th colspan='2'>Aksi</th>
						</tr>";
				 $no=1;
					foreach($kategori as $a){
						echo "
						<tr>
						<td>".$no."</td>
						<td>".$a->judul_quiz."</td>
						<td>".$a->keterangan."</td>
						<td>".$a->kategori_quiz."</td>
						<td><a href='".base_url()."user/c_quiz/jawab/".$a->id_quiz."' class='btn btn-info'>Jawab</a></td>
						</tr>";
						
					$no++;		
					}
					echo "</table>";
					
					?>
    
<footer class="site-footer">
  &copy; Copyright Logic (2015/2016)
</footer>

</body>
</html>