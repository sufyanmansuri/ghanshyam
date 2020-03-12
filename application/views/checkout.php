<script src="<?= base_url('') ?>asset/js/cities.js"></script>
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Checkout</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('Shop'); ?>">Shop</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Cart  -->
<div class="cart-box-main">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-6 mb-3">
                <div class="checkout-address">
                    <div class="title-left">
                        <h3>Billing address</h3>
                    </div>
                    <form class="needs-validation" action="<?= base_url('placeOrder') ?>" method="post">
                        <div class="mb-3">
                            <label for="billname">Full Name *</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="billname" placeholder="" required>
                                <div class="invalid-feedback" style="width: 100%;"> Your name is required. </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="mobile">Mobile Number *</label>
                            <input type="number" class="form-control" id="mobile" placeholder="" required maxlength="10" minlength="10">
                            <div class="invalid-feedback"> Please enter a valid mobile number for shipping updates. </div>
                        </div>
                        <div class="mb-3">
                            <label for="address">Address *</label>
                            <input type="text" class="form-control" id="address" placeholder="" required>
                            <div class="invalid-feedback"> Please enter your shipping address. </div>
                        </div>
                        <div class="mb-3">
                        </div>
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="country">State *</label>
                                <select onchange="print_city('state', this.selectedIndex);" id="sts" name="stt" class="form-control" required></select>
                                <script language="javascript">
                                    print_state("sts");
                                </script>
                                <div class="invalid-feedback"> Please select a valid State. </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="state">City *</label>
                                <select id="state" class="form-control" required></select>
                                <div class="invalid-feedback"> Please provide a valid City. </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="zip">Zip *</label>
                                <input type="text" class="form-control" id="zip" placeholder="" required maxlength="6" minlength="6" required>
                                <div class="invalid-feedback"> Zip code required. </div>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="sameAdd" value="sameAdd">
                            <label class="custom-control-label" for="sameAdd">Shipping address is the same as my billing address</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="save-info" value="saveAdd">
                            <label class="custom-control-label" for="save-info">Save this information for next time</label>
                        </div>
                        <hr class="mb-4">


                </div>
            </div>
            <div class="col-sm-6 col-lg-6 mb-3">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                    </div>
                    <div class="col-md-12 col-lg-12">
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="order-box">
                            <div class="title-left">
                                <h3>Your order</h3>
                            </div>
                            <hr class="my-1">
                            <div class="d-flex">
                                <h4>Sub Total</h4>
                                <div class="ml-auto font-weight-bold"><i class="fa fa-inr">&nbsp;</i><?= $_SESSION['subtotal'] ?> </div>
                            </div>
                            <div class="d-flex">
                            </div>
                            <hr class="my-1">
                            <div class="d-flex">
                                <h4>Persons</h4>
                                <div class="ml-auto font-weight-bold"></i><?= $_SESSION['person'] ?> </div>
                            </div>
                            <div class="d-flex">
                                <h4>CGST(2.5%)</h4>
                                <div class="ml-auto font-weight-bold"><i class="fa fa-inr">&nbsp;</i><?= $_SESSION['cgst'] ?> </div>
                            </div>
                            <div class="d-flex">
                                <h4>SGST(2.5%)</h4>
                                <div class="ml-auto font-weight-bold"><i class="fa fa-inr">&nbsp;</i><?= $_SESSION['sgst'] ?> </div>
                            </div>
                            <div class="d-flex">
                                <h4>Shipping Cost</h4>
                                <div class="ml-auto font-weight-bold"> Free </div>
                            </div>
                            <hr>
                            <div class="d-flex gr-total">
                                <h5>Grand Total</h5>
                                <div class="ml-auto h5"><i class="fa fa-inr">&nbsp;</i><?= $_SESSION['total'] ?> </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="col-12 d-flex shopping-box"> <button type="submit" class="ml-auto btn hvr-hover">Place Order</button> </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- End Cart -->