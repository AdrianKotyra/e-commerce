<?php
if (isset($_POST['edit_product'])) {
    global $connection;

    $product_id = mysqli_real_escape_string($connection, $_GET["product_id"]);
    $new_product_name = mysqli_real_escape_string($connection, $_POST['product_name']); // New name from form
    $product_price = mysqli_real_escape_string($connection, $_POST['product_price']);
    $product_desc = mysqli_real_escape_string($connection, $_POST['product_desc']);
    $brand  = mysqli_real_escape_string($connection, $_POST['brand']);
    $types = $_POST['types'] ?? []; // Array of selected types

    // Paths
    $default_image_path = "../public/imgs/products/default/default.jpg";

    // Fetch existing product data
    $query = "SELECT * FROM products WHERE product_id = $product_id";
    $select_product = mysqli_query($connection, $query);
    $product_data = mysqli_fetch_assoc($select_product);

    $old_product_name = $product_data['product_name']; // Store the old name
    $old_product_dir = "../public/imgs/products/$old_product_name";
    $new_product_dir = "../public/imgs/products/$new_product_name";

    // Rename folder if product name has changed
    if ($old_product_name !== $new_product_name && is_dir($old_product_dir)) {
        rename($old_product_dir, $new_product_dir);
    } else {
        $new_product_dir = $old_product_dir; // Keep the same directory
    }

    // Handling uploaded images (retain existing if none uploaded)
    $post_image1 = !empty($_FILES['product_img']['name']) ? $_FILES['product_img']['name'] : $product_data['product_img'];
    $post_image_temp1 = $_FILES['product_img']['tmp_name'] ?? "";

    $post_image2 = !empty($_FILES['product_img2']['name']) ? $_FILES['product_img2']['name'] : $product_data['product_img2'];
    $post_image_temp2 = $_FILES['product_img2']['tmp_name'] ?? "";

    $post_image3 = !empty($_FILES['product_img3']['name']) ? $_FILES['product_img3']['name'] : $product_data['product_img3'];
    $post_image_temp3 = $_FILES['product_img3']['tmp_name'] ?? "";

    $post_image4 = !empty($_FILES['product_img4']['name']) ? $_FILES['product_img4']['name'] : $product_data['product_img4'];
    $post_image_temp4 = $_FILES['product_img4']['tmp_name'] ?? "";

    // Move uploaded files (only if new images are uploaded)
    if (!empty($post_image_temp1)) move_uploaded_file($post_image_temp1, "$new_product_dir/$post_image1");
    if (!empty($post_image_temp2)) move_uploaded_file($post_image_temp2, "$new_product_dir/$post_image2");
    if (!empty($post_image_temp3)) move_uploaded_file($post_image_temp3, "$new_product_dir/$post_image3");
    if (!empty($post_image_temp4)) move_uploaded_file($post_image_temp4, "$new_product_dir/$post_image4");

    // Update product details
    $query = "UPDATE products
        SET product_name = '$new_product_name',
            product_price = '$product_price',
            product_img = '$post_image1',
            product_img2 = '$post_image2',
            product_img3 = '$post_image3',
            product_img4 = '$post_image4',
            product_desc = '$product_desc'
        WHERE product_id = '$product_id'";

    $update_product_query = mysqli_query($connection, $query);

    if (!$update_product_query) {
        die("Product Update Failed: " . mysqli_error($connection));
    }

    // Delete existing type relations
    $delete_query = "DELETE FROM rel_types_products WHERE product_id = '$product_id'";
    mysqli_query($connection, $delete_query);

    // Insert new type relations
    foreach ($types as $type_id) {
        $query3 = "INSERT INTO rel_types_products (type_id, product_id) VALUES ('$type_id', '$product_id')";
        mysqli_query($connection, $query3);
    }
    // insert brand
    $query4 = "UPDATE rel_products_brands
    SET brand_id = '$brand'
    WHERE product_id = '$product_id'";


    $create_brand_query = mysqli_query($connection, $query4);
    alert_text("Product has been updated", "products.php");
}
?>


<?php

    if(isset($_GET["product_id"])) {

        $new_product = New Product();
        $new_product-> create_product($_GET["product_id"]);
        $product_id = $new_product ->product_id;
        $product_name = $new_product ->product_name;
        $product_price = $new_product ->product_price;
        $product_img = $new_product ->product_img;
        $product_img_2 = $new_product ->product_img_2;
        $product_img_3 = $new_product ->product_img_3;
        $product_img_4 = $new_product ->product_img_4;
        $product_desc = $new_product ->product_desc;
        // list of prod type names
        $product_type = $new_product ->product_type;

    }

?>
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="product_name">Product name</label>
        <input required type="text" class="form-control" name="product_name" value="<?php echo $product_name;?>">
    </div>

    <div class="form-group">
        <label for="product_price">Product price</label>
        <input required type="number" class="form-control" name="product_price" value="<?php echo $product_price;?>">
    </div>

    <div class="form-group">
        <label for="product_desc">Product description</label>
        <textarea required type="text" class="form-control prod_desc_area" name="product_desc"><?php echo $product_desc;?></textarea>
    </div>
    <div class="admin-grid-prod-imgs">
    <div class="form-group flex-col">
        <img src="./../public/imgs/products/<?php echo $product_name.'/'.$product_img;?>" alt="" class="product_stock_img">
        <label for="product_img">Product image 1</label>
        <input type="file" name="product_img" value="<?php echo $product_img;?>">
    </div>

    <div class="form-group flex-col">
        <img src="./../public/imgs/products/<?php echo $product_name.'/'.$product_img_2;?>" alt="" class="product_stock_img">
        <label for="product_img2">Product image 2</label>
        <input type="file" name="product_img2">
    </div>

    <div class="form-group flex-col">
        <img src="./../public/imgs/products/<?php echo $product_name.'/'.$product_img_3;?>" alt="" class="product_stock_img">
        <label for="product_img3">Product image 3</label>
        <input type="file" name="product_img3">
    </div>

    <div class="form-group flex-col">
        <img src="./../public/imgs/products/<?php echo $product_name.'/'.$product_img_4;?>" alt="" class="product_stock_img">
        <label for="product_img4">Product image 4</label>
        <input type="file" name="product_img4">
    </div>
    </div>


    <div class="form-group">
    <label for="category">Category</label>

    </div>
    <div class="form-group">
        <select name="brand">

            <?php display_admin_brands_edit($product_id);?>

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
                if(in_array($type_name, $product_type))
                {
                    echo '<input type="checkbox" checked name="types[]" value="'.$type_id.'">
                    <label for='.$type_name.'"> '.$type_name.'</label><br>';
                }
                else {
                    echo '<input type="checkbox" name="types[]" value="'.$type_id.'">
                    <label for='.$type_name.'"> '.$type_name.'</label><br>';
                }

            }
        ?>



    </div>

    <div class="form-group">
        <input class="btn btn-primary button-admin" type="submit" name="edit_product" value="Edit Product">
    </div>
</form>
