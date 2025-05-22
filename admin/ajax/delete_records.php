<?php session_start() ?>

<?php include "../../public/php/init.php"?>

<?php
global $connection;
$receivedData = isset($_POST["data"]) ? $_POST["data"] : "";

$id_row_name = $receivedData['idRowName'] ?? null;
$list_selected_ids = $receivedData['list_selected_ids'] ?? [];
$dataRow = $receivedData['dataRow'] ?? null;
if($dataRow=="users") {
        foreach ($list_selected_ids as $id) {
        $id = intval($id);
        // Step 1: Delete user account
        $query = "DELETE FROM users WHERE user_id = {$id}";
        $delete_user_account = mysqli_query($connection, $query);

        if (!$delete_user_account) {
            die("Error deleting user: " . mysqli_error($connection));
        }

        // Step 2: Select user's orders
        $query2 = "SELECT * FROM orders WHERE user_db_id = {$id}";
        $select_user_orders = mysqli_query($connection, $query2);

        if (!$select_user_orders) {
            die("Error fetching user orders: " . mysqli_error($connection));
        }

        // Step 3: Loop through orders and delete order + order items
        while ($row = mysqli_fetch_assoc($select_user_orders)) {
            $order_id = (int) $row["id"];

            // Delete order
            $query3 = "DELETE FROM orders WHERE id = {$order_id}";
            $delete_user_orders = mysqli_query($connection, $query3);
            if (!$delete_user_orders) {
                die("Error deleting order (ID: $order_id): " . mysqli_error($connection));
            }

            // Delete order items
            $query4 = "DELETE FROM order_items WHERE order_id = {$order_id}";
            $delete_order_items = mysqli_query($connection, $query4);
            if (!$delete_order_items) {
                die("Error deleting order items (Order ID: $order_id): " . mysqli_error($connection));
            }
        }
    }
}
// DELETE RELATIVE DB RECORDS
if ($dataRow == "products") {
    foreach ($list_selected_ids as $id) {
        $id = intval($id);


        mysqli_query($connection, "DELETE FROM products WHERE product_id = {$id}");
        mysqli_query($connection, "DELETE FROM rel_products_brands WHERE product_id = {$id}");
        mysqli_query($connection, "DELETE FROM rel_products_sizes WHERE prod_id = {$id}");
        mysqli_query($connection, "DELETE FROM rel_types_products WHERE product_id = {$id}");
        mysqli_query($connection, "DELETE FROM rel_categories_products WHERE prod_id = {$id}");
        mysqli_query($connection, "DELETE FROM wishlist WHERE product_id = {$id}");
        mysqli_query($connection, "DELETE FROM comments WHERE product_id = {$id}");
    }
}
if ($dataRow == "orders") {
    foreach ($list_selected_ids as $id) {
        $id = intval($id);
        mysqli_query($connection, "DELETE from orders WHERE id={$id}");
        mysqli_query($connection, "DELETE from order_items WHERE order_id={$id}");


    }

}
 // DELETE RELATIVE DB RECORDS
else {
    foreach ($list_selected_ids as $id) {

    $id = intval($id);
    $query = "DELETE from $dataRow where $id_row_name = $id";
    $select_users_query = mysqli_query($connection, $query);

}

}



?>
