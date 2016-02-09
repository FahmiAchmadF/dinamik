<?php include('include/header.php');?>
<div id="header_bg">
<span class="header_font"><?php echo $this->head_gambar;?></span>
    <div id="typed-strings" class="header_font">
        <p><span class="header_font_delay"><?php echo $this->head_gambar1;?></span></p>
        <p><span class="header_font_delay"><?php echo $this->head_gambar2;?></span></p>
        <p><span class="header_font_delay"><?php echo $this->head_gambar3;?>!</span></p>
    </div>
    <span id="typed" style="white-space:pre;" ></span>
<span class="header_font"><?php echo $this->head_gambar4;?></span>
<div class="header_info">
<?php echo $this->budaya_indonesia;?>
</div>


      <?php
        $session = $this->session->userdata('isLoginUser');
          if($session == FALSE){
            echo'
          <br>
    <a href="#popup1">
    <div>
    <div class="button">
      <div class="submit"><h3 class="in">'.$this->login.'</h3></div>
      <div class="arrow">
        <div class="top line"></div>
        <div class="bottom line"></div>
    </div>
    </div>
</div>
    </a>'; }
      else
        {
          echo'
      <br><br><br><br><br><br><br><br><br><br>
          ';}?>

<center>
  <div class="content_top_container">

    <p class="title_coloum"><?php echo $this->text_konten1;?></p>
    </p>
    <p class="content_text"><?php echo $this->text_konten3;?>
    </p>
  </div>
 <br><br><br>
<div class='container-introduction'>
 <?php foreach ($data_artikel as $data):?>  
  <div class='col4'>
    <div class='image-introduction'>
      <img alt='' height='213' src='<?php echo base_url();?>images/<?php echo $data->cover;?>' width='320'>
    </div>
    <div class='copy'>
    <a href="<?php echo base_url();?>user/c_artikel/lihat_artikel/<?php echo $data->id_artikel;?>">
      <h3 class="title-introduction"><?php echo $data->judul;?></h3>
      <p><?php echo $data->isi;?>.</p>
    </a>
    </div>
    <div class='clear'></div>
  </div>
<?php endforeach;?>


</div>
</center>
<p class="title_coloum" align="center" style="margin-top:50px;"><?php echo $this->artikel_kuis;?> </p>
 <div id="buttons" style="margin-top:50px;">
  <div class="butWrap">

 <?php foreach ($data_topik as $data):?>
    <div class="butFrame" onclick="window.location='#'"><img src="<?php echo base_url();?>assets_users/img/jaipongan.jpg" />
      <div class="butTextWrap">
        <div class="butHeading"><?php echo $data->judul;?>
          <br />
          <br />
          <div class="butText"><?php echo $data->isi;?></div>
        </div>
        <p>Pelajari Selengkapnya...</p>
      </div>
    </div>
  <?php endforeach;?>
</div>
 </div>
<div class="container_quote">
  <div class="container-index">
    <div class="right">
      <div class="container-right">
      <img src="<?php echo base_url();?>assets_users/img/reog.png"><br><br>
        <p class="content_right"><?php echo $this->text_bawah1;?></p><br>
        <p class="content_right" style="text-align:right;">-Deborah Cater</p>
      </div>
    </div>
    <div class="left">
        <p class="title_left"> <?php echo $this->text_bawah2;?></p>
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
<div class="snipresponsive">
 <?php foreach ($data_berita as $data):?>
<figure class="snip1208" >
  <img src="<?php echo base_url();?>images/<?php echo $data->cover;?>" alt="Jaipongan"/>
  <div class="date"><span class="day">28</span><span class="month">Oct</span></div><i class="ion-film-marker"></i>
  <figcaption>
    <h3><?php echo $data->judul;?></h3>
    <p>
      <?php echo $data->isi;?>
    </p>
    <button><?php echo $this->text_selengkapnya;?></button>
  </figcaption><a href="<?php echo base_url();?>user/c_berita/lihat_berita/<?php echo $data->id_berita;?>"></a>
</figure>
<?php endforeach;?>
</div>
</div>
</div>
</center>
<footer class="site-footer" style="margin-bottom:-50px;">
  &copy; Copyright Logic (2015/2016)
</footer>
<div>
  <!---Form Login-->
   <div style="clear: both;visible:hidden;"></div>​
  <div id="popup1" class="overlay">
    <div class="tenth-login">
    <a href="#" class="close-button">&#10006;</a>   
      <h4 class="login"><?php echo $this->login;?></h4>
      <form class="ten" action="<?php echo base_url();?>user/login/do_login" method="POST">
         <a class="close" href="#">&times;</a>
        <li class="cream">
          <input type="text" class="text" onKeyPress="return hurufangka(this, event)" maxlength="30"  name="username" placeholder="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" ><a href="#" class=" icon10 user10"></a>
        </li>
        <li class="cream">
          <input type="password" name="password" onKeyPress="return hurufangka(this, event)" maxlength="30" placeholder="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}"><a href="#" class=" icon10 lock10"></a>
        </li>
        <div class="submit-ten">
          <input type="submit" onclick="myFunction()" value="<?php echo $this->login;?>" > 
        </div>
      </form>
      <p class="or"><a href="#popup12" class="effect-underline"><?php echo $this->signup;?></a><p>
</div>
</div>
<!---Form Register-->
   <div style="clear: both;"></div>​
  <div id="popup12" class="overlay">
    <div class="tenth-login" style="margin-top:110px">
    <a href="#" class="close-button">&#10006;</a>   
      <h4 class="login">DAFTAR</h4>
      <form class="ten" action="<?php echo base_url();?>user/c_daftar/submit" method="POST">
         
         <a class="close" href="#">&times;</a>
        <li class="cream">
          <input type="text" name="username" onKeyPress="return hurufangka(this, event)" maxlength="30" class="text" placeholder="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" ><a href="#" class=" icon10 user10"></a>
        </li>
        <li class="cream">
          <input type="text" name="email" onKeyPress="return hurufangka(this, event)" maxlength="30" class="text" placeholder="E-Mail" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" ><a href="#" class=" icon10 user10"></a>
        </li>
<!--         <li class="cream">
          <input type="text" name="nama" class="text" placeholder="Nama" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Nama';}" ><a href="#" class=" icon10 user10"></a>
        </li> -->
        <li class="cream">
          <input type="password" placeholder="Password" onKeyPress="return hurufangka(this, event)" maxlength="30" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}"><a href="#" class=" icon10 lock10"></a>
        </li>
<!--         <li class="cream">
          <input type="password" placeholder="Ulangi-Password" onKeyPress="return hurufangka(this, event)" maxlength="30" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}"><a href="#" class=" icon10 lock10"></a>
        </li> -->
        <div class="submit-ten">
          <input type="submit" name="submit" onclick="myFunction()" value="Daftar" > 
        </div>
      </form>
      <p class="or"><a href="#popup1" class="effect-underline"><?php echo $this->login;?></a><p>
    </div>
</body>
</html>