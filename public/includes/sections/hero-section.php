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
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content ">
                                            <h4>Women</h4>
                                            <span>Best Sneakers For Women</span>
                                        </div>
                                        <a href="index.php?category=female">
                                        <div class="category_hero_female hover-content ">

                                            <div class="inner">
                                                <h4>Women</h4>
                                                <p>Best Sneakers For Women</p>
                                                <div class="main-border-button">
                                                   Discover More
                                                </div>
                                            </div>

                                        </div>
                                        </a>
                                        <img src="./imgs/hero_section/woman.WEBP">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 g-0">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Men</h4>
                                            <span>Best Sneakers For Men</span>
                                        </div>
                                        <a href="index.php?category=male">
                                        <div class="category_hero_man hover-content ">
                                            <div class="inner">
                                                <h4>Men</h4>
                                                <p>Best Sneakers For Men </p>
                                                <div class="main-border-button">
                                                 Discover More
                                                </div>
                                            </div>
                                        </div>
                                        </a>
                                        <img src="./imgs/hero_section/man.WEBP">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 g-0">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Unisex</h4>
                                            <span>Best Sneakers for men and women</span>
                                        </div>
                                        <a href="index.php?category=unisex">
                                        <div class="category_hero_unisex hover-content  ">
                                            <div class="inner">
                                                <h4>Unisex</h4>
                                                <p>Best Sneakers for men and women</p>
                                                <div class="main-border-button">
                                                  Discover More
                                                </div>
                                            </div>
                                        </div>
                                        </a>
                                        <img src="./imgs/hero_section/uni.WEBP">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 g-0">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>All </h4>
                                            <span>Best Sneakers for everyone</span>
                                        </div>
                                        <a href="index.php">
                                        <div class="hover-content  ">
                                            <div class="inner">
                                                <h4>All</h4>
                                                <p>Best Sneakers for everyone</p>
                                                <div class="main-border-button">
                                                   Discover More
                                                </div>
                                            </div>
                                        </div>
                                        </a>
                                        <img src="./imgs/hero_section/all.WEBP">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>