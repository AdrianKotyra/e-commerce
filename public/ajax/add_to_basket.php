<?php session_start()?>
<?php include "../php/init.php"?>

<?php


    if(isset($_POST["data"])) {
        global $connection;
        global $basket;
        global $user;
        global $session;
        global $product;
        if (!isset($_POST["data"]["productId"], $_POST["data"]["productsize"])) {
            return;
        }

        $data = $_POST["data"];
        $data_prod_id = intval($data["productId"]); // Ensure it's an integer
        $data_prod_size = $data["productsize"]; // Assuming it's a string

        // Prepare statement to check if size exists
        $stmt = $database->prepare("SELECT id FROM sizes WHERE size = ?");
        $stmt->bind_param("s", $data_prod_size);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $size_id = $row["id"];

            // Prepare statement to check if product with this size exists
            $stmt2 = $database->prepare("SELECT * FROM rel_products_sizes WHERE prod_id = ? AND size_id = ?");
            $stmt2->bind_param("ii", $data_prod_id, $size_id);
            $stmt2->execute();
            $result2 = $stmt2->get_result();

            if ($result2->num_rows == 0) {
                return;
            }
        } else {
            return;
        }


        $new_product = New Product();

        // NEEED MORE VERIFICATION VALIDATION IF ID EXISTS WITH THIS SIZE !!!


        $new_product->create_product($data_prod_id);
        $product_price = $new_product->product_price;

        // add to basket
        $basket->addItem($data_prod_id, 1, $product_price, $data_prod_size);
        $product_quantity = $basket->getProductQuantity($data_prod_id, $data_prod_size);

        // get window added product

        $product_window_template =  $new_product->product_added_window_Template($product_quantity, $data_prod_size, $product_price );
        echo $product_window_template;

    }




?>