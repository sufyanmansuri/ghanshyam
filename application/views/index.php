<style>
   #desc {
    height:60px;
    line-height:20px; /* Height / no. of lines to display */
    overflow:hidden;
}
</style>
<!-- Start Slider -->
<div id="slides-shop" class="cover-slides">
    <ul class="slides-container">
        <li class="text-center">
            <img src="<?= base_url('asset/image/banner1.jpg') ?>" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>Welcome To <br> Ghanshyam Caterers</strong></h1>
                        <p class="m-b-40"><strong>We curate memorable fine-dine experiences worth cherishing</strong></p>

                    </div>
                </div>
            </div>
        </li>
        <li class="text-center">
            <img src="<?= base_url('asset/image/banner2.jpg') ?>" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>Welcome To <br> Ghanshyam Caterers</strong></h1>
                        <p class="m-b-40"><strong>We hand-craft culinary masterpieces of your favourite cuisines</strong></p>

                    </div>
                </div>
            </div>
        </li>
        <li class="text-center">
            <img src="<?= base_url('asset/image/banner3.jpg') ?>" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>Welcome To <br> Ghanshyam Caterers</strong></h1>
                        <p class="m-b-40"><strong>We offer scrumptious delicacies that leave you craving for more</strong></p>

                    </div>
                </div>
            </div>
        </li>
    </ul>
    <div class="slides-navigation">
        <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
        <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
    </div>
</div>
<!-- End Slider -->

<!-- Start Categories  -->
<div class="categories-shop">
    <div class="container">
        <div class="row">
            <?php
            foreach ($getCategory as $key => $value) { ?>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="rounded" src="<?= $value->categoryImage ?>" alt="" onerror="this.onerror=null;this.src='http://localhost/ci/asset/image/placeholder-category.jpg';" />
                        <a class="btn hvr-hover" href="<?= base_url() . 'shop/index/' . $value->categoryid ?>"><?= $value->name ?></a>
                    </div>

                </div>
            <?php } ?>

        </div>
    </div>
</div>
<!-- End Categories -->

<!-- Start Products  -->
<div class="products-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Featured Products</h1>
                    <!-- p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.<p -->
                </div>
            </div>
        </div>

        <div class="row special-list">
            <?php foreach ($getProduct as $key => $value) { ?>
                <div class="col-lg-3 col-md-6 special-grid best-seller">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <img src="<?= $value->image ?>" class="img-fluid" alt="<?= $value->productName ?>" onerror="this.onerror=null;this.src='http://localhost/ci/asset/image/productImage.jpg';">
                            <div class="mask-icon">
                                <a class="cart" href="#">Add to Cart</a>
                            </div>
                        </div>
                        <div class="why-text">
                            <h4><?= $value->productName ?></h4>
                            <h5><i class="fa fa-inr" aria-hidden="true"></i>&nbsp;<?= $value->price ?></h5>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- End Products  -->

<!-- Start Blog  -->
<div class="latest-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Packages</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($getPackage as $key => $value) { ?>
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="blog-box">
                        <div class="blog-img">
                            <img class="img-fluid" src="<?= $value->packageImage ?>" alt="" onerror="this.onerror=null;this.src='http://localhost/ci/asset/image/box.jpg';" />
                        </div>
                        <div class="blog-content">
                            <div class="title-blog">
                                <h3><?= $value->packageName ?></h3>
                                <p id="desc"><?= $value->packageDesc ?></p>
                            </div>
                            <ul class="option-blog">
                                <li><a href="<?= base_url('package/').$value->packageId; ?>" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- End Blog  -->