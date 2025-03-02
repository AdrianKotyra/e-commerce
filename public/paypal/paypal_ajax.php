<?php
session_start();
include "../php/init.php";

global $connection;
global $user;
global $session;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Check if user is logged in to extract ID and pass it to the database
    $user_id = ($session->signed_in == true) ? $session->user_id : null;

    // Sanitize and fetch transaction details
    $transaction_id = $_POST['transaction_id'] ?? '';
    $transaction_status = $_POST['transaction_status'] ?? '';
    $transaction_amount = $_POST['transaction_amount'] ?? '';
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
            shipping_street, shipping_city, shipping_state, shipping_postal_code, shipping_country)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $insert_stmt = $connection->prepare($insert_sql);
        $insert_stmt->bind_param("isssssssssssssss",
            $user_id, $transaction_id, $transaction_status, $transaction_amount, $transaction_currency, $transaction_time,
            $payer_name, $payer_email, $payer_id, $payer_phone, $payer_country,
            $shipping_street, $shipping_city, $shipping_state, $shipping_postal_code, $shipping_country
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

                $item_stmt->close();
            }

            echo "1"; // Success
        } else {
            echo "Error: " . $insert_stmt->error; // Fix: Use correct error variable
        }

        $insert_stmt->close();
    } else {
        echo "Duplicate Transaction"; // Transaction already exists
    }

    $stmt->close();
    $connection->close();
} else {
    echo "Invalid Request"; // Fix: Ensure this message is only shown on invalid requests
}
?>
