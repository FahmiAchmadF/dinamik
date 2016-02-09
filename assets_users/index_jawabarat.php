
<html> <head>   <meta charset="UTF-8">   <link rel="stylesheet"
href="<?php echo base_url();?>assets_users/style/style.css">   
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
</script>   <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jq
uery.min.js"></script>   <meta name="viewport" content="width=device-width
,initial-scale=1">   <link rel="stylesheet" href="<?php echo base_url();?>assets_users/style/libs/animate.css">

    <script src="<?php echo base_url();?>assets_users/js/typed.js" type="text/javascript"></script>
    <link rel="icon" type="icon" href="<?php echo base_url();?>assets_users/img/logo.png" type="image/png">
	<title>Ayo Berbudaya</title>
  <script>

$(function () {
  $(".gallery li").on("mouseenter mouseleave", function(e){

/** the width and height of the current div **/
var w = $(this).width();
var h = $(this).height();

/** calculate the x and y to get an angle to the center of the div from that x and y. **/
/** gets the x value relative to the center of the DIV and "normalize" it **/
var x = (e.pageX - this.offsetLeft - (w/2)) * ( w > h ? (h/w) : 1 );
var y = (e.pageY - this.offsetTop  - (h/2)) * ( h > w ? (w/h) : 1 );

/** the angle and the direction from where the mouse came in/went out clockwise (TRBL=0123);**/
/** first calculate the angle of the point, 
 add 180 deg to get rid of the negative values
 divide by 90 to get the quadrant
 add 3 and do a modulo by 4  to shift the quadrants to a proper clockwise TRBL (top/right/bottom/left) **/
var direction = Math.round((((Math.atan2(y, x) * (180 / Math.PI)) + 180 ) / 90 ) + 3 )  % 4;

  

/** check for direction **/ 
switch(direction) {
 case 0:
  // direction top
  var slideFrom = {"top":"-100%", "right":"0"};
  var slideTo = {"top":0};

  var imgSlide = "0, 60";
 break;
 case 1: //
  // direction right
  var slideFrom = {"top":"0", "right":"-100%"};
  var slideTo = {"right":0};

  var imgSlide = "-60, 0";
 break;
 case 2:
  // direction bottom
  var slideFrom = {"top":"100%", "right":"0"};
  var slideTo = {"top":0};

  var imgSlide = "0, -60";
  break;
 case 3:
  // direction left
  var slideFrom = {"top":"0", "right":"100%"};
  var slideTo = {"right":0};

  var imgSlide = "60, 0";
 break;
}



    if( e.type === 'mouseenter' ) {

      var element = $(this);

      element.find(".info").removeClass("transform").css(slideFrom);
      element.find("img").addClass("transform").css("transform","matrix(1, 0, 0, 1,"+imgSlide+")");

      setTimeout(function(){
        element.find(".info").addClass("transform").css(slideTo);
      },1);


    }else {

      var element = $(this);

      element.find(".info").addClass("transform").css(slideFrom);
      element.find("img").removeClass("transform").css("transform","matrix(1, 0, 0, 1,"+imgSlide+")");

      setTimeout(function(){
        element.find("img").addClass("transform").css("transform","matrix(1, 0, 0, 1,0,0)");
      },1);

    }

});

});
  </script>
<script>
  /* Demo purposes only */
  $(".hover").mouseleave(
    function () {
      $(this).removeClass("hover");
    }
  );
</script>

</head>
<body>
<div class="fixed" style="z-index:99999;">
	<input type="checkbox" id="menuToggle">
	<label for="menuToggle" class="menu-icon"><div style="margin-top:-10px;"><h4>&#9776;</h4></div></label>
	<header>
		<div id="brnad">Ayo Berbudaya</div><span class="responsive">Abud</span>
    <div id="menu">Nama Pengguna <i class="fa fa-profile"><div class="circle-1">
  
  <img src="<?php echo base_url();?>assets_users/img/jaipongan.jpg" alt="Foto Profile" />
  
</div><span class="menu-arrow" style="margin-left:10px">&#9660;</span></i></div>
<div id="ddmenu">
<ul>
<li>Edit Akun <i class="fa fa-gear fa-profile"></i></li>
<li>Keluar <i class="fa fa-sign-out fa-profile"></i></li>
</ul> 
</div> 
    <script>
     $("#menu").click (function(){          if($("#ddmenu").hasClass("animationclas"))
          {            $("#ddmenu").removeClass("animationclas").addClass("removeanimation");
          }
          else
          {          $("#ddmenu").removeClass("removeanimation").addClass("animationclas");
          }
         });
    </script>
	</header>
	<nav class="menu" id="primary_nav_wrap">
    <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">Menu</a></li>
          <li><a href="#">Categories <span class="menu-arrow"><img src="img/keyboard53.png"></span></a>
               <ul>
               <li><a href="#">Dropdown</a></li>
               <li><a href="#">Dropdown</a></li>
               <li><a href="#">Dropdown</a></li>
               <li><a href="#">Dropdown</a></li>
               </ul>
          </li>
          <li><a href="#">Forum <span class="menu-arrow"><img src="img/keyboard53.png"></span></a>
               <ul>
               <li><a href="#">Dropdown</a></li>
               <li><a href="#">Dropdown</a></li>
               <li><a href="#">Dropdown</a></li>
               <li><a href="#">Dropdown</a></li>
               </ul>
          </li>
          <li><a href="#">Test</a></li>
     </ul>
	</nav>
</div>
<div class="parallax jw1 hero" data-parallax-speed="1">
  <div class="hero-content">
    <h1 style="margin-top:100px;">Jawa Barat,Indonesia</h1>
    <p>Gemah Ripah Repeh Rapih</p>
    <br>
  </div>
</div>

<div class="cleft-wrapper">
  <div class="cleft-left"></div>
  <div class="cleft-right"></div>
</div>

<div class="spacer">
  <div class="container-jawabarat">
      <center>
    <p class="jawabarat-index">Tentang Jawa Barat</p>
    <div class="line-jawabarat"></div>
<div class="container-jawabarat-index">

<div class="gallery-item">
<h1><i class="fa fa-leaf"></i></h1>
<p>Memiliki Taman Nasional,Suaka Margasatwa dan Cagar Alam.</p>
</div>

<div class="gallery-item">
<h1><i class="fa fa-line-chart"></i></h1>
<p>Budaya di Provinsi Jawa Barat banyak dipengaruhi oleh Budaya Sunda.</p>
</div>

<div class="gallery-item">
<h1><i class="fa fa-users"></i></h1>
<p>Jawa Barat melahirkan seni dan Budaya yang beraneka ragam, budaya tersebut adalah budaya asli orang jawa barat.</p>
</div>

<div class="gallery-item">
<h1><i class="fa fa-map-marker"></i></h1>
<p>Pengembangan Budaya Lokal dan Menjadi Destinasi Wisata DUNIA.</p>
</div>
    <p class="jawabarat-index-content">Jawa Barat adalah provinsi dengan penduduk terbanyak, yakni 45.340.800 Jiwa
serta memiliki potensi pariwisata dan budaya yang sangat kaya.</p>
</center>
  </div>
</div>

<div class="carrotBox">
  <div class="carrot"></div>
</div>

<div class="parallax jw2" data-parallax-speed="1">
  <div class="parallax-content">
    <h1>Bonjour, Paris</h1>
    <p>This is parallax element two.</p>
  </div>
</div>

<div class="cleft-wrapper">
  <div class="cleft-left"></div>
  <div class="cleft-right"></div>
</div>

<div class="spacer tallSpacer">
  <div class="container">
  <center>
    <p class="jawabarat-index">Galeri Jawa Barat</p>
    <div class="line-jawabarat"></div>
<div class="gallery">
      <ul>
        <li>
                <img src="<?php echo base_url();?>assets_users/img/jaipongan.jpg" alt="" />
                <div class="info"><h1 class="title">Jaipongan</h1></div>
        </li>
        <li>
                <img src="<?php echo base_url();?>assets_users/img/jaipongan.jpg" alt="" />
                <div class="info"><h1 class="title">Jaipongan</h1></div>
        </li>
        <li>
                <img src="<?php echo base_url();?>assets_users/img/jaipongan.jpg" alt="" />
                <div class="info"><h1 class="title">Jaipongan</h1></div>
        </li>
        <li>

                 <img src="<?php echo base_url();?>assets_users/img/jaipongan.jpg" alt="" />
                 <div class="info"><h1 class="title">Jaipongan</h1></div>
        </li>
        <li>
                <img src="<?php echo base_url();?>assets_users/img/jaipongan.jpg" alt="" />
                <div class="info"><h1 class="title">Jaipongan</h1></div>
        </li>
        <li>
                 <img src="<?php echo base_url();?>assets_users/img/jaipongan.jpg" alt="" />
                 <div class="info"><h1 class="title">Jaipongan</h1></div>
        </li>
        <li>
                 <img src="<?php echo base_url();?>assets_users/img/jaipongan.jpg" alt="" />
                 <div class="info"><h1 class="title">Jaipongan</h1></div>
        </li>
        <li>
                 <img src="<?php echo base_url();?>assets_users/img/jaipongan.jpg" alt="" />
                 <div class="info"><h1 class="title">Jaipongan</h1></div>
        </li>
      </ul>
    </div><!-- .gallery -->
<br><br><br><br><br><br>
    </center>
  </div>
</div>

<div class="carrotBox">
  <div class="carrot"></div>
</div>

<div class="parallax jw3" data-parallax-speed="1">
  <div class="parallax-content">
    <h1>Jawa Barat Maju dan Sejahtera Untuk Semua</h1>
  </div>
</div>

<div class="cleft-wrapper">
  <div class="cleft-left"></div>
  <div class="cleft-right"></div>
</div>

<div class="cleft-wrapper">
  <div class="cleft-left"></div>
  <div class="cleft-right"></div>
</div>

<div class="spacer">
  <div class="container">
  <center>
        <p class="jawabarat-index">Artikel Dan Kuis Jawa Barat</p>
    <div class="line-jawabarat"></div>
  </center>
    <div class="snipresponsive wow fadeInDown">
<figure class="snip1158 red wow bounceInLeft">
  <img src="<?php echo base_url();?>assets_users/img/jaipongan.jpg" alt="sample21"/>
  <figcaption>
    <h2>Tari Golek Menak</h2>
    <span>Tarian</span>
  </figcaption>
  <a href="#"></a>
</figure>
<figure class="snip1158 yellow wow fadeInDown">
  <img src="<?php echo base_url();?>assets_users/img/jaipongan.jpg" alt="sample68"/>
  <figcaption>
    <h2>Tari Golek Menak</h2>
    <span>Tarian</span>
  </figcaption>
  <a href="#"></a>
</figure>
<figure class="snip1158 blue wow bounceInRight">
  <img src="<?php echo base_url();?>assets_users/img/jaipongan.jpg" alt="sample17"/>
  <figcaption>
    <h2>Tari Golek Menak</h2>
    <span>Tarian</span>
  </figcaption>
  <a href="#"></a>
</figure>
<br>
<figure class="snip1158 red wow bounceInLeft">
  <img src="<?php echo base_url();?>assets_users/img/jaipongan.jpg" alt="sample21"/>
  <figcaption>
    <h2>Tari Golek Menak</h2>
    <span>Tarian</span>
  </figcaption>
  <a href="#"></a>
</figure>
<figure class="snip1158 yellow wow fadeInDown">
  <img src="<?php echo base_url();?>assets_users/img/jaipongan.jpg" alt="sample68"/>
  <figcaption>
    <h2>Tari Golek Menak</h2>
    <span>Tarian</span>
  </figcaption>
  <a href="#"></a>
</figure>
<figure class="snip1158 blue wow bounceInRight" style="margin-bottom:70px;">
  <img src="<?php echo base_url();?>assets_users/img/jaipongan.jpg" alt="sample17"/>
  <figcaption>
    <h2>Tari Golek Menak</h2>
    <span>Tarian</span>
  </figcaption>
  <a href="#"></a>
</figure>
</center>
</div>
  </div>
</div>
<footer class="site-footer" style="margin-bottom:-50px;">
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
$(document).ready(function() {
  var wHeight = $(window).height();
  
  function parallax() {
    var pHeight = $(this).outerHeight();
    var pMiddle = pHeight / 2;
    var wMiddle = wHeight / 2;
    var fromTop = $(this).offset().top;
    var scrolled = $(window).scrollTop();
    var speed = $(this).attr('data-parallax-speed');
    var rangeA = (fromTop - wHeight);
    var rangeB = (fromTop + pHeight);
    var rangeC = (fromTop - wHeight);
    var rangeD = (pMiddle + fromTop) - (wMiddle + (wMiddle / 2));
    
    if (rangeA < 0) {
      rangeA = 0;
      rangeB = wHeight
    }

    var percent = (scrolled - rangeA) / (rangeB - rangeA);
    percent = percent * 100;
    percent = percent * speed;
    percent = percent.toFixed(2);
    
    var animFromBottom = (scrolled - rangeC) / (rangeD - rangeC);
    animFromBottom = animFromBottom.toFixed(2);
    
    if (animFromBottom >= 1) {
      animFromBottom = 1;
    }

    $(this).css('background-position', 'center ' + percent + '%');
    $(this).find('.parallax-content').css('opacity', animFromBottom);
    $(this).find('.parallax-content').css('transform', 'scale(' + animFromBottom + ')');
  }
  $('.parallax').each(parallax);
  $(window).scroll(function(e) {
    $('.parallax').each(parallax);
  });
}); 
</script>
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