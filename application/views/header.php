<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Ghanshyam Caterers</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="<?= base_url('asset/image/logo.png') ?>" type="image/x-icon">

    <!-- Font Awesome -->
    <script src="<?= base_url('asset/js/fontawesome.js') ?>"></script>
    <link rel="stylesheet" href="<?= base_url('') ?>asset/css/font-awesome.min.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?= base_url('asset/css/bootstrap.min.css') ?>">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="<?= base_url('asset/css/mdb.min.css') ?>">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="<?= base_url('asset/css/style.css') ?>">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?= base_url('asset/css/responsive.css') ?>">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('asset/css/custom.css') ?>">

    <!-- Plugin file -->
    <link rel="stylesheet" href="<?= base_url('asset/css/addons/datatables.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url() ?>asset/css/toastr.min.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        nav.navbar.bootsnav .dropdown .megamenu-content .col-menu .title:before {
            font-family: 'FontAwesome';
            content: "\f105";
            float: right;
            font-size: 16px;
            margin-left: 10px;
            position: relative;
            right: -15px;
            display: none !important;
        }

        .list-group-item[data-toggle="collapse"]::after {
            content: "\f105";
            font-family: "Font Awesome 5 Free";
            width: 0;
            height: 0;
            position: absolute;
            top: calc(50% - 12px);
            right: 10px;
            content: "";
            -webkit-transition: top 0.2s, -webkit-transform 0.2s;
            transition: top 0.2s, -webkit-transform 0.2s;
            transition: transform 0.2s, top 0.2s;
            transition: transform 0.2s, top 0.2s, -webkit-transform 0.2s;
            display: none;
        }

        .hvr-hover {

            color: #fff !important;
        }

        body {
            background: #f5f5f5;
        }
    </style>

</head>

<body>
    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="<?php echo site_url('Home') ?>"><img src="<?= base_url('asset/image/logo.png') ?>" class="brand-logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Home') ?>">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('About') ?>">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('shop') ?>">Browse Products</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Services') ?>">Our Service</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Contact') ?>">Contact Us</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <?php if ($this->session->userdata('isLoggedIn')) { ?>
                            <li class="dropdown"><a href="<?= base_url('Account') ?>"><i class="fa fa-user" aria-hidden="true">&nbsp;Welcome,&nbsp;<?= $this->session->userdata('name') ?></i></a>
                            <ul class="dropdown-menu">
                                    <li><a href="<?= base_url('Cart'); ?>">Cart</a></li>
                                    <!-- <li><a href="<?= base_url('Checkout'); ?>">Checkout</a></li -->
                                    <li><a href="<?= base_url('Account'); ?>">My Account</a></li>
                                    <li class=""><a href="<?= base_url('Home/logOut'); ?>" >Logout</a></li>
                                </ul>
                            </li>
                            <li class=""><a href="<?= base_url('Cart'); ?>">
                                    <i class="fa fa-shopping-cart"></i>
                                    <!--<span class="badge badge-pill badge-danger"><?= $getCartCount ?></span -->
                                </a></li>
                        <?php } else { ?>
                            <!-- Login Popup Start-->
                            <li><a href="" class="waves-effect waves-light" data-toggle="modal" data-target="#elegantModalForm"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                            <!-- Login Popup End-->
                        <?php } ?>

                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>

        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->