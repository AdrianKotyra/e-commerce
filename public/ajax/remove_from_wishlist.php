<?php session_start()?>
<?php include "../php/init.php"?>

<?php


    if(isset($_POST["data"])) {
        global $connection;
        global $basket;
        global $user;
        global $session;
        global $product;
        global $wishlist;

        $data = $_POST["data"];
        $data_prod_id =  $data["productId"];



        // NEEED MORE VERIFICATION VALIDATION IF ID EXISTS WITH THIS SIZE (to be coded...)


        // remove from basket
        $new_wishlist = new wishlist();
        $new_wishlist->removeItem($data_prod_id);




    }




?>