<?php include('include/header_provinsi.php');?>
<div id="title-header-jawa-tengah" class="slide header-slide">
<br>
  <span class="header_font"><?php echo $this->jateng_text1;?></span>
  <br><br>
<p class="jawabarat-index-content"><?php echo $this->jateng_text2;?></p>
</div>
<center>
    <div class="services">
      <div class="container">
        <div class="row">
          <div class="services-web text-center">
            <div class="col-md-4 col-lg-4">
              &nbsp;<img src="<?php echo base_url();?>assets_users/img/tribe.png">
              <br><br>
              <h4><?php echo $this->jateng_text3;?></h4>
              <p><?php echo $this->jateng_text6;?></p>
                
            </div>
          </div><!-- -->
          
          
          <div class="services-dev text-center">
            <div class="col-md-4 col-lg-4">
              &nbsp;<img src="<?php echo base_url();?>assets_users/img/culture.png">
              <br><br>
              <h4><?php echo $this->jateng_text4;?></h4>
              <p><?php echo $this->jateng_text7;?></p>
            </div>
          </div>
          <!--  -->
          
          
          <div class="services-sup text-center">
            <div class="col-md-4 col-lg-4">
              &nbsp;<img src="<?php echo base_url();?>assets_users/img/star-512.png">
              <br><br>
              <h4><?php echo $this->jateng_text5;?></h4>
              <p><?php echo $this->jateng_text8;?>.</p>
            </div>
          </div>
          <!-- -->
          
          
        </div>
      </div>
    </div>
    <!-- end services -->
  </center>
      <!-- end heading -->
      
      <div class="gallery clearfix">
        <?php foreach ($data_gallery as $data) { ?>
          
        
        <div class="gallery-inner">
          <img src="<?php echo base_url();?>images/gallery/<?php echo $data->image; ?>" alt="thumbnail" class="img-responsive" />
          <div class="caption">
            <div class="caption-heading visible-lg">
              <h4><?php echo $data->caption; ?></h4>
              
            </div>
            
          </div><!-- end caption -->
        </div><!-- end gallery-inner -->

        <?php } ?>
        
      </div><!-- end gallery -->
    </div>
    <!-- end latest-work -->

    <div class="call-to-action text-center">
    <center>
          <h2><?php echo $this->jateng_text9;?></h2>
    </center>
    </div>
    <!-- end call-to-action-->
      
        </div>
      </div>
    </div>
    <!-- end contact-info-->


    <div class="snipresponsive wow fadeInDown" style="margin-top:50px">
<?php foreach ($data_artikel as $data) { ?>
    <figure class="snip1158 red wow bounceInLeft">
      <img src="<?php echo base_url();?>images/<?php echo $data->cover;?>" alt="sample"/>
      <figcaption>
        <h2><?php echo $data->judul; ?></h2>
        <span><?php echo $data->isi; ?></span>
      </figcaption>
      <a href="<?php echo base_url();?>user/c_artikel/lihat_artikel/<?php echo $data->id_artikel;?>"></a>
    </figure>  
<?php } ?>    

</center>
</div>
</center>
<img src="<?php echo base_url();?>assets_users/img/footer-jawa-tengah.png" width="100%" style="margin-top:20px">
<footer class="site-footer" style="margin-bottom:-50px;border:1px #ab7c50 solid;">
  &copy; Copyright Logic (2015/2016)
</footer>
<div>
  <!---Form Login-->
   <div style="clear: both;visible:hidden;"></div>​
  <div id="popup1" class="overlay">
    <div class="tenth-login">
    <a href="#" class="close-button">&#10006;</a>   
      <h4 class="login">MASUK</h4>
      <form class="ten">
         <div class="fb"><a href="#"><span> </span> <lable>Masuk Dengan Facebook</lable><div class="clear"></div></a></div>
         <a class="close" href="#">&times;</a>
            <p>Atau<p>
        <li class="cream">
          <input type="text" class="text" placeholder="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" ><a href="#" class=" icon10 user10"></a>
        </li>
        <li class="cream">
          <input type="password" class="password"placeholder="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}"><a href="#" class=" icon10 lock10"></a>
        </li>
        <div class="submit-ten">
          <input type="submit" onclick="myFunction()" value="Masuk" > 
        </div>
      </form>
      <p class="or"><a href="#popup12" class="effect-underline">Daftar Akun</a><p>
</div>
</div>
<!---Form Register-->
   <div style="clear: both;"></div>​
  <div id="popup12" class="overlay">
    <div class="tenth-login" style="margin-top:110px">
    <a href="#" class="close-button">&#10006;</a>   
      <h4 class="login">DAFTAR</h4>
      <form class="ten">
         <div class="fb"><a href="#"><span> </span> <lable>Masuk Dengan Facebook</lable><div class="clear"></div></a></div>
         <a class="close" href="#">&times;</a>
        <li class="cream">
          <input type="text" class="text" placeholder="E-Mail" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" ><a href="#" class=" icon10 user10"></a>
        </li>
        <li class="cream">
          <input type="text" class="text" placeholder="Nama" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" ><a href="#" class=" icon10 user10"></a>
        </li>
        <li class="cream">
          <input type="password" class="password" placeholder="Password"><a href="#" class=" icon10 lock10"></a>
        </li>
        <li class="cream">
          <input type="password" class="password" placeholder="Ulangi-Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}"><a href="#" class=" icon10 lock10"></a>
        </li>
        <div class="submit-ten">
          <input type="submit" onclick="myFunction()" value="Daftar" > 
        </div>
      </form>
      <p class="or"><a href="#popup1" class="effect-underline">Masuk</a><p>
</div>
  <script src="<?php echo base_url();?>assets_users/dist/wow.js"></script>
  <script>
    wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100,
        callback:     function(box) {
          console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
        }
      }
    );
    wow.init();
    document.getElementById('moar').onclick = function() {
      var section = document.createElement('section');
      section.className = 'section--purple wow fadeInDown';
      this.parentNode.insertBefore(section, this);
    };
  </script>
</body>
</html>