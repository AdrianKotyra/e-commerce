<?php include("includes/header.php") ?>

<section class="products wrapper">
    <div class="products-container ">
        <div class="product-gallery-container">

            <?php include("includes/products/product_gallery_mobile.php") ?>
            <?php include("includes/products/product_gallery_full.php") ?>
        </div>

        <div class="product-info ">
            <p  class="prod-category">category</p>
            <h1  class="prod-name">product name</h1>
            <span class="prod-price"><b>33£</b></span>
            <span class="prod-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat laborum minima earum eligendi pariatur beatae odit!</span>
            <div class="product-categories flex-row">
                <a href="">
                    <img src="https://images.pexels.com/photos/27639777/pexels-photo-27639777/free-photo-of-voiture-de-sport-blanche-toyota-garee-dans-un-parking-souterrain.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" />
                </a>

                <a href="">
                    <img src="https://images.pexels.com/photos/27639777/pexels-photo-27639777/free-photo-of-voiture-de-sport-blanche-toyota-garee-dans-un-parking-souterrain.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" />
                </a>

                <a href="">
                    <img src="https://images.pexels.com/photos/27639777/pexels-photo-27639777/free-photo-of-voiture-de-sport-blanche-toyota-garee-dans-un-parking-souterrain.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" />
                </a>

                <a href="">
                    <img src="https://images.pexels.com/photos/27639777/pexels-photo-27639777/free-photo-of-voiture-de-sport-blanche-toyota-garee-dans-un-parking-souterrain.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" />
                </a>


            </div>

            <div class="hover-prod-cat-info">
                <span><b>Color: </b></span>hovered info
            </div>
            <div class="choose-size-container">
                <div class="size-container-header flex-row">
                    <span>Choose a size</span>
                    <span class="link_sizes">Size Guide</span>

                </div>

            </div>
            <button class="button-custom">Add to Cart</button>
            <?php include("includes/products/prod_similar.php") ?>
            <?php include("includes/products/prod_extra_desc.php") ?>

        </div>


    </div>


</section>

<script src="js/pages/products.js"></script>
<?php include("includes/footer.php") ?>