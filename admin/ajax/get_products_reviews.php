<?php
include "../../public/php/init.php";
global $connection;

// Fetch products and their categories
$query = "SELECT * FROM comments";
$select_products_query = mysqli_query($connection, $query);

$data = [];

$count = [
    "1" => 0,
    "2" => 0,
    "3" => 0,
    "4" => 0,
    "5" => 0
];

while ($row = mysqli_fetch_assoc($select_products_query)) {
    $product_id = $row['product_id'];
    $stars_rating = $row['stars_rating'];

    // Increment category count if it exists in the array
    if (isset($count[$stars_rating])) {
        $count[$stars_rating]++;
    }
}


$result = [];
foreach ($count as $stars_rating => $total) {
    $result[] = [$stars_rating, $total];
}


echo json_encode($result);

$connection->close();
?>
