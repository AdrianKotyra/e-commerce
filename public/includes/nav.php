
<nav>

    <?php
        if(isset($_GET["category"])) {
            $cat = $_GET["category"];
        } else {
            $cat = '';
        }


    ?>
    <div class="nav_container flex-row wrapper">
        <div class="nav-categories nav-col flex-row">
            <div class="hamb-container">
                <i class="fa-solid fa-bars"></i>

            </div>
            <div class="cats-nav-container-extra-nav flex-row extra-nav-trigger">
                <a id="cat_male"href="index.php?category=male" class="cat <?php if($cat== "male" ) { echo 'active_nav_link_male'; } ?>">MENS</a>
                <a id="cat_female"href="index.php?category=female" class="cat <?php if($cat== "female") { echo 'active_nav_link_female'; } ?>">WOMENS</a>
                <a id="cat_unisex"href="index.php?category=unisex" class="cat <?php if($cat== "unisex") { echo 'active_nav_link_unisex'; } ?>">UNISEX</a>
            </div>



            <div class="search-box-nav ">

                <span class="material-symbols-outlined search-trigger">search</span>


            </div>



        </div>

        <div class="logo-nav nav-col">
            <a href="index.php">
                <p class="logo-name">H!-Top Sneakers </p>
            </a>

        </div>

        <div class="login-container nav-col flex-row">


            <?php login_User_link()?>
            <div class="backet-container">
            <?php $basket_number = $basket->getNumber(); ?>
                <span class="basket-number <?php if ($basket_number > 0) echo 'basket-active'; ?>">
                    <?php if ($basket_number > 0) echo $basket_number; ?>
                </span>

                <img class="cart-shopping"src="./imgs/icons/cart.svg" alt="">
            </div>

        </div>



    </div>

    <div class="nav-extra  extra-nav-trigger">
        <div class="nav-extra-top">

        </div>
        <div class="wrapper">
        <hr>
        <div class="nav-extra-container men-extra-nav flex-col">
            <div class="flex-row nav-extra-content">
                <div class="nav_cats_container">

                    <span class="nav_cats_header">Shop by Mens category</span>
                    <div class="nav_cats_grid">
                        <?php get_products_types_nav('male')?>
                    </div>
                </div>

                <div class="nav_cats_img">
                    <p>
                        Mens
                    </p>
                    <img src="./imgs/nav/men/men_nav.jpg" alt="">
                </div>
            </div>
            <hr>
            <div class="nav-extra-main-links flex-row">
                <a href="news_all.php">Blog</a>
                <a href="contact.php">Contact</a>
                <a href="faq.php">FAQ</a>
            </div>


        </div>


        <div class="nav-extra-container female-extra-nav flex-col">
            <div class="flex-row nav-extra-content">
                <div class="nav_cats_container">

                    <span class="nav_cats_header">Shop by Womens category</span>
                    <div class="nav_cats_grid">
                        <?php get_products_types_nav('female')?>
                    </div>
                </div>

                <div class="nav_cats_img">
                    <p>
                        Womens
                    </p>
                    <img src="./imgs/nav/women/women.jpg" alt="">
                </div>
            </div>
            <hr>
            <div class="nav-extra-main-links flex-row">
                <a href="news_all.php">Blog</a>
                <a href="contact.php">Contact</a>
                <a href="faq.php">FAQ</a>
            </div>


        </div>
        <div class="nav-extra-container uni-extra-nav flex-col">
            <div class="flex-row nav-extra-content">
                <div class="nav_cats_container">

                    <span class="nav_cats_header">Shop by Unisex category</span>
                    <div class="nav_cats_grid">
                        <?php get_products_types_nav('unisex')?>
                    </div>
                </div>

                <div class="nav_cats_img">
                    <p>
                    Unisex
                    </p>
                    <img src="./imgs/nav/uni/uni.jpg" alt="">
                </div>
            </div>
            <hr>
            <div class="nav-extra-main-links flex-row">
                <a href="news_all.php">Blog</a>
                <a href="contact.php">Contact</a>
                <a href="faq.php">FAQ</a>
            </div>


        </div>

        </div>
    </div>
    <div class="searcher-mobile wrapper inactive-search-bar" id="search-box-nav">

        <div class="searcher-mobile-container">
            <span class="material-symbols-outlined icon-mobile-search">search</span>
            <form action="search.php" method="GET" class="flex-row">
                <input type="search" name="search" placeholder="search product" >

            </form>
            <i class="fa-solid fa-xmark close-search-nav"></i>
        </div>




    </div>
</nav>
