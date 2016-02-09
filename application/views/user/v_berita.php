<!-- 
         
         echo '
        <div class="article">
          <h2><span>'.$row->judul.'</span></h2>
          <div class="clr"></div>
          <p>Posted on '.$row->tanggal.' by <b>'.$row->nama_panggilan.'</b> </p>
          <img src="<?php echo base_url();?>assets_users/images/img_1.jpg" width="613" height="179" alt="" />
          <div class="clr"></div>
          <p>'.$row->isi.'</p>
          <p> </p>
          <p><a href="'.base_url().'user/c_berita/lihat_berita/'.$row->id_berita.'">Read more </a></p>
        </div>
        ';
        endforeach;
        ?>
       -->


<?php include('include/header.php');?>
    <div id="demo" >
<div class="box" >
  <div class="container-1">
      <span class="icon"><img src="<?php echo base_url();?>assets_users/img/search icon.png"></span>
      <input type="search" id="search" placeholder="<?php echo $this->text_cari;?>" />
  </div>
</div>
</div>
<br>
<br>
    <div class="row mt">
    <div class="large-12">
      <div class="large-12 forum-category rounded">
        <div class="large-8 small-10 column lpad">
          <?php echo $this->kategori_forum;?>
        </div>
        <div class="large-4 small-2 column lpad ar">
          <a>
            <i class="icon-collapse-top"></i>
          </a>
        </div>
      </div>
      
      <div class="toggleview">
        <div class="large-12 forum-head">
          <div class="large-8 small-8 column lpad">
          <?php echo $this->berita_judul;?>
          </div>
          <div class="large-1 column lpad">
            &nbsp;
          </div>
          <div class="large-1 column lpad">
            <?php echo $this->komentar_forum2;?>
          </div>
          <div class="large-2 small-4 column lpad">
            <?php echo $this->pemulai_post_forum2;?>
          </div>
        </div>

<?php foreach ($berita as $data):?>               
        <div class="large-12 forum-topic">
          <div class="large-1 column lpad">
            <i class="icon-file"><img src="<?php echo base_url();?>assets_users/fajar/img/musical-notes.png"></i>
          </div>
          <div class="large-7 small-8 column lpad">
            <span class="overflow-control">
              <a href="<?php echo base_url();?>user/c_berita/lihat_berita/<?php echo $data->id_berita;?>"><?php echo $data->judul;?></a>
            </span>
            <span class="overflow-control">
              
            </span>
          </div>
          <div class="large-1 column lpad">

          </div>
          <div class="large-1 column lpad">
            <span class="center">285</span>
          </div>
          <div class="large-2 small-4 column pad">
            <span>
              <a href="#">Bermanfaat : 2</a>
            </span>
            <span>08-29-2013 7:29PM</span>
            <span>Oleh <a href="#">Nama User</a></span>
          </div>
        </div>
<?php endforeach;?>
      </div>
    </div>
  </div>
  
  

    <br>
<br>
<footer class="site-footer">
  &copy; Copyright Logic (2015/2016)
</footer>

</body>
</html>