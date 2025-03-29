<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


if (isset($_POST["edit_user_password"]) && isset($_GET["user_id"])) {
    global $connection;

    // Securely get the user ID
    $user_id_to_be_edited = intval($_GET["user_id"]); // Ensures it is an integer

    // Get and validate the new password
    $user_password = trim($_POST["user_password"]);
    if (empty($user_password)) {
        alert_text("Password cannot be empty!", "edit_user.php"); // Redirect with an error
        exit();
    }

    // Hash the new password securely
    $hashedPassword = password_hash($user_password, PASSWORD_BCRYPT);

    // Secure SQL update using prepared statements
    $query_update = "UPDATE users SET user_password = ? WHERE user_id = ?";
    $stmt = mysqli_prepare($connection, $query_update);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "si", $hashedPassword, $user_id_to_be_edited);

    // Execute the update
    if (mysqli_stmt_execute($stmt)) {
        alert_text("User password has been updated successfully!", "users.php");
    } else {
        alert_text("Error updating user password!", "edit_user.php");
    }

    // Close the statement
    mysqli_stmt_close($stmt);
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