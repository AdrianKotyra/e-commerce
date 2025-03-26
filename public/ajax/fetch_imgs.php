<?php
include "../php/init.php";

if(isset($_POST["imageId"])) {
    $product_id = trim($_POST['imageId']);
    global $database;
    global $comment;
    global $product;

    $result_product = $database->query_array("SELECT * FROM products WHERE product_id = $product_id");
    $data = mysqli_fetch_assoc($result_product);

    $rating = comment::get_average_rating_stars($product_id);
    $reviews_msg = comment::get_number_comments($product_id)!=0? comment::get_number_comments($product_id). ' reviews' : "";
    $render_product = new Product();
    $render_product->create_product($product_id);
    $product_category = $render_product->product_category;

    if ($data) {
        echo json_encode([

            "name" => $data["product_name"],
            "image" => $data["product_img"],
            "price" => $data["product_price"].'£',
            "rating" =>  $rating,
            "reviews" =>  $reviews_msg,
            "category" => $product_category

        ]);
    } else {
        echo json_encode(["error" => "No image found"]);
    }
}
?>
