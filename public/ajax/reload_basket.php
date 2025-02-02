<?php session_start()?>
<?php include "../php/init.php"?>

<?php
    global $basket;

    if (isset($_POST["data"])) {
        $user_basket = $basket->processUserBasket();
        $user_total = $basket->getTotal();
        $number_items = $basket-> getNumber();


        $data = [$user_basket, $user_total, $number_items];
        header('Content-Type: application/json');

        echo json_encode($data);  // Return JSON encoded data
    }
?>
