<?php
if(isset($_GET["comment_id"])) {
    global $comment;
    $comment_id = $_GET["comment_id"];
    $comment_new = new Comment();
    $comment_new ->create_comment($comment_id);
    $comment_feedback =$comment_new ->comment_content;
    $comment_date =$comment_new ->comment_date;
    $stars_rating =$comment_new ->stars_rating;
    $product_name =$comment_new ->product_name;


    $stars_container= "";
    for ($i = 0; $i < $stars_rating; $i++) {
        $stars_container .= '<i class="fa-solid fa-star main-color"></i>';
    }

    echo '<div class="comment-container-view">
   <span>'.$comment_date.'</span>
    <span><b>'.$product_name.'</span></b>
   <span>'.$stars_container.'</span>
   <span> '.$comment_feedback.'</span>

    </div>
    ';
}


?>