<div class="nav-mobile">
    <div class="nav-mobile-container ">
        <div class="dark-mode-container dark-mode-mobile-screen">
                    <input type="checkbox" id="dark-mode-toggle" />
                    <label for="dark-mode-toggle"  class="toggle"></label>
        </div>

        <div class="top-nav-gender-switcher flex-row">
            <span class="mobile-active-cat maleSwitch ">MENS</span>
            <span class="femaleSwitch">WOMENS</span>
            <span class="uniSwitch">UNISEX</span>

        </div>
        <div class="top-nav-gender-switcher flex-row">
            <span class="brandsSwitch">BRANDS</span>
            <span class="catsSwitch">CATEGORIES</span>
        </div>
        <div class="body-mobile-nav wrapper">


            <div class="male-cats mobile-cats active-mobile-nav">
                <h5>Mens Categories</h5>
                <?php get_products_types_nav('male')?>
            </div>
            <div class="female-cats mobile-cats">
                <h5>Womens Categories</h5>
                <?php get_products_types_nav('female')?>
            </div>
            <div class="uni-cats mobile-cats">
                <h5>Unisex Categories</h5>
                <?php get_products_types_nav('unisex')?>
            </div>
            <div class="brands-cats mobile-cats">
                <h5>Brands</h5>
                <?php display_nav_brands()?>
            </div>
            <div class="categories-cats mobile-cats">
                <h5>Categories</h5>
                <?php display_nav_cats()?>
            </div>

        </div>

    </div>
</div>