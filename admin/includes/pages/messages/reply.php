<?php
if(isset($_GET["msg_id"])) {
    global $Post;
    $msg_id = $_GET["msg_id"];
    $query = "SELECT * from messages where id =  $msg_id";
    $select_users_query = mysqli_query($connection, $query);
    if (!$select_users_query) {
        die("Query Failed: " . mysqli_error($connection));
    }

    while($row = mysqli_fetch_assoc($select_users_query)) {
        $msgs_id = $row['id'];
        $email = $row['user_email'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_address = $row['user_address'];
        $user_city = $row['user_city'];
        $user_postal = $row['user_postal'];
        $user_country = $row['user_country'];
        $msg_status = $row['status'];
        $msg_content = $row['user_message'];

    }
    // UPDATE MESSAGE STATUS TO READED
    $query2 = "UPDATE `messages` SET `status`='readed' where id =  $msg_id";
    $update_status = mysqli_query($connection, $query2);
    if (!$update_status) {
        die("Query Failed: " . mysqli_error($connection));
    }
}


?>


<?php

if(isset($_POST["reply"])) {
    // Validate and sanitize the input
    $reply = htmlspecialchars($_POST["reply_msg"]);
    $user_name = htmlspecialchars($_POST["user_name"]);
    $user_email = htmlspecialchars($_POST["user_email"]);


    sendReplyMsg($user_email, $user_name, $reply);

    echo "<div class='alert alert-success col-lg-12 text-center mx-auto' role='alert'>
            Your message has been sent successfully.
          </div>";
} else {
// display Form only when the form is not submitted

echo '

    <h3 class="order_header"> reply</h3>
    <p>From: <b> '.$email.'</b></p>
    <p>name: <b> '.$user_firstname.' '.$user_lastname.'</b></p>
    <p>Address: <b> '.$user_address.'</b></p>
    <p>City: <b> '.$user_city.'</b></p>
    <p>Postal: <b> '.$user_postal.'</b></p>
    <p>Country: <b> '.$user_country.'</b></p>
    <p>Message: <b> '.$msg_content.'</b></p>



    <form action="" method="post" enctype="multipart/form-data" id="form-reply">
        <textarea name="reply_msg" class="reply_msg"></textarea>
        <input class="hidden_input" type="text" name="user_name" value="'.$user_firstname.'">
        <input class="hidden_input" type="text" name="user_email" value="'.$email.'">
        <div class="form-group">
            <input class="btn btn-primary button-admin" type="submit" name="reply" value="send msg">
        </div>
    </form>

    ';
}
?>
