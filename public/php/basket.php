<?php

class Basket {
    public $delivery_option;
    public $delivery_price;
    public $discount_applied;


    public function __construct() {
        $this->discount_applied =  false;
        $this->delivery_option =  $_SESSION['delivery_option']?? "standard";
        $this->delivery_price = $this->delivery_option == "standard"? 4.99 : 7.99;
    }


    // Add an item to a user's basket
    public function addItem($item_id, $quantity, $price,  $productsize) {




        if (!isset($_SESSION['baskets'])) {

            $_SESSION['baskets'] = []; // Initialize basket for the user
        }



        // Create a unique key using product ID and size
        $unique_key = $item_id . '_' . $productsize;

        if (isset($_SESSION['baskets'][$unique_key])) {
            $total_stock = Product::getproductSizeTotalStock($item_id, $productsize);
            //check if item stock is available
            if($_SESSION['baskets'][$unique_key]['quantity']<$total_stock) {
                $_SESSION['baskets'][$unique_key]['quantity'] += $quantity;
            }

        } else {
            $_SESSION['baskets'][$unique_key] = [
                'quantity' => $quantity,
                'price' => $price,
                'size' => $productsize,
                'id' => $item_id
            ];
        }
    }

    public function update_stock_items(){
        global $database;
        foreach ($_SESSION['baskets'] as $unique_key => $basket_item) {
            $product_id = $basket_item['id'];
            $quantity = $basket_item['quantity'];
            $price = $basket_item['price'];
            $size = $basket_item['size'];

            $get_size_id= $database->query_array("SELECT id from sizes where size =  '$size'");
            while($row = mysqli_fetch_array($get_size_id)) {
                $size_id = $row["id"];
                $UPDATE_STOCK= $database->query_array("UPDATE rel_products_sizes SET stock = stock - $quantity WHERE prod_id = $product_id AND size_id = $size_id");
            }

        }

    }
    // Decrement
    public function decrement_basket($item_id, $quantity, $price,  $productsize) {
        if (!isset($_SESSION['baskets'])) {
            $_SESSION['baskets'] = []; // Initialize basket for the user
        }
        // Create a unique key using product ID and size
        $unique_key = $item_id . '_' . $productsize;

        if (isset($_SESSION['baskets'][$unique_key])) {
            if ($_SESSION['baskets'][$unique_key]['quantity'] > 1) {
                $_SESSION['baskets'][$unique_key]['quantity'] -= $quantity;
            }

        } else {
            $_SESSION['baskets'][$unique_key] = [
                'quantity' => $quantity,
                'price' => $price,
                'size' => $productsize,
                'id' => $item_id
            ];
        }
    }

    // Remove an item from a user's basket
    public function removeItem($unique_key) {
        if (isset($_SESSION['baskets'][$unique_key])) {
            unset($_SESSION['baskets'][$unique_key]);
        }
    }

    // Get the total cost of all items in a user's basket
    public function getTotal() {

        $total = 0;
        if (isset($_SESSION['baskets'])) {
            foreach ($_SESSION['baskets'] as $item => $details) {
                $total += $details['quantity'] * $details['price'];
            }
        }

        $this->discount_applied = $total>=150? true: false;
        return $total;
    }
    // Get the total cost of all items in checkout after discount
        public function getTotalCheckout() {

            $raw_total = $this->getTotal() + $this->delivery_price;
            $user_total = $this->discount_applied == 1
                ? $raw_total * 0.85
                : $raw_total;


            return  round($user_total,2);
        }
        public function getDiscountedPrice() {


            $discounted_price =  round(($this->getTotal() + $this->delivery_price) * 15 / 100, 2);
            return  $discounted_price;
        }

    // Get the number of items
    public static function getNumber() {
        $number = 0;
        if (isset($_SESSION['baskets'])) {
            foreach ($_SESSION['baskets']as $item) {
                $number+=1;



            }
            return $number;
        }
    }
      // Get the number of subitems
      public function getNumberTotal() {
        $number = 0;
        if (isset($_SESSION['baskets'])) {
            foreach ($_SESSION['baskets']as $item=>$details) {
                $number+=  $_SESSION['baskets'][$item]['quantity'];



            }
            return $number;
        }
    }

    // Get the number quantity of unique item
    public function getProductQuantity($product_id, $product_size) {
        $unique_key = $product_id . '_' . $product_size;
        if (isset($_SESSION['baskets'][$unique_key])) {
            return $_SESSION['baskets'][$unique_key]["quantity"];
        }
    }
    public function processUserBasket($product_template) {
        if (isset($_SESSION['baskets'])) {
            $reversed_baskets = array_reverse($_SESSION['baskets'], true);
            $products_basket = '';
            foreach ($reversed_baskets as $unique_key => $details) {
                $product_new = new Product();
                $product_id = $details['id'];

                $product_new->create_product($product_id );

                $products_basket.=  $product_new->$product_template($details['quantity'],$details['size']);


            }

            return  $products_basket;

        } else {
            return "Basket is empty";
        }
        return $products_basket;
    }
    public function processUserWindowAddedItem($product_template, $product_id_arg, $product_size_arg) {
        if (isset($_SESSION['baskets'])) {
            $reversed_baskets = array_reverse($_SESSION['baskets'], true);
            $products_basket = '';
            foreach ($reversed_baskets as $unique_key => $details) {
                if($unique_key==$product_id_arg.$product_size_arg) {
                    $product_new = new Product();
                    $product_id = $details['id'];


                    $product_new->create_product($product_id );

                    $products_basket.=  $product_new->$product_template($details['quantity'],$details['size']);
                }



            }

            return  $products_basket;

        } else {
            return "No basket found for user ID: <br>";
        }
        return $products_basket;
    }



}
$basket = new Basket();
?>
