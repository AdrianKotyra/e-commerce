<?php session_start()?>
<?php  header('Content-Type: application/json');?>

<?php include "../php/init.php"?>

<?php

    global $wishlist;
    if (isset($_POST["data"])) {

        $user_wishlist = new wishlist();
        $user_wishlist_content = $user_wishlist-> processUserWishlist("product_wishlist_Template");
        // $user_wishlist_number_products =  $user_wishlist->getNumber();
        $amount_numbers_favorites = $user_wishlist->getNumber_products();

        // $data = [$user_wishlist, $user_wishlist_number_products];
        $data_list = [

            "content" => $user_wishlist_content,
            "number" => $amount_numbers_favorites,

        ];


        echo json_encode($data_list);
    }
?>
