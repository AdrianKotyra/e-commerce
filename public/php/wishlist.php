<?php

class wishlist {


  // Add an item to a user's basket
    public function addItem($item_id, $user_id) {
        global $connection;

        // Check if the item already exists in the wishlist
        $checkQuery = "SELECT id FROM wishlist WHERE product_id = ? AND user_id = ?";
        $stmt = $connection->prepare($checkQuery);
        $stmt->bind_param("ii", $item_id, $user_id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            return;
        } else {
            // Close previous statement
            $stmt->close();
            // Insert the item since it does not exist
            $insertQuery = "INSERT INTO wishlist (product_id, user_id) VALUES (?, ?)";
            $stmt3 = $connection->prepare($insertQuery);
            $stmt3->bind_param("ii", $item_id, $user_id);
            $stmt3->execute();
            $stmt3->close();
        }
    }



    // Remove an item from a user's basket
    public function removeItem($item_id) {
        global $session;
        global $user;
        global $connection;
        // delte from session if not logged
        if ($session->signed_in===false) {
            $_SESSION["favorites"] = array_diff($_SESSION["favorites"], [$item_id]);
        }


        else
           // delte from database if logged
        {
            $user_id = $user->user_id;
            $deleteQuery = "DELETE FROM wishlist WHERE product_id = ? AND user_id = ?";
            $stmt2 = $connection->prepare($deleteQuery);
            $stmt2->bind_param("ii", $item_id, $user_id);
            $stmt2->execute();
            $stmt2->close();
        }
    }


    public static function getNumber() {
        global $connection;

        // Check if the item already exists in the wishlist
        $checkQuery = "SELECT id FROM wishlist WHERE product_id = ? AND user_id = ?";
        $stmt = $connection->prepare($checkQuery);
        $stmt->bind_param("ii", $item_id, $user_id);
        $stmt->execute();
        $stmt->store_result();

        return $stmt->num_rows;
    }

    // -------------------create individual products to wishlist ------------------

    public function processUserWishlist($product_template) {
            global $user;
            global $connection;
            global $session;
            $wishlist_basket = '';
            // if user not logged in store products id in session list
            if ($session->signed_in===false) {
                $list_of_fav_prod_ids = $_SESSION["favorites"];
                if (!empty($list_of_fav_prod_ids)) {
                    foreach ($list_of_fav_prod_ids as $pro_id_session) {
                        $product_new = new Product();
                        $product_new->create_product($pro_id_session);


                        $wishlist_basket .= $product_new->$product_template();

                    }
                    return   $wishlist_basket;

                }
                else {
                    return  "wishlist empty";
                }



            }
             // if user logged in store products id in databse
            else {
                $user_id = $user->user_id;
                // Check if the item already exists in the wishlist
                $checkQuery = "SELECT * FROM wishlist WHERE user_id =  $user_id";
                $select_cat = mysqli_query($connection, $checkQuery);

                if (mysqli_num_rows($select_cat) > 0) {

                    while ($row = mysqli_fetch_assoc($select_cat)) {
                        $product_id = $row["product_id"];

                        $product_new = new Product();
                        $product_new->create_product($product_id);


                        $wishlist_basket .= $product_new->$product_template();


                    }
                    return   $wishlist_basket;
                }
                else {
                    return  "wishlist empty";
                }

            }







    }

    public function check_if_product_added($prod_id){
        global $connection;
        global $user;
        global $session;
          // Check if the item already exists in the wishlist user logged off
        if ($session->signed_in===false) {
            $list_of_fav_prod_ids = $_SESSION["favorites"];
            if (!empty($list_of_fav_prod_ids) &&  in_array($prod_id, $list_of_fav_prod_ids)){
                return true;

            }
            else {
                return false;
            }
        }
        else {
            $user_id = $user->user_id;
                // Check if the item already exists in the wishlist user logged on
            $checkQuery = "SELECT id FROM wishlist WHERE product_id = ? AND user_id = ?";
            $stmt = $connection->prepare($checkQuery);
            $stmt->bind_param("ii", $prod_id, $user_id);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                return true;
            }
            else {
                return false;
            }

        }


    }
    // -------------------window when adding to wishlist------------------
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
