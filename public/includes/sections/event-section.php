<?php
   $result = $database->query_array("SELECT * FROM product_year limit 1");
   while ($row = mysqli_fetch_array($result)) {
       $product_id = $row['product_id'];


       $serch_product = new Product();
       $serch_product->create_product($product_id);
       $product_name = $serch_product->product_name;

       $product_img2 = $serch_product->product_img_2;
       $product_img1 = $serch_product->product_img;
   }

?>

<section class="section-sneaker-month wrapper" id="explore">

            <div class="row ">
                <div class="col-lg-6">
                    <div class="left-content">
                        <h2>Sneaker of the month</h2>

                        <span>Step up your sneaker game with our Sneaker of the Month pick! Each month, we feature an exclusive sneaker that stands out for its design, comfort, and trend-setting style. </span>
                        <p>Whether it’s a limited-edition drop, a classic making a comeback, or the hottest new release, this sneaker is a must-have for collectors and casual wearers alike. </p>
                        <p>Stay ahead of the game and grab yours before it’s gone! Check back every month for fresh kicks that elevate your style.</p>
                        <p>Todays Sneaker of the month is  <b> <h4><?php echo $product_name;?></h4></b></p>
                        <div class="main-border-button">
                            <a href="bestsneaker">Discover More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">

                    <div class="right-content">
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="first-image">

                                <img  loading="lazy" src="<?php echo 'imgs/products/'.$product_name.'/'.$product_img1.''?>">
                                </div>
                            </div>

                        </div>

                    </div>
                </div>


        </div>
    </section>