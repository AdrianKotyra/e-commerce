<?php session_start() ?>

<?php include "../../public/php/init.php"?>

<?php
global $connection;
$receivedData = isset($_POST["data"]) ? $_POST["data"] : "";

$id_row_name = $receivedData['idRowName'] ?? null;
$list_selected_ids = $receivedData['list_selected_ids'] ?? [];
$dataRow = $receivedData['dataRow'] ?? null;

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
