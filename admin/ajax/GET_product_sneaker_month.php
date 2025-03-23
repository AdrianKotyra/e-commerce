<?php session_start() ?>
<?php include "../php/functions_admin.php"?>
<?php include "../../public/php/init.php"?>

<?php
global $connection;
$search_product = isset($_POST["data"]) ? $_POST["data"] : "";


if(!empty($search_product) || $search_product!="") {

    $stmt = $connection->prepare("SELECT * FROM products WHERE product_name LIKE ?");
    $search_param = "%$search_product%";
    $stmt->bind_param("s", $search_param);
    $stmt->execute();
    $search_query = $stmt->get_result();

    $search_count = mysqli_num_rows($search_query);
    if(!$search_query) {
        die("Query Failed" . mysqli_error($connection));
    }


    if($search_count>=1) {
        $counter = 1;
        while($row = mysqli_fetch_array($search_query)) {
            $product_id = $row["product_id"];
            $product_name = $row["product_name"];
            $product_img = $row["product_img"];
            $counter+=1;
            $class_highlight = ($counter % 2 == 0) ? "highlighted" : '';

           echo " <div class='product_search_container    $class_highlight '>
                <a class='flex-row product_search_container_link' href='sneaker_month.php?source=change_sneaker_month_id&product_id=$product_id'>
               <img src='../public/imgs/products/$product_name/$product_img'>
                <p>$product_name</p>
                </a>
            </div>";





    }}

    else {
        echo "No results";
    }



}



?>