<?php session_start()?>
<?php include "../php/init.php"?>

<?php
    // for security reason calculate total from sessions on the server

    if(isset($_POST["data"])) {
        global $connection;
        global $basket;




        $user_total = $basket->getTotalCheckout();





        echo $user_total;

    }




?>