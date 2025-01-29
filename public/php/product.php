<?php

class Product {
    public $product_id;
    public $product_name;
    public $product_price;
    public $product_stock;
    public $product_img;
    public $product_img_2;
    public $product_img_3;
    public $product_img_4;
    public $product_type;
    public $product_category;

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
        $product_template = '
            <div class="flex-col card-product">
                <div class="layout-card">
                   <a class="prod-link" href="products.php?show='.$this->product_id.'&category='.$this->product_category.'">
                        <div class="shopping-column">
                            <img src="./imgs/products/'.$this->product_name.'/'.$this->product_img.'" />
                        </div>
                    </a>
                    <div class="hidden-prod-label">
                            <span class="content-label">
                                Lorem ipsum dolor sit amet consectetur.
                            </span>

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
        $product_template = '
               <div class="grid-prod">
                <div class="flex-col card-product">
                    <div class="layout-card">
                            <a class="prod-link" href="products.php?show='.$this->product_id.'&category='.$this->product_category.'">
                                <div class="shopping-column">
                                    <img src="./imgs/products/'.$this->product_name.'/'.$this->product_img.'" />
                                </div>
                            </a>
                            <div class="hidden-prod-label detailed-grid" data-prod-id="'.$this->product_id.'">
                                <span class="content-label">
                                    Lorem ipsum dolor sit amet consectetur.
                                </span>
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

        $product_template = '
            <div class="flex-col card-product">
                <div class="layout-card">
                    <a class="card-prod-link" href="products.php?show='.$this->product_id.'&category='.$this->product_category.'">
                        <div class="shopping-column">
                         <img src="./imgs/products/'.$this->product_name.'/'.$this->product_img.'" />
                        </div>
                    </a>
                    <div class="hidden-prod-label" data-prod-id="'.$this->product_id.'">
                        <span class="content-label">
                            Lorem ipsum dolor sit amet consectetur.
                        </span>
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
    public function product_basket_Template($quantity_basket){

        $product_template = '<div class="basket_product_template flex-row">
        <img src="./imgs/products/'.$this->product_name.'/'.$this->product_img.'" />
        <div class="prod-basket-desc col-row">
          <p class="prod-title-basket">'.$this->product_name.'</p>
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
                $this->product_price = $row['product_price'];
                $this->product_stock = $row['product_stock'];
                // $this->product_description = $row['product_description'];
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
