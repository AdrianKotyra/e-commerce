<?php session_start() ?>
<?php include "../php/functions_admin.php"?>
<?php include "../../public/php/init.php"?>

<?php
global $connection;
$search_product = isset($_POST["data"]) ? $_POST["data"] : "";


if(!empty($search_product) || $search_product!="") {

    $stmt = $connection->prepare("SELECT * from products where product_name LIKE ?");
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
        $query = "SELECT * from comments where product_id =  $product_id";
        $select_users_query = mysqli_query($connection, $query);
        if (!$select_users_query) {
            die("Query Failed: " . mysqli_error($connection));
        }
        while($row = mysqli_fetch_assoc($select_users_query)) {
            $comment_id = $row["comment_id"];
            $user_comment = $row["user_comment"];
            $stars_rating= $row["stars_rating"];
            $stars_container= "";
            for ($i = 0; $i < $stars_rating; $i++) {
                $stars_container .= '<i class="fa-solid fa-star main-color"></i>';
            }

            $user_name= $row["user_name"];
            $product_id= $row["product_id"];

            $product_new = new Product();
            $product_new ->create_product($product_id);
            $product_name = $product_new->product_name;
            $product_category = Product::getproductCategory($product_id);
            $approved= $row["approved"];




            echo "<tr>";
            echo "<td>" . $comment_id . "</td>";
            echo "<td>" . $user_name . "</td>";
            echo "<td > <a target='_blank'  href='../../ecommerce/public/products.php?show=$product_id&category=$product_category'>$product_name </a></td>";
            echo "<td>" . $stars_container . "</td>";
            echo "<td>" . $approved . "</td>";
            echo "<td class='text-right'><span class='table-nav-link comment-id-link' data-comment-id=$comment_id>CHECK</span></td>";
            echo "<td class='text-right'><span class='change_status_button table-nav-link' data-link='comments.php?change_status={$comment_id}'>CHANGE</span></td>";
            echo "<td class='text-right'> <span class='delete_button table-nav-link' data-link='comments.php?delete_comment=$comment_id'> Delete </span></td>";
            echo "</tr>";
        }





    }}

    else {
        echo "No results";
    }



} else {
    select_and_display_comments();

}




?>