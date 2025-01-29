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

    // Remove an item from a user's basket
    public function removeItem($item_id) {
        if (isset($_SESSION['baskets'][$item_id])) {
            unset($_SESSION['baskets'][$item_id]);
        }
    }

    // Get the total cost of all items in a user's basket
    public function getTotal() {
        $total = 0;
        if (isset($_SESSION['baskets'])) {
            foreach ($_SESSION['baskets']as $item=> $details) {
                $total += $details['quantity'] * $details['price'];
            }
        }
        return $total;
    }

    public function processUserBasket() {
        if (isset($_SESSION['baskets'])) {
            $reversed_baskets = array_reverse($_SESSION['baskets'], true);

            foreach ($reversed_baskets as $unique_key => $details) {
                $product_new = new Product();
                $product_id = $details['id'];


                $product_new->create_product($product_id );
                echo $product_new->product_basket_Template($details['quantity'],$details['size']);
            }


        } else {
            echo "No basket found for user ID: <br>";
        }
    }

}
$basket = new Basket();
?>
