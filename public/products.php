<?php include("includes/header.php") ?>
<?php
    global $product;
    if(isset($_GET["show"])) {
        $product_id = $_GET["show"];
        $serch_product = new Product();
        $serch_product->create_product($product_id);
        $product_name = $serch_product->product_name;
        $product_price= $serch_product->product_price;
        $product_img1 = $serch_product->product_img;
        $product_img2 = $serch_product->product_img_2;
        $product_img3 = $serch_product->product_img_3;
        $product_img4 = $serch_product->product_img_4;
        $product_type = $serch_product->product_type;
        $product_category = $serch_product->product_category;
        $product_sizes = $serch_product->product_sizes_list;

    }


?>
<section class="products wrapper">
    <div class="products-container ">
        <div class="product-gallery-container">

            <?php include("includes/products/product_gallery_mobile.php") ?>
            <?php include("includes/products/product_gallery_full.php") ?>
        </div>

        <div class="product-info ">
            <p  class="prod-category"><a href="index.php?category=<?php echo $product_category;?>"> <?php echo  $product_category;?> </a> > <a href="category.php?show=<?php echo $product_type;?>&category=<?php echo $product_category;?>"> <?php echo  $product_type;?> </a></p>
            <h1  class="prod-name"><?php echo  $product_name;?></h1>
            <span class="prod-price"><b>£<?php echo  $product_price;?></b></span>
            <span class="prod-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat laborum minima earum eligendi pariatur beatae odit!</span>
            <div class="product-categories flex-row">
                <a  href="<?php echo htmlspecialchars('imgs/products/'.$product_name . '/' . $product_img1); ?> "data-fancybox="<?php echo $product_id;?>" data-caption="<?php echo $product_name;?>" data-fancybox-index=<?php echo $product_id;?>>
                    <img  src="<?php echo htmlspecialchars('imgs/products/'.$product_name . '/' . $product_img1); ?> "/>
                </a>

                <a  href="<?php echo htmlspecialchars('imgs/products/'.$product_name . '/' . $product_img2); ?>"data-fancybox="<?php echo $product_id;?>" data-caption="<?php echo $product_name;?>" data-fancybox-index=<?php echo $product_id;?>>
                    <img  src="<?php echo htmlspecialchars('imgs/products/'.$product_name . '/' . $product_img2); ?> "/>
                </a>
                <a  href="<?php echo htmlspecialchars('imgs/products/'.$product_name . '/' . $product_img3); ?> "data-fancybox="<?php echo $product_id;?>" data-caption="<?php echo $product_name;?>" data-fancybox-index=<?php echo $product_id;?>>
                    <img  src="<?php echo htmlspecialchars('imgs/products/'.$product_name . '/' . $product_img3); ?> "/>
                </a>
                <a  href="<?php echo htmlspecialchars('imgs/products/'.$product_name . '/' . $product_img4); ?> "data-fancybox="<?php echo $product_id;?>" data-caption="<?php echo $product_name;?>" data-fancybox-index=<?php echo $product_id;?>>
                    <img  src="<?php echo htmlspecialchars('imgs/products/'.$product_name . '/' . $product_img4); ?> "/>
                </a>
            </div>

            <div class="hover-prod-cat-info">
                <span><b>Color: </b></span>hovered info
            </div>

            <div class="choose-size-container">
                <div class="size-container-header flex-row">
                    <span>Choose a size</span>
                    <span class="link_sizes">Size Guide</span>

                </div>

            </div>
            <button class="button-custom">Add to Cart</button>
            <?php include("includes/products/prod_extra_desc.php") ?>
            <?php include("includes/products/prod_similar.php") ?>


        </div>


    </div>


</section>

<script src="js/pages/products.js"></script>
<?php include("includes/footer.php") ?>