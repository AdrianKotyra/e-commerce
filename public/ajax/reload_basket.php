<?php  header('Content-Type: application/json');?>
<?php session_start()?>
<?php include "../php/init.php"?>

<?php
    global $basket;

    if (isset($_POST["data"])) {
        $user_basket = $basket->processUserBasket("product_basket_Template");
        $user_total = $basket->getTotal();
        $number_items = $basket-> getNumber();


        $data = [$user_basket, $user_total, $number_items];


        echo json_encode($data);  // Return JSON encoded data
    }
?>
