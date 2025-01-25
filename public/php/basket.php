<?php


    class Basket {
        private $baskets = []; // Array to store items for each user

        // Add an item to a user's basket
        public function addItem($user_id, $item_id, $quantity, $price) {
            if (!isset($this->baskets[$user_id])) {
                $this->baskets[$user_id] = []; // Initialize basket for the user
            }

            if (isset($this->baskets[$user_id][$item_id])) {
                $this->baskets[$user_id][$item_id]['quantity'] += $quantity;
            } else {
                $this->baskets[$user_id][$item_id] = [
                    'quantity' => $quantity,
                    'price' => $price
                ];
            }
        }

        // Remove an item from a user's basket
        public function removeItem($user_id, $item_id) {
            if (isset($this->baskets[$user_id][$item_id])) {
                unset($this->baskets[$user_id][$item_id]);
            }
        }

        // Get the total cost of all items in a user's basket
        public function getTotal($user_id) {
            $total = 0;
            if (isset($this->baskets[$user_id])) {
                foreach ($this->baskets[$user_id] as $item_id => $details) {
                    $total += $details['quantity'] * $details['price'];
                }
            }
            return $total;
        }

        public function processUserBasket($user_id) {
            if (isset($this->baskets[$user_id])) {

                // Loop through items in the user's basket
                foreach ($this->baskets[$user_id] as $item_id => $details) {
                   echo 'item id: '.$item_id. " quantity: ". $details['quantity']." price: ". $details['price'];

                }
            } else {
                echo "No basket found for user ID: $user_id<br>";
            }
        }
    }








?>