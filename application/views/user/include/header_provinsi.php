<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="<?php echo base_url();?>assets_users/style/style.css">
<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets_users/js/typed.js" type="text/javascript"></script>
    <link rel="icon" type="icon" href="<?php echo base_url();?>assets_users/img/logo.png" type="image/png">
  <!-- inder per provinsi -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets_users/style/libs/animate.css">
  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="<?php echo base_url();?>assets_users/js/typed.js" type="text/javascript"></script>

<meta name="viewport" content="width=device-width,initial-scale=1">  
  <title>Ayo Berbudaya</title>
  <script>
    $(function(){
      //Hanya Bisa di Style jika didepannya <p>
        $("#typed").typed({
            // strings: ["Typed.js is a <strong>jQuery</strong> plugin.", "It <em>types</em> out sentences.", "And then deletes them.", "Try it out!"],
            stringsElement: $('#typed-strings'),
            typeSpeed: 30,
            backDelay: 1000,
            loop: false,
            contentType: 'html', // or text
            // defaults to false for infinite loop
            loopCount: false,
            callback: function(){ foo(); },
            resetCallback: function() { newTyped(); }
        });

        $(".reset").click(function(){
            $("#typed").typed('reset');
        });

    });

    function newTyped(){ /* A new typed object */ }

    function foo(){ console.log("Callback"); }

    </script>

    <SCRIPT TYPE="text/javascript">
    function numbersonly(myfield, e, dec)
    {
        var key;
        var keychar;

        if (window.event)
        key = window.event.keyCode;
        else if (e)
key = e.which;
else
return true;
keychar = String.fromCharCode(key);

// control keys
if ((key==null) || (key==0) || (key==8) ||
(key==9) || (key==13) || (key==27) )
return true;
else if ((("01234567890-").indexOf(keychar) > -1))
return true;

else if (dec && (keychar == "."))
{
myfield.form.elements[dec].focus();
return false;
}
else
return false;
}

 function hurufonly(myfield, e, dec)
    {
        var key;
        var keychar;

        if (window.event)
        key = window.event.keyCode;
        else if (e)
key = e.which;
else
return true;
keychar = String.fromCharCode(key);

// control keys
if ((key==null) || (key==0) || (key==8) ||
(key==9) || (key==13) || (key==27) )
return true;
else if ((("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQ.RSTUVWXYZ ").indexOf(keychar) > -1))
return true;

else if (dec && (keychar == "."))
{
myfield.form.elements[dec].focus();
return false;
}
else
return false;
}

 function hurufangka(myfield, e, dec)
    {
        var key;
        var keychar;

        if (window.event)
        key = window.event.keyCode;
        else if (e)
key = e.which;
else
return true;
keychar = String.fromCharCode(key);

// control keys
if ((key==null) || (key==0) || (key==8) ||
(key==9) || (key==13) || (key==27) )
return true;
else if ((("0123456789abcdefghijklmnopqrst@ uvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ").indexOf(keychar) > -1))
return true;

else if (dec && (keychar == "."))
{
myfield.form.elements[dec].focus();
return false;
}
else
return false;
}

//–>
</SCRIPT>
<script>
    $(function(){
      //Hanya Bisa di Style jika didepannya <p>
        $("#typed").typed({
            // strings: ["Typed.js is a <strong>jQuery</strong> plugin.", "It <em>types</em> out sentences.", "And then deletes them.", "Try it out!"],
            stringsElement: $('#typed-strings'),
            typeSpeed: 30,
            backDelay: 1000,
            loop: false,
            contentType: 'html', // or text
            // defaults to false for infinite loop
            loopCount: false,
            callback: function(){ foo(); },
            resetCallback: function() { newTyped(); }
        });

        $(".reset").click(function(){
            $("#typed").typed('reset');
        });

    });

    function newTyped(){ /* A new typed object */ }

    function foo(){ console.log("Callback"); }

    </script>
    <style>
        /* code for animated blinking cursor */
        .typed-cursor{
            opacity: 1;
            font-weight: 100;
            -webkit-animation: blink 0.7s infinite;
            -moz-animation: blink 0.7s infinite;
            -ms-animation: blink 0.7s infinite;
            -o-animation: blink 0.7s infinite;
            animation: blink 0.7s infinite;
        }
        @-keyframes blink{
            0% { opacity:1; }
            50% { opacity:0; }
            100% { opacity:1; }
        }
        @-webkit-keyframes blink{
            0% { opacity:1; }
            50% { opacity:0; }
            100% { opacity:1; }
        }
        @-moz-keyframes blink{
            0% { opacity:1; }
            50% { opacity:0; }
            100% { opacity:1; }
        }
        @-ms-keyframes blink{
            0% { opacity:1; }
            50% { opacity:0; }
            100% { opacity:1; }
        }
        @-o-keyframes blink{
            0% { opacity:1; }
            50% { opacity:0; }
            100% { opacity:1; }
        }
    </style>
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
  <label for="menuToggle" class="menu-icon"><div class="box-shadow-menu"></div></label>
  <header>
    <div id="brnad">Ayo Berbudaya</div><span class="responsive">Abud</span>
  <span class="custom-dropdown-bahasa big" align="right" style="float:right;">
    <select onchange="location = this.options[this.selectedIndex].value;">    
        <option>Pilih Bahasa</option>
    <?php foreach($tampil_bahasa_where as $data):

                     echo"
                      <option value='".base_url()."user/bahasa/simpan_session_bahasa_provinsi/?bahasa=English&link=".$this->link."&provinsi=".$provinsi."'>
                          English 
                       </option>

                       <option value='".base_url()."user/bahasa/simpan_session_bahasa_provinsi/?bahasa=Indonesia&link=".$this->link."&provinsi=".$provinsi."'>
                          Indonesia
                       </option>

                       <option value='".base_url()."user/bahasa/simpan_session_bahasa_provinsi/?bahasa=".$data->language."&link=".$this->link."&provinsi=".$provinsi."'>
                       ".$data->language."
                       </option>
                     ";
                  ?>
                  <?php endforeach;?>
    </select>
</span>
<?php
  $session = $this->session->userdata('isLoginUser');
  if($session == TRUE)
  {?>
    <div id="menu"><?php echo $user['nama_depan']; $user['nama_belakang'];?> <i class="fa fa-profile"><div class="circle-1">
  <img src="<?php echo base_url();?>assets_users/img/jaipongan.jpg" alt="Foto Profile" />
</div><span class="menu-arrow" style="margin-left:10px">&#9660;</span></i></div>
  <div id="ddmenu">
    <ul>
      <li><a href="<?php echo base_url();?>user/index/edit_profile"><?php echo $this->profil;?> <i class="fa fa-gear fa-profile"></i></a></li>
      <li><a href="<?php echo base_url();?>user/index/logout_user"><?php echo $this->keluar;?> <i class="fa fa-sign-out fa-profile"></i></a></li>
    </ul> 
  </div>
<?php }
  else
  {?>
  <div id="menu"><a href="<?php echo base_url();?>user/index#popup1"><?php echo $this->login;?> </a> 
    <!-- <div class="circle-1"> -->
<!--       <img src="<?php echo base_url();?>assets_users/img/jaipongan.jpg" alt="Foto Profile" /> -->
    <!-- </div> -->
    <!-- <span class="menu-arrow" style="margin-left:10px">&#9660;</span> -->
  </div>
    <?php }
  ?> 
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
          <li><a href="<?php echo site_url('user/index');?>"><?php echo $this->home;?></a></li>
          <li><a href="<?php echo site_url('user/c_about');?>"><?php echo $this->about;?></a></li>
          <li><a href="<?php echo site_url('user/c_forum');?>"><?php echo $this->topik;?></a></li>
          <li><a href="<?php echo site_url('user/c_berita');?>"><?php echo $this->berita;?></a></li>
          <li><a href="<?php echo site_url('user/c_artikel');?>"><?php echo $this->artikel;?></a></li>
          <li><a href="<?php echo site_url('user/c_map');?>">Map</a></li>
          <!-- <li><a href="#"><?php echo $this->bahasa;?> <span class="menu-arrow"><img src="<?php echo base_url();?>assets_users/img/keyboard53.png"></span></a>
          </li> -->
     </ul>
  </nav>
</div>