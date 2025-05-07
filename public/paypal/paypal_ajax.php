<?php session_start(); ?>
<?php include "../php/init.php"?>
<?php
global $connection;
global $user;
global $session;
global  $basket;



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Check if user is logged in to extract ID and pass it to the database
    $user_id = ($session->signed_in == true) ? $session->user_id : null;

    // Sanitize and fetch transaction details
    $delivery_option = $basket->delivery_option?? '';
    $transaction_amount = $basket->getTotalCheckout() ?? '';
    $discount_applied = $basket->discount_applied ?? '';

    $transaction_id = $_POST['transaction_id'] ?? '';
    $transaction_status = $_POST['transaction_status'] ?? '';

    $transaction_currency = $_POST['transaction_currency'] ?? '';
    $transaction_time = $_POST['transaction_time'] ?? '';

    // Sanitize and fetch payer details
    $payer_name = $_POST['payer_name'] ?? '';
    $payer_email = $_POST['payer_email'] ?? '';
    $payer_id = $_POST['payer_id'] ?? '';
    $payer_phone = $_POST['payer_phone'] ?? '';
    $payer_country = $_POST['payer_country'] ?? '';

    // Sanitize and fetch shipping details
    $shipping_street = $_POST['shipping_street'] ?? '';
    $shipping_city = $_POST['shipping_city'] ?? '';
    $shipping_state = $_POST['shipping_state'] ?? '';
    $shipping_postal_code = $_POST['shipping_postal_code'] ?? '';
    $shipping_country = $_POST['shipping_country'] ?? '';
    $shippingName = $_POST['shippingName'] ?? '';
    // Check if transaction already exists
    $check_sql = "SELECT transaction_id FROM orders WHERE transaction_id = ?";
    $stmt = $connection->prepare($check_sql);
    $stmt->bind_param("s", $transaction_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 0) {
        // Insert transaction data using prepared statement
        $insert_sql = "INSERT INTO orders
            (user_db_id, transaction_id, transaction_status, transaction_amount, transaction_currency, transaction_time,
            payer_name, payer_email, payer_id, payer_phone, payer_country,
            shipping_street, shipping_city, shipping_state, shipping_postal_code, shipping_country, shipping_name, delivery_option, discount_applied)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $insert_stmt = $connection->prepare($insert_sql);
        $insert_stmt->bind_param("issssssssssssssssss",
            $user_id, $transaction_id, $transaction_status, $transaction_amount, $transaction_currency, $transaction_time,
            $payer_name, $payer_email, $payer_id, $payer_phone, $payer_country,
            $shipping_street, $shipping_city, $shipping_state, $shipping_postal_code, $shipping_country, $shippingName, $delivery_option, $discount_applied
        );

        if ($insert_stmt->execute()) {
            // Get last inserted order ID (Fix: Correct statement)
            $order_id = $insert_stmt->insert_id;

            // Insert each basket item into 'order_items' table
            if (!empty($_SESSION['baskets'])) {
                $insert_item_sql = "INSERT INTO order_items (order_id, product_id, quantity, price, size) VALUES (?, ?, ?, ?, ?)";
                $item_stmt = $connection->prepare($insert_item_sql);

                foreach ($_SESSION['baskets'] as $unique_key => $basket_item) {
                    $product_id = $basket_item['id'];
                    $quantity = $basket_item['quantity'];
                    $price = $basket_item['price'];
                    $size = $basket_item['size'];

                    $item_stmt->bind_param("iiids", $order_id, $product_id, $quantity, $price, $size);
                    $item_stmt->execute();
                }
                // update stock
              $basket->update_stock_items();

              // if user is logged in send invoice on that email else send email on payer email in this case paypal email
              $user_email =($session->signed_in == true) ?  $user->user_email :  $payer_email;

              send_invoice($order_id, $user_email);
              echo "1"; // Success

              $item_stmt->close();
            }



        }

        $insert_stmt->close();
    } else {
        echo "Duplicate Transaction"; // Transaction already exists
    }
    // destroy basket sessions

    unset($_SESSION['baskets']);
    $stmt->close();
    $connection->close();
} else {
    echo "Invalid Request"; // Fix: Ensure this message is only shown on invalid requests
}
?>
