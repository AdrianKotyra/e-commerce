<?php session_start() ?>

<?php include "../../public/php/init.php"?>

<?php
global $product;
global $connection;
$order_id = isset($_POST["data"]) ? $_POST["data"] : "";


if(!empty($order_id) || $order_id!="") {

        $query = "SELECT * from orders where id =  $order_id";
        $select_users_query = mysqli_query($connection, $query);
        if (!$select_users_query) {
            die("Query Failed: " . mysqli_error($connection));
        }

        while($row = mysqli_fetch_assoc($select_users_query)) {
            $order_id_db = $row['id'];
            $transaction_id = $row['transaction_id'];
            $transaction_status = $row['transaction_status'];
            $transaction_amount = $row['transaction_amount'];
            $transaction_currency = $row['transaction_currency'];
            $transaction_time = $row['transaction_time'];

            // Sanitize and fetch payer details
            $payer_name = $row['payer_name'];
            $payer_email = $row['payer_email'];
            $payer_id = $row['payer_id'];
            $payer_phone = $row['payer_phone'];
            $payer_country = $row['payer_country'];

            // Sanitize and fetch shipping details
            $shipping_street = $row['shipping_street'];
            $shipping_city = $row['shipping_city'];
            $shipping_state = $row['shipping_state'];
            $shipping_postal_code = $row['shipping_postal_code'];
            $shipping_country = $row['shipping_country'];



            echo '  <div class="confirmationWindowModal">
            <img class="cross_modal_admin exit-modal exit_modal_trigger"src="../public/imgs/icons/cross.svg" alt="">
            <i class="fa-solid fa-expand expand-icon"></i>
            <div class="message-container-feedback">
              <div class="comment-container-view">
                    <h3 class="order_header"> Order details</h3>
                    <p>order status: <b> '.$transaction_status.'</b></p>
                    <p>transcation id: <b> '.$transaction_id.'</b></p>
                    <p>amount: <b> '.$transaction_amount.'</b></p>
                    <p>currency: <b> '.$transaction_currency.'</b></p>
                    <p>order time: <b> '.$transaction_time.'</b></p>
                    <p>payer id: <b> '.$payer_id.'</b></p>
                    <p>payer email: <b> '.$payer_email.'</b></p>
                    <p>phone: <b> '.$payer_phone.'</b></p>
                    <h3 class="order_header"> Shipping details</h3>
                    <p>country: <b> '.$payer_country.'</b></p>
                    <p>street: <b> '.$shipping_street.'</b></p>
                    <p>city: <b> '.$shipping_city.'</b></p>
                    <p>state: <b> '.$shipping_state.'</b></p>
                    <p>postal code: <b> '.$shipping_postal_code.'</b></p>
                    <h3 class="order_header"> Products details</h3>';






            }
            // select in another loop all products for order in certain id
            $query2 = "SELECT * FROM order_items where order_id = $order_id_db";
            $select_products_query = mysqli_query($connection, $query2);
            if (!$select_products_query) {
                die("Query Failed: " . mysqli_error($connection));
            }
            while($row = mysqli_fetch_assoc($select_products_query)) {
                // get product id from order_items
                $product_size = $row["size"];
                $product_quantity = $row["quantity"];
                $product_order_id = $row["product_id"];
                $product_order = New product();
                $product_order->create_product($product_order_id);


                $product_name = $product_order->product_name;
                $product_price =$product_order->product_price;
                $product_img = $product_order->product_img;

                echo '
                <div class="product_info_order_cart">
                    <p>name: <b> '.$product_name.'</b></p>
                    <img src="../public/imgs/products/'.$product_name.'/'.$product_img.'">
                    <p>size: <b> '.$product_size.'</b></p>
                    <p>quantity: <b> '.$product_quantity.'</b></p>
                    <p>price: <b> '.$product_price.'</b></p>
                    <hr>
                </div>';
            }


        echo '

        </div>
        </div>
        </div>';



    }

    else {
        echo "No results";
    }






?>