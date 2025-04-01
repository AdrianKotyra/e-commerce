<?php session_start()?>
<?php  header('Content-Type: application/json');?>

<?php include "../php/init.php"?>

<?php

    global $wishlist;
    if (isset($_POST["data"])) {

        $user_wishlist = new wishlist();
        $user_wishlist_content = $user_wishlist-> processUserWishlist("product_wishlist_Template");
        // $user_wishlist_number_products =  $user_wishlist->getNumber();


        // $data = [$user_wishlist, $user_wishlist_number_products];


        echo json_encode($user_wishlist_content);
    }
?>
