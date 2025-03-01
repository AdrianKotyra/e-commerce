<?php include "../../public/php/init.php";
   global $connection;
   global $product;
   $query = "SELECT product_id, product_name FROM products";


   $select_products_query = mysqli_query($connection, $query);

   $data = []; // Initialize an empty array

    while ($row = mysqli_fetch_assoc($select_products_query)) {
        $product_id = (int)$row['product_id'];
        $product_name = $row['product_name'];
        $data[] = [$product_name, Product::getproductTotalStock($product_id)];
        // sort list to get from lowest to highest
        usort($data, function($a, $b) {
            return $a[1] - $b[1];
        });
        // get only 20 first elements
        $sliced_list = array_slice($data, 0, 50);

    }

    echo json_encode($sliced_list);





   $connection->close();
?>