<?php include("includes/header.php") ?>

<?php
    global $product;
    if(isset($_GET["show"])) {
        $product_id = $_GET["show"];
        global $database;

        // back to home if product doesnt exists
        $check_product = $database->query_array("SELECT * from products where product_id = $product_id");
        if(mysqli_num_rows($check_product)==0) {
            header("Location: index.php");
        }
        else {
            $serch_product = new Product();
            $serch_product->create_product($product_id);
            Product::increment_product_views($product_id);
            $product_name = $serch_product->product_name;
            $product_price= $serch_product->product_price;

            $product_img1 = $serch_product->product_img;
            $product_img2 = $serch_product->product_img_2;
            $product_img3 = $serch_product->product_img_3;
            $product_img4 = $serch_product->product_img_4;
            $product_type = $serch_product->product_type;
            $product_desc = $serch_product->product_desc;
            $product_brand_logo = $serch_product->brand_img;
            $product_brand_id = $serch_product->brand_id;
            $product_category = $serch_product->product_category;
            $product_sizes = $serch_product->product_sizes_list;
            $product_availability = $serch_product->product_availability;


            $product_month = $serch_product->product_month;

            $sizes_html = generate_sizes_html($serch_product, "span");
            $chosen_grid= generate_product_grid_sizes($serch_product);

            $wishlist_check = new wishlist();

            $product_add_to_wishlist = $wishlist_check->check_if_product_added($product_id);

            if($product_add_to_wishlist==1) {
                $favorite_icon=  '
                <img  class="prod-fav-label-added" src="./imgs/icons/heart-solid.svg">';

            }
            else {
                $favorite_icon = '<img prod-id='.$product_id.' class="prod-fav-label" src="./imgs/icons/heart-regular.svg">';


            }
        }



    } else {
        header("Location: index.php");
    }


?>
<section class="products wrapper">
    <div class="products-container ">
        <div class="product-gallery-container">

            <?php include("includes/products/product_gallery_mobile.php") ?>
            <?php include("includes/products/product_gallery_full.php") ?>
        </div>

        <div class="product-info ">

            <div  class="prod-category">

                <div>
                    <a href="index.php?category=<?php echo $product_category;?>"> <?php echo  $product_category;?> </a>  |

                        <?php
                        // echo all product types
                        foreach ($product_type as $type ) {
                        echo ' <a href="category.php?type='.$type.'&category=mixed">
                        '.$type.' |
                            </a>';
                        }
                        ?>
                </div>
                <?php echo  $product_month==true? '  <img class="sneaker_month_badge" src="imgs/sneaker_month/SNEAKER_month_badge.png" alt="">' : "";
                ?>

            </div>
            <a href="search.php?search=&category=mixed&size=all&type=all&brand=<?php echo $product_brand_id;?>">
                <img class="brand-products-img"src="./imgs/brands/<?php echo $product_brand_logo;?>" alt="">
            </a>

            <div class="product-page-container-title ">

                <h1  class="prod-name"><?php echo  $product_name;?></h1>

                <?php echo $favorite_icon;?>
            </div>
            <!-- OLD PRICE IF SNEAKER OF THE MONTH -->
            <span class="prod-price-original"><b><?php  echo $product_month == true ? '£'.round($product_price / 0.75,2) : ""; ?></b></span>
            <span class="prod-price"><b>£<?php echo  $product_price;?></b></span>

            <span class="prod-desc"><?php echo  $product_desc;?></span>
            <div class="product-categories flex-row">
                <a  href="<?php echo htmlspecialchars('imgs/products/'.$product_name . '/' . $product_img1); ?> "data-fancybox="<?php echo $product_id;?>" data-caption="<?php echo $product_name;?>" data-fancybox-index=<?php echo $product_id;?>>
                    <img  src="<?php echo htmlspecialchars('imgs/products/'.$product_name . '/' . $product_img1); ?> "/>
                </a>

                <a  href="<?php echo htmlspecialchars('imgs/products/'.$product_name . '/' . $product_img2); ?>"data-fancybox="<?php echo $product_id;?>" data-caption="<?php echo $product_name;?>" data-fancybox-index=<?php echo $product_id;?>>
                    <img  src="<?php echo htmlspecialchars('imgs/products/'.$product_name . '/' . $product_img2); ?> "/>
                </a>
                <a  href="<?php echo htmlspecialchars('imgs/products/'.$product_name . '/' . $product_img3); ?> "data-fancybox="<?php echo $product_id;?>" data-caption="<?php echo $product_name;?>" data-fancybox-index=<?php echo $product_id;?>>
                    <img  src="<?php echo htmlspecialchars('imgs/products/'.$product_name . '/' . $product_img3); ?> "/>
                </a>
                <a  href="<?php echo htmlspecialchars('imgs/products/'.$product_name . '/' . $product_img4); ?> "data-fancybox="<?php echo $product_id;?>" data-caption="<?php echo $product_name;?>" data-fancybox-index=<?php echo $product_id;?>>
                    <img  src="<?php echo htmlspecialchars('imgs/products/'.$product_name . '/' . $product_img4); ?> "/>
                </a>
            </div>


            <div class="choose-size-container">
                <div class="size-container-header flex-row">
                    <span class="chose-size-span"><?php echo  $product_availability? 'Choose a size' : '</span>'?>
                    <span class="link_sizes">Size Guide</span>

                </div>
                <div class="products-sizes-grid <?php echo  $chosen_grid;?>">
                    <?php
                        echo $sizes_html;

                    ?>
                </div>

            </div>
            <div class="add-prod-container-products">
                <button class="button-custom  <?php echo  $product_availability?  'add-to-card-products' : 'button-out-stock';?> "><?php echo  $product_availability? 'Add to cart' : 'out of stock'?></button>
                <button class="button-custom button-alert">Please select a size</button>
            </div>

            <?php include("includes/products/prod_extra_desc.php") ?>
            <?php include("includes/products/prod_similar.php") ?>


        </div>


    </div>


</section>


<section class="product-comments-section">
    <div class="product-comments-section-container wrapper">
        <div class="reviews-container-controller">
            <div class="reviews-container">
                <div class="rating-container flex-col">
                    <div class="rating">
                        <span class="stars_numbers stars">
                            <?php  echo comment::get_average_rating($product_id);?>
                        </span>


                        <span class="stars">
                            <?php  echo comment::get_average_rating_stars($product_id);?>
                        </span>


                    </div>
                <div class="rating-reviews-counts">Based on
                <?php echo comment::get_number_comments($product_id);  ?>
                reviews
                </div>




                </div>

                <button class="button-custom write-review-button">
                    WRITE REVIEW
                </button>

            </div>
            <hr>
        </div>



        <div class="form-comment-add inactive-comment-form">
            <form class="form-comment flex-col">
                <span>What would you rate this product?</span>
                <span class="rating-stars-container inactive-comment-form ">Please choose a rating</span>
                <div class="stars-form-container">
                    <div class="stars">
                        <span class="star" data-value="1"><img src="./imgs/icons/star.svg" alt=""></span>
                        <span class="star" data-value="2"><img src="./imgs/icons/star.svg" alt=""></span>
                        <span class="star" data-value="3"><img src="./imgs/icons/star.svg" alt=""></span>
                        <span class="star" data-value="4"><img src="./imgs/icons/star.svg" alt=""></span>
                        <span class="star" data-value="5"><img src="./imgs/icons/star.svg" alt=""></span>

                    </div>
                </div>
                <span>Tell us your feedback about the product?</span>
                <textarea class="feedback-content" name="feedback-content" class="feedback-content" ></textarea>
                <div class="feedback-inputs flex-row">
                    <div class="input-col flex-col">
                        <label for="userName">Your name</label>
                        <input type="text" name="userName" class="userName">
                    </div>
                    <div class="input-col flex-col">
                        <label for="userEmail">Your email</label>
                        <input type="text" name="userEmail" class="userEmail">
                    </div>

                </div>

                <div class="button-feedback-container">
                    <button class="button-custom cancel-feedback" >Cancel</button>
                    <button class="button-custom accept-feedback" >Submit</button>
                </div>

            </form>



        </div>
        <div class="alert-container alert-comment">

        </div>
        <?php
        $per_page = 6;
        $start = pagination_main_products("comments", $per_page, $product_id);
        ?>

        <?php echo displayAllcomments($product_id, $start, $per_page);?>
        <?php pagination_links_main_products("comments", $per_page,  $product_id)?>



    </div>
</section>

<script src="js/pages/products.js"></script>
<?php include("includes/footer.php") ?>