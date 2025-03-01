<?php
include "../../public/php/init.php";
global $connection;

// Fetch products and their categories
$query = "SELECT product_id, product_name FROM products";
$select_products_query = mysqli_query($connection, $query);

$data = [];

$count = [
    "Male" => 0,
    "Female" => 0,
    "Unisex" => 0
];

while ($row = mysqli_fetch_assoc($select_products_query)) {
    $product_id = (int)$row['product_id'];
    $product_name = $row['product_name'];


    $category = ucfirst(Product::getproductCategory($product_id));

    // Increment category count if it exists in the array
    if (isset($count[$category])) {
        $count[$category]++;
    }
}


$result = [];
foreach ($count as $category => $total) {
    $result[] = [$category, $total];
}


echo json_encode($result);

$connection->close();
?>
