<?php include("includes/header.php") ?>
<?php
    global $basket;

    $discount_applied = $basket->discount_applied;
    $checkout_products =  $basket->processUserBasket("product_checkout_Template");
    $user_total = $basket->getTotalCheckout();
    $discounted_price= $basket->getDiscountedPrice();

    $number_items = $basket->getNumberTotal();
    // return to home if not added items
    if($number_items<=0) {
        header("Location: index.php");
    }
?>

<section class="checkout-section">
    <div class="checkout_container wrapper">
        <div class="payment-col">
            <h3>Payment</h3>
            <div class="pay-pay-container">

                    <!-- ============PAYPAL============= -->
                <div id="paypal-button-container"></div>
                <p id="result-message"></p>


            </div>
        </div>


       <div class="container-prod-checkout flex-col">

            <div class="container-checkout-prods">

                <div class="checkout_products_col">
                <h3>Basket</h3>
                    <div class="prods-checkout-container-cols">
                        <?php echo $checkout_products;?>
                    </div>
                </div>
                <div class="delivery-container">
                    <h4>Delivery &nbsp;</h4>

                    <div class="delivery-col flex-row">
                        <div class="delivery-col-info  flex-row">
                            <input class="change_delivery" <?php echo $basket->delivery_option=="standard"?  'checked' : '';?> type="radio" id="html" name="delivery" value="standard">
                            <div class="flex-col">
                                <span class="name ">Standard Shipping</span>
                                <span class="time ">5-10 days</span>
                            </div>
                        </div>
                        <div class="delivery-col-price">
                            £ 4.99
                        </div>


                    </div>

                    <div class="delivery-col flex-row">
                        <div class="delivery-col-info  flex-row">
                            <input  class="change_delivery"  <?php echo $basket->delivery_option=="express"?  'checked' : '';?>  type="radio" id="html" name="delivery" value="express">
                            <div class="flex-col">
                                <span class="name">Express Shipping</span>
                                <span class="time">2-3 days</span>
                            </div>
                        </div>
                        <div class="delivery-col-price">
                            £ 7.99
                        </div>


                    </div>


                </div>
                <div class="total-checkout-container">

                    <span class="subtotal">Subtotal · <?php echo   $number_items; ?> items</span>

                    <div class="total-sub flex-row">
                    <h4>Products &nbsp;</h4>
                    <h4>£ <span class="display_total"><?php echo $basket->getTotal();?></span ></h4>
                    </div>


                    <div class="total-sub flex-row">
                    <h4>Delivery &nbsp;</h4>
                    <h4>£ <span class="display_total"><?php echo $basket->delivery_price;?></span ></h4>
                    </div>

                    <div class="total-sub flex-row">
                    <?php echo
                    $discount_applied==1? '
                    <h4>Discount &nbsp;</h4>
                    <h4><span class="display_total"> £ -'.$discounted_price.'</span ></h4>
                    ' : '';

                    ?>




                    </div>
                    <div class="total flex-row">

                        <h4>Total &nbsp;</h4>

                        <h4>£ <span class="display_total"><?php echo $user_total;?></span ></h4>
                        <input class="hidden-input"type="text" name="total" id="total_amount" value=<?php echo $user_total;?>>

                    </div>


                    <span><?php echo  $discount_applied==1? "Discount applied for purchases for over <b>£150 </b>(-15%)" : ""?></span>
                    <br>

                </div>
            </div>



        </div>





    </div>
</section>

<?php
$paypal_id = "AdD-sMw2qeU-LYOXjKBXZzlfnWT8t6uZCfu4oYctJ1xJ-nQpB1WozBcvKbkaM54-GDeAU2OJyvNpzune";
?>

<script

    src="https://www.paypal.com/sdk/js?client-id=<?php echo $paypal_id;?>&buyer-country=GB&currency=GBP&components=buttons&enable-funding=card&disable-funding=venmo,paylater"
    data-sdk-integration-source="developer-studio"
></script>






<?php include("includes/footer.php") ?>
<script src="js/pages/checkout.js"></script>
<script src="paypal/app.js"></script>