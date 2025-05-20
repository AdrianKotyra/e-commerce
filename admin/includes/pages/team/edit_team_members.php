

<!-- UPDATE FROM FORM TO MYSQL -->

<?php
    if(isset($_GET["user_id"])) {
        $user_id_to_be_edited = $_GET["user_id"];
        global $connection;
        $team_member = New Team_member();
        $team_member->create_team($user_id_to_be_edited);
        $team_image =  $team_member->image;




    }
    if(isset($_POST["edit_user"])) {

            $user_firstname= trim($_POST["user_firstname"]);
            $user_lastname= trim($_POST["user_lastname"]);
            $user_desc =trim($_POST["user_desc"]);
            $role =trim($_POST["role"]);


            $post_dir = "../public/imgs/team";

            $post_image = $_FILES['img']['name'] ?? "";
            $post_image_temp1 = $_FILES['img']['tmp_name'] ?? "";

            if(empty( $post_image)) {
               $post_image_dir = $team_image;
            } else {
                $post_image_dir = "team/$post_image";
            }


            move_uploaded_file($post_image_temp1, "$post_dir/$post_image");

            // Escape user input
            $user_firstname = mysqli_real_escape_string($connection, $user_firstname);
            $user_lastname = mysqli_real_escape_string($connection, $user_lastname);
            $user_desc = mysqli_real_escape_string($connection, $user_desc);
            $post_image_dir = mysqli_real_escape_string($connection, $post_image_dir);

            $query_update = "UPDATE team SET ";
            $query_update .= "name = '{$user_firstname}', ";
            $query_update .= "surname = '{$user_lastname}', ";
            $query_update .= "description = '{$user_desc}', ";
            $query_update .= "role = '{$role}', ";
            $query_update .= "image = '{$post_image_dir}' ";
            $query_update .= "WHERE id = {$user_id_to_be_edited}";

            $update_details = mysqli_query($connection, $query_update);

            if ($update_details) {
                alert_text("User has been updated", "team.php");
            } else {
                echo '<div class="alert alert-danger" role="alert">
                    Database update failed: ' . mysqli_error($connection) . '
                </div>';
            }




        }








?>
<!--  -->
    <?php
        if(isset($_GET["user_id"])) {
        global $connection;
        $user_id_to_be_edited = $_GET["user_id"];
        $query = "SELECT * from team  where id={$user_id_to_be_edited}";
        $select_users_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_users_query)) {

            $user_id = $row["id"];
            $image_fetched= $row["image"];
            $desc_fetched= $row["description"];
            $user_lastname_fetched= $row["surname"];
            $user_img_fetched= $row["image"];
            $role_fetched= $row["role"];
            $user_firstname_fetched= $row["name"];
        }
    }
    ?>


    <div class="table-responsive">
    <form action="" method="post" enctype="multipart/form-data">



    <div class="form-group">
        <label for="user_firstname">User Firstname</label>
        <input required type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname_fetched;?>">
    </div>


    <div class="form-group">
        <label for="user_lastname">User Lastname</label>
        <input required type="text" class="form-control" name="user_lastname"  value="<?php echo $user_lastname_fetched;?>">
    </div>

    <div class="form-group">

        <label for="user_desc">Description</label>

        <textarea required type="text" class="form-control" name="user_desc"><?php echo $desc_fetched;?>
        </textarea>
    </div>
    <input  type="file" name="img"  value="<?php echo $image_fetched;?>">
    <br> <br>
    <label for="img">IMAGE</label>    <br>
    <?php echo "<img class='post_img text-primary' width='100' height='100' src='../public/imgs/$image_fetched'>"; ?>
    <br> <br>
     <label for="role">ROLE</label>
    <div class="form-group">
        <select name="role">

            <?php display_team_member_role_options($user_id);?>

        </select>
    </div>



    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_user" value="Update user details">
    </div>

</form>


</div>