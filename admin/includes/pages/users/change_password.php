

<!-- UPDATE FROM FORM TO MYSQL -->

<?php


    if(isset($_GET["user_id"])) {
        global $connection;
        $user_id_to_be_edited = $_GET["user_id"];
    }
    if(isset($_POST["edit_user_password"])) {

        $user_password =trim($_POST["user_password"]) ;
        $hashedPassword = password_hash($user_password, PASSWORD_BCRYPT);



        $query_update = "UPDATE users SET ";
        $query_update .= "user_password = '{$hashedPassword}' ";
        $query_update .= "WHERE user_id = {$user_id_to_be_edited}";

        $update_details = mysqli_query($connection, $query_update);
        alert_text("User have been updated", "users.php");




    }


?>


    <div class="table-responsive">
    <form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="user_password">User password</label>
        <input required type="text" class="form-control" name="user_password">
    </div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" name="edit_user_password" value="Update password">
</div>

</form>


</div>