<?php
if(isset($_GET["post_id"])) {
    global $Post;
    $post_id = $_GET["post_id"];
    $new_post = New Post();
    $new_post->create_post($post_id);

    $post_date =  $new_post->post_date;
    $post_header=  $new_post->post_header;
    $post_desc=  $new_post->post_desc;
    $post_img_class=  $new_post->post_img;
    $post_sub_heading=  $new_post->post_sub_heading;
    $post_banner_class=  $new_post->post_banner;
    $post_author=  $new_post->post_author;


}


?>


<?php
if (isset($_POST['edit_post'])) {
    global $connection;

    $header  = $_POST['header'];
    $subheader = $_POST['subheader'];
    $content = $_POST['content'];
    $post_id = $_POST['post_id'];
    $author = $_POST['author'];
    $post_date  = date("Y-m-d H:i:s");
    // Paths for default image and product directory
    $default_image_path = "../public/imgs/posts/default/default.jpg";
    $post_dir = "../public/imgs/posts/$post_id";


    // Handling uploaded images
    $post_image = $_FILES['img']['name'] ?? "";
    $post_image_temp1 = $_FILES['img']['tmp_name'] ?? "";

    $post_banner = $_FILES['banner']['name'] ?? "";
    $post_image_temp2 = $_FILES['banner']['tmp_name'] ?? "";

    if (!is_dir($post_dir)) {
        mkdir($post_dir, 0777, true);
    }
    // Move uploaded files, otherwise copy default image
    if (!empty($post_image_temp1)) {
        move_uploaded_file($post_image_temp1, "$post_dir/$post_image");
    } else {

        $post_image = $post_img_class;
    }

    if (!empty($post_image_temp2)) {
        move_uploaded_file($post_image_temp2, "$post_dir/$post_banner");
    } else {

        $post_banner = $post_banner_class;
    }


    // Insert prodcut
    if (isset($_POST['header']) && isset($_POST['subheader']) && isset($_POST['author'])) {
        $query = "UPDATE news
        SET post_date = '$post_date',
            post_header = '$header',
            post_desc = '$content',
            post_img = '$post_image',
            post_subheading = '$subheader',
            post_banner = '$post_banner',
            post_author = '$author'
        WHERE id = '$post_id'";

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
        <input required type="text" class="form-control" name="header" value="<?php echo $post_header;?>">
    </div>
    <input required type="text" class="form-contro hidden_input" name="post_id" value="<?php echo $post_id;?>">
    <div class="form-group">
        <label for="product_price">subheader</label>
        <input required type="text" class="form-control" name="subheader"  value="<?php echo $post_sub_heading;?>">
    </div>


    <div id="editor-container"><?php echo $post_desc;?></div>

    <!-- Hidden Textarea (For Form Submission) -->

    <textarea name="content" id="hidden-textarea" style="display: none;"></textarea>
    <label for="banner">Post Image</label>    <br>
    <?php echo $post_img_class=='default1.jpg'? "<img class='post_img text-primary' width='100' height='100' src='../public/imgs/posts/default/noimage.JPEG'>" : "<img class='post_img text-primary' width='100' height='100' src='../public/imgs/posts/$post_id/$post_img_class'>";?>
    <br>
    <input type="file" name="img"  value="<?php echo $post_img_class;?>">
    <br> <br>
    <label for="img">Post Banner</label>    <br>
    <?php echo "<img class='post_img text-primary' width='100' height='100' src='../public/imgs/posts/$post_id/$post_banner_class'>"; ?>
    <br>

    <input type="file" name="banner"  value="<?php echo $post_banner_class;?>">
    <br> <br>
    <div class="form-group">
        <label for="author">author</label>
        <input required type="text" class="form-control" name="author"  value="<?php echo $post_author;?>">
    </div>



    <div class="form-group">
        <input class="btn btn-primary button-admin" type="submit" name="edit_post" value="Edit Post">
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