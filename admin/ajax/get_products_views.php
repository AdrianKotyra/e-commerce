<?php include "../../public/php/init.php";
   global $connection;
   $query = "SELECT product_name, product_views FROM products ORDER BY product_views DESC LIMIT 50 OFFSET 0;";


   $select_products_query = mysqli_query($connection, $query);

   $data = []; // Initialize an empty array
    if(mysqli_num_rows($select_products_query)>=1) {
        while ($row = mysqli_fetch_assoc($select_products_query)) {
            $product_name = $row['product_name'];
            $product_views = (int)$row['product_views'];

            $data[] = [$product_name, $product_views];
        }

        echo json_encode($data);
    }

    else {
        echo "not data found";
    }


   $connection->close();
?>