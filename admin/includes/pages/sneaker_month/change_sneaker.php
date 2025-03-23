
<p>SELECT SNEAKER</p>
<div class="input-group no-border flex-col">
    <div class="flex-row">
        <input type="text" value="" class="form-control searcher-product-year" placeholder="Search by product name...">
        <div class="input-group-append">
            <div class="input-group-text">
            <i class="nc-icon nc-zoom-split"></i>
            </div>
        </div>
    </div>

    <div class="search-results-container">
        <div class="search-results-wrapper flex-col">
            <!-- <div class="product_search_container flex-row">
                <img src='../public/imgs/products/Jordan One Take 5/img1.png'>
                <p>fdsfdsfds</p>
            </div>
            <div class="product_search_container flex-row">
                <img src='../public/imgs/products/Jordan One Take 5/img1.png'>
                <p>fdsfdsfds</p>
            </div>
            <div class="product_search_container flex-row">
                <img src='../public/imgs/products/Jordan One Take 5/img1.png'>
                <p>fdsfdsfds</p>
            </div> -->

        </div>

    </div>
</div>
<?php
    global $Product;


    $product_new = new Product();

    if(isset($_GET["sneaker_month_id"])) {
        $product_id = $_GET["sneaker_month_id"];
        $product_new->create_product( $product_id);
        $product_name =  $product_new-> product_name;
        $product_price= $product_new-> product_price;
        $product_img= $product_new-> product_img;
        $product_img_2= $product_new-> product_img_2;
        $product_img_3= $product_new-> product_img_3;
        $product_img_4= $product_new->product_img_4;
        $product_desc=$product_new->product_desc;

        $product_type= $product_new->product_type;

        $product_desc= $product_new->product_desc;

        $product_category= $product_new->product_category;
        $product_type_container = '';
        foreach ($product_type as $type ) {
            $product_type_container.=$type;
        }

        // ------------------DISPLAY SELECTED PRODUCT INFO----------------------
        echo "
        <div class='card-body'>

        <a href='sneaker_month.php?source=change_sneaker'>
        <button type='submit' class='btn btn-primary btn-round'>Change sneaker </button>
        </a>
        <div class='card-header text-center'>
        <h4 class='card-title'><b>$product_name</b></h4>
        </div>

        <p class='card-title'> <b>Price: </b>$product_price</p>
        <p class='card-title'> <b>General Description: </b>$product_desc</p>
        <p class='card-title'> <b>Types: </b>
        $product_type_container


    </p>

    <p class='card-title'> <b>Category: </b> $product_category</p>
        <div class='grid-sneaker-month'>
            <img src='../public/imgs/products/$product_name/$product_img'>
            <img src='../public/imgs/products/$product_name/$product_img_2'>
            <img src='../public/imgs/products/$product_name/$product_img_3'>
            <img src='../public/imgs/products/$product_name/$product_img_4'>
        </div>
    </div>
    ";


    }



?>
