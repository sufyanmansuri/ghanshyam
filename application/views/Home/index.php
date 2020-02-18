<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
    <title></title>
    <!-- shortcut icon section start -->
    <link rel="shortcut icon" href="<?= base_url('asset/image/logo.png') ?>">
    <!--shortcut icon section end -->
    <!--materialize css include-->
    <?= link_tag('asset/materialize/css/materialize.css'); ?>
    <!-- font awesome css include-->
    <?= link_tag('asset/font/css/font-awesome.css'); ?>
    <!-- Materialize Icon CSS Include -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- custom css -->
    <style type="text/css">
    #top_bar {
        background: #c77700;
    }

    #chinese_menu {
        width: 50% !Important;
    }

    #footer_link li a {
        color: white;
        line-height: 35px
    }

    #footer_link li a:hover {
        color: black;
        text-decoration: underline;
    }

    #set_social_icon li {
        display: inline;
    }

    #set_social_icon a {
        color: white;
        padding: 15px 15px 15px 15px;
        border: 1px solid white;
    }

    #set_search {
        width: 39%;
        height:42px;
        background:white;
        border-radius:5px;
        border:1px solid white;
        box-shadow:none;
        margin-left:18%;
        border:1px solide white;
    }
    #set_search_btn{
        height:44px;
        width-10%;
        line-height:45%;
        background: #c77700;
        box-shadow:none;
        margin-top:-6px;
        margin-left:-7px;
        border-radius:0px 5px 5px 0px;
    }
    #set_mobile_search{
        border:1px solid white;
        background:white;
        color:black;
        margin:0 auto;
        border-radius:5px;
        box-shadow:none;
        padding-left:3px;
        margin-right:-3px;
    }
    form{display:inline;}
    </style>
</head>

<body>
    <!-- topbar section start -->
    <div id="top_bar" class="hide-on-med-and-down">
        <span class="white-text">&nbsp;&nbsp;&nbsp;<span
                class="fa fa-phone">&nbsp;&nbsp;1234567890&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="fa fa-envelope">&nbsp;&nbsp;info@ghanshyam.com</span>
            <span class="right"><span class="fa fa-gift">&nbsp;&nbsp;Gift
                    Card&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sell on
                Shop&nbsp;&nbsp;&nbsp;</span></span>
    </div>
    <!-- topbar section end -->
    <!-- navbar section start -->
    <nav class="orange">
        <div class="nav-wrapper">
            <a class="brand-logo left">&nbsp;&nbsp;Ghanshyam</a>
            <!-- Search Box Start -->
            <?= form_open(); ?>
            <input type="text" name="" id="set_search" placeholder="Search..." class="hide-on-med-and-down">
            <button type="submit" class="btn waves-waves-effect waves-light hide-on-med-and-down" id="set_search_btn">Search</button>
            <?= form_close(); ?>
            <!-- Search Box Start -->
            <!-- Menu Button Section Start -->
            <a href="#" class="sidenav-trigger right" data-target="mobile_menu"><i class="material-icons">menu</i></a>
            <!-- Menu Button Section End -->
            <!-- Mobile Menu Start -->
            <ul class="sidenav" id="mobile_menu">
                <li><a href="">One</a></li>
                <li><a href="">One</a></li>
                <li><a href="">One</a></li>
                <li><a href="">One</a></li>
            </ul>
            <!-- Mobile Menu End -->
            <ul class="right hide-on-med-and-down">
                <li><a href=""><span class="fa fa-shopping-cart">&nbsp;&nbsp;Cart</span></a></li>
                <li><a href=""><span class="fa fa-sign-in">&nbsp;&nbsp;Signup</span></a></li>
                <li><a href=""><span class="fa fa-sign-in">&nbsp;&nbsp;Login</span></a></li>
            </ul>
        </div>
    </nav>
    <!-- navbar section end -->
    <!-- menu bar section start -->
    <nav class="orange hide-on-med-and-down"
        style="height: 35px;line-height: 35px;box-shadow:none;border:1px solid white;">
        <div class="container">
            <div class="nav-wrapper">
                <ul class="left">
                    <li><a href="" class="dropdown-trigger" data-target="chinese_menu">Chinese</a></li>
                    <!--Chinese Menu start -->
                    <ul class="dropdown-content" id="chinese_menu">
                        <li><a href="">One</a></li>
                        <li><a href="">One</a></li>
                        <li><a href="">One</a></li>
                    </ul>
                    <!--Chinese Menu end -->
                    <li><a href="">Chinese</a></li>
                    <li><a href="">Chinese</a></li>
                    <li><a href="">Chinese</a></li>
                    <li><a href="">Chinese</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- menu bar section end -->
    <!-- Mobile Search Section Start -->
    <div class="orange hide-on-med-and-up" style="padding:10px;">
        <?= form_open(); ?>
        <center><input type="text" id="set_mobile_search" placeholder="Search..."></center>
        <?= form_close(); ?>
    </div>
    <!-- Mobile Search Section End -->
    <!-- image slider section -->
    <div class="carousel carousel-slider">
        <a class="carousel-item" href="#two!"><img src="<?= base_url('asset/image/slider/Screenshot (3).png') ?>"
                class="responsive-img"></a>
        <a class="carousel-item" href="#three!"><img src="<?= base_url('asset/image/slider/Screenshot (4).png') ?>"
                class="responsive-img"></a>
        <a class="carousel-item" href="#four!"><img src="<?= base_url('asset/image/slider/Screenshot (5).png') ?>"
                class="responsive-img"></a>
        <a class="carousel-item" href="#five!"><img src="<?= base_url('asset/image/slider/Screenshot (6).png') ?>"
                class="responsive-img"></a>
    </div>
    <!-- image slider section end -->
    <!-- Footer Section start -->
    <footer class="page-footer orange">
        <!--four col. section start-->
        <div class="container">
            <div class="row">
                <div class="col l3 m6 s12">
                    <h5>About us</h5>
                    <p style="text-align:justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                        sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                        laborum.</p>
                </div>
                <div class="col l3 m6 s12">
                    <h5>Categories</h5>
                    <ul id="footer_link">
                        <li><a href="">Link</a></li>
                        <li><a href="">Link</a></li>
                        <li><a href="">Link</a></li>
                        <li><a href="">Link</a></li>
                    </ul>
                </div>
                <div class="col l3 m6 s12">
                    <h5>Important Links</h5>
                    <ul id="footer_link">
                        <li><a href="">Home</a></li>
                        <li><a href="">Create Account</a></li>
                        <li><a href="">Login</a></li>
                        <li><a href="">Cart</a></li>
                        <li><a href="">Admin Panel</a></li>
                    </ul>
                </div>
                <div class="col l3 m6 s12">
                    <h5>Address</h5>
                    <p><i class="fa fa-map-marker">&nbsp;&nbsp;20, Haji gaffar Ni
                            Chali,</br>&nbsp;&nbsp;&nbsp;&nbsp;Usha Cinema Road,
                            Gomtipur,</br>&nbsp;&nbsp;&nbsp;&nbsp;Ahmedabad - 380021</i></p>
                    <p><i class="fa fa-phone">&nbsp;&nbsp;+91-7016138213, +91-7041378597</i></p>
                    <p><i class="fa fa-envelope">&nbsp;&nbsp;sufyan8834@gmail.com</i></p>
                    <p><a href="https://www.instagram.com/typingmistake" class="white-text"><i
                                class="fa fa-instagram">&nbsp;&nbsp;Sufyan Mansuri</i></a></p>
                    <br>
                    <!--social media icon start-->
                    <ul id="set_social_icon">
                        <li><a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                        <li><a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href=""><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                        <li><a href=""><i class="fa fa-youtube-square" aria-hidden="true"></i></a></li>
                        <li><a href=""><i class="fa fa-google" aria-hidden="true"></i></a></li>
                    </ul>
                    <!--social media icon end-->
                </div>
            </div>
        </div>
        <!--four col. section start-->
        <div class="footer-copyright" style="background: #c77700">
            <div class="container">
                © 2019 to <?= date('Y') ?> Copyright All rights reserved
                <a class="grey-text text-lighten-4 right" href="#!">Designed By Sufyan Mansuri</a>
            </div>
        </div>

    </footer>
    <!-- Footer Section End -->
    <!-- jquery include-->
    <script type="text/javascript" src="<?= base_url('asset/jquery/jquery.js'); ?>"></script>
    <!--materialize js include-->
    <script type="text/javascript" src="<?= base_url('asset/materialize/js/materialize.js'); ?>"></script>
    <!--custom js-->
    <script type="text/javascript">
    $(document).ready(function() {
        $('.dropdown-trigger').dropdown({
            coverTrigger: false
        });
    });
    //sidenav menu script
    $('.sidenav').sidenav();
    //slider script
    $('.carousel.carousel-slider').carousel({
        fullWidth: true,
        indicators: true
    });
    </script>
</body>

</html>