<?php session_start()?>
<?php include "../php/init.php"?>

<?php


    if(isset($_POST["data"])) {
        global $connection;
        global $basket;
        global $user;
        global $session;
        global $product;

        $data = $_POST["data"];
        $data_prod_id =  $data["productId"];
        $data_prod_size =  $data["productsize"];

        $new_product = New Product();

        // // NEEED MORE VERIFICATION VALIDATION IF ID EXISTS WITH THIS SIZE
        $new_product->create_product($data_prod_id);

        $product_price = $new_product->product_price;

        $basket->decrement_basket($data_prod_id, 1, $product_price, $data_prod_size);



    }




?>