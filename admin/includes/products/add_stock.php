
<?php
    if(isset($_POST["add_stock"]) && isset($_GET["product_id"])&& isset($_POST["size"])&& isset($_POST["stock"])) {
    global $connection;
    $product_id = $_GET["product_id"];
    $size = $_POST["size"];
    $stock= trim($_POST["stock"]);

        $query = "SELECT * from sizes where size = $size ";
        $select_size_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_size_query)) {
            $size_id = $row["id"];

        }


        $query_update = "INSERT INTO `rel_products_sizes` (`prod_id`, `size_id`, `stock`) ";
        $query_update .= "VALUES ('{$product_id}', '{$size_id}', '{$stock}')";

        $update_stock = mysqli_query($connection, $query_update);
        alert_text("Stock has been updated", "products.php?source=show&product_id=$product_id");







    }


?>


<?php
    global $product;
    if(isset($_GET["product_id"])) {
        $product_id = $_GET["product_id"];
        $serch_product = new Product();
        $serch_product->create_product($product_id);
        Product::increment_product_views($product_id);
        $product_name = $serch_product->product_name;
        $product_img1 = $serch_product->product_img;
        $product_sizes_list = $serch_product->product_sizes_list;
        $product_category = $serch_product->product_category;

        $all_sizes_men_list = [3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14];
        $all_sizes_women_list = [2, 3, 4, 5, 6, 7, 8, 9];

        if($serch_product->product_category =="female") {
            $chosen_cat_sizes_list = $all_sizes_women_list;
            }
            else if($serch_product->product_category =="male") {
                $chosen_cat_sizes_list = $all_sizes_men_list;
            }
            else {
                $chosen_cat_sizes_list = $all_sizes_men_list;
            }
    }
    echo
    '<a href="products.php?source=show&product_id='.$product_id.'">
    <h3>'.$product_name.'</h3>
    <img src="./../public/imgs/products/'.$product_name.'/'.$product_img1.'" alt="" class="product_stock_img">
    </a>';


?>

<form action="" method="post" enctype="multipart/form-data">
    <h5>Rest of available sizes in <?php echo $product_category;?> category</h5>
    <select name="size" >
        <?php

            foreach ($chosen_cat_sizes_list as $size ) {
                if(!in_array($size, $product_sizes_list))
             echo '  <option type="radio" value='.$size.'>'.$size .'</option>';
            }
        ?>

    </select>

    <div class="form-group">
        <label for="user_lastname">Stock</label>
        <input required type="number" class="form-control" name="stock" >
    </div>





    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="add_stock" value="Add Stock">
    </div>

</form>