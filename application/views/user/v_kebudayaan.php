<?php include('include/header.php');?> 
  <link rel="stylesheet" href="<?php echo base_url();?>assets_users/fajar/style/style.css">
<body>
 <?php include('include/menu.php');?>
<div id="header_bg">
<span class="header_font">Ayo</span>
    <div id="typed-strings" class="header_font">
        <p><span class="header_font_delay">Belajar</span></p>
        <p><span class="header_font_delay">Lestarikan</span></p>
        <p><span class="header_font_delay">Kembangkan!</span></p>
    </div>
    <span id="typed" style="white-space:pre;" ></span>
<span class="header_font">Budaya Indonesia</span>
<div class="header_info">
  Budaya Indonesia adalah seluruh kebudayaan nasional, kebudayaan lokal,<br> maupun kebudayaan asal asing yang telah ada di<br> Indonesia sebelum Indonesia merdeka pada tahun 1945.
</div>
    <a href="#popup1">
    <div class="button">
      <div class="submit"><h3 class="in">Masuk</h3></div>
      <div class="arrow">
        <div class="top line"></div>
        <div class="bottom line"></div>
    </div>
    </a>
</div>
<center>
  <div class="content_top_container">
    <p class="title_coloum">Ayo Berbudaya!</p>
    <p class="content_text">Ayo Lestarikan Budaya Indonesia.Kita disini Membantu Kamu dalam Hal Memberi Pengetahuan Tentang Budaya-Budaya Di Indonesia.
    </p>
    <p class="content_text">Dengan Menjadi Orang yang Berpengetahuan Tentang Budaya Kita Sudah Bisa Menjadi Warga Negara yang Bisa Menghargai dan Menghormati Bahwa Pentingnya Budaya Bagi Suatu Negara.
    </p>
  </div>
 </center>
 <div id="buttons" style="margin-top:100px;">
 <h1> Artikel </h1>
 <div id="buttons" style="margin-top:50px">
  <div class="butWrap">
    <?php foreach ($artikel as $data):?>
    <div class="butFrame" onclick="window.location='#'"><img src="<?php echo base_url();?>assets_users/fajar/img/jaipongan.jpg" />
      <div class="butTextWrap">
        <div class="butHeading"><?php echo $data->judul;?>
          <br />
          <div class="butText"><?php echo $data->provinsi;?></div>
        </div>
        <p>Pelajari Selengkapnya...</p>
      </div>
    </div>
  <?php endforeach;?>
   
</div>
</div>
</div>
<div class="container_quote">
  <div class="container">
    <div class="right">
      <div class="container-right">
      <img src="<?php echo base_url();?>assets_users/fajar/img/reog.png"><br><br>
        <p class="content_right">Kamu Harus Merasakan Budaya Untuk Memahaminya</p><br>
        <p class="content_right" style="text-align:right;">-Deborah Cater</p>
        </div>

    </div>
    <div class="left">
        <p class="title_left">Ayo Mulai Bergabung Sekarang Juga Untuk Bisa Mendapatkan Segala Akses Di Website ini Seperti :</p>
        </br>
        <ul class="custom-bullet culture">
        <li class="content_left">Kuis Interaktif</li>
        <li class="content_left">Tanya Jawab</li>
        <li class="content_left">Forum</li>
        <li class="content_left">Artikel</li>
    </ul>
    </div>
</div>
<center>
<div style="margin-top:200px;">
<h2> Berita </h2>
<div class="snipresponsive">
<?php foreach ($berita as $data):?>
<figure class="snip1208" >
  <img src="<?php echo base_url();?>assets_users/fajar/img/jaipongan.jpg" alt="Jaipongan"/>
  <div class="date"><span class="day">28</span><span class="month">Oct</span></div><i class="ion-film-marker"></i>
  <figcaption>
    <h3><?php echo $data->judul;?></h3>
    <?php echo $data->isi;?>
    <button>Selengkapnya</button>
  </figcaption><a href="#"></a>
</figure>
<?php endforeach;?>
</div>
</div>
</div>
</center>
<?php include('include/footers.php');?> 
