<?php
if (isset($_POST['create_post'])) {
    global $connection;

    $header  = $_POST['header'];
    // Handling uploaded images
    $post_image = $_FILES['img']['name'] ?? "";
    $post_image_temp1 = $_FILES['img']['tmp_name'] ?? "";

    // Insert the post first (without images)
    $query = "INSERT INTO gallery (img_src, img_title) VALUES ('$post_image', '$header')";

    $create_post_query = mysqli_query($connection, $query);

    if (!$create_post_query) {
        die("Query failed: " . mysqli_error($connection));
    }
    $post_dir = "../public/imgs/gallery";
    move_uploaded_file($post_image_temp1, "$post_dir/$post_image");

    alert_text("Image has been added", "gallery.php");
}
?>



<form action="" method="post" enctype="multipart/form-data" id="form-post">
    <div class="form-group">
        <label for="product_name">header</label>
        <input required type="text" class="form-control" name="header">
    </div>




    <label for="img">IMAGE</label>    <br>
    <input required type="file" name="img">
    <br>


    <div class="form-group">
        <input class="btn btn-primary btn-round" type="submit" name="create_post" value="Add Post">
    </div>
</form>
