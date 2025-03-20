<?php session_start() ?>

<?php include "../../public/php/init.php"?>

<?php
global $connection;
$comment_id = isset($_POST["data"]) ? $_POST["data"] : "";


if(!empty($comment_id) || $comment_id!="") {

        $query = "SELECT * from comments where comment_id =  $comment_id";
        $select_users_query = mysqli_query($connection, $query);
        if (!$select_users_query) {
            die("Query Failed: " . mysqli_error($connection));
        }
        while($row = mysqli_fetch_assoc($select_users_query)) {
            $comment_id = $row["comment_id"];
            $user_comment = $row["user_comment"];
            $comment_date = $row["comment_date"];
            $stars_rating= $row["stars_rating"];
            $stars_container= "";
            for ($i = 0; $i < $stars_rating; $i++) {
                $stars_container .= '<i class="fa-solid fa-star "></i>';
            }

            $user_name= $row["user_name"];
            $product_id= $row["product_id"];

            $product_new = new Product();
            $product_new ->create_product($product_id);
            $product_name = $product_new->product_name;
            $product_img = $product_new->product_img;
            $approved= $row["approved"];



           echo '  <div class="confirmationWindowModal">
                <img class="cross_modal_admin exit-modal exit_modal_trigger"src="../public/imgs/icons/cross.svg" alt="">
                <i class="fa-solid fa-expand expand-icon"></i>
                <div class="message-container-feedback">
                  <div class="comment-container-view">
                        <span>'.$comment_date.'</span>
                        <span><b>'.$product_name.'</span></b>
                        <img src="../public/imgs/products/'.$product_name.'/'.$product_img.'" />
                        <span>'.$user_name.'</span>
                        <span>'.$stars_container.'</span>
                        <span> '.$user_comment.'</span>

                    </div>
                </div>
            </div>';
        }





    }

    else {
        echo "No results";
    }






?>