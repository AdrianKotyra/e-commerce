<?php
if(isset($_GET["comment_id"])) {
    global $comment;
    $comment_id = $_GET["comment_id"];
    $comment_new = new Comment();
    $comment_new ->create_comment($comment_id);
    $comment_feedback =$comment_new ->comment_content;
    echo $comment_feedback;
}


?>