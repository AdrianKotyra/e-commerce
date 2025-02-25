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
        while($row = mysqli_fetch_array($search_query)) {
            $product_id = $row["product_id"];
            $product_name = $row["product_name"];
            $product_img = $row["product_img"];
            $product_price = $row["product_price"];
            $product_category = Product::getproductCategory($product_id);
            $product_reviews_number = Product::get_product_reviews_number($product_id);

             // Loop through each column in the row
                echo "<td > $product_id</td>";

                echo "<td > $product_name</td>";
                echo "<td><img src='../public/imgs/products/$product_name/$product_img'></td>";

                echo "<td > $product_price</td>";
                echo "<td > $product_category</td>";
                echo "<td > <a class='table-nav-link' href='products.php?source=reviews&product_id={$product_id}'>$product_reviews_number</a></td>";
                echo "<td class='text-right'><a class='table-nav-link' href='products.php?source=show&product_id={$product_id}'>STOCK</a></td>";
                echo "<td class='text-right'><a class='table-nav-link'href='products.php?source=edit_product&product_id={$product_id}'>EDIT</a></td>";
                echo "<td class='text-right'> <span class='table-nav-link delete_button' data-link='products.php?delete_product=$product_id'> Delete </span></td>";
                echo " </tr>  ";





    }}

    else {
        echo "No results";
    }



} else {
    select_and_display_products();

}




?>