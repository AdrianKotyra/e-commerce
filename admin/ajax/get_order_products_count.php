<?php
include "../../public/php/init.php";
global $connection;

// Group by product_id and count how many times each appears
$query = "SELECT product_id, COUNT(*) AS count FROM order_items GROUP BY product_id";
$select_products_query = mysqli_query($connection, $query);

$data = [];

if (mysqli_num_rows($select_products_query) > 0) {
    while ($row = mysqli_fetch_assoc($select_products_query)) {
        $product_id = $row['product_id'];
        $count = $row['count'];
        $data[$product_id] = (int) $count;
    }

    $result = [];
    foreach ($data as $key => $value) {
        $query2 = "SELECT product_name FROM products WHERE product_id = $key";
        $select_products_name = mysqli_query($connection, $query2);
        while ($row = mysqli_fetch_assoc($select_products_name)) {
            $product_name = $row['product_name'];
            $result[] = [$product_name, $value];  // Store product_name and count
        }
    }

    // Sort the result array by the second value (count), from highest to lowest
    usort($result, function($a, $b) {
        return $b[1] - $a[1];  // Sort in descending order
    });

    header('Content-Type: application/json');
    echo json_encode($result);
} else {
    echo json_encode([]);  // Return empty array on no data
}

$connection->close();
?>
