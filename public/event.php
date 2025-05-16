<?php include("includes/header.php") ?>




<?php
   $result = $database->query_array("SELECT * FROM product_year limit 1");
   while ($row = mysqli_fetch_array($result)) {
       $product_id = $row['product_id'];
       $header_1 = $row['header_1'];
       $header_2 = $row['header_2'];
       $desc_1 = $row['description_1'];
       $desc_2 = $row['description_2'];

       $product_id = $row['product_id'];



       $serch_product = new Product();
       $serch_product->create_product($product_id);
       $product_name = $serch_product->product_name;
       $product_price= $serch_product->product_price;
       $product_img1 = $serch_product->product_img;
       $product_img2 = $serch_product->product_img_2;
       $product_img3 = $serch_product->product_img_3;
       $product_img4 = $serch_product->product_img_4;
       $product_type = $serch_product->product_type;
       $product_desc = $serch_product->product_desc;
       $product_category = $serch_product->product_category;
   }

?>
<section class="hero-section event_hero">
    <div class="hero-container">

      <h1 class="category_header">Sneaker of the Month</h1>
      <img class="category_bg"src="imgs/sneaker_month/close-up-basketball-shoes.jpg" alt="">


    </div>




</section>
<section class="sneaker_year_section wrapper">

<div class="event-section section  sneaker_year_col">
<div class="event-section-container3">
    <div class="img-container-event ">
    <img  class="event_col_3_img" src="<?php echo htmlspecialchars('imgs/products/'.$product_name . '/' . $product_img1); ?> "/>
    </div>
    <div class="event-desc-container flex-col">

        <div class="event-desc-details event-page-col event_col_3">

        <h3><b><?php echo $product_name;?></b></h3>
        <p>  <?php echo $product_desc;?></p>
        <span class="trigger_col_3"></span>

        </div>


    </div>

</div>
</div>


</div>
<div class="event-section section  sneaker_year_col">
<div class="event-section-container">
    <div class="img-container-event ">
    <img  class="event_col_1_img"  src="<?php echo htmlspecialchars('imgs/products/'.$product_name . '/' . $product_img2); ?> "/>
    </div>
    <div class="event-desc-container flex-col">
        <div class="event-desc-details event-page-col event_col_1">
            <h3><b><?php echo $header_1;?></b></h3>
            <p>  <?php echo $desc_1;?></p>
            <span class="trigger_col_1"></span>

        </div>


    </div>

</div>
</div>

<div class="event-section section  sneaker_year_col">
<div class="event-section-container2">
    <div class="img-container-event ">
    <img  class="event_col_2_img" src="<?php echo htmlspecialchars('imgs/products/'.$product_name . '/' . $product_img3); ?> "/>
    </div>
    <div class="event-desc-container flex-col">

        <div class="event-desc-details event-page-col event_col_2">

        <h3><b><?php echo $header_2;?></b></h3>
        <p>  <?php echo $desc_2;?></p>
        <span class="trigger_col_2"></span>

        </div>


    </div>

</div>
</div>

</section>
<section class="section-sneaker-month wrapper newsletter-section" >

    <div class="section-sneaker-month-container">

        <img src="./imgs/sneaker_month/order.webp" alt="">
        <div class="container-text">
            <h3 class="header-event">
                ORDER NOW AND GET - 25%

            </h3>
            <p>Step up your style with our Sneaker of the Month! Each month, we feature a standout pair chosen for its design, comfort, and trend-setting appeal. For a limited time, enjoy an exclusive <b>25% off</b> when you order this featured sneaker. Don’t miss your chance to grab the hottest kicks at a special price—only while supplies last!</p>
            <a href="products.php?show=<?php echo  $product_id;?>">
                <button class="button-custom-img">ORDER NOW</button>
            </a>



        </div>



    </div>




 </section>

<script src="./js/pages/event.js"></script>

<?php include("includes/footer.php") ?>