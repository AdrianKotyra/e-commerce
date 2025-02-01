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


        // NEEED MORE VERIFICATION VALIDATION IF ID EXISTS WITH THIS SIZE (to be coded...)
        // Create a unique key using product ID and size
        $unique_key = $data_prod_id . '_' . $data_prod_size;

        // remove from basket
        $basket->removeItem($unique_key);




    }




?>