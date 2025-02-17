<?php include("includes/header.php") ?>

<section class="section-cart wrapper">
    <div class=" section-cart-container wrapper-extra ">
        <h3 class="section-header">
            My Cart
        </h3>
        <div class="cart-container cart-products row ">
            <div class="col col-12 col-lg-8 cart-container body-basket">
                <?php echo $basket->processUserBasket("product_basket_Template"); ?>
            </div>
            <div class="col col-12 col-lg-4 cart-container cart-overview">
                <h5>Overview</h5>
                <div class="cart-total flex-row">
                    <span>Subtotal (<?php echo $basket->getNumberTotal(); ?> items)</span>
                    <span class="basket_total"> <b>£<?php echo $basket->getTotal(); ?></b></span>

                </div>
                <a href="check_out.php">
                    <button class="button-custom">Proceed to Checkout</button>
                </a>

            </div>
        </div>
    </div>

</section>



<?php include("includes/footer.php") ?>