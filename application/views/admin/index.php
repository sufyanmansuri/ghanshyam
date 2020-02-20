<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ghanshyam Caterers | Admin</title>
    <!-- shortcut icon section start -->
    <link rel="shortcut icon" href="<?= base_url('asset/image/logo.png') ?>">
    <!--shortcut icon section end -->
    <!--materialize css include-->
    <?= link_tag('asset/materialize/css/materialize.css'); ?>
    <!-- font awesome css include-->
    <?= link_tag('asset/font/css/font-awesome.css'); ?>
    <!-- Materialize Icon CSS Include -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Custom CSS -->
    <style type="text/css">
    #admin_username {
        width: 15%;
        border: 1px solid white;
        height: 30px;
        margin-left: 58%;
        box-shadow:none;
        font-size:14px;
        background:white;
        padding-left:2px;
    }
    button{
        height:30px;
        line-height:30px;
    }
    #admin_password {
        width: 15%;
        border: 1px solid white;
        height: 30px;
        margin-left: 1px;
        box-shadow:none;
        font-size:14px;
        background:white;
        padding-left:2px;
    }
    #fname{
        width:49%;
    }
    #lname{
        width:49%;
    }
    body{
        background:rgba(0,0,0,0.05);
    }
    </style>
</head>

<body>
    <!--topbar section start -->
    <nav class="orange">
        <div class="nav-wrapper">
            <a href="" class="brand-logo">&nbsp;Admin Account</a>
            <?= form_open(); ?>
            <input type="text" placeholder="username" id="admin_username">
            <input type="text" id="admin_password" placeholder="password">
            <button type="submit" class="btn waves-effect waves-light" style="box-shadow:none;background: #c77700;height:32px;margin-top:-4px;">Login</button>
            <?= form_close(); ?>
        </div>
    </nav>
    <!-- Register Section Form Start -->
    <div class="row">
        <div class="col l8 m8 s12">
            <h5>Register Now</h5>
        </div>
        <div class="col l4 m4 s12 white">
            <?= form_open(); ?>
            <h6 class="center-align">Register Now</h6>
            <input type="text" placeholder="First Name" id="fname">
            <input type="text" placeholder="Last Name" id="lname">
            <input type="text" placeholder="Email Address" id="email">
            <input type="number" placeholder="Mobile Number" id="monile_number">
            <input type="password" placeholder="Password" id="password">
            <button type="submit" class="btn waves-effect waves-light" style="box-shadow:none;background: #c77700;" >Create Account</button>
            <?= form_close(); ?>
        </div>
    </div>
    <!-- Register Section Form End -->
    <!-- jquery include-->
    <script type="text/javascript" src="<?= base_url('asset/jquery/jquery.js'); ?>"></script>
    <!--materialize js include-->
    <script type="text/javascript" src="<?= base_url('asset/materialize/js/materialize.js'); ?>"></script>
</body>

</html>