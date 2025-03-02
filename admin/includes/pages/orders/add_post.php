<?php
if (isset($_POST['create_post'])) {
    global $connection;

    $header  = $_POST['header'];
    $subheader = $_POST['subheader'];
    $content = $_POST['content'];
    $author = $_POST['author'];
    $post_date  = date("Y-m-d H:i:s");

    // Insert the post first (without images)
    $query = "INSERT INTO news (post_date, post_header, post_desc, post_subheading, post_author)
              VALUES ('$post_date', '$header', '$content', '$subheader', '$author')";

    $create_post_query = mysqli_query($connection, $query);

    if (!$create_post_query) {
        die("Query failed: " . mysqli_error($connection));
    }

    // Get the newly created post's ID
    $post_id = mysqli_insert_id($connection);

    // Define post directory using post_id
    $post_dir = "../public/imgs/posts/$post_id";

    // Check if the directory exists, if not, create it
    if (!is_dir($post_dir)) {
        mkdir($post_dir, 0777, true);
    }

    // Handling uploaded images
    $post_image = $_FILES['img']['name'] ?? "";
    $post_image_temp1 = $_FILES['img']['tmp_name'] ?? "";

    $post_banner = $_FILES['banner']['name'] ?? "";
    $post_image_temp2 = $_FILES['banner']['tmp_name'] ?? "";

    $default_image_path = "../public/imgs/posts/default/default.jpg";

    // Move uploaded files, otherwise use default images
    if (!empty($post_image_temp1)) {
        move_uploaded_file($post_image_temp1, "$post_dir/$post_image");
    } else {
        copy($default_image_path, "$post_dir/default1.jpg");
        $post_image = "default1.jpg";
    }

    if (!empty($post_image_temp2)) {
        move_uploaded_file($post_image_temp2, "$post_dir/$post_banner");
    } else {
        copy($default_image_path, "$post_dir/default2.jpg");
        $post_banner = "default2.jpg";
    }

    // Update the database with correct image paths
    $update_query = "UPDATE news
                     SET post_img = '$post_image', post_banner = '$post_banner'
                     WHERE id = '$post_id'";

    $update_post_query = mysqli_query($connection, $update_query);

    if (!$update_post_query) {
        die("Update failed: " . mysqli_error($connection));
    }

    alert_text("Post has been added", "posts.php");
}
?>



<form action="" method="post" enctype="multipart/form-data" id="form-post">
    <div class="form-group">
        <label for="product_name">header</label>
        <input required type="text" class="form-control" name="header">
    </div>

    <div class="form-group">
        <label for="product_price">subheader</label>
        <input required type="text" class="form-control" name="subheader">
    </div>


    <div id="editor-container"></div>

    <!-- Hidden Textarea (For Form Submission) -->

    <textarea name="content" id="hidden-textarea" style="display: none;"></textarea>


    <label for="img">Post banner</label>    <br>
    <input type="file" name="img">
    <br>

    <label for="banner">Post Image</label>    <br>
    <input type="file" name="banner">
    <br>
    <div class="form-group">
        <label for="author">author</label>
        <input required type="text" class="form-control" name="author">
    </div>



    <div class="form-group">
        <input class="btn btn-primary button-admin" type="submit" name="create_post" value="Add Post">
    </div>
</form>


<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script>
        var quill = new Quill('#editor-container', {
            theme: 'snow'
        });

        // Sync Quill content to textarea before submitting form
        document.querySelector("#form-post").onsubmit = function() {
            document.querySelector("#hidden-textarea").value = quill.root.innerHTML;
        };
</script>