<?php

class Product {
    public $product_id;
    public $product_name;
    public $product_price;
    public $product_img;
    public $product_img_2;
    public $product_img_3;
    public $product_img_4;
    public $product_type;
    public $product_desc;
    public $product_category;
    public $product_sizes_list;

    public function product_similar_card(){
        $product_template = '   <div class="similar-prod-col flex-row">
            <a class="similar-prod-link" href="products.php?show='.$this->product_id.'&category='.$this->product_category.'">
                <img src="./imgs/products/'.$this->product_name.'/'.$this->product_img.'" />
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
                            <option value="">size 1</option>
                            <option value="">size 2</option>
                            <option value="">size 3</option>
                            <option value="">size 4</option>
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
          // Generate the list of sizes as HTML
        $sizes_html = generate_sizes_html($this);
        $chosen_grid= generate_product_grid_sizes($this);
        $product_template = '
            <div class="flex-col card-product">
                <div class="layout-card">
                   <a class="prod-link" href="products.php?show='.$this->product_id.'&category='.$this->product_category.'">
                        <div class="shopping-column">
                            <img src="./imgs/products/'.$this->product_name.'/'.$this->product_img.'" />
                        </div>
                    </a>
                    <div class="hidden-prod-label '.$chosen_grid.'">
                        '.$sizes_html.'

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
                </div>
        </div>';
        return  $product_template;
    }
    public function product_detailed_section_Template(){
        $sizes_html = generate_sizes_html($this);
        $chosen_grid= generate_product_grid_sizes($this);
        $product_template = '
               <div class="grid-prod ">
                <div class="flex-col card-product">
                    <div class="layout-card">
                            <a class="prod-link" href="products.php?show='.$this->product_id.'&category='.$this->product_category.'">
                                <div class="shopping-column">
                                    <img src="./imgs/products/'.$this->product_name.'/'.$this->product_img.'" />
                                </div>
                            </a>
                            <div class="hidden-prod-label detailed-grid '.$chosen_grid.'" data-prod-id="'.$this->product_id.'">
                                '.$sizes_html.'
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
                    </div>
                </div>
             </div>

       ';
        return  $product_template;
    }

    public function product_slider_Template(){

        $sizes_html = generate_sizes_html($this);
        $chosen_grid= generate_product_grid_sizes($this);

        $product_template = '
            <div class="flex-col card-product">
                <div class="layout-card">
                    <a class="card-prod-link" href="products.php?show='.$this->product_id.'&category='.$this->product_category.'">
                        <div class="shopping-column">
                         <img src="./imgs/products/'.$this->product_name.'/'.$this->product_img.'" />
                        </div>
                    </a>
                    <div class="hidden-prod-label '.$chosen_grid.'">

                        '.$sizes_html.'

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
                </div>
        </div>';
        return  $product_template;
    }
    public function product_basket_Template($quantity_basket, $size){

        $product_template = '<div class="basket_product_template flex-row">
        <img src="./imgs/products/'.$this->product_name.'/'.$this->product_img.'" />
        <div class="prod-basket-desc col-row">
          <p class="prod-title-basket">'.$this->product_name.'</p>
          <p class="prod-size">Size: '.$size.'</p>
          <span class="prod-price-basket"><b>£'.$this->product_price.'</b></span>
          <br>
          <div class="prod-coontroller-basket flex-row">

            <div class="prod-incrementor ">
              <div class="controller basket-decrement">-</div>
              <span class="quantity-prod-basket">'.$quantity_basket.'</span>
              <div class="controller basket-increment">+</div>
            </div>

            <span class="remove-item-basket">Remove</span>

          </div>
           </div>
        </div>';
        return  $product_template;
    }

    // Function to fetch product details from the database
    public function create_product($id) {
        if ($id) {
            global $database;

            // get product type name
            $result_product_type = $database->query_array("SELECT * FROM rel_types_products WHERE product_id = $id");
            while ($row = mysqli_fetch_array($result_product_type)) {
                $type_id = $row['type_id'];
                $type_name = $database->query_array("SELECT * FROM types WHERE id = $type_id");
                while ($row = mysqli_fetch_array($type_name)) {
                    $this->product_type = $row['type_name'];
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
            }
        }
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
}

?>
