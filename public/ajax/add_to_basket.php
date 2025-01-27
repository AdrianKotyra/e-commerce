<?php session_start()?>
<?php include "../php/init.php"?>

<?php


    if(isset($_POST["data"])) {
        global $connection;
        global $basket;
        global $user;
        global $session;
        global $product;
        $product_id = $_POST["data"];

        $new_product = New Product();

        // check if product with this id exists
        $new_product->create_product($product_id);

        $product_price = $new_product->product_price;

        $basket->addItem($product_id, 1, $product_price);



    }




?>