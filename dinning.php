<?php include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="images/icons/favicon.png"/>
        <title>Tomodachi</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <link href="fonts/antonio-exotic/stylesheet.css" rel="stylesheet">
        <link rel="stylesheet" href="css/lightbox.min.css">
        <link href="css/responsive.css" rel="stylesheet">
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/lightbox-plus-jquery.min.js" type="text/javascript"></script>
        <script src="js/instafeed.min.js" type="text/javascript"></script>
        <script src="js/custom.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="page">
            <!---header top---->
            <div class="top-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-6"><div class="social-grid">
                                <ul class="list-unstyled text-right">
                                    <li><a><i class="fa fa-facebook"></i></a></li>
                                    <li><a><i class="fa fa-twitter"></i></a></li>
                                    <li><a><i class="fa fa-linkedin"></i></a></li>
                                    <li><a><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div></div>
                    </div>
                </div>
            </div>
            <!--header--->
            <header class="header-container">
                <div class="container">
                    <div class="top-row">
                        <div class="row">
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <div id="logo">
                                    <!--<a href="index.php"><img src="images/logo.png" alt="logo"></a>-->
                                    <a href="index.php"><span>Tomo</span>dachi</a>
                                </div>
                            </div>
                            <div class="col-sm-6 visible-sm">
                                <div class="text-right"><button type="button" class="book-now-btn">Log In</button></div>
                            </div>
                            <div class="col-md-8 col-sm-12 col-xs-12 remove-padd">
                                <nav class="navbar navbar-default">
                                    <div class="navbar-header page-scroll">
                                        <button data-target=".navbar-ex1-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>

                                    </div>
                                    <div class="collapse navigation navbar-collapse navbar-ex1-collapse remove-space">
                                        <ul class="list-unstyled nav1 cl-effect-10">
                                            <li><a data-hover="Home" href="index.php"><span>Home</span></a></li>
                                            <li><a data-hover="Conventions"  href="about.php"><span>Conventions</span></a></li>
                                            <li><a data-hover="Map"  href="rooms.php"><span>Map</span></a></li>
                                            <li><a data-hover="Chat"  href="gallery.php"><span>Chat</span></a></li>
                                            <li><a data-hover="MegaChat" class="active"><span>MegaChat</span></a></li>
                                            <li><a data-hover="Connect" href="news.php"><span>Connect</span></a></li>
                                            <li><a data-hover="Contact Us" href="contact.php"><span>Contact Us</span></a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <div class="col-md-2  col-sm-4 col-xs-12 hidden-sm">
                                
                                <div class="text-right"><p style="display:inline"><p>
<?php if(!isset($_SESSION["username"])) { echo "Log in"; } else { echo "Logged in as " . $_SESSION['username']; } ?>
<button type="button" class="book-now-btn"><a href="logout.php" style="color:#FFFFFF">
<?php if(!isset($_SESSION["username"])) { echo "Log in"; } else { echo "Log out"; } ?></a></button></p>
</div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>


            <!--end
            <section class="image-head-wrapper" style="background-image: url('images/banner3.jpg');">
                <div class="inner-wrapper">
                    <h1>About us</h1>
                </div>
            </section>
            <div class="clearfix"></div>-->
<!--  <p id="mytab1">hi</p>-->






<center><iframe src="https://cl2.widgetbot.io/channels/532484663264935969/532484663264935971" height="600" width="1200"></iframe></center>
<!--
            <section class="about-block">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 about-left">
                            <p>Lorem <label>ipsum</label> dol  <span>-sitamet</span></p>
                        </div>
                        <div class="col-md-7 about-right">
                            <h3>Lorem ipsum dolor sit amet, consec</h3>
                            <p>Donec bibendum massa metus, vel aliquet nunc varius eu. Curabitur nec scelerisque dui. Quisque mattis libero et enim ultricies gravida. Nulla ut commodo massa, eget tincidunt ligula. Vivamus eu ante tincidunt, fermentum risus nec, pharetra turpis. Donec rhoncus eros sed felis aliquet tincidunt. In consectetur tempor quam</p>
                            <ul class="list-unstyled list-inline">
                                <li>Sed vitae facilisis nisi, in finibus lacus. Duis vel nulla orci.</li>
                                <li>fringilla, at ultrices felis dignissim. Integer ultricies posuere odio</li>
                                <li>Sed vestibulum mattis laoreet. Donec sollicitudin justo luctus nulla consectetur</li>
                                <li>Nam dolor tellus, dictum sit amet libero eu, semper placerat massa.</li>
                                <li>consectetur tempor quam, aliquam dignissim diam hendrerit nec. Cras sodales at nisl</li>
                            </ul>
                            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit</span>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </section>-->

            <!---footer--->
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12 width-set-100">
                            <div class="footer-details">
                                <h4>Get in touch</h4>
                                <ul class="list-unstyled footer-contact-list">
                                    <li>
                                        <i class="fa fa-map-marker fa-lg"></i>
                                        <p>San Francisco Bay Area, CA</p>
                                    </li>
                                    <li>
                                        <i class="fa fa-phone fa-lg"></i>
                                        <p><a href="tel: 408-805-2688"> 408-805-2688</a></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-envelope-o fa-lg"></i>
                                        <p><a href="mailto:tomodachiconventions@gmail.com"> tomodachiconventions@gmail.com</a></p>
                                    </li>
                                </ul>
                                <div class="footer-social-icon">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-youtube-play"></i></a>
                                </div>
                                <div class="input-group" id="subscribe">
                                    <input type="text" class="form-control subscribe-box" value="" name="subscribe" placeholder="EMAIL ID">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn subscribe-button"><i class="fa fa-paper-plane fa-lg"></i></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 width-50 width-set-50">
                            <div class="footer-details">
                                <h4>explore</h4>
                                <ul class="list-unstyled footer-links">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="about.php">Conventions</a></li>
                                    <li><a href="rooms.php">Map</a></li>
                                    <li><a href="gallery.php">Chat</a></li>
                                    <li class="active"><a>MegaChat</a></li>
                                    <li> <a href="news.php">Connect</a></li>
                                    <li> <a href="contact.php">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="footer-details">
                                <h4>Coming Soon: Mobile Applications</h4>
                                <div class="row">
                                    <div class="instagram-images">
                                        <div id="instafeed"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="copyright">
                        &copy; 2017 All right reserved.
                    </div>

                </div>
            </footer>

            <!--back to top--->
            <a style="display: none;" href="javascript:void(0);" class="scrollTop back-to-top" id="back-to-top">
                <span><i aria-hidden="true" class="fa fa-angle-up fa-lg"></i></span>
                <span>Top</span>
            </a>

        </div>
    </body>
</html>
