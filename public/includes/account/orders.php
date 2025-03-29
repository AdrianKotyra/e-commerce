<section class="account-details account-info">
<?php
error_reporting(E_ALL);  // Reports all errors
ini_set('display_errors', 1);  // Displays errors on the screen
?>
    <?php echo nav_account("MY ORDERS")?>



    <div class="info_order_col flex-col">
        <?php
            global $database;
            global $user;
            global $product;
            $user_id =  $user->user_id;
            $query = "SELECT id from orders where user_db_id =  $user_id order by id desc";
            $result_product = $database->query_array($query);

            while ($row = mysqli_fetch_array($result_product)) {
                $order_id = $row["id"];
                $new_order = New Order();
                $new_order->order_info_by_order_id($order_id);

                echo  $new_order->get_user_order_cart($order_id);
            }


        ?>


    </div>




</section>