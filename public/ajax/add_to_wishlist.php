<?php session_start()?>
<?php include "../php/init.php"?>

<?php


    if(isset($_POST["data"])) {
        global $connection;
        global $wishlist;
        global $user;
        global $session;
        global $product;
        global $database;

        // check if product id was sent
        if (!isset($_POST["data"]["productId"])){
            return;
        }
        $data_prod_id = $_POST["data"]["productId"];






        // Prepare statement to check if product  exists
        $stmt = $database->prepare("SELECT * FROM products WHERE product_id = ? ");
        $stmt->bind_param("i", $data_prod_id);
        $stmt->execute();
        $result = $stmt->get_result();
        // stop function is product doesnt exist
        if ($result->num_rows == 0) {
            return;
        }




        // add to wishlist
        // if user not logged in user session to store favorite products
        if ($session->signed_in===false) {
            if (!isset($_SESSION["favorites"])) {
                $_SESSION["favorites"] = [];
            }

            $data = $_POST["data"];
            $data_prod_id = intval($data["productId"]);
            if (!in_array($data_prod_id, $_SESSION["favorites"])) {
                // If not in the array, add it
                $_SESSION["favorites"][] = $data_prod_id;

            }
        }
        // else add to database
        else {



            $user_id = $user->user_id;
            $new_wishlist = New wishlist();
            $new_wishlist->addItem($data_prod_id, $user_id);
        }


        $new_product = New Product();
        $new_product->create_product($data_prod_id);

        $product_window_template =  $new_product->wishlist_product_added_window_Template();
        echo $product_window_template;

    }




?>