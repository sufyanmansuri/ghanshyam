<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Ghanshyam : Forgot Password</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url(); ?>asset/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- Site Icons -->
    <link rel="shortcut icon" href="<?= base_url('asset/image/logo.png') ?>" type="image/x-icon">

    <!-- Font Awesome -->
    <script src="<?= base_url('asset/js/fontawesome.js') ?>"></script>
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Ghanshyam</b><br>Caterers</a>
        </div><!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Reset Password</p>
            <?php $this->load->helper('form'); ?>
            <div class="row">
                <div class="col-md-12">
                    <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                </div>
            </div>
            <?php
            $this->load->helper('form');
            $error = $this->session->flashdata('error');
            if ($error) {
            ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php } ?>

            <form action="<?php echo base_url(); ?>createPasswordCustomer" method="post">
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $email; ?>" readonly required />
                    <input type="hidden" name="activation_code" value="<?php echo $activation_code; ?>" required />
                </div>
                <hr>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password" required />
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" required />
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <!-- <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>  -->
                    </div><!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn hvr-hover btn-block btn-flat">Submit</button>
                    </div><!-- /.col -->
                </div>
            </form>

        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery -->
    <script type="text/javascript" src="<?= base_url('asset/js/jquery.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('asset/js/jquery-ui.js') ?>"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?= base_url('asset/js/popper.min.js') ?>"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?= base_url('asset/js/bootstrap.min.js') ?>"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?= base_url('asset/js/mdb.min.js') ?>"></script>
    <!-- Your custom scripts (optional) -->


    <!-- ALL PLUGINS -->
    <script src="<?= base_url('asset/js/jquery.superslides.min.js') ?>"></script>
    <script src="<?= base_url('asset/js/bootstrap-select.js') ?>"></script>
    <script src="<?= base_url('asset/js/inewsticker.js') ?>"></script>
    <script src="<?= base_url('asset/js/bootsnav.js') ?>"></script>
    <script src="<?= base_url('asset/js/images-loded.min.js') ?>"></script>
    <script src="<?= base_url('asset/js/isotope.min.js') ?>"></script>
    <script src="<?= base_url('asset/js/owl.carousel.min.js') ?>"></script>
    <script src="<?= base_url('asset/js/baguetteBox.min.js') ?>"></script>
    <script src="<?= base_url('asset/js/form-validator.min.js') ?>"></script>
    <script src="<?= base_url('asset/js/contact-form-script.js') ?>"></script>
    <script src="<?= base_url('asset/js/jquery.nicescroll.min.js') ?>"></script>
    <script src="<?= base_url('asset/js/custom.js') ?>"></script>
    <!-- Plugin file -->
    <script src="<?= base_url('asset/js/addons/datatables.min.js') ?>"></script>
</body>

</html>