<?php

require "header.php";

?>


<!-- Page Content -->
    <div class="mainwrapper">

        <div class="innercollage">
            <div class="container">
                <div class="breadcrumb">
                    <li><a href="index.php">Home</a></li> <i class="fa fa-chevron-right"></i>
                    <li>Work Categories</li>
                </div>
            </div>
        </div>

        <div class="innercontentarea">
            <div class="container">
                                    <h2>Work Categories</h2>
                    <div class="row">
                                                    
                            <div class="col-lg-3 col-md-6">
                                <a href="https://shailendrabhartti.com/our-works/sai-baba">
                                    <div class="workbox">
                                        <div class="workimg">
                                            <img src="https://shailendrabhartti.com/public/images/subcategories/image_file/7/15 Nov 600 Pm (5).png" alt="Sai Baba" />
                                        </div>
                                        <div class="worktxt2">
                                            <h3>Sai Baba</h3>
                                            <div class="WorkTagUL">
                                                                                                                                                            <!-- <li>Bhajans</li>
                                                                                                            <li>Aartis</li> -->
                                                                                                                                                </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                                                    
                            <div class="col-lg-3 col-md-6">
                                <a href="https://shailendrabhartti.com/our-works/hanuman">
                                    <div class="workbox">
                                        <div class="workimg">
                                            <img src="https://shailendrabhartti.com/public/images/subcategories/image_file/10/Untitled design (27).png" alt="Hanuman" />
                                        </div>
                                        <div class="worktxt2">
                                            <h3>Hanuman</h3>
                                            <div class="WorkTagUL">
                                                                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                                                    
                            <div class="col-lg-3 col-md-6">
                                <a href="https://shailendrabhartti.com/our-works/krishna">
                                    <div class="workbox">
                                        <div class="workimg">
                                            <img src="https://shailendrabhartti.com/public/images/subcategories/image_file/11/Untitled design (28).png" alt="Krishna" />
                                        </div>
                                        <div class="worktxt2">
                                            <h3>Krishna</h3>
                                            <div class="WorkTagUL">
                                                                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                                                    
                            <div class="col-lg-3 col-md-6">
                                <a href="https://shailendrabhartti.com/our-works/shiva">
                                    <div class="workbox">
                                        <div class="workimg">
                                            <img src="https://shailendrabhartti.com/public/images/subcategories/image_file/12/Untitled design (30).png" alt="Shiva" />
                                        </div>
                                        <div class="worktxt2">
                                            <h3>Shiva</h3>
                                            <div class="WorkTagUL">
                                                                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                                                    
                            <div class="col-lg-3 col-md-6">
                                <a href="https://shailendrabhartti.com/our-works/ganesha">
                                    <div class="workbox">
                                        <div class="workimg">
                                            <img src="https://shailendrabhartti.com/public/images/subcategories/image_file/13/Untitled design (31).png" alt="Ganesha" />
                                        </div>
                                        <div class="worktxt2">
                                            <h3>Ganesha</h3>
                                            <div class="WorkTagUL">
                                                                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                                                    
                            <div class="col-lg-3 col-md-6">
                                <a href="https://shailendrabhartti.com/our-works/bhagawad-geeta">
                                    <div class="workbox">
                                        <div class="workimg">
                                            <img src="https://shailendrabhartti.com/public/images/subcategories/image_file/15/28sptQICKCk-HD.jpg" alt="Bhagawad Geeta" />
                                        </div>
                                        <div class="worktxt2">
                                            <h3>Bhagawad Geeta</h3>
                                            <div class="WorkTagUL">
                                                                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                                            </div>
                                <div class="mt-30"> 
<div class="row">
<div class="col-sm-6">
<div class="total_records">Total Records: <span>6</span>   </div>
</div>

<div class="col-sm-6">
    <nav aria-label="Page navigation example" class="pagination_new">


<ul class="pagination">
    <!-- Previous Page Link -->
            <li class="page-item disabled">
            <span class="page-link" aria-hidden="true">&laquo;</span>
        </li>
    
    <!-- Pagination Elements -->
    
    
            <li class="page-item active">
            <a class="page-link" href="https://shailendrabhartti.com/our-work-categories?page=1">1</a>
        </li>
    
    
    <!-- Next Page Link -->
            <li class="page-item disabled">
            <span class="page-link" aria-hidden="true">&raquo;</span>
        </li>
    </ul>
    </nav>
</div>     
</div>  
</div>            </div>
           
        </div>
                
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggleBtn = document.getElementById("audioToggleBtn");
        const audio = document.getElementById("welcomeAudio");

        const playIcon = "https://shailendrabhartti.com/dist/img/audioplaybutton.png";
        const pauseIcon = "https://shailendrabhartti.com/dist/img/audiopausebutton.png";

        if (toggleBtn && audio) {
            toggleBtn.addEventListener("click", function () {
                if (audio.paused) {
                    audio.play().then(() => {
                        toggleBtn.src = pauseIcon;
                    }).catch(err => {
                        console.error("Audio play error:", err);
                    });
                } else {
                    audio.pause();
                    toggleBtn.src = playIcon;
                }
            });
            audio.addEventListener("pause", function () {
                toggleBtn.src = playIcon;
            });

            audio.addEventListener("play", function () {
                toggleBtn.src = pauseIcon;
            });
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const playBtn = document.querySelector('.aPlay');
        const audioPlayer = document.getElementById('audioPlayer');

        playBtn.addEventListener('click', () => {
            if (audioPlayer.paused) {
                audioPlayer.play();
                playBtn.querySelector('i').classList.replace('fa-play', 'fa-pause');
            } else {
                audioPlayer.pause();
                playBtn.querySelector('i').classList.replace('fa-pause', 'fa-play');
            }
        });
    });
</script>

<?php 
include "footer.php";
?>