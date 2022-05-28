<?php

use App\Database\Models\Product;
use App\Database\Models\Review;
use App\Database\Models\Spec;

$title = "Product details";
include_once "layouts/header.php";

$Products = new Product;
$specObject = new Spec;
$reviewObject = new Review;


if ($_GET) {

    if (isset($_GET['id_product'])) {
        if (is_numeric($_GET['id_product'])) {
            $Products->setId($_GET['id_product']);

            $ProductStmt = $Products->getOneProductById()->get_result();
            if ($ProductStmt->num_rows == 1) {
                $Product = $ProductStmt->fetch_object();
            } else {
                include "layouts/errors/404.php";
                die;
            }
        } else {
            include "layouts/errors/404.php";
            die;
        }
    } else {
        include "layouts/errors/404.php";
        die;
    }
} else {
    include "layouts/errors/404.php";
    die;
}

include_once "layouts/navbar.php";
include_once "layouts/breadcrumb.php";

?>
<!-- Product Deatils Area Start -->
<div class="product-details pt-100 pb-95">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="product-details-img">
                    <img class="zoompro" src="assets/img/product/<?php echo $Product->image; ?>" alt="zoom" />
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="product-details-content">
                    <h4><?php echo $Product->name_en; ?></h4>
                    <div class="rating-review">
                        <div class="pro-dec-rating">
                            <?php
                            for ($i = 1; $i <= $Product->reviews_avg; $i++) { ?>
                                <i class="ion-android-star-outline theme-star"></i>
                            <?php }
                            for ($i = 1; $i <= 5 - $Product->reviews_avg; $i++) { ?>
                                <i class="ion-android-star-outline"></i>
                            <?php }
                            ?>
                        </div>
                        <div class="pro-dec-review">
                            <ul>
                                <li><?php echo $Product->reviews_count; ?> Reviews </li>
                                <li> Add Your Reviews</li>
                            </ul>
                        </div>
                    </div>
                    <span><?php echo $Product->price . " LE"; ?></span>
                    <div class="in-stock">
                        <?php
                        if ($Product->quantity >= 5) {
                            $messege = "In Stock";
                            $color = "success";
                        } elseif ($Product->quantity > 0 && $Product->quantity < 5) {
                            $messege = "In Stock";
                            $color = "warning";
                        } else {
                            $messege = "Out of Stock";
                            $color = "danger";
                        }
                        ?>
                        <p>Available: <span class="text-<?php echo $color; ?>"><?php echo $messege . '(' . $Product->quantity . ')'; ?></span></p>
                    </div>
                    <p><?php echo $Product->details_en; ?></p>
                    <div class="pro-dec-feature">
                        <ul>
                            <?php
                            $specObject->setProduct_id($_GET['id_product']);
                            $specs = $specObject->getSpecOfProduct()->get_result();
                            if ($specs->num_rows >= 1) {
                                foreach ($specs->fetch_all(MYSQLI_ASSOC) as $spec) { ?>
                                    <li><?php echo $spec['name']; ?>: <span> <?php echo $spec['value']; ?></span></li>
                            <?php }
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="quality-add-to-cart">
                        <div class="quality">
                            <label>Qty:</label>
                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="02">
                        </div>
                        <div class="shop-list-cart-wishlist">
                            <?php
                            if ($Product->quantity > 0) { ?>
                                <a title="Add To Cart" href="#">
                                    <i class="icon-handbag"></i>
                                </a>
                            <?php }
                            ?>

                            <a title="Wishlist" href="#">
                                <i class="icon-heart"></i>
                            </a>
                        </div>
                    </div>
                    <div class="pro-dec-categories">
                        <ul>
                            <li class="categories-title"><a href="shop.php?id_category=<?php echo $Product->categories_id; ?>"><?php echo $Product->categories_name_en; ?></a></li>
                            <li><a href="shop.php?id_subcategory=<?php echo $Product->subcategory_id; ?>"><?php echo $Product->subcategories_name_en; ?></a></li>
                            <li><a href="shop.php?id_brand=<?php echo $Product->brand_id; ?>"><?php echo $Product->brands_name_en; ?></a></li>
                        </ul>
                    </div>
                    <div class="pro-dec-social">
                        <ul>
                            <li><a class="tweet" href="#"><i class="ion-social-twitter"></i> Tweet</a></li>
                            <li><a class="share" href="#"><i class="ion-social-facebook"></i> Share</a></li>
                            <li><a class="google" href="#"><i class="ion-social-googleplus-outline"></i> Google+</a></li>
                            <li><a class="pinterest" href="#"><i class="ion-social-pinterest"></i> Pinterest</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Deatils Area End -->
<div class="description-review-area pb-70">
    <div class="container">
        <div class="description-review-wrapper">
            <div class="description-review-topbar nav text-center">
                <a class="active" data-toggle="tab" href="#des-details1">Description</a>
                <a data-toggle="tab" href="#des-details3">Review</a>
            </div>
            <div class="tab-content description-review-bottom">
                <div id="des-details1" class="tab-pane active">
                    <div class="product-description-wrapper">
                        <p><?php echo $Product->details_en; ?></p>
                    </div>
                </div>

                <div id="des-details3" class="tab-pane">
                    <div class="rattings-wrapper">
                        <?php
                        $reviewObject->setProduct_id($_GET['id_product']);
                        $reviews = $reviewObject->getReview()->get_result();
                        if ($reviews->num_rows >= 1) {
                            foreach ($reviews->fetch_all(MYSQLI_ASSOC) as $review) { ?>
                                <div class="sin-rattings">
                                    <div class="star-author-all">
                                        <div class="ratting-star f-left">
                                            <?php
                                            for ($i = 1; $i <= $review['rate']; $i++) { ?>
                                                <i class="ion-star theme-color"></i>
                                            <?php }
                                            for ($i = 1; $i <= 5 - $review['rate']; $i++) { ?>
                                                <i class="ion-android-star-outline"></i>
                                            <?php }
                                            ?>
                                            <span><?php echo $review['rate'] ?></span>
                                        </div>
                                        <div class="ratting-author f-right">
                                            <h3><?php echo $review['name'] ?></h3>
                                            <span><?php echo $review['created_at'] ?></span>
                                        </div>
                                    </div>
                                    <p><?php echo $review['comment'] ?></p>
                                </div>
                        <?php }
                        }
                        ?>
                    </div>

                    <div class="ratting-form-wrapper">
                        <h3>Add your Comments :</h3>
                        <div class="ratting-form">
                            <form action="#">
                                <div class="star-box">
                                    <h2>Rating:</h2>
                                    <div class="ratting-star">
                                        <i class="ion-star theme-color"></i>
                                        <i class="ion-star theme-color"></i>
                                        <i class="ion-star theme-color"></i>
                                        <i class="ion-star theme-color"></i>
                                        <i class="ion-star"></i>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="rating-form-style mb-20">
                                            <input placeholder="Name" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="rating-form-style mb-20">
                                            <input placeholder="Email" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="rating-form-style form-submit">
                                            <textarea name="message" placeholder="Message"></textarea>
                                            <input type="submit" value="add review">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-area pb-100">
    <div class="container">
        <div class="product-top-bar section-border mb-35">
            <div class="section-title-wrap">
                <h3 class="section-title section-bg-white">Related Products</h3>
            </div>
        </div>
        <div class="featured-product-active hot-flower owl-carousel product-nav">
            <div class="product-wrapper">
                <div class="product-img">
                    <a href="product-details.php">
                        <img alt="" src="assets/img/product/product-1.jpg">
                    </a>
                    <span>-30%</span>
                    <div class="product-action">
                        <a class="action-wishlist" href="#" title="Wishlist">
                            <i class="ion-android-favorite-outline"></i>
                        </a>
                        <a class="action-cart" href="#" title="Add To Cart">
                            <i class="ion-ios-shuffle-strong"></i>
                        </a>
                        <a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                            <i class="ion-ios-search-strong"></i>
                        </a>
                    </div>
                </div>
                <div class="product-content text-left">
                    <div class="product-hover-style">
                        <div class="product-title">
                            <h4>
                                <a href="product-details.php">Le Bongai Tea</a>
                            </h4>
                        </div>
                        <div class="cart-hover">
                            <h4><a href="product-details.php">+ Add to cart</a></h4>
                        </div>
                    </div>
                    <div class="product-price-wrapper">
                        <span>$100.00 -</span>
                        <span class="product-price-old">$120.00 </span>
                    </div>
                </div>
            </div>
            <div class="product-wrapper">
                <div class="product-img">
                    <a href="product-details.php">
                        <img alt="" src="assets/img/product/product-2.jpg">
                    </a>
                    <div class="product-action">
                        <a class="action-wishlist" href="#" title="Wishlist">
                            <i class="ion-android-favorite-outline"></i>
                        </a>
                        <a class="action-cart" href="#" title="Add To Cart">
                            <i class="ion-ios-shuffle-strong"></i>
                        </a>
                        <a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                            <i class="ion-ios-search-strong"></i>
                        </a>
                    </div>
                </div>
                <div class="product-content text-left">
                    <div class="product-hover-style">
                        <div class="product-title">
                            <h4>
                                <a href="product-details.php">Society Ice Tea</a>
                            </h4>
                        </div>
                        <div class="cart-hover">
                            <h4><a href="product-details.php">+ Add to cart</a></h4>
                        </div>
                    </div>
                    <div class="product-price-wrapper">
                        <span>$100.00 -</span>
                        <span class="product-price-old">$120.00 </span>
                    </div>
                </div>
            </div>
            <div class="product-wrapper">
                <div class="product-img">
                    <a href="product-details.php">
                        <img alt="" src="assets/img/product/product-3.jpg">
                    </a>
                    <span>-30%</span>
                    <div class="product-action">
                        <a class="action-wishlist" href="#" title="Wishlist">
                            <i class="ion-android-favorite-outline"></i>
                        </a>
                        <a class="action-cart" href="#" title="Add To Cart">
                            <i class="ion-ios-shuffle-strong"></i>
                        </a>
                        <a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                            <i class="ion-ios-search-strong"></i>
                        </a>
                    </div>
                </div>
                <div class="product-content text-left">
                    <div class="product-hover-style">
                        <div class="product-title">
                            <h4>
                                <a href="product-details.php">Green Tea Tulsi</a>
                            </h4>
                        </div>
                        <div class="cart-hover">
                            <h4><a href="product-details.php">+ Add to cart</a></h4>
                        </div>
                    </div>
                    <div class="product-price-wrapper">
                        <span>$100.00 -</span>
                        <span class="product-price-old">$120.00 </span>
                    </div>
                </div>
            </div>
            <div class="product-wrapper">
                <div class="product-img">
                    <a href="product-details.php">
                        <img alt="" src="assets/img/product/product-4.jpg">
                    </a>
                    <div class="product-action">
                        <a class="action-wishlist" href="#" title="Wishlist">
                            <i class="ion-android-favorite-outline"></i>
                        </a>
                        <a class="action-cart" href="#" title="Add To Cart">
                            <i class="ion-ios-shuffle-strong"></i>
                        </a>
                        <a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                            <i class="ion-ios-search-strong"></i>
                        </a>
                    </div>
                </div>
                <div class="product-content text-left">
                    <div class="product-hover-style">
                        <div class="product-title">
                            <h4>
                                <a href="product-details.php">Best Friends Tea</a>
                            </h4>
                        </div>
                        <div class="cart-hover">
                            <h4><a href="product-details.php">+ Add to cart</a></h4>
                        </div>
                    </div>
                    <div class="product-price-wrapper">
                        <span>$100.00 -</span>
                        <span class="product-price-old">$120.00 </span>
                    </div>
                </div>
            </div>
            <div class="product-wrapper">
                <div class="product-img">
                    <a href="product-details.php">
                        <img alt="" src="assets/img/product/product-5.jpg">
                    </a>
                    <span>-30%</span>
                    <div class="product-action">
                        <a class="action-wishlist" href="#" title="Wishlist">
                            <i class="ion-android-favorite-outline"></i>
                        </a>
                        <a class="action-cart" href="#" title="Add To Cart">
                            <i class="ion-ios-shuffle-strong"></i>
                        </a>
                        <a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                            <i class="ion-ios-search-strong"></i>
                        </a>
                    </div>
                </div>
                <div class="product-content text-left">
                    <div class="product-hover-style">
                        <div class="product-title">
                            <h4>
                                <a href="product-details.php">Instant Tea Premix</a>
                            </h4>
                        </div>
                        <div class="cart-hover">
                            <h4><a href="product-details.php">+ Add to cart</a></h4>
                        </div>
                    </div>
                    <div class="product-price-wrapper">
                        <span>$100.00 -</span>
                        <span class="product-price-old">$120.00 </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once "layouts/footer.php";
require_once "layouts/footer-scripts.php";
?>