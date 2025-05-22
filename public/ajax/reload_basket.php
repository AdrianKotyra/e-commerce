<?php  header('Content-Type: application/json');?>
<?php session_start()?>
<?php include "../php/init.php"?>

<?php
    global $basket;

    if (isset($_POST["data"])) {

        $total_items = $basket->getNumberTotal();
        $total_price = $basket->getTotal();
        // RELOAD BASKET BUTTON IF THERE ARE ANY ITEMS IN THE BASKET
        $basket_button_checkout = "";
        if ($total_items >= 1) {
            $basket_button_checkout = '
            <div class="footer-basket">
                <div class="price-basket flex-row">
                    <h5>Total</h5>
                    <h5>£<span class="basket_total">'. $total_price.'</span></h5>
                </div>
                <a href="check_out.php" class="checkout_basket">
                    <button class="button-custom checkout-button-basket">
                        Proceed to Checkout
                    </button>
                </a>
                <a class="cart-link" href="cart.php">
                    <button class="button-custom cart-button">
                        Your Cart
                    </button>
                </a>
            </div>';
        } else {
               $basket_button_checkout = "";
        }



        $user_basket = $basket->processUserBasket("product_basket_Template");
        $number_items = $basket-> getNumber();

        $data = [$user_basket, $total_price, $number_items, $basket_button_checkout];


        echo json_encode($data);  // Return JSON encoded data
    }
?>
