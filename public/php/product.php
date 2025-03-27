<?php

class Product {
    public $product_id;
    public $product_name;
    public $product_price;
    public $product_img;
    public $product_img_2;
    public $product_img_3;
    public $product_img_4;


    // list of types []
    public $product_type;

    public $product_desc;

    public $product_category;
    public $product_sizes_list;
    public $product_availability;

    // Function to fetch product details from the database
    public static function increment_product_views($id) {
        global $connection;


        $query = "UPDATE products SET product_views = product_views + 1 WHERE product_id = $id";
        $increment_views = mysqli_query($connection, $query);
    }


    public function create_product($id) {
        if ($id) {
            global $database;

            // get product type name
            $result_product_type = $database->query_array("SELECT * FROM rel_types_products WHERE product_id = $id");
            while ($row = mysqli_fetch_array($result_product_type)) {
                $type_id = $row['type_id'];
                $type_name = $database->query_array("SELECT * FROM types WHERE id = $type_id");
                while ($row = mysqli_fetch_array($type_name)) {
                    $this->product_type[] = $row['type_name'];
                }
            }

            // get product category name
            $result_product_type = $database->query_array("SELECT * FROM rel_categories_products WHERE prod_id = $id");
            while ($row = mysqli_fetch_array($result_product_type)) {

                $cat_id = $row['cat_id'];
                $type_name = $database->query_array("SELECT * FROM categories WHERE cat_id = $cat_id");
                while ($row = mysqli_fetch_array($type_name)) {
                    $this->product_category = $row['cat_name'];
                }
            }
            // get product info
            $result = $database->query_array("SELECT * FROM products WHERE product_id = $id");
            while ($row = mysqli_fetch_array($result)) {
                $this->product_id = $row['product_id'];
                $this->product_name = $row['product_name'];
                $this->product_img = $row['product_img'];
                $this->product_img_2 = $row['product_img2'];
                $this->product_img_3 = $row['product_img3'];
                $this->product_img_4 = $row['product_img4'];
                $this->product_desc = $row['product_desc'];
                $this->product_price = $row['product_price'];

                // $this->product_description = $row['product_description'];
            }



            // get product sizes
            // create list of ids of sizes---------------
            $result_sizes = $database->query_array("SELECT * FROM rel_products_sizes WHERE prod_id = $id and stock > 0");
            while ($row = mysqli_fetch_array($result_sizes)) {

                $list_sizes_id[] = $row["size_id"];
            }
            // create list of sizes based on ids---------------
            if (!empty($list_sizes_id)) {
                $sizes_ids_str = implode(",", $list_sizes_id);

                // Query the sizes table to get the actual sizes
                $result_actual_sizes = $database->query_array("SELECT * FROM sizes WHERE id IN ($sizes_ids_str)");

                $product_sizes_list = [];
                while ($size_row = mysqli_fetch_array($result_actual_sizes)) {
                    $product_sizes_list[] = $size_row["size"];
                }


                $this->product_sizes_list = $product_sizes_list;
                // if product has at least one stock > 1 in any size
                $this->product_availability  = true;
            } else {
                $list_sizes_id = [];
                $this->product_sizes_list = $list_sizes_id;
                $this->product_availability  = false;
            }
        }
    }
    public static function getproductCategory($id){
        global $database;
        // get product category name
        $result_product_type = $database->query_array("SELECT * FROM rel_categories_products WHERE prod_id = $id");
        while ($row = mysqli_fetch_array($result_product_type)) {

            $cat_id = $row['cat_id'];
            $type_name = $database->query_array("SELECT * FROM categories WHERE cat_id = $cat_id");
            while ($row = mysqli_fetch_array($type_name)) {
                $product_category = $row['cat_name'];
                return $product_category;
            }
        }
    }
    public static function get_product_reviews_number($id){
        global $database;
        $result_product_type = $database->query_array("SELECT * FROM comments WHERE product_id = $id");
        $number_comments = mysqli_num_rows($result_product_type);
        return  $number_comments;
    }
    public static function getproductTotalStock($id){
        global $database;
        $total = 0;
        // get product category name
        $result_product_type = $database->query_array("SELECT * FROM rel_products_sizes WHERE prod_id = $id");
        while ($row = mysqli_fetch_array($result_product_type)) {

            $stock = $row['stock'];
           $total+= $stock;
        }
        return $total;
    }
    // Function to return product price
    public function getPrice() {
        return $this->product_price;
    }

    // Function to return product stock availability
    public function getStock() {
        return $this->product_stock;
    }

    // Function to return product name
    public function getName() {
        return $this->product_name;
    }
    public function product_similar_card(){
        $sizes_html = generate_sizes_html($this, "option");
        $chosen_grid= generate_product_grid_sizes($this);

        $product_template = '   <div class="similar-prod-col flex-row">
            <a class="similar-prod-link" href="products.php?show='.$this->product_id.'&category='.$this->product_category.'">
                <img loading="lazy" src="./imgs/products/'.$this->product_name.'/'.$this->product_img.'" />
            </a>
            <div class="similar-prod-desc">
                <div class="prod-desc-similar-container">
                    <div class="header-similar-prod-desc flex-row">
                        <span class="prod-name-similar">
                            '.$this->product_name.'
                        </span>
                        <span class="prod-price-similar">
                            £'.$this->product_price.'
                        </span>
                    </div>

                    <div class="prod-controller-similar flex-row">
                        <select class="prod-size-similar" name="prod-size-similar" >
                          '. $sizes_html.'
                        </select>
                        <button class="add-similar-button" value="add-similar-button">
                            Add to basket
                        </button>
                    </div>
                </div>
            </div>
        </div>';
        return  $product_template;
    }




    public function product_category_card(){
        global $comment;
        $reviews_msg = comment::get_number_comments($this->product_id)!=0?
        comment::get_number_comments($this->product_id). ' reviews' : "";
          // Generate the list of sizes as HTML
        $sizes_html = generate_sizes_html($this, "span");
        $chosen_grid= generate_product_grid_sizes($this);
        $category_message = '';
        $product_category = $this->product_category;
        $message = $this->product_availability? 'QUICK ADD TO CART' : "Out of stock";
        if(  $product_category == "female") {
            $category_message ='     <div class="category-sex-label" style="color: #e0c1d4">
      WOMAN
            </div>';
        }
        else if ($product_category == "male") {
            $category_message = '  <div class="category-sex-label" style="color:#acb5e6;">
            MAN
            </div>';
        }
        else {
            $category_message = ' <div class="category-sex-label"  style="color:#90e185">
            UNISEX
            </div>';
        }


        $product_template = '


        <div class="flex-col card-product">
            '.$category_message.'

            <div class="layout-card">
                <a class="card-prod-link" href="products.php?show='.$this->product_id.'&category='.$this->product_category.'">
                    <div class="shopping-column">
                     <img loading="lazy" src="./imgs/products/'.$this->product_name.'/'.$this->product_img.'" />
                    </div>
                </a>
                <div class="hidden-prod-label">
                    <div class="hidden-prod-label-container">



                        <p > <b>'.$message.'</b> </p>
                        <div class="sizes-grid-prod '.$chosen_grid.'">
                        '.$sizes_html.'
                        </div>

                    </div>
                </div>
            </div>
            <div class="shopping-card-desc ">
                <span class="item-name item-desc">
            '.$this->product_name.'
                </span>
                <span class="item-price item-desc">
                £'.$this->product_price.'
                </span>
                <div class="add-prod-img">
                    <i class="fa-solid fa-plus"></i>
                </div>
                <div class="rating flex-col">
                    <div >
                         '.comment::get_average_rating_stars($this->product_id).'
                    </div>


                    <span class="reviews-link">
                    '.$reviews_msg.'
                    </span>

                </div>

            </div>
    </div>';
    return  $product_template;
    }
    public function product_detailed_section_Template(){
        global $comment;
        $reviews_msg = comment::get_number_comments($this->product_id)!=0?
        comment::get_number_comments($this->product_id). ' reviews' : "";
        $sizes_html = generate_sizes_html($this, "span");
        $chosen_grid= generate_product_grid_sizes($this);
        $category_message = '';
        $product_category = $this->product_category;
        $message = $this->product_availability? 'QUICK ADD TO CART' : "Out of stock";
        if(  $product_category == "female") {
            $category_message ='     <div class="category-sex-label" style="color: #e0c1d4">
      WOMAN
            </div>';
        }
        else if ($product_category == "male") {
            $category_message = '  <div class="category-sex-label" style="color:#acb5e6;">
            MAN
            </div>';
        }
        else {
            $category_message = ' <div class="category-sex-label"  style="color:#90e185">
            UNISEX
            </div>';
        }


        $product_template = '
               <div class="grid-prod ">
                '.$category_message.'
                <div class="flex-col card-product">
                    <div class="layout-card">
                            <a class="prod-link" href="products.php?show='.$this->product_id.'&category='.$this->product_category.'">
                                <div class="shopping-column">
                                    <img loading="lazy" src="./imgs/products/'.$this->product_name.'/'.$this->product_img.'" />
                                </div>
                            </a>
                            <div class="hidden-prod-label">
                                <p> <b>QUICK ADD TO CART </b> </p>
                                <div class="sizes-grid-prod '.$chosen_grid.'">
                                '.$sizes_html.'
                                </div>


                            </div>
                    </div>
                    <div class="shopping-card-desc ">
                        <span class="item-name item-desc">
                            '.$this->product_name.'
                        </span>
                        <span class="item-price item-desc">
                            £'.$this->product_price.'
                        </span>
                        <div class="add-prod-img">
                            <i class="fa-solid fa-plus"></i>
                        </div>
                         <div class="rating flex-col">
                        <div >
                             '.comment::get_average_rating_stars($this->product_id).'
                        </div>


                        <span class="reviews-link">
                        '.$reviews_msg.'
                        </span>

                    </div>
                    </div>
                </div>
             </div>

       ';
        return  $product_template;
    }

    public function product_slider_Template(){
        global $comment;
        $reviews_msg = comment::get_number_comments($this->product_id)!=0?
        comment::get_number_comments($this->product_id). ' reviews' : "";
        $sizes_html = generate_sizes_html($this, "span");
        $chosen_grid= generate_product_grid_sizes($this);
        $category_message = '';
        $message = $this->product_availability? 'QUICK ADD TO CART' : "Out of stock";
        $product_category = $this->product_category;

        if(  $product_category == "female") {
            $category_message ='     <div class="category-sex-label" style="color: #e0c1d4">
      WOMAN
            </div>';
        }
        else if ($product_category == "male") {
            $category_message = '  <div class="category-sex-label" style="color:#acb5e6;">
            MAN
            </div>';
        }
        else {
            $category_message = ' <div class="category-sex-label"  style="color:#90e185">
            UNISEX
            </div>';
        }


        $product_template = '
            <div class="card-product ">
                '.$category_message.'

                <div class="layout-card ">
                    <a class="card-prod-link" href="products.php?show='.$this->product_id.'&category='.$this->product_category.'">
                        <div class="shopping-column">
                         <img loading="lazy"  src="./imgs/products/'.$this->product_name.'/'.$this->product_img.'" />
                        </div>
                    </a>
                    <div class="hidden-prod-label">
                        <div class="hidden-prod-label-container">



                            <p > <b>'.$message.'</b> </p>
                            <div class="sizes-grid-prod '.$chosen_grid.'">
                            '.$sizes_html.'
                            </div>

                        </div>
                    </div>
                </div>
                <div class="shopping-card-desc ">
                    <span class="item-name item-desc">
                '.$this->product_name.'
                    </span>
                    <span class="item-price item-desc">
                    £'.$this->product_price.'
                    </span>
                    <div class="add-prod-img">
                        <i class="fa-solid fa-plus"></i>
                    </div>
                    <div class="rating flex-col">
                        <div >
                             '.comment::get_average_rating_stars($this->product_id).'
                        </div>


                        <span class="reviews-link">
                        '.$reviews_msg.'
                        </span>

                    </div>

                </div>
        </div>';
        return  $product_template;
    }
    public function product_added_window_Template($quantity_basket, $size, $product_price ){
        global $basket;

        $prod_total = $product_price*$quantity_basket;
        $total_items_in_basket = $basket::getNumber();
        $total_price = $basket::getTotal();

        $html = '<div class="added-prod-window">
    <div class="added-prod-window-top">
      <div class="exit-icon exit-modal">
      <i class="fa-solid fa-xmark "></i>
      </div>

      <i class="fa-solid fa-check"></i>
      <span><b>Product has been added to your basket.</b></span>
    </div>

    <div class="added-prod-window-body">
      <div class="prod-info-window">
        <img loading="lazy" src="./imgs/products/'.$this->product_name.'/'.$this->product_img.'" alt="">
        <div class="prod-info-container flex-col">
          <span> <b>'.$this->product_name.'</b></span>
          <span> £'.$prod_total.'</span>
          <span>size: '. $size.'</span>
          <span>Quantity: '.$quantity_basket.'</span>
        </div>

      </div>
      <div class="prod-basket-window flex-row">
          <div class="hr-col"></div>
          <div class="prod-basket-window-container flex-col">
                <div class="basket-info flex-col">
                    <span>Producs in your basket : '.$total_items_in_basket.'</span>
                    <span><b>Total: £'.$total_price.'</b></span>
                </div>
                <div class="button-prod-window">


                    <button class="button-custom exit-modal">continue shopping</button>
                    <button class="button-custom exit-modal exit-modal-go-basket">check basket</button>
                </div>
          </div>


      </div>
    </div>
    </div>';
    return  $html;
    }
    public function product_basket_Template($quantity_basket, $size){
        $prod_total = $this->product_price*$quantity_basket;
        $product_template = '<div class="basket_product_template flex-row">
        <div class="product_img_container">
            <img loading="lazy" src="./imgs/products/'.$this->product_name.'/'.$this->product_img.'" />
        </div>
        <div class="prod-basket-desc col-row">
          <p class="prod-title-basket">'.$this->product_name.'</p>
          <p class="prod-size">Size: '.$size.'</p>
          <span class="prod-price-basket"><b>£'. $prod_total.'</b></span>
          <br>
          <div class="prod-coontroller-basket flex-row">

            <div class="prod-incrementor">
              <div class="controller basket-decrement" data-prod-id="'.$this->product_id.'"data-prod-size="'.$size .'">-</div>
              <span class="quantity-prod-basket">'.$quantity_basket.'</span>
              <div class="controller basket-increment" data-prod-id="'.$this->product_id.'"data-prod-size="'.$size .'">+</div>
            </div>

            <span class="remove-item-basket">Remove</span>

          </div>
           </div>
        </div>';
        return  $product_template;
    }
    public function product_checkout_Template($quantity_basket, $size){
        $prod_total = $this->product_price*$quantity_basket;
        $product_template = '


                    <div class="check_out_prod_col flex-row">
                        <div class="col-check-prod flex-row">
                            <div class="img-container">
                                <span class="prod-quantity">'.$quantity_basket.'</span>
                               <img loading="lazy" src="./imgs/products/'.$this->product_name.'/'.$this->product_img.'" />
                            </div>
                            <div class="prod-info-checkout flex-col">
                                <span class="prod-name">'.$this->product_name.'</span>
                                <span class="prod-size">size:' .$size.'</span>
                            </div>

                        </div>
                        <div class="prod-info">
                            <span class="prod-price">
                            £'. $prod_total.'
                            </span>

                        </div>


                </div>



       ';
        return  $product_template;
    }

}


class Product_month extends Product {
    public $product_id;
    public $description_1;
    public $description_2;
    public $header_1;
    public $header_2;

    public function GET_product_month_info() {
        global $database;
        $query = "SELECT * FROM product_year LIMIT 1"; // Fetch only one row
        $result = $database->query_array($query);

        if (!$result) {
            die("Database query failed: " . $database->error);
        }


        if ($row = mysqli_fetch_assoc($result)) {
            $this->product_id = $row['product_id'];
            $this->description_1 = $row['description_1'];
            $this->description_2 = $row['description_2'];
            $this->header_1 = $row['header_1'];
            $this->header_2 = $row['header_2'];
        }
    }
}
?>
