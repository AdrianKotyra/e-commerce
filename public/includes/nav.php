<div class="banner-promo">
    <span class="banner-text-1 inactive-promo">
        Free shipping for order over 70£
    </span>
    <span class="banner-text-2 active-promo">
       But now pay with Paypal
    </span>

</div>
<nav >

    <?php
        if(isset($_GET["category"])) {
            $cat = $_GET["category"];
        } else {
            $cat = '';
        }


    ?>
    <div class="flex-col nav-top-container wrapper ">
        <div class="nav_container flex-row">
            <div class="nav-categories nav-col flex-row">
                <div class="hamb-container">
                    <i class="fa-solid fa-bars nav-icon"></i>

                </div>
                <div class="cats-nav-container-extra-nav flex-row extra-nav-trigger">
                    <a id="cat_male"href="index.php?category=male" class="male-trigger cat <?php if($cat== "male" ) { echo 'active_nav_link_male'; } ?>">MENS</a>
                    <a id="cat_female"href="index.php?category=female" class="female-trigger cat <?php if($cat== "female") { echo 'active_nav_link_female'; } ?>">WOMENS</a>
                    <a id="cat_unisex"href="index.php?category=unisex" class="uni-trigger cat <?php if($cat== "unisex") { echo 'active_nav_link_unisex'; } ?>">UNISEX</a>
                    <a id="cat_brands"href="search.php?search=&category=mixed&size=all&type=all&brand=all" class="brand-trigger cat">BRANDS</a>
                </div>



                <div class="search-box-nav ">
                <i class="fa-solid fa-magnifying-glass search-trigger nav-icon"></i>



                </div>



            </div>

            <div class="logo-nav nav-col">

                <a href="index.php" class=" flex-row">
                <img src="./imgs/icons/black-logo.png" alt="">
                    <p class="logo-name">I-Top Sneakers </p>
                </a>

            </div>

            <div class="login-container nav-col flex-row">

                <!-- LOGIN -->
                <?php login_User_link()?>
                <!-- WISHLIST -->

                <div class="wish-list-nav nav-link-wrapper">
                    <span  class="wide-screen-nav-link-desc">Favorites</span>
                    <?php
                    global $wishlist;

                    $number_items = wishlist::getNumber_products();
                    echo   $number_items>=1? '<img  src="./imgs/icons/heart-solid.svg">' :   '<img src="./imgs/icons/heart-regular.svg">';
                    ?>
                </div>
                <!-- BASKET -->
                <div class="backet-container nav-link-wrapper">
                    <span class="wide-screen-nav-link-desc">Shopping cart</span>
                    <?php $basket_number = $basket->getNumber(); ?>
                    <span class="basket-number <?php if ($basket_number > 0) echo 'basket-active'; ?>">
                        <?php if ($basket_number > 0) echo $basket_number; ?>
                    </span>

                    <img class="cart-shopping nav-icon-img"src="./imgs/icons/cart.svg" alt="">
                </div>
                <div class="dark-mode-container">
                    <input type="checkbox" id="dark-mode-toggle" />
                    <label for="dark-mode-toggle"  class="toggle"></label>
                </div>
                <script>


                    function getCookie(name) {
                        let match = document.cookie.match(new RegExp("(^| )" + name + "=([^;]+)"));
                        return match ? decodeURIComponent(match[2]) : null;
                        }
                    function check_status(){
                        const inputDarkMode = document.querySelector("#dark-mode-toggle");

                        if (getCookie("darkmode") === "false") {

                        inputDarkMode.checked = false;
                        } else if (getCookie("darkmode") === "true") {
                            inputDarkMode.checked = true;
                        }





                    }
                    check_status()

                </script>



            </div>

        </div>



    </div>

    <div class="nav-extra  extra-nav-trigger">

        <div class="wrapper">
        <hr>
          <!-- ---------------------BRANDS extra --------------------- -->

          <div class="nav-extra-container brand-extra-nav flex-col">
            <div class="flex-row nav-extra-content">
                    <div class="nav_cats_container">

                        <span class="nav_cats_header">Shop by Brands</span>
                        <div class="nav_brands_grid">
                            <?php display_nav_brands()?>
                        </div>
                    </div>

                    <div class="nav_cats_img">
                        <p>
                            Brands
                        </p>
                        <img src="./imgs/nav/brands/img1.jpg" alt="">
                    </div>
                </div>
                <hr>
                <div class="nav-extra-main-links flex-row">
                    <a href="news_all.php">Blog</a>
                    <a href="contact.php">Contact</a>
                    <a href="faq.php">FAQ</a>
                    <a href="about.php">About us</a>
                    <a href="delivery_returns.php">Shipping & Returns</a>
                </div>


        </div>
        <!-- ---------------------men extra nav--------------------- -->

        <div class="nav-extra-container men-extra-nav flex-col">
            <div class="flex-row nav-extra-content">
                <div class="nav_cats_container flex-row">
                    <div class="flex-row">
                        <div class="cats-nav">
                            <span class="nav_cats_header">Shop by category</span>
                            <div class="nav_cats_grid">

                                <?php get_products_types_nav('male')?>
                            </div>
                        </div>
                        <div class="cats-nav">
                            <span class="nav_cats_header">Shop by brands </span>
                            <div class="nav_brands_grid">

                            <?php display_nav_brands('male')?>
                            </div>
                        </div>
                    </div>
                    <div class="nav_cats_img">
                        <p>
                            Mens
                        </p>
                        <img src="./imgs/nav/men/men_nav.jpg" alt="">
                    </div>
                </div>
            </div>
            <hr>
            <div class="nav-extra-main-links flex-row">
                <a href="news_all.php">Blog</a>
                <a href="contact.php">Contact</a>
                <a href="faq.php">FAQ</a>
                <a href="about.php">About us</a>
                <a href="delivery_returns.php">Shipping & Returns</a>
            </div>


        </div>
        <!-- ---------------------female extra nav--------------------- -->
        <div class="nav-extra-container female-extra-nav flex-col">
            <div class="flex-row nav-extra-content">
                <div class="nav_cats_container flex-row">
                    <div class="flex-row">
                        <div class="cats-nav">
                            <span class="nav_cats_header">Shop by category</span>
                            <div class="nav_cats_grid">

                                <?php get_products_types_nav('female')?>
                            </div>
                        </div>
                        <div class="cats-nav">
                            <span class="nav_cats_header">Shop by brands </span>
                            <div class="nav_brands_grid">

                            <?php display_nav_brands('female')?>
                            </div>
                        </div>
                    </div>
                    <div class="nav_cats_img">
                        <p>
                            Mens
                        </p>
                        <img src="./imgs/nav/women/women.jpg" alt="">
                    </div>
                </div>
            </div>
            <hr>
            <div class="nav-extra-main-links flex-row">
                <a href="news_all.php">Blog</a>
                <a href="contact.php">Contact</a>
                <a href="faq.php">FAQ</a>
                <a href="about.php">About us</a>
                <a href="delivery_returns.php">Shipping & Returns</a>
            </div>


        </div>



        <!-- ---------------------uni sex extra nav--------------------- -->
        <div class="nav-extra-container uni-extra-nav flex-col">
            <div class="flex-row nav-extra-content">
                <div class="nav_cats_container flex-row">
                    <div class="flex-row">
                        <div class="cats-nav">
                            <span class="nav_cats_header">Shop by category</span>
                            <div class="nav_cats_grid">

                                <?php get_products_types_nav('unisex')?>
                            </div>
                        </div>
                        <div class="cats-nav">
                            <span class="nav_cats_header">Shop by brands </span>
                            <div class="nav_brands_grid">

                            <?php display_nav_brands('unisex')?>
                            </div>
                        </div>
                    </div>
                    <div class="nav_cats_img">
                        <p>
                            Mens
                        </p>
                        <img src="./imgs/nav/uni/uni.jpg" alt="">
                    </div>
                </div>
            </div>
            <hr>
            <div class="nav-extra-main-links flex-row">
                <a href="news_all.php">Blog</a>
                <a href="contact.php">Contact</a>
                <a href="faq.php">FAQ</a>
                <a href="about.php">About us</a>
                <a href="delivery_returns.php">Shipping & Returns</a>
            </div>


        </div>


    </div>

</nav>
<div class="searcher-mobile  inactive-search-bar" id="search-box-nav">

    <div class="searcher-mobile-container wrapper">
        <i class="fa-solid fa-magnifying-glass icon-mobile-search nav-icon"></i>

        <form action="search.php" method="GET" class="flex-row">
            <input type="search" name="search" placeholder="search product" >

        </form>
        <i class="fa-solid fa-xmark close-search-nav nav-icon"></i>
    </div>




</div>