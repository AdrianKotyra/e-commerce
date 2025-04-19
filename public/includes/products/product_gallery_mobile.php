
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
<div class="swiper-container products-slider loading">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <figure class="slide-bgimg" loading="lazy"></figure>
            <img loading="lazy" src="./imgs/products/<?php echo  $product_name."/". $product_img1;?>" />


        </div>
        <div class="swiper-slide">
            <figure class="slide-bgimg" loading="lazy"></figure>
            <img loading="lazy" src="./imgs/products/<?php echo  $product_name."/". $product_img2;?>" />


        </div>
        <div class="swiper-slide">
            <figure class="slide-bgimg" loading="lazy"></figure>
            <img loading="lazy" src="./imgs/products/<?php echo  $product_name."/". $product_img3;?>" />


        </div>
        <div class="swiper-slide">
            <figure class="slide-bgimg" loading="lazy"></figure>
            <img loading="lazy" src="./imgs/products/<?php echo  $product_name."/". $product_img4;?>" />


        </div>
    </div>
  </div>
</div>