<?php include('include/header.php');?>
    <div id="demo" >
<div class="box" >
  <div class="container-1">
      <span class="icon"><img src="img/search icon.png"></span>
      <input type="search" id="search" placeholder="Cari Postingan,Kategori,Q&A" />
  </div>
</div>
</div>
<br>
<br>
    <div class="row mt">
    <div class="large-12">
      <div class="large-12 forum-category rounded">
        <div class="large-8 small-10 column lpad">
          <?php echo $this->kategori_forum2;?> <?php echo $nama_kategori;?>
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
            <?php echo $this->komentar_forum2;?>
          </div>
          <div class="large-2 small-4 column lpad">
            <?php echo $this->pemulai_post_forum2;?>
          </div>
        </div>
                <?php
               if (count($topik_top)>0) 
               {                    
                 $no = 1;
                 foreach ($topik_top as $row):?>
               
        <div class="large-12 forum-topic">
          <div class="large-1 column lpad">
            <i class="icon-file"><img src="<?php echo base_url();?>assets_users/fajar/img/musical-notes.png"></i>
          </div>
          <div class="large-7 small-8 column lpad">
            <span class="overflow-control">
              <a href="<?php echo base_url();?>user/c_forum/tampil_topik/<?php echo $row->id_topik;?>"><?php echo $row->judul;?></a>
            </span>
            <span class="overflow-control">
              Lorem Ipsum Dolor Sit Amet!
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
                      <?php
                endforeach;
                }
                else
                { 
                  ?>
        <div class="large-12 forum-topic">
          <div class="large-1 column lpad">
          </div>
          <div class="large-7 small-8 column lpad">
<h2 align="center"> Data tidak ada </h2>
          </div>
          <div class="large-1 column lpad">

          </div>
          <div class="large-1 column lpad">

          </div>
          <div class="large-2 small-4 column pad">
          </div>
        </div>
                <?php
                }   
                ?>       
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