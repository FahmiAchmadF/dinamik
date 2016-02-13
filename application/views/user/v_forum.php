<!--         <div class="article">
          <h2 align="center"><span>Hot Topik</span></h2>
          <div class="clr"></div>
          <hr>
          <br>
              <?php
               if (count($topik_top)>0) 
               {                    
                 $no = 1;
                 foreach ($topik_top as $row):?>
                <a href="<?php echo base_url();?>user/c_forum/tampil_topik/<?php echo $row->id_topik;?>">
                <p> <b> <?php echo $row->judul;?> </b></p>
              <?php
                endforeach;
                }
                else
                { 
                  ?>
                <p align="center"> <b> <?php echo $data_kosong;?> </b></p>
                
                <?php
                }   
                ?>
        </div> -->
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
    <div class="columnsContainer">

      <div class="leftColumn">
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
            Forum
          </div>
          <div class="large-1 column lpad">
            &nbsp;
          </div>
          <div class="large-1 column lpad">
            &nbsp;
          </div>
          <div class="large-2 small-4 column lpad">
            <?php echo $this->post_last_forum;?>
          </div>
        </div>
        <?php
             foreach ($tampil_kategori_forum as $row):
         echo '
        <div class="large-12 forum-topic">
          <div class="large-1 column lpad">
            <i class="icon-file"><img src="img/musical-notes.png"></i>
          </div>
          <div class="large-7 small-8 column lpad">
            <span class="overflow-control">
              <a href="/kebudayaan_indonesia/user/c_forum/tampil_kategori/'.$row->id.'">'.$row->kategori.'</a>
            </span>
            <span class="overflow-control">
            </span>
          </div>
          <div class="large-1 column lpad">

          </div>
          <div class="large-1 column lpad">
            <span class="center"></span>
          </div>
          <div class="large-2 small-4 column pad">
            <span>
              <a href="#">Topik</a>
            </span>
            <span>08-29-2013 7:29PM</span>
            <span>Oleh <a href="#">Nama User</a></span>
          </div>
        </div>
        ';
                endforeach;
        ?>
     </div>
    </div>
  </div>
  

  
      </div>


<!-- Side -->
<div class="rightColumn2">
<a href="<?php echo base_url();?>user/c_forum/tambah_topik" data-text="<?php echo $this->buat_topik_forum;?>" class="button-cate-hover"><?php echo $this->buat_topik_forum;?></a>
<br>
<br>
<br>
<br>

<div class="content-sidebar">
        <p class="content-sidebar-title"><?php echo $this->posting_populer_forum;?></p>
          <br>
            <hr class="style2">
          <br>
     <?php foreach ($postingan_populer as $data):?>
        <p class="content-sidebar-content">
        <a href="<?php echo base_url();?>user/c_forum/tampil_topik/<?php echo $data->id_topik;?>">
        <?php echo $data->judul;?></a></p>
          <hr class="style1">
       <?php endforeach;?>
      </div>
      <div class="content-sidebar" style="margin-top:10px;white-space: nowrap;">
        <p class="content-sidebar-title"><?php echo $this->berita_forum;?></p>
          <br>
            <hr class="style2">
          <br>
        <?php foreach ($data_berita as $data):?>
          <p class="content-sidebar-content-2"><?php echo $data->judul;?></p>
            <hr class="style1">
       <?php endforeach;?>
      </div>
      </div>

    </div>
    <br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<footer class="site-footer">
  &copy; Copyright Logic (2015/2016)
</footer>

</body>
</html>