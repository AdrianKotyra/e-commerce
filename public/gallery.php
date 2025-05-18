<?php include("includes/header.php") ?>

<section class="contact-hero-banner">
    <div class="hero-container hero-container-subpage">



      <h1 class="category_header">Gallery</h1>
      <img class="category_bg"src="./imgs/gallery/main-banner.jpg" alt="">

    </div>




    </section>





    <section class="gallery">
        <div class="wrapper">

            <div class="main-images-container">
                <div class="row">
                <?php
                    $per_page = 10;
                    $start = pagination_main_default("gallery", $per_page);
                    galleryMainImages($per_page, $start);


                ?>

                </div>



            </div>

        </div>
        <?php echo pagination_links_default("gallery", $per_page);?>

    </section>



<?php include("includes/sections/newsletter-section.php") ?>
<?php include("includes/footer.php") ?>

<script src="js/animateOnScroll.js"></script>