<?php
if (isset($_POST['create_product'])) {
    global $connection;

    $product_name  = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_desc  = $_POST['product_desc'];
    $category  = $_POST['category'];
    $types = $_POST['types'] ?? []; // Array of selected types

    // Paths for default image and product directory
    $default_image_path = "../public/imgs/products/default/default.jpg";
    $product_dir = "../public/imgs/products/$product_name";

    // check if the product directory exists and create folder for the product
    if (!is_dir($product_dir)) {
        mkdir($product_dir, 0777, true);
    }

    // Handling uploaded images
    $post_image1 = $_FILES['product_img']['name'] ?? "";
    $post_image_temp1 = $_FILES['product_img']['tmp_name'] ?? "";

    $post_image2 = $_FILES['product_img2']['name'] ?? "";
    $post_image_temp2 = $_FILES['product_img2']['tmp_name'] ?? "";

    $post_image3 = $_FILES['product_img3']['name'] ?? "";
    $post_image_temp3 = $_FILES['product_img3']['tmp_name'] ?? "";

    $post_image4 = $_FILES['product_img4']['name'] ?? "";
    $post_image_temp4 = $_FILES['product_img4']['tmp_name'] ?? "";

    // Move uploaded files, otherwise copy default image
    if (!empty($post_image_temp1)) {
        move_uploaded_file($post_image_temp1, "$product_dir/$post_image1");
    } else {
        copy($default_image_path, "$product_dir/default1.jpg");
        $post_image1 = "default1.jpg";
    }

    if (!empty($post_image_temp2)) {
        move_uploaded_file($post_image_temp2, "$product_dir/$post_image2");
    } else {
        copy($default_image_path, "$product_dir/default2.jpg");
        $post_image2 = "default2.jpg";
    }

    if (!empty($post_image_temp3)) {
        move_uploaded_file($post_image_temp3, "$product_dir/$post_image3");
    } else {
        copy($default_image_path, "$product_dir/default3.jpg");
        $post_image3 = "default3.jpg";
    }

    if (!empty($post_image_temp4)) {
        move_uploaded_file($post_image_temp4, "$product_dir/$post_image4");
    } else {
        copy($default_image_path, "$product_dir/default4.jpg");
        $post_image4 = "default4.jpg";
    }

    // Insert prodcut
    if (!empty($types) && isset($_POST['category']) && isset($_POST['product_name'])&& isset($_POST['product_price'])&& isset($_POST['product_desc'])) {
    $query = "INSERT INTO products (product_name, product_price, product_img, product_img2, product_img3, product_img4, product_desc)
    VALUES ('$product_name', '$product_price', '$post_image1', '$post_image2', '$post_image3', '$post_image4', '$product_desc')";
    $create_product_query = mysqli_query($connection, $query);
    $last_inserted_id = mysqli_insert_id($connection); // Get the inserted product ID


    // Insert category
    $query2 = "INSERT INTO rel_categories_products (cat_id, prod_id)
    VALUES ('$category', '$last_inserted_id')";

    $create_cat_query = mysqli_query($connection, $query2);
    if (!$create_cat_query) {
        die("QUERY FAILED " . mysqli_error($connection));
    }


    // Insert types

    foreach ($types as $type_id) {
        $query3 = "INSERT INTO rel_types_products (type_id, product_id) VALUES ('$type_id', '$last_inserted_id')";
        mysqli_query($connection, $query3);
    }

    alert_text("Product has been added", "products.php");

    }

    else {
        alert_text_warning("Filled up all the fields");
    }











}
?>


<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="product_name">Product name</label>
        <input required type="text" class="form-control" name="product_name">
    </div>

    <div class="form-group">
        <label for="product_price">Product price</label>
        <input required type="number" class="form-control" name="product_price">
    </div>

    <div class="form-group">
        <label for="product_desc">Product description</label>
        <input required type="text" class="form-control" name="product_desc">
    </div>

    <div class="form-group">
        <label for="product_img">Product image 1</label>
        <input type="file" name="product_img">
    </div>
    <div class="form-group">
        <label for="product_img2">Product image 2</label>
        <input type="file" name="product_img2">
    </div>
    <div class="form-group">
        <label for="product_img3">Product image 3</label>
        <input type="file" name="product_img3">
    </div>
    <div class="form-group">
        <label for="product_img4">Product image 4</label>
        <input type="file" name="product_img4">
    </div>
    <div class="form-group">
    <label for="category">Category</label>
    <br>
    <select name="category">
        <option value="1" type="radio" name="category">male</option>
        <option value="2" type="radio" name="category">female</option>
        <option value="3" type="radio" name="category">unisex</option>

    </select>
    </div>

    <div class="form-group">
    <label for="Type">Type</label>
    <br>

        <?php  $query = "SELECT * FROM types";
            global $connection;
            $select_product_types = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_product_types)) {
                $type_name = $row["type_name"];
                $type_id = $row["id"];
                echo '<input type="checkbox" name="types[]" value="'.$type_id.'">
                    <label for='.$type_name.'"> '.$type_name.'</label><br>';
            }
        ?>



    </div>

    <div class="form-group">
        <input class="btn btn-primary button-admin" type="submit" name="create_product" value="Add Product">
    </div>
</form>