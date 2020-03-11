<!-- Start Footer  -->
<footer>
    <div class="footer-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="footer-widget">
                        <h4>About Ghanshyam Caterers</h4>
                        <p>The food served here is a cavalcade of taste & texture and has maintained the originality of its quality. We feature innovative contemporary Indian cuisine clubbed with some continental delicacies that create bold flavours with a modern twist. From our famous Chana Poori to Paneer Tikka, from our Chana Masala to our lip-smacking sizzlers we offer a host of delicious vegetarian delicacies which are offered to our customers post due diligence and tasting.</p>

                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="footer-link">
                        <h4>Information</h4>
                        <ul>
                            <li><a href="<?= base_url('about') ?>">About Us</a></li>
                            <li><a href="<?= base_url('services') ?>">Customer Service</a></li>
                            <li><a href="<?= base_url('') ?>">Our Sitemap</a></li>
                            <li><a href="<?= base_url('login'); ?>">Admin</a></li>
                            <li><a href="<?= base_url('') ?>">Terms &amp; Conditions</a></li>
                            <li><a href="<?= base_url('') ?>">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="footer-link-contact">
                        <h4>Contact Us</h4>
                        <ul>
                            <li>
                                <p><i class="fas fa-map-marker-alt"></i>Address: 18, Khodiyarnagar Society, <br>Opp.Vishalnagar Society,
                                    <br> Isanpur,Ahmedabad-382443. </p>
                            </li>
                            <li>
                                <p><i class="fas fa-phone-square"></i>Phone: <a href="callto:+919054173660">+91 9054173660</a></p>
                            </li>
                            <li>
                                <p><i class="fas fa-envelope"></i>Email: <a href="mailto:ghanshyam@gmail.com">ghanshyam@gmail.com</a></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer  -->

<!-- Start copyright  -->
<div class="footer-copyright">
    <p class="footer-company">All Rights Reserved. &copy; 2020 <a href="<?= base_url('') ?>">Ghanshyam Caterers</a></p>
</div>
<!-- End copyright  -->

<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

<!--Modal: Login Form-->
<!-- Modal -->
<div class="modal fade" id="elegantModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content form-elegant">
            <!--Header-->
            <div class="modal-header text-center" style="background: #d33b33;
">
                <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong class="white-text">Sign in</strong></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body mx-4">
                <input type="hidden" name="status" id="status" value="<?php if (isset($_GET['status']) && $_GET['status'] != '') {
                                                                            echo $_GET['status'];
                                                                        } ?>">
                <?php

                if (isset($_GET['status']) && $_GET['status'] == 'wrong') { ?>

                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Email or password is wrong!
                    </div>

                <?php } ?>


                <?php $this->load->helper("form"); ?>
                <form role="form" id="loginAccount" action="<?php echo base_url() ?>Home/loginAccount" method="post" role="form">
                    <!--Body-->
                    <div class="md-form mb-5">
                        <input type="email" id="lemail" name="lemail" class="form-control" required>
                        <label data-error="Please enter valid data" for="Form-email1">Your email</label>

                    </div>
                    <input type="hidden" id="lpid" class="form-control validate" name="lpid" value="<?php if (isset($pid)) {
                                                                                                        echo $pid;
                                                                                                    } ?>">
                    <div class="md-form pb-3">
                        <input type="password" id="lpassword" name="lpassword" class="form-control validate" required>
                        <label data-error="Please enter valid data" for="Form-pass1">Your password</label>
                        <p class="font-small blue-text d-flex justify-content-end"><a href="<?= base_url('customerForgotPassword') ?>" class="blue-text ml-1">
                                Forgot Password?</a></p>
                    </div>

                    <div class="text-center mb-3">
                        <button type="submit" class="btn hvr hvr-hover" style="box-shadow:none;">Sign in</button>
                    </div>
            </div>
            </form>
            <!--Footer-->
            <div class="modal-footer mx-5 pt-3 mb-1">
                <p class="font-small grey-text d-flex justify-content-end">Not a member? <a href="javascript:void(0);" class="blue-text ml-1 newmodel" data-dismiss="modal" data-toggle="modal" data-target="#elegantSignupModalForm">
                        Sign Up</a></p>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- Modal -->
<!--Modal: Login Form-->
<!--Modal: Register Form-->
<!-- Modal -->
<?php $this->load->helper("form"); ?>
<form role="form" id="createAccount" action="<?php echo base_url() ?>Home/createAccount" method="post" role="form">
    <div class="modal fade" id="elegantSignupModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <!--Content-->
            <div class="modal-content form-elegant">
                <!--Header-->
                <div class="modal-header text-center" style="background: #d33b33;">
                    <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong class="white-text">Sign up</strong></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>
                <!--Body-->
                <div class="modal-body mx-4">
                    <!--Body-->
                    <div class="md-form mb-5">
                        <input type="text" id="fullname" name="fullname" class="form-control validate required">
                        <label data-error="not valid" for="Form-email1">Full Name</label>
                    </div>
                    <div class="md-form mb-5">
                        <input type="email" id="email" class="form-control validate" name="email">
                        <input type="hidden" id="pid" class="form-control validate" name="pid" value="<?php if (isset($pid)) {
                                                                                                            echo $pid;
                                                                                                        } ?>">
                        <label data-error="not valid" for="email">Your email</label>
                    </div>
                    <div class="md-form mb-5">
                        <input type="password" id="password" class="form-control validate" name="password">
                        <label data-error="Please enter valid data" for="password">Your password</label>
                    </div>
                    <div class="md-form mb-5">
                        <input type="password" id="cpassword" class="form-control validate">
                        <label data-error="Please enter valid data" for="cpassword">Enter password again</label>
                    </div>

                    <div class="text-center mb-3">
                        <button type="submit" id="regsub" class="btn hvr hvr-hover" style="box-shadow:none;">Sign up</button>
                    </div>
                </div>
                <!--Footer-->
                <div class="modal-footer mx-5 pt-3 mb-1">
                    <p class="font-small grey-text d-flex justify-content-end">Already a member? <a href="#" class="blue-text ml-1 " data-dismiss="modal" data-toggle="modal" data-target="#elegantModalForm">
                            Sign In</a></p>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
</form>
<!-- Modal -->
<!--Modal: Register Form-->

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
<script src="<?= base_url('asset/js/toastr.min.js') ?>"></script>
<!-- Plugin file -->
<script src="<?= base_url('asset/js/addons/datatables.min.js') ?>"></script>
<!-- MDBootstrap Initialize -->
<script type="text/javascript">
    $(document).ready(function() {

        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');

        function ValidateLemail(lemail) {
            var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            return expr.test(lemail);
        };
        $("#lemail").keyup(function() {
            if (!ValidateLemail($("#lemail").val())) {
                //alert("Invalid email address.");
                $('#btn_login').prop('disabled', true);
            } else {
                $('#btn_login').prop('disabled', false);
            }
        });

        function ValidateEmail(email) {
            var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            return expr.test(email);
        };
        $("#email").keyup(function() {
            if (!ValidateLemail($("#email").val())) {
                //alert("Invalid email address.");
                $('#btn_submit').prop('disabled', true);
            } else {
                $('#btn_submit').prop('disabled', false);
            }
        });
        $("#pass2").keyup(function() {
            var pass = document.getElementById("pass1").value;
            var passconfirm = document.getElementById("pass2").value;
            if (pass == passcomfirm) {
                $("#regsub").attr('disabled', false);
            } else {
                $("#regsub").attr('disable', true);
            }
        });
    });
    $(document).ready(function() {
        var pid = $('#pid').val();
        if (pid != '') {
            $('#newmodel').modal('show');
        }
    });

    function scrollFunction() {
        if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
            document.getElementById("navbar").style.padding = "30px 10px";
            document.getElementById("logo").style.fontSize = "25px";
        } else {
            document.getElementById("navbar").style.padding = "80px 10px";
            document.getElementById("logo").style.fontSize = "35px";
        }
    }
    $(document).ready(function() {
        var status = $('#status').val();
        if (status == 'wrong') {

            $('#elegantModalForm').modal('show');
            var oldURL = "<?= base_url() ?>" + "?status=wrong";
            var index = 0;
            var newURL = oldURL;
            index = oldURL.indexOf('?');
            if (index == -1) {
                index = oldURL.indexOf('#');
            }
            if (index != -1) {
                newURL = oldURL.substring(0, index);
            }
        }
    });

    $('#person').keyup(function(event) {

        var key = event.keyCode || event.charCode;

        if (key == 8 || key == 46) {
            return false;
        }
        var person = $('#person').val();
        var subtotal = $('#subtotal').val();
        var sgst = $('#sgst').val();
        var cgst = $('#cgst').val();
        console.log(person);
        console.log(subtotal);
        var subcal = parseFloat(person) * parseFloat(subtotal);
        $('#subtoal').val(subcal);
        $('#subtotallabel').html('$ ' + subcal);

        var tax = (parseFloat(subcal) * parseFloat(2.5)) / parseFloat(100);
        $('#sgst').val(tax);
        $('#cgst').val(tax);
        $('#sgstlabel').html('$ ' + tax);
        $('#cgstlabel').html('$ ' + tax);

        var total = parseFloat(subcal) + parseFloat(tax) + parseFloat(tax);
        $('#total').val(total);
        $('#totallabel').html('$ ' + total);

    });
</script>

</body>

</html>