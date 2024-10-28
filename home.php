<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) {
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="home.css">

    <title>CU CS Student Portal</title>
</head>
<body>
    <?php require("./nav.php") ?>  
    <div style="margin-left: 88px;">  
        <?php require("./carousal.php") ?>   
        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item text-center pt-3">
                            <div class="p-4">
                                <i class="fa fa-youtube-play"></i>
                                <h5 class="mb-3">Best Videos</h5>
                                <p>Topic wise best Youtube Videos</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item text-center pt-3">
                            <div class="p-4">
                                <i class="fa fa-file-pdf-o fa-3x"></i>
                                <h5 class="mb-3">Pdf notes & books</h5>
                                <p>Quality pdf notes and books</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item text-center pt-3">
                            <div class="p-4">
                                <i class="fa fa-file-text-o fa-3x"></i>
                                <h5 class="mb-3">Question papers</h5>
                                <p>Last year question papers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <!-- Service End -->
    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="img/about.jpg" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                    <h1 class="mb-4">Welcome to CU-CS Portal</h1>
                    <p class="mb-4">Education is the process of facilitating learning, or the acquisition of knowledge, 
                        skills, values, beliefs, and habits. Educational methods include teaching, training, 
                        storytelling, discussion and directed research.<br> 
                        Educational website can include websites that have videos or topic related resources 
                        that act as tools to enhance learning. These websites help make 
                        the process of learning entertaining and attractive to the student, especially in today's age.</p>
                   
                </div>
            </div>
        </div>
    </div>
</body>
</html>