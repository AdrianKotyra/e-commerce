<?php include("includes/header.php") ?>

<section class="contact-hero-banner">
    <div class="hero-container">
      <?php


      ?>
      <h1 class="category_header">Hi-top Sneakers Community</h1>
      <img class="category_bg"src="imgs/posts/posts_all.jpg" alt="">

    </div>




</section>
<?php
    if(isset($_GET["search"])) {
        $searched = $_GET["search"];
    }
    else {
        $searched = '';
    }
?>

<section class="section-all-posts wrapper">
    <section class="search-section">
        <div class="search-msg-container">
            Your search for "<?php echo $searched;?>" revealed the following
        </div>
        <div class="search-container">
            <form  method="GET" class="search-form">
                <div class="search-input-container flex-row">
                    <input type="text" placeholder="Search" name="search">

                    <div class="search-icon-container flex-col">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                </div>
            </form>

        </div>


    </section>
    <h5>Our news</h5>
    <div class="grid-section-all-posts ">

        <?php
        $per_page = 8;
        $start = pagination_main_default("news", $per_page);
        echo generate_posts_allposts($start, $per_page );

        ?>

    </div>
    <?php  pagination_links_default("news", $per_page);?>
</section>






<script src="js/pages/search.js"></script>


<?php include("includes/footer.php") ?>