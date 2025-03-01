<?php session_start()?>
<?php include "../php/init.php"?>

<?php
    // for security reason calculate total from sessions on the server

    if(isset($_POST["data"])) {
        global $connection;
        global $basket;
        $total_amount_to_pay = basket::getTotal();





        echo $total_amount_to_pay;

    }




?>