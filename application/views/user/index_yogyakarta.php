<?php include('include/header_provinsi.php');?>
<div id="carousel">
    <div class="show" style="background-image:url(<?php echo base_url();?>assets_users/img/tugu.jpg)"></div>
    <div style="background-image:url(<?php echo base_url();?>assets_users/img/prambanan.jpg)"></div>
    <div style="background-image:url(<?php echo base_url();?>assets_users/img/borobudur.jpg)"></div>
    <div style="background-image:url(<?php echo base_url();?>assets_users/img/parang-tritis.jpg)"></div>
    <div style="background-image:url(<?php echo base_url();?>assets_users/img/budaya-yogya.jpg)"></div>
    <div style="background-image:url(<?php echo base_url();?>assets_users/img/rumah-adat-yogya.jpg)"></div>
    <div style="background-image:url(<?php echo base_url();?>assets_users/img/kraton-penjaga-yogya.jpg)"></div>
    <i id="left" class="glyphicon glyphicon-chevron-left" style="z-index:2; position:absolute;"></i>
    <i id="right" class="glyphicon glyphicon-chevron-right" style="z-index:2; position:absolute;"></i>

    <ul>
        <li class="showli"></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
<br>
<br>
<br>
<center>
<div class="yogya-container-index">
  <div class='col4'>
    <div class='image-introduction wow bounceLeft'>
      <img alt='' height='213' src='<?php echo base_url();?>assets_users/img/jogja-istimewa-8.jpg' width='320' class="wow bounceInLeft">
    </div>
    <div class='copy'>
      <h3 class="title-introduction wow fadeInDown"><?php echo $this->jawa_selamat_datang;?></h3>
      <hr class="yogya-line wow fadeInDown">
      <p class="wow fadeInDown"><?php echo $this->jawa_text1;?> </p>
    </div>
    <div class='clear'></div>
  </div>
</div>
<br>
<br>
<br>
<h3 class="title-introduction wow fadeInDown"><span style="display:inline-block;
    border-bottom:1px solid black;
    padding-bottom:4px;">Artikel Khusus Provinsi DIY</span></h3>
<div class="snipresponsive wow fadeInDown">
<?php foreach($data_artikel as $data) {?>
<figure class="snip1158 red wow bounceInLeft">
  <img src="<?php echo base_url();?>images/<?php echo $data->cover;?>" alt="sample21"/>
  <figcaption>
    <h2><?php echo $data->judul;?></h2>
    <span><?php echo $data->isi;?></span>
  </figcaption>
  <a href="<?php echo base_url();?>user/c_artikel/lihat_artikel/<?php echo $data->id_artikel;?>"></a>
</figure>
<?php } ?>

</center>
</div>
</div>
<img src="<?php echo base_url();?>assets_users/img/yogya-footer.png" width="100%" style="margin-top:20px">
<footer class="site-footer" style="margin-bottom:-50px;background-color:#ed184e;">
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
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
            $(function () {
            slider();
        });



        function slider() {
            var size = $("#carousel > div").length; //number of items in carousel
            var position = 0; // current position of carousal
            var sliderIntervalID; // used to clear autoplay
            var sliderInterval = 3500; // interval of autoplay
            var changeInterval = 1000; // interval between change of slides

            $("#carousel > div").not(".show").fadeOut(); //fadeout all items except the one with .show

            startSlider(); //starts autoplay

            // function to start auto play
            function startSlider() {
                sliderIntervalID = setInterval(function () {
                    run(1);
                }, sliderInterval);
            }

            // on mouseover stop the autoplay
            $("#carousel").mouseover(function () {
                clearInterval(sliderIntervalID);
            });
            // on mouseout starts the autoplay
            $("#carousel").mouseout(function () {
                startSlider();
            });

            //on right clicking the carousal
            $("#carousel > #right").click(function () {
                run(1);
            });


            //on left button click of the carousal
            $("#carousel > #left").click(function () {
                run(0);
            });


            //moves the slider back or forth based on x (1 = forward 0 = backward)
            function run(x) {
                position = $("#carousel").find(".show").index();
                if (x == 1)
                    ++position;
                else
                    --position;
                checker();
                changeCarousal(); //function call that actually changes slides
            }


            //just a function to reposition the slider when out of bounds
            function checker() {
                if (position >= size) {
                    position = 0;
                }
                else if (position < 0) {
                    position = size - 1;
                }
                //console.log(position);
            };


            //this changes the image and button selection
            function changeCarousal() {
                $("#carousel").find(".show").removeClass("show").fadeOut();
                $("#carousel > div").eq(position).fadeIn(changeInterval).addClass("show");
                $("#carousel > ul").find(".showli").removeClass("showli");
                $("#carousel > ul > li").eq(position).addClass("showli");
            }

            //when use clicks slider button
            $("#carousel > ul > li").click(function () {
                position = $(this).index();
                var temp = $("#carousel").find(".show").index();
                if (position != temp) {
                    changeCarousal();
                }
            });
        }

$(window).scroll(function () {
            var h = ($(this).scrollTop());
            $('#carousel > div').css({
                'transform': 'scale(' + (1 + h / 2000) + ') translateY(' + h / 8 + '%) rotateZ(-' + (h / 90) + 'deg)'
            });

            $('#carousel > i').css({
                'transform': 'translateY(' + h/2 + '%)'
            });
        });

    </script>
  <script src="dist/wow.js"></script>
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