<?php session_start()?>
<?php include "../php/init.php"?>

<?php


    if(isset($_POST["data"])) {
        global $connection;
        global $basket;
        global $user;
        global $session;
        global $product;
        if (!isset($_POST["data"]["deliveryOption"])) {
            return;
        }

        $data = $_POST["data"];
        $delivery_option = $data["deliveryOption"];

       $_SESSION['delivery_option'] =  $delivery_option ;



    }




?>