
<?php
    global $product;
    if(isset($_GET["product_id"])) {
        $product_id = $_GET["product_id"];
        $serch_product = new Product();
        $serch_product->create_product($product_id);

        $product_name = $serch_product->product_name;
        $product_img1 = $serch_product->product_img;
        $product_img2 = $serch_product->product_img_2;
        $product_img3 = $serch_product->product_img_3;
        $product_img4 = $serch_product->product_img_4;
        $product_category =  $serch_product->product_category;
        $total_stock = Product::getproductTotalStock($product_id);
}


?>
<?php echo
'<h5> Category > <b>'.$product_category.'</b></h5>'.
'<h3>'.$product_name.'</h3>
<img src="./../public/imgs/products/'.$product_name.'/'.$product_img1.'" alt="" class="product_stock_img">
<img src="./../public/imgs/products/'.$product_name.'/'.$product_img2.'" alt="" class="product_stock_img">
<img src="./../public/imgs/products/'.$product_name.'/'.$product_img3.'" alt="" class="product_stock_img">
<img src="./../public/imgs/products/'.$product_name.'/'.$product_img4.'" alt="" class="product_stock_img">
<br>
<span class="total_stock">Total Stock: '.$total_stock.'</span>

<a href="products.php?source=add_stock&product_id='.$product_id.'">
    <button class="button-admin">Add Size and Stock</button>
</a>
';


?>
<table class="table table-bordered table-hover">
                <thead>
                    <tr>
                       <th>Size</th>
                       <th>Stock</th>
                       <th>Edit</th>
                       <th>Delete</th>
                    </tr>
                </thead>
                <tbody>


                <?php select_and_display_product_stock()?>

                </tbody>
</table>
