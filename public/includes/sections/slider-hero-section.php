

<section class="hero-section-main wrapper">

    <div class="hero-container">

        <?php
            if(isset($_GET["category"])){
                $category = $_GET["category"];

                if($category=="female") {
                    $bg_color ="#e0c1d4";
                }

                if($category=="male") {
                    $bg_color = "#acb5e6";
                }

                if($category=="unisex") {
                    $bg_color = "#90e185";
                }

                }
                else {
                    $bg_color ="#b8b8b8";
                }
        ?>

        <div class="swiper-container main-slider-hero loading">
        <div class="swiper-wrapper">

        <div class="swiper-slide hero-section-main-slide hero-section-main-slide_2" style="background: <?php echo $bg_color; ?>;">


                <div class="content">
                <figure class="slide-bgimg" loading="lazy"></figure>

                    <p class="title"><b>Exclusive Drops & Collectables</b></p>
                    <span>  We source rare sneakers from around the world, bringing you the most stylish and hard-to-find kicks.</span>




                </div>

                <div class="content-slider-container">
                    <img loading="lazy" src="./imgs/slider/slide (2).png" />
                </div>



            </div>
            <div class="swiper-slide hero-section-main-slide hero-section-main-slide_1" style="background: <?php echo $bg_color; ?>;">
                <figure class="slide-bgimg" loading="lazy"></figure>
                <img loading="lazy" src="./imgs/slider/slide (4).png" />

                <div class="content">

                    <p class="title"><b>Exclusive Drops & Collectables</b></p>
                    <span>  We source rare sneakers from around the world, bringing you the most stylish and hard-to-find kicks.</span>




                </div>
            </div>
            <div class="swiper-slide hero-section-main-slide hero-section-main-slide_3" style="background: <?php echo $bg_color; ?>;">
                <figure class="slide-bgimg" loading="lazy"></figure>
                <img loading="lazy" src="./imgs/slider/slide (3).png" />

                <div class="content">


                    <p class="title"><b>Exclusive Drops & Collectables</b></p>
                    <span>  We source rare sneakers from around the world, bringing you the most stylish and hard-to-find kicks.</span>



                </div>
            </div>

        </div>
        </div>

        </div>







</section>
