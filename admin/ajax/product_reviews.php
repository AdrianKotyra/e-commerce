<?php session_start() ?>
<?php include "../php/functions_admin.php"?>
<?php include "../../public/php/init.php"?>

<?php
global $connection;
$product_id = isset($_POST["data"]) ? $_POST["data"] : "";




if(!empty($product_id)) {


   echo '  <div class="confirmationWindowModal feedbacks-modal">
    <img class="cross_modal_admin exit-modal"src="../public/imgs/icons/cross.svg" alt="">

    <div class="message-container-feedback">';


    $query = "SELECT * FROM comments where product_id = $product_id AND approved = 'approved'";
    $select_comments = mysqli_query($connection, $query);
    if(mysqli_num_rows($select_comments)>=1) {
        while ($row = mysqli_fetch_assoc($select_comments)) {
            $comment_id = $row["comment_id"];
            $new_comment = new Comment();
            $new_comment->create_comment($comment_id);
            echo $new_comment->comment_cart();

        }
    } else {
        echo '<div class="alert alert-danger col-lg-12 text-center mx-auto" role="alert">
                    No reviews found for this product
                </div>';
    }
    echo '</div>
    </div>';
}
?>
