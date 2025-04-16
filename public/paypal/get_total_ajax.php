<?php session_start()?>
<?php include "../php/init.php"?>

<?php
    // for security reason calculate total from sessions on the server

    if(isset($_POST["data"])) {
        global $connection;
        global $basket;



        $raw_total = $basket->getTotal() + $basket->delivery_price;
        $discount_applied = $basket->discount_applied;
        $user_total = $discount_applied == 1
            ? round($raw_total * 0.85, 2)
            : round($raw_total, 2);






        echo $user_total;

    }




?>