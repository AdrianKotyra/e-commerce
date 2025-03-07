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

      <h1 class="category_header">Sneaker of the Year</h1>
      <video type="video/mp4" autoplay loop muted width="100%"height="100%"  src="./videos/sneaker_year/sneaker_year.mp4"></video>

    </div>




</section>
<section class="sneaker_year_section wrapper">
<div class="event-section section  sneaker_year_col">

<h3 class="section-header">
<a  target="_blank" href="products.php?show=<?php echo $product_id;?>&category=<?php echo $product_category;?>">
<?php echo   $product_name;?>
</a>

</h3>
<div class="event-section-container">

<img  src="<?php echo htmlspecialchars('imgs/products/'.$product_name . '/' . $product_img1); ?> "/>

</div>


</div>
<div class="event-section section  sneaker_year_col">
<div class="event-section-container">
    <div class="img-container-event ">
    <img  src="<?php echo htmlspecialchars('imgs/products/'.$product_name . '/' . $product_img2); ?> "/>
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
    <img  src="<?php echo htmlspecialchars('imgs/products/'.$product_name . '/' . $product_img3); ?> "/>
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
<script src="./js/pages/event.js"></script>

<?php include("includes/footer.php") ?>