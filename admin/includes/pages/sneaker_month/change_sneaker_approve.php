
<?php
    global $Product;



    if (isset($_GET["source"]) && $_GET["source"] == "change_sneaker_month_id" && isset($_GET["product_id"]) && !isset($_GET["changed"])=="true") {



        $product_new = new Product();
        $product_id = $_GET["product_id"];
        $product_new->create_product( $product_id);
        $product_name =  $product_new-> product_name;
        $product_price= $product_new-> product_price;
        $product_img= $product_new-> product_img;
        $product_img_2= $product_new-> product_img_2;
        $product_img_3= $product_new-> product_img_3;
        $product_img_4= $product_new->product_img_4;
        $product_desc=$product_new->product_desc;

        $product_type= $product_new->product_type;

        $product_desc= $product_new->product_desc;

        $product_category= $product_new->product_category;
        $product_type_container = '';
        foreach ($product_type as $type ) {
            $product_type_container.=$type;
        }

        // ------------------DISPLAY SELECTED PRODUCT INFO----------------------
        echo "
        <div class='card-body'>

        <a href='sneaker_month.php?source=change_sneaker'>
        <button type='submit' class='btn btn-primary btn-round'>Change sneaker </button>
        </a>
        <div class='card-header text-center'>
        <h4 class='card-title'><b>$product_name</b></h4>
        </div>

        <p class='card-title'> <b>Price: </b>$product_price £</p>
        <p class='card-title'> <b>General Description: </b>$product_desc</p>
        <p class='card-title'> <b>Types: </b>
        $product_type_container


    </p>

    <p class='card-title'> <b>Category: </b> $product_category</p>
        <div class='grid-sneaker-month'>
            <img src='../public/imgs/products/$product_name/$product_img'>
            <img src='../public/imgs/products/$product_name/$product_img_2'>
            <img src='../public/imgs/products/$product_name/$product_img_3'>
            <img src='../public/imgs/products/$product_name/$product_img_4'>
        </div>
    </div>
    ";

    echo '<h3 class="text-center"> Add additional information </h3>';


    echo '
    <form method="POST" class="flex-col form-sneaker-month" action="sneaker_month.php?source=change_sneaker_month_id&product_id=' . $product_id . '&changed=true">
        <input name="product_id" type="hidden" value="' . $product_id . '">

        <label for="header_1">Header 1</label>
        <input name="header_1" type="text" class="form-control">

        <label for="Description_1">Description 1</label>
        <textarea name="Description_1" class="form-control"></textarea>

        <label for="header_2">Header 2</label>
        <input name="header_2" type="text" class="form-control">

        <label for="Description_2">Description 2</label>
        <textarea name="Description_2" class="form-control"></textarea>

        <button class="btn btn-primary btn-round" name="submit_sneaker_month" type="submit">Submit</button>
    </form>';
    }

?>


<!-- update sneaker of month details -->
<?php


if (isset($_POST["submit_sneaker_month"])) {

    global $database;


    $product_id = intval($_POST["product_id"]);
    $header_1 = $database->escape_string($_POST["header_1"]);
    $header_2 = $database->escape_string($_POST["header_2"]);
    $description_1 = $database->escape_string($_POST["Description_1"] );
    $description_2 = $database->escape_string($_POST["Description_2"]);

    //Ensure length is greater than 3 characters
    if (strlen($header_1) <= 3 || strlen($header_2) <= 3 || strlen($description_1) <= 3 || strlen($description_2) <= 3) {
        echo "


        <div class='alert alert-danger' role='alert'>
        inputs need to be at least 4 characters long!;
        </div>";


    } else {
        // Use prepared statements for security
        $query = "UPDATE `product_year`
                  SET `product_id` = ?,
                      `description_1` = ?,
                      `header_1` = ?,
                      `description_2` = ?,
                      `header_2` = ?
                  WHERE 1";

        // Prepare statement
        if ($stmt = $database->prepare($query)) {
            $stmt->bind_param("issss", $product_id, $description_1, $header_1, $description_2, $header_2);
            if ($stmt->execute()) {
                $updated_status = true;
                echo "

                    <div class='alert alert-success' role='alert'>
                    Record updated successfully!
                    </div>";


            } else {
                echo "Error updating record: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "SQL preparation error: " . $database->error;
        }
    }
}
?>
