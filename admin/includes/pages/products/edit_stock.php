

<!-- UPDATE FROM FORM TO MYSQL -->

<?php



    if(isset($_POST["edit_stock"]) && isset($_GET["size_id"]) && isset($_GET["product_id"])) {
        global $connection;
        $product_id = $_GET["product_id"];
        $size_id = $_GET["size_id"];
        $stock= trim($_POST["stock"]);
        $size_id= trim($_POST["size_id"]);




        $query_update = "UPDATE rel_products_sizes SET ";
        $query_update .= "prod_id = '{$product_id}', ";
        $query_update .= "size_id = '{$size_id}', ";
        $query_update .= "stock = '{$stock}' ";
        $query_update .= "WHERE prod_id =  $product_id AND size_id =  $size_id";


        $update_stock = mysqli_query($connection, $query_update);
        alert_text("Stock has been updated", "products.php?source=show&product_id=$product_id");




    }


?>
<!--  -->


<?php
    global $product;
    if(isset($_GET["product_id"])) {
        $product_id = $_GET["product_id"];
        $serch_product = new Product();
        $serch_product->create_product($product_id);
        $product_name = $serch_product->product_name;
        $product_img1 = $serch_product->product_img;

    }
    echo
    '<a href="products.php?source=show&product_id='.$product_id.'">
    <h3>'.$product_name.'</h3>
    <img src="./../public/imgs/products/'.$product_name.'/'.$product_img1.'" alt="" class="product_stock_img">
    </a>';


?>



<?php
    if(isset($_GET["size_id"]) && isset($_GET["product_id"])) {
        global $connection;
        $product_id = $_GET["product_id"];
        $size_id = $_GET["size_id"];
        $query = "SELECT * from rel_products_sizes where size_id={$size_id} AND prod_id =  {$product_id}  ";
        $select_size_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_size_query)) {
            $stock = $row["stock"];
            $size_id= $row["size_id"];
            $query2 = "SELECT * from sizes where id = $size_id";
            $select_sizes_query = mysqli_query($connection, $query2);
            while($row = mysqli_fetch_assoc($select_sizes_query)) {
                $size= $row["size"];
            }
        }
    }

?>
<form action="" method="post" enctype="multipart/form-data">



    <div class="form-group">
        <input required type="text" class="form-control hidden" name="size_id"  value="<?php echo $size_id;?>">
        <label for="user_firstname">Size</label>
        <?php echo $size;?>
    </div>


    <div class="form-group">
        <label for="user_lastname">Stock</label>
        <input required type="number" class="form-control" name="stock"  value="<?php echo $stock;?>">
    </div>






<div class="form-group">
    <input class="btn btn-primary btn-round" type="submit" name="edit_stock" value="edit stock">
</div>

</form>