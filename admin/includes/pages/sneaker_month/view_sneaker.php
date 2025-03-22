
<?php
    global $Product;
    global $Product_month;
    $product_month = new Product_month();
    $product_month->GET_product_month_info();

    $product_id = $product_month->product_id;
    $description_1 = $product_month->description_1;
    $description_2 = $product_month->description_2;
    $header_1 = $product_month->header_1;
    $header_2 = $product_month->header_2;

    $product_month->create_product( $product_id);
    $product_name =  $product_month-> product_name;
    $product_price= $product_month-> product_price;
    $product_img= $product_month-> product_img;
    $product_img_2= $product_month-> product_img_2;
    $product_img_3= $product_month-> product_img_3;
    $product_img_4= $product_month->product_img_4;

    // list of types []
    $product_type= $product_month->product_type;

    $product_desc= $product_month->product_desc;

    $product_category= $product_month->product_category;


?>


<div class="card-body">

    <a href="sneaker_month.php?source=change_sneaker">
    <button type="submit" class="btn btn-primary btn-round">Change sneaker </button>
    </a>
    <div class="card-header text-center">
    <h4 class="card-title"><b> <?php echo  $product_name;?></b></h4>
    </div>
    <p class="card-title"> <b>Header 1: </b> <?php echo  $header_1;?></p>
    <p class="card-title"> <b>Description 1: </b> <?php echo  $description_1;?></p>
    <p class="card-title"> <b>Header 2: </b> <?php echo  $header_2;?></p>
    <p class="card-title"> <b>Description 2: </b><?php echo  $description_2;?></p>
    <p class="card-title"> <b>Price: </b> <?php echo  $product_price;?></p>
    <p class="card-title"> <b>General Description: </b> <?php echo  $product_desc;?></p>
    <p class="card-title"> <b>Types: </b>


    <?php
    foreach ($product_type as $type ) {
        echo  $type;
    }
    ?>
   </p>

    <p class="card-title"> <b>Category: </b> <?php echo  $product_category;?></p>
    <div class="grid-sneaker-month">
        <img src='../public/imgs/products/<?php echo $product_name.'/'.$product_img; ?>'>
        <img src='../public/imgs/products/<?php echo $product_name.'/'.$product_img_2; ?>'>
        <img src='../public/imgs/products/<?php echo $product_name.'/'.$product_img_3; ?>'>
        <img src='../public/imgs/products/<?php echo $product_name.'/'.$product_img_4; ?>'>
    </div>

    <div class="alert-box-user-deletion confirmationWindowModal">

        <div class="buttons-message-container">
            <p></p>
            <div class="buttons-ok-cancel">
                <button class="accept_button">OK</button>

            </div>

        </div>

    </div>



</div>
