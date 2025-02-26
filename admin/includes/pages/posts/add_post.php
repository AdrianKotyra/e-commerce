<?php
if (isset($_POST['create_post'])) {
    global $connection;

    $header  = $_POST['header'];
    $subheader = $_POST['subheader'];
    $content = $_POST['content'];

    $author = $_POST['author'];
    $post_date  = date("Y-m-d H:i:s");
    // Paths for default image and product directory
    $default_image_path = "../public/imgs/posts/default/default.jpg";
    $post_dir = "../public/imgs/posts/$header";

    // check if the product directory exists
    if (!is_dir($post_dir)) {
        mkdir($post_dir, 0777, true);
    }

    // Handling uploaded images
    $post_image = $_FILES['img']['name'] ?? "";
    $post_image_temp1 = $_FILES['img']['tmp_name'] ?? "";

    $post_banner = $_FILES['banner']['name'] ?? "";
    $post_image_temp2 = $_FILES['banner']['tmp_name'] ?? "";


    // Move uploaded files, otherwise copy default image
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


    // Insert prodcut
    if (isset($_POST['header']) && isset($_POST['subheader']) && isset($_POST['author'])) {
    $query = "INSERT INTO news (post_date, post_header, post_desc, post_img, post_subheading, post_banner, post_author)
    VALUES ('$post_date', '$header', '$content', '$post_image', '$subheader', '$post_banner', '$author')";
    $create_post_query = mysqli_query($connection, $query);



    alert_text("Post has been added", "posts.php");

    }

    else {
        alert_text_warning("Filled up all the fields");
    }











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