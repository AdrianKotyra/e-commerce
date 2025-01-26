<?php

class Product {
    public $product_id;
    public $product_name;
    public $product_img;
    public $product_price;
    public $product_stock;
    // public $product_description;


    public function product_slider_Template(){
        $product_template = ' <div class="flex-col card-product">
            <div class="layout-card">
                <a class="card-prod-link" href="products.php">
                    <div class="shopping-column">
                        <img src="./imgs/products/'.$this->product_img.'" />
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
        <img src="./imgs/products/'.$this->product_img.'" />
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
    // Constructor to initialize a product directly
    public function __construct($id = null) {
        if ($id) {
            $this->create_product($id);
        }
    }

    // Function to fetch product details from the database
    public function create_product($id) {
        if ($id) {
            global $database; // Assumes $database is a global variable handling DB connection

            $result = $database->query_array("SELECT * FROM products WHERE product_id = $id");

            while ($row = mysqli_fetch_array($result)) {
                $this->product_id = $row['product_id'];
                $this->product_name = $row['product_name'];
                $this->product_img = $row['product_img'];
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
