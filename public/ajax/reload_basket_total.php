<?php session_start()?>
<?php include "../php/init.php"?>

<?php

    global $basket;

    if(isset($_POST["data"])) {
        echo $basket->getTotal();

    }




?>