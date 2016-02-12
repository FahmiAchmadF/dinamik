<?php include('include/header.php');?>
    <div id="demo" >
<div class="box" >
  <div class="container-1">
      <span class="icon"><img src="<?php echo base_url();?>assets_users/img/search icon.png"></span>
      <input type="search" id="search" placeholder="Cari Postingan,Kategori,Q&A" />
  </div>
</div>
</div>
<br>
<br>
   <div class="mainbar">
    <div class="columnsContainer2">
      <div class="leftColumn2">
      <div class="create-comment">
      <img class="img-valign" src="<?php echo base_url();?>assets_users/img/make-comment.png" alt="" />
          <span class="title-create-comment">Buat Balas Postingan </span>
      </div>
        <?php foreach ($lihat_artikel as $row):?>
      <div class="artikel-container">
        <p class="title-artikel"><?php echo $row->judul;?></p>
          <br>
        <img class="img-valign" src="<?php echo base_url();?>images/<?php echo $row->cover;?>" alt="" />
          <span class="non-data-text">Oleh </span><span class="data-text"><?php echo $row->nama_panggilan;?></span><span class="non-data-text"> » </span></span><span class="non-data-text">Senin 18 Februari 2015</span><img class="img-valign" src="img/reply-comment.png" alt="" align="right"/><span class="non-data-text-quote" style="float:right;margin-top:5px;margin-right:5px;">Balas Dengan Quote</span>
         <hr class="style3">
         <!-- ISI ARTIKEL -->
        <!-- <img src="<?php echo base_url();?>assets_users/img/header_bg.jpg" alt="" /> -->
        <br>
        <br>
        <p align="center"><?php echo $row->isi;?></p>
       </div>
      <?php endforeach; ?>

      <h2><span><?php echo count($lihat_komentar);?></span> Responses</h2>
          <div class="clr"></div>
          <?php 
          if(empty($lihat_komentar))
          {
            echo 'Tidak ada komentar'; 
          }
          else
          {
            foreach ($lihat_komentar as $data): 
          ?>
  <input type="hidden" value="<?php echo $data->id_user_komentar;?>">
          <div class="comment"> 
            <a href="#">
              <img src="images/userpic.gif" width="40" height="40" alt="" class="userpic" />
            </a>
            <p><a href="#"><?php echo $data->nama_panggilan_komentar;?></a> Says:<br />
              <?php echo $data->tanggal_komentar;?></p>
            <p><?php echo $data->isi_komentar;?></p>
          </div>
          <?php endforeach; }?>

      </div>
       <form  method="post" action="<?php echo base_url()."user/c_artikel/simpan_komen"?>" class="form-horizontal form-label-left">                                
        <input type="hidden" name="id_artikel" value="<?php echo $id_artikel;?>">
        <input type="hidden" name="id_user" value="<?php echo $user['id'];?>">
        <div class="article">
          <h2><span>Leave a</span> Reply</h2>
          <div class="clr"></div>
            <ol>
              <li>
                <label for="name">Name (required)</label>
                <input id="name" readonly name="name" value="<?php echo $user['nama_panggilan'];?>" class="text" />
              </li>
              <li>
                <label for="email">Email Address (required)</label>
                <input id="email" readonly name="email" class="text" value="<?php echo $user['email'];?>" />
              </li>
              <li>
                <label for="email">Tanggal</label>
                <input type="date" readonly value="<?php echo date('Y-m-d'); ?>" name='tanggal' class="text" />
              </li>
             
              <li>
                <label for="message">Komentar</label>
                <textarea id="message" name='isi_komentar' rows="8" cols="50"></textarea>
              </li>
              <li>
                <input type="submit" name="submit" id="imageField" src="<?php echo base_url();?>assets_users/images/submit.gif" class="send" />
                <div class="clr"></div>
              </li>
            </ol>
        </div>
    </form>


<!-- Side -->

      <div class="rightColumn2">
<!-- <a href="#" data-text="Buat Artikel" class="button-cate-hover">Buat Artikel</a> -->
<br>
<br>
<br>
<br>

<div class="content-sidebar">
        <p class="content-sidebar-title"><?php echo $this->artikel_populer;?></p>
          <br>
            <hr class="style2">
          <br>
     <?php foreach ($postingan_populer as $data):?>
        <p class="content-sidebar-content">
          <a href="<?php echo base_url();?>user/c_artikel/lihat_artikel/<?php echo $data->id_artikel;?>">
            <?php echo $data->judul;?>
          </a>
        </p>
          <hr class="style1">
       <?php endforeach;?>
      </div>
      <div class="content-sidebar" style="margin-top:10px;white-space: nowrap;">
        <p class="content-sidebar-title">
            <?php echo $this->berita_forum;?>
        </p>
          <br>
            <hr class="style2">
          <br>
        <?php foreach ($data_berita as $data):?>
          
          <p class="content-sidebar-content-2">
            <a href="<?php echo base_url();?>user/c_berita/lihat_berita/<?php echo $data->id_berita;?>">
              <?php echo $data->judul;?>
            </a>
          </p>
            <hr class="style1">
       <?php endforeach;?>
      </div>
   
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