<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>My Account</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active">My Account</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start My Account  -->
<div class="container">
    <div class="my-account-box-main">
        <div class="container">
            <div class="my-account-page">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="account-box">
                            <div class="service-box">
                                <div class="service-icon">
                                    <a href="#"> <i class="fa fa-gift"></i> </a>
                                </div>
                                <div class="service-desc">
                                    <h4>Your Orders</h4>
                                    <p>Track, return, or buy things again</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="account-box">
                            <div class="service-box">
                                <div class="service-icon">
                                    <a href="" data-toggle="modal" data-target="#elegantAccountForm"><i class="fa fa-lock"></i> </a>

                                </div>
                                <div class="service-desc">
                                    <a href="" data-toggle="modal" data-target="#elegantAccountForm">
                                        <h4>Login &amp; security</h4>
                                    </a <p>Edit login, name, and mobile number</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="account-box">
                            <div class="service-box">
                                <div class="service-icon">
                                    <a href="" data-dismiss="modal" data-toggle="modal" data-target="#elegantAddressForm"> <i class="fa fa-location-arrow"></i> </a>
                                </div>
                                <div class="service-desc">
                                    <a href="" data-dismiss="modal" data-toggle="modal" data-target="#elegantAddressForm">
                                        <h4>Your Addresses</h4>
                                    </a>
                                    <p>Edit addresses for orders and gifts</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Account Information Modal -->
    <div class="modal fade" id="elegantAccountForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <!--Content-->
            <div class="modal-content form-elegant">
                <!--Header-->
                <div class="modal-header text-center" style="background:#d33b33;">
                    <h3 class="modal-title w-100 white-text font-weight-bold my-3" id="myModalLabel"><strong>Account Information</strong></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!--Body-->
                <div class="modal-body mx-4">
                    <!--Body-->
                    <form action="<?php echo base_url() ?>accountUpdate" method="post" id="editProfile" role="form">
                        <div class="md-form mb-5">
                            <input type="email" id="changeEmail" name="changeEmail" class="form-control validate" placeholder="<?= $_SESSION['email'] ?>" value="<?= $_SESSION['email']; ?>" required>
                            <label data-error="wrong"  for="changeEmail">Your email</label>
                        </div>
                        <div class="md-form mb-5">
                            <input type="text" id="changeName" name="changeName" class="form-control validate" placeholder="<?= $_SESSION['name'] ?>" value="<?= $_SESSION['name']; ?>" required>
                            <label data-error="wrong"  for="changeName">Full Name</label>
                        </div>
                        <div class="md-form mb-5">
                            <input type="number" id="changeMobile" name="changeMobile" class="form-control validate" placeholder="<?= $_SESSION['mobile'] ?>" value="<?= $_SESSION['mobile']; ?>" required>
                            <label data-error="wrong"  for="changemobile">Mobile number</label>
                        </div>
                        <div class="md-form pb-3">
                            <p class="font-small blue-text d-flex justify-content-end"><a href="#" data-dismiss="modal" data-toggle="modal" data-target="#changePasswordForm" class="blue-text ml-1">
                                    Change Password</a></p>
                        </div>

                        <div class="text-center mb-3">
                            <button type="submit" class="btn hvr-hover">Submit</button>
                        </div>
                    </form>
                </div>
                <!--Footer-->
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!-- Account Information Modal -->
    <!-- Change Password Modal -->
    <div class="modal fade" id="changePasswordForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <!--Content-->
            <div class="modal-content form-elegant">
                <!--Header-->
                <div class="modal-header text-center" style="background:#d33b33;">
                    <h3 class="modal-title w-100 white-text font-weight-bold my-3" id="myModalLabel"><strong>Change Password</strong></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!--Body-->
                <form action="<?php echo base_url() ?>account/changePassword" method="post" id="changePassword" role="form">
                    <div class="modal-body mx-4">
                        <!--Body-->
                        <div class="md-form mb-5">
                            <label for="inputPassword1">Old Password</label>
                            <input type="password" class="form-control" id="inputOldPassword" name="oldPassword" maxlength="20" required>
                        </div>
                        <div class="md-form mb-5">
                            <label for="inputPassword1">New Password</label>
                            <input type="password" class="form-control" id="inputPassword1" name="newPassword" maxlength="20" required>
                        </div>
                        <div class="md-form mb-5">
                            <label for="inputPassword2">Confirm New Password</label>
                            <input type="password" class="form-control" id="inputPassword2" name="cNewPassword" maxlength="20" required>
                            <p class="font-small blue-text d-flex justify-content-end"><a href="#" data-dismiss="modal" data-toggle="modal" data-target="#elegantAccountForm" class="blue-text ml-1">
                                    Change Account Information</a></p>
                        </div>
                    </div>
                    <div class="text-center mb-3">
                        <button type="submit" class="btn hvr-hover">Submit</button>
                    </div>
            </div>
            </form>
            <!--Footer-->
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- Change Password Modal -->
<!-- Address Modal -->
<div class="modal fade" id="elegantAddressForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content form-elegant">
            <!--Header-->
            <div class="modal-header text-center" style="background:#d33b33;">
                <h3 class="modal-title w-100 white-text font-weight-bold my-3" id="myModalLabel"><strong>Saved Addresses</strong></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body mx-4">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <a class="btn hvr-hover" data-toggle="collapse" href="#formAdd" role="button" aria-expanded="false" style="box-shadow:none;"><i class="fa fa-location-arrow" aria-hidden="true"></i> Add New</a>
                        <form class="mt-3 collapse review-form-box" id="formAdd" action="<?= base_url() ?>Account/addAddress" method="POST">
                            <div class="title-left">
                                <h3><i class="fa fa-plus" aria-hidden="true"></i> Save</h3>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="InputName" class="mb-0">Name</label>
                                    <input type="text" class="form-control" id="InputName">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="InputAdd" class="mb-0">Address</label>
                                    <textarea class="form-control" id="InputAdd"></textarea>
                                </div>
                            </div>
                <button type="submit" class="btn hvr-hover">Update</button>
                <div class="title-left">
                </div>
                </form>
                <?php foreach ($getAddress as $key => $value) { ?>
                    <a class="btn hvr-hover" data-toggle="collapse" href="#form<?= $value->addName ?>" role="button" aria-expanded="false" style="box-shadow:none;"><?= $value->addName ?></a>
                    <div class="container">
                        <form class="mt-3 collapse review-form-box" id="form<?= $value->addName ?>" action="<?= base_url() ?>Account/editAddress" method="POST">
                            <div class="title-left">
                                <h3><?= $value->addName ?></h3>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="InputName" class="mb-0">Address</label>
                                    <textarea class="form-control" id="InputName"><?= $value->address ?></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn hvr-hover">Update</button>
                            <button href="<?= base_url(); ?>Account/deleteAddress" class="btn hvr-hover" style="box-shadow:none; background:black;">Delete</button>
                        </form>
                    </div>
                <?php } ?>
                </ul>
            </div>
        </div>
        <!--Body-->
        <!--Footer-->
    </div>
    <!--/.Content-->
</div>
</div>
<!-- Address Modal -->
</div>
<!-- End My Account -->