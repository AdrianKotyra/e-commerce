<?php   $cat_img = '<img src="./imgs/hero_section/main.WEBP">';
        $hero_text = "Sneakers for everyone!";
        if(isset($_GET["category"])) {
            $cat = $_GET["category"];


            if($cat=="female") {
                $cat_img =  '<img src="./imgs/hero_section/main_female.WEBP">';
                $hero_text = "<span class='hero-text-sub-women'> Sneakers for Women </span>";
            }
            elseif($cat=="male") {
               $cat_img = '<img src="./imgs/hero_section/main_male.WEBP">';
               $hero_text = "<span class='hero-text-sub-man'> Sneakers for Men </span>";
            }
            elseif($cat=="unisex") {
                $cat_img =  '<img src="./imgs/hero_section/main_uni.WEBP">';
                  $hero_text = "Sneakers for everyone";
            }
            else {
                $cat_img =  '<img src="./imgs/hero_section/main.WEBP">';
                  $hero_text = "Sneakers for everyone";
            }

        }


    ?>
<div class="main-banner wrapper" id="top">
        <div class="container-fluid g-0">
            <div class="row g-0">
                <div class="col-lg-6 g-0 ">
                    <div class="left-content">
                        <div class="thumb">
                            <div class="inner-content">
                                <h4>We Are H!-Top Sneakers</h4>
                                <span><?php echo  $hero_text;?></span>

                            </div>
                            <?php
                                echo $cat_img ;
                            ?>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 g-0">
                    <div class="right-content">
                        <div class="row g-0">
                            <div class="col-lg-6 col-md-6 g-0">
                            <a href="index.php?category=female">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content ">
                                            <h4>Womens</h4>
                                            <h4>Sneakers</h4>
                                        </div>



                                        <img src="./imgs/hero_section/woman2.WEBP">
                                    </div>
                                </div>
                            </a>
                            </div>
                            <div class="col-lg-6 col-md-6 g-0">
                            <a href="index.php?category=male">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Mens</h4>
                                            <h4>Sneakers</h4>
                                        </div>



                                        <img src="./imgs/hero_section/men.WEBP">
                                    </div>
                                </div>
                            </a>
                            </div>
                            <div class="col-lg-6 col-md-6 g-0">
                            <a href="index.php?category=unisex">
                                <div class="right-first-image">

                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Unisex</h4>
                                            <h4>Sneakers</h4>
                                        </div>



                                        <img src="./imgs/hero_section/uni2.WEBP">
                                    </div>
                                </div>
                            </a>
                            </div>
                            <div class="col-lg-6 col-md-6 g-0">
                            <a href="index.php">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>All </h4>
                                            <h4>Sneakers</h4>
                                        </div>



                                        <img src="./imgs/hero_section/all2.WEBP">
                                    </div>
                                </div>
                             </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>