<?php
   $result = $database->query_array("SELECT * FROM product_year limit 1");
   while ($row = mysqli_fetch_array($result)) {
       $product_id = $row['product_id'];
       $serch_product = new Product();
       $serch_product->create_product($product_id);
       $product_name = $serch_product->product_name;
       $product_img1 = $serch_product->product_img;
    }


?>

<section class="section-sneaker-month wrapper" >

    <div class="section-sneaker-month-container">

        <img src="./imgs/sneaker_month/bg2.jpg" alt="">
        <div class="container-text">
            <h3 class="header-event">
                <a href="event.php"> SNEAKER OF THE MONTH</a>

            </h3>
            <p>This exclusive release combines cutting-edge design with premium materials, making it a must-have for sneaker lovers. <Br> Get now with -25% off</p>
            <a href="event.php">
            <button class="button-custom-img">SHOP NOW</button>
            </a>
        </div>



    </div>




 </section>