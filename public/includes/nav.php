<div class="banner">
    <span> Free standard UK shipping on orders over £70</span>

</div>
<nav>
    <div class="nav_container flex-row wrapper">
        <div class="nav-categories nav-col flex-row">
            <div class="hamb-container">
                <i class="fa-solid fa-bars"></i>
            </div>
            <a href="index.php?category=male" class="cat">MENS</a>
            <a href="index.php?category=female" class="cat">WOMENS</a>
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
</nav>