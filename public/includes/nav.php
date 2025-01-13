<div class="banner">
    Free standard UK shipping on orders over £70
</div>
<nav>
    <div class="nav_container flex-row wrapper">
        <div class="nav-categories nav-col flex-row">
            <a href="index.php?category=category1" class="cat">category 1</a>
            <a href="index.php?category=category2" class="cat">category 2</a>
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
                <p class="logo-name">ecommerce</p>
            </a>

        </div>

        <div class="login-container nav-col flex-row">


            <?php login_User_link()?>
            <div class="backet-container">
                <i class="fa-solid fa-basket-shopping"></i>
            </div>

        </div>

    </div>
</nav>