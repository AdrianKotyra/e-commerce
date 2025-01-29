<div class="banner">
    <span> Free standard UK shipping on orders over £70</span>

</div>
<nav>
    <?php
        if(isset($_GET["category"])) {
            $cat = $_GET["category"];
        }


    ?>
    <div class="nav_container flex-row wrapper">
        <div class="nav-categories nav-col flex-row">
            <div class="hamb-container">
                <i class="fa-solid fa-bars"></i>
            </div>

            <a id="cat_male"href="index.php?category=male" class="cat <?php if($cat== "male" ) { echo 'active_nav_link'; } ?>">MENS</a>
            <a id="cat_female"href="index.php?category=female" class="cat <?php if($cat== "female") { echo 'active_nav_link'; } ?>">WOMENS</a>

            <div class="cat">

                <div class="search-box-nav">

                    <span class="material-symbols-outlined search-trigger">search</span>
                    <form action="search.php" method="GET">
                        <input type="search" name="search" placeholder="Search" id="search-input" >

                    </form>

                </div>



            </div>
        </div>

        <div class="logo-nav nav-col">
            <a href="index.php">
                <p class="logo-name">Hi-Top Sneakers </p>
            </a>

        </div>

        <div class="login-container nav-col flex-row">


            <?php login_User_link()?>
            <div class="backet-container">
                <i class="fa-solid fa-basket-shopping"></i>
            </div>

        </div>



    </div>
    <div class="nav-extra wrapper ">
        <hr>
        <div class="flex-row nav-extra-container men-extra-nav">

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
        <div class="flex-row nav-extra-container female-extra-nav">

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
    </div>

</nav>
