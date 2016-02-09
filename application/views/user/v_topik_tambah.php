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
    <div class="columnsContainer2">
      <div class="leftColumn2">
<form action="<?php echo base_url();?>user/c_forum/simpan_topik" method="POST">
      <div class="container">
      <h1 class="title-create"><?php echo $this->buat_topik_baru;?></h1>
      <br>
      <h3><?php echo $this->penulis_forum;?> </h3>
      <input type="hidden" name='id_user' value="<?php echo $user['id'];?>">
      <input type="text" name="penulis" readonly value="<?php echo $user['nama_depan']; echo ' '; echo $user['nama_belakang'];?>"  placeholder="Judul Postingan" id="post-title">
      <input type="text" name="judul" placeholder="<?php echo $this->nama_postingan;?>" id="post-title">
      <input type="date" value="<?php echo date('Y-m-d'); ?>" name='tanggal' required="required" readonly>
      <span class="custom-dropdown custom-dropdown--tomato">
    <select class="custom-dropdown__select custom-dropdown__select--tomato" name='id_kategori_forum'>
        <option><?php echo $this->pilih_kategori;?></option>
          <?php
            foreach ($kategori as $data) 
            {
              echo "<option value='".$data->id."'>".$data->kategori."</option>";
            }
          ?>
    </select>
</span>
<br>
<br>
  <div class="row" style="margin-left:-1.5%;">
    <div class="col-sm-12" >

      <div class="form-group">
                    <label>Isi <span class="required"></span>
                    </label>
                        <textarea id="editortopik" name="isi">
                        </textarea>
            </div>
<!--       <textarea ></textarea> -->
      <input type="submit" name="submit" class="btn btn-success" value="<?php echo $this->buton_simpan;?>">
    </div>
  </div>
</div>
</form>


      </div>


<!-- Side -->
      <div class="rightColumn2">
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
          <div class="circle">12</div>
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
<footer class="site-footer" style="margin-top:10%;">
  &copy; Copyright Logic (2015/2016)
</footer>

<script src="<?php echo base_url();?>asset/ckeditor/jquery/jQuery-2.1.4.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
  
  $(function () {
            CKEDITOR.replace('editortopik');       
      });

  </script>
</body>
</html>