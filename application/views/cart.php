<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Cart</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('Shop') ?>">Shop</a></li>
                    <li class="breadcrumb-item active">Cart</li>
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
            <div class="col-lg-12">
                <div class="table-main table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Images</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $totalPrice=0;
                            foreach ($getCart as $key => $value) {
                                $totalPrice=$totalPrice+$value->price;
                                ?>
                                <tr>
                                    <td class="thumbnail-img">
                                        <a href="#">
                                            <img class="img-fluid" src="<?= $value->image ?>" alt="" onerror="this.onerror=null;this.src='http://localhost/ci/asset/image/productImage.jpg';"/>
                                        </a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="#">
                                            <?= $value->productName; ?>
                                        </a>
                                    </td>
                                    <td class="price-pr">
                                        <p><i class="fa fa-inr" aria-hidden="true"></i> <?= $value->price; ?></p>
                                    </td>
                                    <td class="remove-pr">
                                        <a href="#">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                <?php } ?>
                                </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-lg-6 col-sm-6">
                <div class="coupon-box">
                    <div class="input-group input-group-sm">
                        <input class="form-control" placeholder="Enter your coupon code" aria-label="Coupon code" type="text">
                        <div class="input-group-append">
                            <button class="btn btn-theme" type="button">Apply Coupon</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="update-box">
                    <input value="Update Cart" type="submit">
                </div>
            </div>
        </div>
        <form action="" method="post">
        <div class="row my-5">
            <div class="col-lg-8 col-sm-12"></div>
            <div class="col-lg-4 col-sm-12">
                <div class="order-box">
                    <h3>Order summary</h3>
                    <div class="d-flex">
                        <h4>Sub Total</h4>
                        <div class="ml-auto font-weight-bold" id="subtotallabel"> $ <?= $totalPrice ?> </div>
                        <input type="hidden" id="subtotal" value="<?= $totalPrice ?>">
                    </div>
                    <div class="d-flex">
                        <h4>Total Person</h4>
                        <div class="ml-auto font-weight-bold"> <input type="number" class="form-control" id="person" value="1" style="width:65px;"></div>
                    </div>
                    <div class="d-flex">
                        <h4>SGST (2.5%)</h4>
                        <div class="ml-auto font-weight-bold" id="sgstlabel"> $ <?php echo $sgst=round(($totalPrice * 2.5) / 100,2); ?> </div>
                        <input type="hidden" class="form-control" id="sgst" value="<?= $sgst ?>" style="width:65px;">
                    </div>
                    <div class="d-flex">
                        <h4>CGS (2.5%)</h4>
                        <div class="ml-auto font-weight-bold" id="cgstlabel"> $ <?= $sgst ?> </div>
                        <input type="hidden" class="form-control" id="cgst" value="<?= $sgst ?>" style="width:65px;">
                    </div>
                    <div class="d-flex">
                        <h4>Shipping Cost</h4>
                        <div class="ml-auto font-weight-bold"> Free </div>
                    </div>
                    <hr>
                    <div class="d-flex gr-total">
                        <h5>Grand Total</h5>
                        <div class="ml-auto h5" id="totallabel"> $ <?= $totalPrice+$sgst+$sgst ?> </div>
                        <input type="hidden" class="form-control" id="total" value="<?= $totalPrice+$sgst+$sgst ?>" style="width:65px;">
                    </div>
                    <hr>
                </div>
            </div>
            <div class="col-12 d-flex shopping-box"><a href="<?= base_url('Checkout'); ?>" class="ml-auto btn hvr-hover">Checkout</a> </div>
        </div>
                            </form>
    </div>
</div>
<!-- End Cart -->
