<?php

class Basket {


    // Add an item to a user's basket
    public function addItem($item_id, $quantity, $price,  $productsize) {
        if (!isset($_SESSION['baskets'])) {
            $_SESSION['baskets'] = []; // Initialize basket for the user
        }
        // Create a unique key using product ID and size
        $unique_key = $item_id . '_' . $productsize;

        if (isset($_SESSION['baskets'][$unique_key])) {
            $_SESSION['baskets'][$unique_key]['quantity'] += $quantity;
        } else {
            $_SESSION['baskets'][$unique_key] = [
                'quantity' => $quantity,
                'price' => $price,
                'size' => $productsize,
                'id' => $item_id
            ];
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
    public static function getTotal() {
        $total = 0;
        if (isset($_SESSION['baskets'])) {
            foreach ($_SESSION['baskets']as $item=> $details) {
                $total += $details['quantity'] * $details['price'];
            }
        }
        return $total;
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
