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
                        <h4>Abdulrahman Encryption</h4>
                    </blockquote>

                    <p>Enter a message and a key to encrypt the message using Abdulrahman cipher</p>

                    <form id="encrypt_form" action="./forms/abdul_encrypt.php" method="post" novalidate="novalidate">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="encrypt_message" placeholder="Message" name="message">                               
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="encrypt_key" placeholder="Key" name="key">
                        </div>

                        <div class="input-group mb-3">
                            <button 
                                id="encrypt_button" class="btn btn-main font-weight-bold"
                                type="submit" 
                            >
                                Encrypt
                            </button>
                        </div>
                    </form>

                    <div id="encrypt_container">
                    </div>


                </div>


                <div class="col-lg-12 my-5">

                    <blockquote class="p-3 mt-5">
                        <h4>Abdulrahman Decryption</h4>
                    </blockquote>

                    <p>Enter a message and a key to decrypt the message using Abdulrahman cipher</p>

                    <form id="decrypt_form" action="./forms/abdul_encrypt.php" method="post" novalidate="novalidate">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="decrypt_message" placeholder="Message" name="message">                               
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="decrypt_key" placeholder="Key" name="key">
                        </div>

                        <div class="input-group mb-3">
                            <button 
                                id="decrypt_button" class="btn btn-main font-weight-bold"
                                type="submit" 
                            >
                                Decrypt
                            </button>
                        </div>
                    </form>

                    <div id="decrypt_container">
                    </div>


                </div>
            </div>
        </div>
    </section>





    <!--
Footer
==================================== -->
    <footer id="footer" class="bg-one">
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
    <!-- Submit encryption form -->
    <script>
        $(document).ready(function() {
            $('#encrypt_form').validate({
                rules: {
                    message: {
                        required: true
                    },
                    key: {
                        required: true,
                    }
                },
                messages: {
                    message: 'Please enter Message.',
                    key: 'Please enter key'
                },
                submitHandler: function(form) {
                    console.log(1);
                    $("#encrypt_button").text("...Loading");
                    var formData = {
                        message: $("#encrypt_message").val(),
                        key: $("#encrypt_key").val(),
                    };

                    $.ajax({
                        type: "POST",
                        url: "forms/abdul_encrypt.php",
                        data: formData,
                        dataType: "json",
                        encode: true,
                    }).done(function(data) {
                        console.log(1);
                        $("#encrypt_button").text("Encrypt");
                        if (data.status == 'true') {
                            $("#encrypt_container").html(
                                '<div id="form-result" class="text-center alert alert-success w-100" role="alert">' +
                                data.data +
                                '</div>'
                            );
                        } else {
                            $("#encrypt_container").html(
                                '<div id="form-result" class="text-center alert alert-danger w-100" role="alert">' +
                                data.data +
                                '</div>'
                            );
                        }
                    });
                    event.preventDefault();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#decrypt_form').validate({
                rules: {
                    message: {
                        required: true
                    },
                    key: {
                        required: true,
                    }
                },
                messages: {
                    message: 'Please enter Message.',
                    key: 'Please enter key'
                },
                submitHandler: function(form) {
                    console.log(1);
                    $("#decrypt_button").text("...Loading");
                    var formData = {
                        message: $("#decrypt_message").val(),
                        key: $("#decrypt_key").val(),
                    };

                    $.ajax({
                        type: "POST",
                        url: "forms/abdul_decrypt.php",
                        data: formData,
                        dataType: "json",
                        encode: true,
                    }).done(function(data) {
                        console.log(1);
                        $("#decrypt_button").text("Decrypt");
                        if (data.status == 'true') {
                            $("#decrypt_container").html(
                                '<div id="form-result" class="text-center alert alert-success w-100" role="alert">' +
                                data.data +
                                '</div>'
                            );
                        } else {
                            $("#decrypt_container").html(
                                '<div id="form-result" class="text-center alert alert-danger w-100" role="alert">' +
                                data.data +
                                '</div>'
                            );
                        }
                    });
                    event.preventDefault();
                }
            });
        });
    </script>
</body>

</html>