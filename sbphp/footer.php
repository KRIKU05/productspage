<!-- Footer Start -->
<footer>
  <div class="container">
    <div class="text-center">
      <img src="img/footerlogo.png" alt="Shailendra Bhartti"  />
    </div>
    <div>
      <li><a href="default.php">Home</a></li> <li><a href="work.php">Works</a></li> <li><a href="blog.php">Blogs</a></li> <li><a href="#">Privacy Policy</a></li>  
    </div>
    <div class="social-iconsftr"> <a href="#"><i class="fa-brands fa-facebook-f"></i></a> <a href="#"><i class="fa-brands fa-instagram"></i></a> <a href="#"><i class="fa-brands fa-youtube"></i></a> <a href="#"><i class="fa-brands fa-linkedin-in"></i></a> <a href="#"><i class="fa-brands fa-x-twitter"></i></a> </div>
    <div>© 2025 Shailendrabhartti. All Rights Reserved.</div>
  </div>
</footer>  
</div>
<script>
  (function () {
  const TRANS_MS = 700, VISIBLE_MS = 3500, PERIOD = TRANS_MS + VISIBLE_MS;
  const slides = [...document.querySelectorAll('.slide')];
  let current = 0;

  // initialize: hide all except first
  slides.forEach((s,i)=> {
    s.style.transform = i ? 'translateX(100%)' : 'translateX(0)';
    s.style.opacity   = i ? '0' : '1';
  });

  function next() {
    const prev = slides[current];
    const next = slides[(current+1)%slides.length];

    // prepare next off-screen right (no transition)
    next.style.transition = 'none';
    next.style.transform = 'translateX(100%)';
    next.style.opacity = '0';
    next.offsetHeight; // reflow

    // animate both
    prev.style.transition = next.style.transition = `transform ${TRANS_MS}ms ease, opacity ${TRANS_MS}ms ease`;
    prev.style.transform = 'translateX(-100%)';
    prev.style.opacity = '0';
    next.style.transform = 'translateX(0)';
    next.style.opacity = '1';

    // after anim: snap prev back to right (so it’s ready for reuse)
    setTimeout(()=>{
      prev.style.transition = 'none';
      prev.style.transform = 'translateX(100%)';
    }, TRANS_MS+50);

    current = (current+1)%slides.length;
  }

  setInterval(next, PERIOD);
})();
  </script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script> 
<script  src="js/menu.js"></script> 
<script type="text/javascript" src="js/audioplayer.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js'></script>
<script type="text/javascript" src="js/swiper.js"></script>
</body>
</html>