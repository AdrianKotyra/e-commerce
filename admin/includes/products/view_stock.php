
<?php
    global $product;
    if(isset($_GET["product_id"])) {
        $product_id = $_GET["product_id"];
        $serch_product = new Product();
        $serch_product->create_product($product_id);
        Product::increment_product_views($product_id);
        $product_name = $serch_product->product_name;
        $product_price= $serch_product->product_price;
        $product_img1 = $serch_product->product_img;
        $product_img2 = $serch_product->product_img_2;
        $product_img3 = $serch_product->product_img_3;
        $product_img4 = $serch_product->product_img_4;
        $product_type = $serch_product->product_type;
        $product_desc = $serch_product->product_desc;
        $product_category = $serch_product->product_category;
        $product_sizes = $serch_product->product_sizes_list;
        $product_availability = $serch_product->product_availability;

        $sizes_html = generate_sizes_html($serch_product, "span");
        $chosen_grid= generate_product_grid_sizes($serch_product);
}


?>
<?php echo
'<h3>'.$product_name.'</h3>
<img src="./../public/imgs/products/'.$product_name.'/'.$product_img1.'" alt="" class="product_stock_img">
<br>
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
