<!-- Start All Title Box -->
<style>
    .filter-option {
        background-color: black;
        font-weight: 600;
        margin-bottom: 5px;

    }

    #desc {
        width: 250px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Shop</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Shop</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->
<a class="" id="alert-target"></a>
<!-- Start Shop Page  -->
<div class="shop-box-inner">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                <div class="product-categori">
                    <div class="search-product">
                        <form action="<?= base_url() . 'shop/index' ?>" method="get">
                            <input class="form-control" placeholder="Search here..." type="text" name="search" value="<?php if (isset($_GET['search']) && $_GET['search'] != '') {
                                                                                                                            echo $_GET['search'];
                                                                                                                        } ?>">
                            <button type="submit"> <i class="fa fa-search"></i> </button>
                        </form>
                    </div>
                    <div class="filter-sidebar-left">
                        <div class="title-left">
                            <h3>Categories</h3>
                        </div>
                        <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                            <a href="<?= base_url() . 'shop/index/' ?>" class="list-group-item list-group-item-action <?php if ($cid == "All") {
                                                                                                                            echo 'active';
                                                                                                                        } ?>">All</a>
                            <?php
                            foreach ($allCategory as $key => $value) { ?>
                                <a href="<?= base_url() . 'shop/index/' . $value->categoryid ?>" class="list-group-item list-group-item-action <?php if ($cid == $value->categoryid) {
                                                                                                                                                    echo 'active';
                                                                                                                                                } ?>"> <?= $value->name ?></a>
                            <?php } ?>
                        </div>
                        <input type="hidden" name="category" id="category" value="<?= $value->categoryid ?>">
                    </div>
                    <div class="filter-brand-left">
                        <div class="title-left">
                            <h3>Package</h3>
                        </div>
                        <div class="brand-box">
                            <ul>
                                <?php
                                foreach ($allPackage as $key => $value) { ?>
                                    <a href="<?= base_url() . 'package/' . $value->packageId ?>" class="list-group-item list-group-item-action"> <?= $value->packageName ?></a>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>



                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                <div class="right-product-box">
                    <div class="product-item-filter row">
                        <div class="col-12 col-sm-8 text-center text-sm-left">
                            <div class="toolbar-sorter-right" style="margin-bottom: 10px;">
                                <span>Sort by </span>
                                <select id="sort" class="selectpicker show-tick form-control" data-placeholder="$ USD" style="margin-bottom:5px;">
                                    <option value="nothing" <?php if ($this->uri->segment(4) != '' && $this->uri->segment(4) == 'nothing') {
                                                                echo 'selected';
                                                            } ?>>Name</option>
                                    <option value="priceDesc" <?php if ($this->uri->segment(4) != '' && $this->uri->segment(4) == 'priceDesc') {
                                                                    echo 'selected';
                                                                } ?>>High Price → Low Price</option>
                                    <option value="PriceAsc" <?php if ($this->uri->segment(4) != '' && $this->uri->segment(4) == 'PriceAsc') {
                                                                    echo 'selected';
                                                                } ?>>Low Price → High Price</option>

                                </select>
                            </div>
                            <p>Showing all <?= count($product) ?> results</p>
                        </div>

                    </div>

                    <div class="row product-categorie-box">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                <div class="row">
                                    <?php foreach ($product as $key => $value) { ?>
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <a data-dismiss="modal" data-toggle="modal" data-target="#modalQuickView<?= $value->productId ?>"><img src="<?= $value->image; ?>" class="img-fluid" alt="Image" onerror="this.onerror=null;this.src='http://localhost/ci/asset/image/productImage.jpg';"></a>
                                                    <div class="mask-icon">
                                                        <a class="cart add_cart" href="javascript:void(0);" data-id="<?= $value->productId ?>">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <a data-dismiss="modal" data-toggle="modal" data-target="#modalQuickView<?= $value->productId ?>">
                                                        <h4><?= $value->productName ?></h4>
                                                        <h5><i class="fa fa-inr" aria-hidden="true"></i>&nbsp;<?= $value->price ?></h5>
                                                        <p id="desc"><?= $value->desc ?></p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal: modalQuickView -->
                                        <div class="modal fade" id="modalQuickView<?= $value->productId ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-lg-5">
                                                                <img class="d-block w-100" src="<?= $value->image; ?>" alt="First slide" onerror="this.onerror=null;this.src='http://localhost/ci/asset/image/productImage.jpg';">
                                                            </div>
                                                            <div class="col-lg-7">
                                                                <h2 class="h2-responsive product-name">
                                                                    <strong><?= $value->productName ?></strong>
                                                                </h2>
                                                                <h4 class="h4-responsive">
                                                                    <span class="green-text">
                                                                        <strong> <i class="fa fa-inr" aria-hidden="true"></i> <?= $value->price ?></strong>
                                                                    </span>
                                                                </h4>

                                                                <!--Accordion wrapper-->
                                                                <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                                                                    <!-- Accordion card -->
                                                                    <div class="card" style="box-shadow:none;">
                                                                        <!-- Card header -->

                                                                        <!-- Card body -->
                                                                        <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordionEx">
                                                                            <div class="card-body">
                                                                                <?= $value->desc ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- Accordion card -->
                                                                </div>
                                                                <!-- Accordion wrapper -->

                                                                <!-- Add to Cart -->
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                        </div>
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <button type="button" class="btn hvr-hover" data-dismiss="modal" style="box-shadow:none;">
                                                                            Close
                                                                        </button>
                                                                        <button class=" btn hvr-hover cart add_cart" href="javascript:void(0);" data-id="<?= $value->productId ?>" style="box-shadow:none;">
                                                                            Add to cart
                                                                            <i class="fas fa-cart-plus ml-2" aria-hidden="true"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <!-- /.Add to Cart -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Shop Page -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script>
    $('#sort').change(function() {
        console.log('ok');
        var type = $(this).val();
        var category = $('#category').val();
        location.href = "<?= base_url() . 'shop/index/' ?>" + category + '/' + type;


    });

    $('.add_cart').click(function() {
        console.log('ok');
        var pid = $(this).data('id');
        console.log(pid);
        $.ajax({
            type: "POST",
            url: "<?= base_url() . 'shop/addCart' ?>",
            data: {
                pid: pid
            },
            dataType: "text",
            success: function(data) {
                var res = JSON.parse(data);
                if (res.error == 'yes') {
                    $('#pid').val(res.pid);
                    $('#lpid').val(res.pid);
                    $('#elegantModalForm').modal('show');
                } else {

                    if (res.response == 'duplicate') {
                        console.log('ok');
                        toastr.error("item already in cart!");
                    } else {
                        toastr.success("item added succesfully in cart!");
                    }

                }
            }
        });



    });
</script>