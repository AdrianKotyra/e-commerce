<?php include("includes/header.php") ?>

<section class="contact-hero-banner ">
    <div class="hero-container hero-container-subpage">



      <h1 class="category_header">About us</h1>
      <img class="category_bg"src="./imgs/about/banner.jpg" alt="">

    </div>






</section>

<div class="about-us animate-on-scroll">
        <div class="wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-image">
                        <img src="./imgs/about/first.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <h4 class="about-header" >HI TOP SNEAKERS</h4>


                        <p class="about-paragraph">Hi-Top Sneakers is a London-based footwear retailer specialising in high-end, exclusive, and limited edition sneakers. With a carefully curated collection that appeals to style-conscious sneaker enthusiasts, our unique selling point lies in sourcing rare and collectible footwear from around the world. We cater to all genders and focus on fashionable designs over functional wear. Currently a popular destination in East London, we are now expanding online to reach sneaker lovers across the UK.</p>
                        <ul>
                            <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-square-twitter"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="our-team animate-on-scroll ">
        <div class="wrapper">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="section-heading ">
                        <a href="team.php">
                            <h2 class="about-header">Our Amazing Team</h2>
                        </a>

                        <span class="about-paragraph">Our team is made up of passionate sneakerheads and industry insiders who live and breathe streetwear culture.</span>
                    </div>
                </div>
                    <?php display_all_teams_ABOUT();?>
            </div>
        </div>
    </section>
    <section class="gallery animate-on-scroll">
        <div class="wrapper">
            <div class="col-lg-12 text-center">
                    <div class="section-heading">
                        <a href="gallery.php"><h2  class="about-header">Our Gallery</h2></a>
                        <span class="about-paragraph">Explore our Gallery to see the essence of Hi-Top Sneakers. From rare collector's items to the hottest branded releases, our gallery showcases the craftsmanship, style, and exclusivity of the sneakers we stock.</span>
                    </div>
            </div>



            <div class="row">
              <?php galleryAboutImages();?>
            </div>
        </div>

    </section>
    <section class="our-services animate-on-scroll">
        <div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2 class="about-header">Our Services</h2>
                        <span class="about-paragraph">Hi-Top Sneakers offers a premium selection of branded and limited edition sneakers for all genders, focusing on fashionable, statement footwear. </span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-item">
                        <h4>Exclusive Sneaker Collections</h4>
                        <p>We specialise in rare, limited edition, and collectible sneakers from around the world—curated for true enthusiasts and fashion-forward buyers.</p>
                        <img src="./imgs/about/service (1).jpg">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-item">
                        <h4>Seamless Online Shopping</h4>
                        <p>Our new e-commerce platform lets you browse and purchase premium sneakers with ease, offering secure checkout and UK-wide delivery.</p>
                        <img src="./imgs/about/service (2).jpg">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-item">
                        <h4> Easy Product Management</h4>
                        <p>Our admin system allows for quick and secure product updates, helping us keep our collection fresh and always up-to-date.

</p>
                        <img src="./imgs/about/service (3).jpg">
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php include("includes/sections/newsletter-section.php") ?>
<?php include("includes/footer.php") ?>


<script src="js/animateOnScroll.js"></script>