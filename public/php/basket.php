<?php

class Basket {


    // Add an item to a user's basket
    public function addItem($item_id, $quantity, $price) {
        if (!isset($_SESSION['baskets'])) {
            $_SESSION['baskets'] = []; // Initialize basket for the user
        }

        if (isset($_SESSION['baskets'][$item_id])) {
            $_SESSION['baskets'][$item_id]['quantity'] += $quantity;
        } else {
            $_SESSION['baskets'][$item_id] = [
                'quantity' => $quantity,
                'price' => $price
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
            foreach ($_SESSION['baskets']as $item_id => $details) {
                $total += $details['quantity'] * $details['price'];
            }
        }
        return $total;
    }

    public function processUserBasket() {
        if (isset($_SESSION['baskets'])) {
            $reversed_baskets = array_reverse($_SESSION['baskets'], true);

            foreach ($reversed_baskets as $item_id => $details) {
                $product_new = new Product();
                $product_new->create_product($item_id);
                echo $product_new->product_basket_Template($details['quantity']);
            }


        } else {
            echo "No basket found for user ID: <br>";
        }
    }

}
$basket = new Basket();
?>
