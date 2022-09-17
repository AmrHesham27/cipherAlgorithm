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
    <title>Meghna | Responsive Multipurpose Parallax HTML5 Template</title>

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
                        Abdulrahman Cipher
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

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <blockquote class="p-3 mt-5">
                        <h4>Abdulrahman Algorithm</h4>
                    </blockquote>

                    <p>Enter a message and a key to encrypt/decrypt the message using Abdulrahman algorithm</p>

                    <form id="abdul_form" action="./forms/Abdul.php" method="post" novalidate="novalidate">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="abdul_text" placeholder="Message" name="message">                               
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="abdul_key" placeholder="Key" name="key">
                        </div>

                        <input hidden id="abdul_type" name="abdul_type" />

                        <div class="input-group mb-3">
                            <button 
                                id="abdul_encrypt_buton" class="btn btn-main font-weight-bold mr-3"
                                type="submit" 
                            >
                                Encrypt
                            </button>
                            <button 
                                id="abdul_decrypt_button" class="btn btn-main font-weight-bold"
                                type="submit" 
                            >
                                Decrypt
                            </button>
                        </div>
                    </form>

                    <div id="abdul_container">
                    </div>
                </div>
                <!-- <div class="col-lg-12 mt-5">

                    <blockquote class="p-3 mt-5">
                        <h4>T&M Algorithm</h4>
                    </blockquote>

                    <p>Enter a message and a key to encrypt/decrypt the message using T&M algorithm</p>

                    <form id="tm_form" action="./forms/TM.php" method="post" novalidate="novalidate">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="tm_text" placeholder="Message" name="message">                               
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="tm_key" placeholder="Key" name="key">
                        </div>

                        <input hidden id="tm_type" name="tm_type" />

                        <div class="input-group mb-3">
                            <button 
                                id="tm_encrypt_buton" class="btn btn-main font-weight-bold mr-3"
                                type="submit" 
                            >
                                Encrypt
                            </button>
                            <button 
                                id="tm_decrypt_button" class="btn btn-main font-weight-bold"
                                type="submit" 
                            >
                                Decrypt
                            </button>
                        </div>
                    </form>

                    <div id="tm_container" style="word-break: break-all;">
                    </div>
                </div> -->
                <!-- <div class="col-lg-12 my-5">

                    <blockquote class="p-3 mt-5 py-3">
                        <h4>A.D Algorithm</h4>
                    </blockquote>

                    <p>Enter a message and a key to encrypt/decrypt the message using A.D algorithm</p>

                    <form id="ad_form" action="./forms/AD.php" method="post" novalidate="novalidate">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="ad_text" placeholder="Message" name="message">                               
                        </div>

                        <input hidden id="ad_type" name="ad_type" />

                        <div class="input-group mb-3">
                            <button 
                                id="ad_encrypt_buton" class="btn btn-main font-weight-bold mr-3"
                                type="submit" 
                            >
                                Encrypt
                            </button>
                            <button 
                                id="ad_decrypt_button" class="btn btn-main font-weight-bold"
                                type="submit" 
                            >
                                Decrypt
                            </button>
                        </div>
                    </form>

                    <div id="ad_container_success" role="alert">
                    </div>
                    <div id="ad_container_error" role="alert">
                    </div>
                </div> -->
                <div class="col-lg-12 my-5">

                    <blockquote class="p-3 mt-5 py-3">
                        <h4>AES Algorithm</h4>
                    </blockquote>

                    <p>Enter a message and a key to encrypt/decrypt the message using AES algorithm</p>

                    <form id="aes_form" action="./forms/AES.php" method="post" novalidate="novalidate">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="aes_text" placeholder="Message" name="message">                               
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="aes_key" placeholder="Key" name="key">
                        </div>

                        <input hidden id="aes_type" name="aes_type" />

                        <div class="input-group mb-3">
                            <button 
                                id="aes_encrypt_buton" class="btn btn-main font-weight-bold mr-3"
                                type="submit" 
                            >
                                Encrypt
                            </button>
                            <button 
                                id="aes_decrypt_button" class="btn btn-main font-weight-bold"
                                type="submit" 
                            >
                                Decrypt
                            </button>
                        </div>
                    </form>

                    <div id="aes_container_success" role="alert" style="word-break: break-all;">
                    </div>
                    <div id="aes_container_error" role="alert">
                    </div>
                </div>
            </div>
        </div>
    </section>





    <!--
Footer
==================================== -->
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
    <!-- AJAX -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
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
    <!-- Submit Forms -->
    <script src="js/forms/Abdul.js"></script>
    <!-- <script src="js/forms/TM.js"></script>
    <script src="js/forms/AD.js"></script> -->
    <script src="js/forms/AES.js"></script>
</body>

</html>