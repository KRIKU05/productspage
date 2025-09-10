<?php

require "header.php";

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Shailendra Bhartti</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="icon" type="x-icon" href="favicon.ico">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/form.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/menu.css" type="text/css">
<link rel="stylesheet" href="css/audio.css" type="text/css">
<script type="text/javascript" src="js/jquery-latest.min.js"></script> 
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script> 
<script src="https://kit.fontawesome.com/9120be70a9.js" crossorigin="anonymous"></script> 
<!-- Fixed Header script start--> 
<script>
    $(window).on("scroll", function () {
      if ($(window).scrollTop() > 50) {
        $(".topband").addClass("active");
      } else {
        //remove the background property so it comes transparent again (defined in your css)
        $(".topband").removeClass("active");
      }
    });
  </script> 
<!-- Fixed Header script end-->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/css/swiper.min.css'>
</head>

<body>
<div class="mainwrapper">
  <div class="musicicon">
    <li><a href="https://open.spotify.com/artist/4yWpPflPpr7jGBXOXnGgXf?autoplay=true" target="_blank"><img src="img/spotify.png" alt="Spotify" /></a></li>
    <li>
    <a href="https://music.youtube.com/channel/UCYiG9KgmS4QJTbb9K4RpRFg?feature=gws_kp_artist&feature=gws_kp_artist" target="_blank"><img src="img/youtube.png" alt="Youtube" /></a>
    </li>
    <li>
    <a href="https://music.apple.com/in/artist/shailendra-bharti/251036422" target="_blank"><img src="img/applemusic.png" alt="Apple Music" /></a>
    </li>
    <li>
    <a href="https://gaana.com/artist/shailendra-bharti-2" target="_blank"><img src="img/gaana.png" alt="Gaana" /></a>
    </li>
    <li>
    <a href="https://www.hungama.com/artist/sahilendra-bhartti/136432971/?autoplay=true" target="_blank"><img src="img/hungama.png" alt="Hungama" /></a>
    </li>
    <li>
    <a href="https://wynk.in/music/artist/shailendra-bharti/wa_a5b43566?autoplay=true" target="_blank"><img src="img/wynk.png" alt="Wynk" /></a>
    </li>
    <li>
    <a href="https://www.jiosaavn.com/artist/shailendra-bharti-songs/BsG23jFc8tQ_?autoplay=enabled" target="_blank"><img src="img/saavan.png" alt="JioSaavan" /></a>
    </li>
  </div>
  <!-- header start -->
  <!-- <header class="topband">
    <div class="header">
      <div class="container">
        <div class="row v-center">
          <div class="header-item item-left">
            <div class="logo"> <a href="default.html"><img src="img/logo.png" alt="Shailendra Bhartti" /></a> </div>
          </div>
         menu start here -->
          <!-- <div class="header-item item-center"> </div>
          <div class="header-item item-right">
            <div class="social-icons"> <a href="#"><i class="fa-brands fa-facebook-f"></i></a> <a href="#"><i class="fa-brands fa-instagram"></i></a> <a href="#"><i class="fa-brands fa-youtube"></i></a> <a href="#"><i class="fa-brands fa-linkedin-in"></i></a> <a href="#"><i class="fa-brands fa-x-twitter"></i></a> </div>
            <div class="planbtn"><a href="#">Enquiry</a></div>
            <div class="hero">
              <div class="menu-btn"> <span></span> <span></span> <span></span> </div>
            </div>
            <div class="menu active"> <span class="btn-close">&times;</span>
              <ul class="links-container">
                <li class="menu-title">MENU</li>
                <li><a href="" class="">Home</a></li>
                <li><a href="" class="">Works</a></li>
                <li><a href="" class="">Blogs</a></li>
                <li><a href="" class="">Privacy Policy</a></li>
              </ul>
            </div>
          </div> -->
          <!-- menu end here --> 
        <!-- </div>
      </div>
    </div>
  </header> --> 
  
  <!-- header end --> 
  <!-- Collage start -->
  <div class="innercollage">
    <div class="container">
        <div class="breadcrumb"><li><a href="default.html">Home</a></li> <i class="fa fa-chevron-right"></i> <li>Work</li></div>
    </div>
  </div>
  <!-- Collage end --> 

 <div class="innercontentarea">
<div class="container">
	 <div class="row">
  <div class="col-md-3">
    <a href="#">
      <div class="workbox2">
      <div class="workimg"><img src="img/youtubeimg.jpg" alt="Work 1" /></div>
      <div class="worktxt2">
        <h3>New Releases</h3>
        <p>Experience the newest melodies inspired by devotion and divine connection.</p>
        </div>
    </div>
    </a>
  </div>
  <div class="col-md-3">
    <a href="#">
      <div class="workbox2">
      <div class="workimg"><img src="img/work2.jpg" alt="Work 1" /></div>
      <div class="worktxt2">
        <h3>My Music</h3>
        <p>A heartfelt collection of my original spiritual songs and bhajans.</p>
        
      </div>
    </div>
    </a>
  </div>
  <div class="col-md-3">
    <a href="#">
      <div class="workbox2">
      <div class="workimg"><img src="img/work3.jpg" alt="Work 1" /></div>
      <div class="worktxt2">
        <h3>Shared Music</h3>
        <p>United in voice, spirit, and sacred expression.</p>
        
      </div>
    </div>
    </a>
  </div>
  <div class="col-md-3">
    <div class="workbox2">
      <div class="workimg"><img src="img/work4.jpg" alt="Work 1" /></div>
      <div class="worktxt2">
        <h3>Labels</h3>
        <p>Supported and guided by trusted music labels sharing the spiritual vision.</p>
        </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="workbox2">
      <div class="workimg"><img src="img/work5.jpg" alt="Work 1" /></div>
      <div class="worktxt2">
        <h3>Live Performances</h3>
        <p>Glimpses of my live renditions at satsangs, temples, and spiritual gatherings.</p>
        
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="workbox2">
      <div class="workimg"><img src="img/work6.jpg" alt="Work 1" /></div>
      <div class="worktxt2">
        <h3>Trending Musics</h3>
        <p>Most loved and shared spiritual tracks by listeners.</p>
        
      </div>
    </div>
  </div>
		 <div class="col-md-3">
    <div class="workbox2">
      <div class="workimg"><img src="img/work6.jpg" alt="Work 1" /></div>
      <div class="worktxt2">
        <h3>Others</h3>
        <p>Mantras, chants, and special musical moments beyond regular albums.</p>
        
      </div>
    </div>
  </div>
</div>
	 </div>
 </div> 
<!-- 
<footer>
  <div class="container">
    <div class="text-center">
      <img src="img/footerlogo.png" alt="Shailendra Bhartti"  />
    </div>
    <div>
      <li><a href="default.html">Home</a></li>      <li><a href="#">Works</a></li>      <li><a href="#">Blogs</a></li>      <li><a href="#">Privacy Policy</a></li>     
    </div>
    <div class="social-iconsftr"> <a href="#"><i class="fa-brands fa-facebook-f"></i></a> <a href="#"><i class="fa-brands fa-instagram"></i></a> <a href="#"><i class="fa-brands fa-youtube"></i></a> <a href="#"><i class="fa-brands fa-linkedin-in"></i></a> <a href="#"><i class="fa-brands fa-x-twitter"></i></a> </div>
    <div>© 2025 Shailendrabhartti. All Rights Reserved.</div>
  </div>
</footer>   -->

</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script> 
<script  src="js/menu.js"></script> 
<script type="text/javascript" src="js/audioplayer.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js'></script>
<script type="text/javascript" src="js/swiper.js"></script>
</body>
</html>