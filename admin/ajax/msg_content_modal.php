<?php session_start() ?>

<?php include "../../public/php/init.php"?>

<?php
global $product;
global $connection;
$msg_id = isset($_POST["data"]) ? $_POST["data"] : "";


if(!empty($msg_id) || $msg_id!="") {

        $query = "SELECT * from messages where id =  $msg_id";
        $select_users_query = mysqli_query($connection, $query);
        if (!$select_users_query) {
            die("Query Failed: " . mysqli_error($connection));
        }

        // UPDATE MESSAGE STATUS TO READED
        $query2 = "UPDATE `messages` SET `status`='readed' where id =  $msg_id";
        $update_status = mysqli_query($connection, $query2);
        if (!$update_status) {
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



            echo '  <div class="confirmationWindowModal">
            <img class="cross_modal_admin exit-modal exit_modal_trigger"src="../public/imgs/icons/cross.svg" alt="">
            <i class="fa-solid fa-expand expand-icon"></i>
            <div class="message-container-feedback">
              <div class="comment-container-view">
                <h3 class="order_header"> Message details</h3>
                <p>From: <b> '.$email.'</b></p>
                <p>name: <b> '.$user_firstname.' '.$user_lastname.'</b></p>
                <p>Address: <b> '.$user_address.'</b></p>
                <p>City: <b> '.$user_city.'</b></p>
                <p>Postal: <b> '.$user_postal.'</b></p>
                <p>Country: <b> '.$user_country.'</b></p>
                <p>Message: <b> '.$msg_content.'</b></p>

                </div>';




            }






    }

    else {
        echo "No results";
    }






?>