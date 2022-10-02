<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">

<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>Triple Cipher Algorithm</title>

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Parallax HTML5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Meghna Template v1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />

    <!-- CSS
		================================================== -->
    <!-- Fontawesome Icon font -->
    <link rel="stylesheet" href="plugins/themefisher-font/style.css">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
    <!-- Animate.css -->
    <link rel="stylesheet" href="plugins/animate-css/animate.css">
    <!-- Magnific popup css -->
    <link rel="stylesheet" href="plugins/magnific-popup/dist/magnific-popup.css">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="plugins/slick-carousel/slick.css">
    <link rel="stylesheet" href="plugins/slick-carousel/slick-theme.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="css/style.css">


</head>

<body id="home" data-spy="scroll" data-target=".navbar-nav" data-offset="80">
    <!--
	Start Preloader
	==================================== -->
    <div class="preloader">
        <div class="sk-cube-grid">
            <div class="sk-cube sk-cube1"></div>
            <div class="sk-cube sk-cube2"></div>
            <div class="sk-cube sk-cube3"></div>
            <div class="sk-cube sk-cube4"></div>
            <div class="sk-cube sk-cube5"></div>
            <div class="sk-cube sk-cube6"></div>
            <div class="sk-cube sk-cube7"></div>
            <div class="sk-cube sk-cube8"></div>
            <div class="sk-cube sk-cube9"></div>
        </div>
    </div>
    <!-- End Preloader
	==================================== -->

    <!-- 
Fixed Navigation
==================================== -->
    <header id="navigation" class="navigation">
        <div class="container">
            <div class="navbar-header w-100">
                <nav class="navbar navbar-expand-lg navbar-dark px-0">
                    <!-- logo -->
                    <a class="navbar-brand logo" href="index.php">
                        <?php
                            require './components/svg.php';
                        ?>
                        Triple cipher algorithm
                    </a>
                    <!-- /logo -->

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar01"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbar01">
                        <ul class="navbar-nav navigation-menu ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="start.php">Start</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.php">About</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!--
End Fixed Navigation
==================================== -->

<?php
    foreach (new DirectoryIterator('./presentation') as $fileInfo) {
        if($fileInfo->isDot()) continue;
        echo "<img class='about_image' src='./presentation/" . $fileInfo->getFilename() . "' />";
    }  
?>

    <!--
Start Call To Action
==================================== -->
    <section class="call-to-action section-sm bg-1 overly">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="start.php" class="btn btn-main font-weight-bold">Start Now</a>
                </div>
            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- End section -->

    <!-- Start Services Section
==================================== -->

    <!-- end Contact Area
========================================== -->
    <footer id="footer" >
        <div class="container">
            <div class="row wow fadeInUp" data-wow-duration="500ms">
                <div class="col-lg-12">

                    <!-- copyright -->
                    <div class="copyright text-center">
                        <a href="index.php">
                            <?php
							require './components/svg.php';
						?>
                        </a>

                        <p class="mt-3">Copyright
                            &copy; <script>
                            document.write(new Date().getFullYear())
                            </script>. All Rights Reserved.</p>
                    </div>
                    <!-- /copyright -->

                </div> <!-- end col lg 12 -->
            </div> <!-- end row -->
        </div> <!-- end container -->
    </footer> <!-- end footer -->

    <!-- 
	Essential Scripts
	=====================================-->

    <!-- Main jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 3.1 -->
    <script src="plugins/bootstrap/bootstrap.min.js"></script>
    <!-- Slick Carousel -->
    <script src="plugins/slick-carousel/slick.min.js"></script>
    <!-- Portfolio Filtering -->
    <script src="plugins/filterzr/jquery.filterizr.min.js"></script>
    <!-- Magnific popup -->
    <script src="plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <!-- wow.min Script -->
    <script src="plugins/wow/wow.min.js"></script>
    <!-- Custom js -->
    <script src="js/script.js"></script>

</body>

</html>