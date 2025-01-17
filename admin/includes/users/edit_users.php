

<!-- UPDATE FROM FORM TO MYSQL -->

<?php


    if(isset($_GET["user_id"])) {
        global $connection;
        $user_id_to_be_edited = $_GET["user_id"];
    }
    if(isset($_POST["edit_user"])) {

        $user_password        =  $_POST['user_password'];
        $user_firstname         =  $_POST['user_firstname'];
        $user_lastname         =  $_POST['user_lastname'];
        $user_email         =     $_POST['user_email'];
        $user_occupation_posted = trim($_POST["user_occupation"]);
        $user_bio_posted        =     escape_string($_POST['user_bio']);
        $user_facebook_posted        =  $_POST['user_facebook'];
        $user_twitter_posted       =  $_POST['user_twitter'];
        $user_linkedin_posted        =  $_POST['user_linkedin'];
        $post_image          =  $_FILES['image']['name'];
        $post_image_temp     =  $_FILES['image']['tmp_name'];
        $user_role           =  $_POST['user_role'];
        $user_DOB_posted         =  $_POST['user_age_posted'];


        if(empty($post_image)) {

            $query = "SELECT * FROM users WHERE user_id = $user_id_to_be_edited ";
            $select_image = mysqli_query($connection,$query);

            while($row = mysqli_fetch_array($select_image)) {

            $post_image = $row['user_img'];

            }
        }

        $query_update = "UPDATE users SET ";
        $query_update .= "user_firstname = '{$user_firstname}', ";
        $query_update .= "user_password = '{$user_password}', ";
        $query_update .= "user_lastname = '{$user_lastname}', ";
        $query_update .= "user_email = '{$user_email}', ";
        $query_update .= "user_role = '{$user_role}', ";
        $query_update .= "user_img = '{$post_image}', ";
        $query_update .= "user_bio = '{$user_bio_posted}', ";
        $query_update .= "user_facebook = '{$user_facebook_posted}', ";
        $query_update .= "user_twitter = '{$user_twitter_posted}', ";
        $query_update .= "user_linkedin = '{$user_linkedin_posted}', ";  
        $query_update .= "user_DOB = '{$user_DOB_posted}', ";  
        $query_update .= "user_occupation = '{$user_occupation_posted}' "; 
        $query_update .= "WHERE user_id = {$user_id_to_be_edited} ";
        

        $update_user= mysqli_query($connection,$query_update);
    
        move_uploaded_file($post_image_temp, "../public/imgs/users_avatars/$post_image" );

        alert_text("User have been updated", "users.php");




    }


?>
<!--  -->

<?php
  
    if(isset($_GET["user_id"])) {
        global $connection;
        $user_id_to_be_edited = $_GET["user_id"];
        $query = "SELECT * from users where user_id={$user_id_to_be_edited}";
        $select_users_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_users_query)) {


            $user_id = $row["user_id"];
            $user_name = $row["user_firstname"];
            $user_password = $row["user_password"];
            $user_firstname = $row["user_firstname"];
            $user_lastname = $row["user_lastname"];
            $user_email = $row["user_email"];
            $user_image = $row["user_img"];
            $user_role = $row["user_role"];
            $user_bio = $row['user_bio'];
            $user_facebook = $row['user_facebook'];
            $user_twitter = $row['user_twitter'];
            $user_linkedin =  $row['user_linkedin'];
            $user_occupation =  $row['user_occupation'];
            $user_DOB =  $row['user_DOB'];
    }}

?>
<form action="" method="post" enctype="multipart/form-data">




    <div class="form-group">
        <label for="user_password">User Password</label>
        <input type="password" class="form-control" name="user_password" value="<?php echo $user_password?>">
    </div>
    <div class="form-group">
        <label for="user_age_posted">User Age</label>
        <input type="date" class="form-control" name="user_age_posted" value="<?php echo $user_DOB?>">
    </div>


    <div class="form-group">
        <label for="user_firstname">User Firstname</label>
        <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname?>">
    </div>


    <div class="form-group">
        <label for="user_lastname">User Lastname</label>
        <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname?>">
    </div>

    <div class="form-group">
        <label for="user_email">User Email</label>
        <input type="text" class="form-control" name="user_email" value="<?php echo $user_email?>">
    </div>

    <div class="form-group">

        <img width=200 src="../img/<?php echo"../public/imgs/users_avatars/$user_image" ?>" alt="">
    </div>

    <div class="form-group">
        <label for="image">User Image</label>
        <input type="file"  name="image">
    </div>


    <div class="form-group">
       <label for="user_role">User Role</label>
       <br>
       <select name="user_role" id="">
            <?php if($user_role=="Admin") {
                echo "<option value='$user_role'>$user_role</option>";
                echo "<option value='User'>User</option>";
                }
                else {
                    echo "<option value='$user_role'>$user_role</option>";
                    echo "<option value='Admin'>Admin</option>";
                }
            ?>


        </select>

    </div>
    <div class="form-group">
        <label for="user_bio">User Bio</label>
        <textarea class="form-control" name="user_bio" rows="6"><?php echo "$user_bio"?></textarea>
    </div>
    <div class="form-group">
        <label for="user_occupation">User Occupation</label>
        <input type="text" class="form-control" name="user_occupation"  value= "<?php echo$user_occupation?>">
    </div>
    <div class="form-group">
        <label for="user_twitter">User Twitter</label>
        <input type="text" class="form-control" name="user_twitter" value="<?php echo $user_twitter?>">
    </div>
    <div class="form-group">
        <label for="user_linkedin">User Linkedin</label>
        <input type="text" class="form-control" name="user_linkedin" value="<?php echo $user_linkedin?>">
    </div>
    <div class="form-group">
        <label for="user_facebook">User Facebook</label>
        <input type="text" class="form-control" name="user_facebook" value="<?php echo $user_facebook?>">
    </div>
    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_user" value="Update User">
    </div>

</form>