
<?php
    global $product;
    if(isset($_GET["product_id"]))  {
        $product_id = $_GET["product_id"];
        $new_product = new Product();
        $new_product->create_product($product_id);
        $product_name = $new_product->product_name;
        echo'<h5>'.$product_name.'</h5>';
        displayAllcomments($product_id);
    }

?>
