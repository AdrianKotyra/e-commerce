<section class="account-details account-info">
<?php
error_reporting(E_ALL);  // Reports all errors
ini_set('display_errors', 1);  // Displays errors on the screen
?>
    <?php echo nav_account("MY WISHLIST")?>



    <div class="info_wishlist_grid_col ">
        <?php
            global $database;
            global $user;
            global $product;
            $user_id =  $user->user_id;
            $query = "SELECT product_id from wishlist where user_id =  $user_id order by id desc";
            $result_product = $database->query_array($query);

            while ($row = mysqli_fetch_array($result_product)) {
                $product_id = $row["product_id"];
                $products_fav_account = New Product();
                $products_fav_account->create_product($product_id);

                echo  $products_fav_account->product_category_card($product_id);
            }


        ?>


    </div>




</section>