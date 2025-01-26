<?php session_start()?>
<?php include "../php/init.php"?>

<?php


    if(isset($_POST["data"])) {
        global $connection;
        global $basket;
        global $user;
        global $session;

        $product_id = $_POST["data"];
        // check if product with this id exists
        $query = "SELECT * FROM products where product_id= $product_id";
        $query_check = mysqli_query($connection,  $query);

        if(mysqli_num_rows($query_check)>0) {
            $basket->addItem($product_id, 6, 11.00);
        }


    }




?>