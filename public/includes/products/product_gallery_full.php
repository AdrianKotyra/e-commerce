
<?php
    global $product;
    if(isset($_GET["show"])) {
        $product_id = $_GET["show"];
        $serch_product = new Product();
        $serch_product->create_product($product_id);

        $product_name = $serch_product->product_name;
        $product_img1 = $serch_product->product_img;
        $product_img2 = $serch_product->product_img_2;
        $product_img3 = $serch_product->product_img_3;
        $product_img4 = $serch_product->product_img_4;
        $new_index = $product_id+1;
    }


?>


<div class="product_gallery_full_container">
    <a  href="<?php echo htmlspecialchars('imgs/products/'.$product_name . '/' . $product_img1); ?> "data-fancybox="<?php echo $new_index;?>" data-caption="<?php echo $product_name;?>" data-fancybox-index=<?php echo $new_index;?>>
        <div class="full-screen-gallery-container">
            <img src="<?php echo htmlspecialchars('imgs/products/'.$product_name . '/' . $product_img1); ?>" />
        </div>
    </a>

    <a  href="<?php echo htmlspecialchars('imgs/products/'.$product_name . '/' . $product_img2); ?> "data-fancybox="<?php echo $new_index;?>" data-caption="<?php echo $product_name;?>" data-fancybox-index=<?php echo $new_index;?>>
        <div class="full-screen-gallery-container">
            <img src="<?php echo htmlspecialchars('imgs/products/'.$product_name . '/' . $product_img2); ?>" />
        </div>
    </a>

    <a  href="<?php echo htmlspecialchars('imgs/products/'.$product_name . '/' . $product_img3); ?> "data-fancybox="<?php echo $new_index;?>" data-caption="<?php echo $product_name;?>" data-fancybox-index=<?php echo $new_index;?>>
        <div class="full-screen-gallery-container">
            <img src="<?php echo htmlspecialchars('imgs/products/'.$product_name . '/' . $product_img3); ?>" />
        </div>
    </a>

    <a  href="<?php echo htmlspecialchars('imgs/products/'.$product_name . '/' . $product_img4); ?> "data-fancybox="<?php echo $new_index;?>" data-caption="<?php echo $product_name;?>" data-fancybox-index=<?php echo $new_index;?>>
        <div class="full-screen-gallery-container">
            <img src="<?php echo htmlspecialchars('imgs/products/'.$product_name . '/' . $product_img4); ?>" />
        </div>
    </a>



</div>
