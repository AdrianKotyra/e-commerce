
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

    }


?>

<div class="image-slider">
    <section class="slider__content">
        <button type="button" class="slider-control--button prev-button">
            <svg width="16" height="16" fill="currentColor" class="icon arrow-left-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z" />
            </svg>
        </button>
        <main class="image-display"></main>
        <button type="button" class="slider-control--button next-button">
            <svg width="16" height="16" fill="currentColor" class="icon arrow-right-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
            </svg>
        </button>
    </section>
    <nav class="slider-navigation">
        <button class="nav-button" aria-selected="true">
            <img class="thumbnail" src="<?php echo htmlspecialchars('imgs/products/'.$product_name . '/' . $product_img1); ?>" />

        </button>
        <button class="nav-button" aria-selected="true">
        <img class="thumbnail" src="<?php echo htmlspecialchars('imgs/products/'.$product_name . '/' . $product_img2); ?>" />


        </button>
        <button class="nav-button" aria-selected="true">
        <img class="thumbnail" src="<?php echo htmlspecialchars('imgs/products/'.$product_name . '/' . $product_img3); ?>" />


        </button>
        <button class="nav-button" aria-selected="true">
        <img class="thumbnail" src="<?php echo htmlspecialchars('imgs/products/'.$product_name . '/' . $product_img4); ?>" />


        </button>

    </nav>
</div>