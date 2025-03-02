<?php include("includes/header.php") ?>
<?php
    if(isset($user->user_id)) {
        $user_id =  $user->user_id;
        $user_email = $user->user_email;
        $user_lastname = $user->user_lastname;
        $user_firstname = $user->user_firstname;
        $user_password =$user->user_password;
        $user_address = $user->user_address;
        $user_city = $user->user_city;
        $user_country = $user->user_country;
        $user_postcode = $user->user_postcode;
    }


?>

<section class="checkout-section">
    <div class="checkout_container wrapper-extra">
        <div class="payment-col">
            <h3>Payment</h3>
            <div class="pay-pay-container">

                    <!-- ============PAYPAL============= -->
                <div id="paypal-button-container"></div>
                <p id="result-message"></p>


            </div>
        </div>

        <?php
            global $basket;
            $checkout_products =  $basket->processUserBasket("product_checkout_Template");
            $user_total = $basket->getTotal();
            $number_items = $basket->getNumberTotal();
        ?>
       <div class="container-prod-checkout flex-col">

            <div class="container-checkout-prods">

                <div class="checkout_products_col">
                <h3>Basket</h3>
                    <div class="prods-checkout-container-cols">
                        <?php echo $checkout_products;?>
                    </div>
                </div>
                <div class="total-checkout-container">

                    <div class="check_out_discout flex-row">
                        <input  class="form-control"type="text" placeholder="Discount Code">
                        <button>Apply</button>
                    </div>

                    <span class="subtotal">Subtotal · <?php echo   $number_items; ?> items</span>
                    <div class="total flex-row">

                        <h4>Total &nbsp;</h4>

                        <h4>£<?php echo $user_total;?></h4>
                        <input class="hidden-input"type="text" name="total" id="total_amount" value=<?php echo $user_total;?>>

                    </div>


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
<script src="paypal/app.js"></script>