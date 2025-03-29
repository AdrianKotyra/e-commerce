<?php session_start();
include "../php/init.php"?>
<?php ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);?>

<?php

    global $connection;
    $user_password = trim($_POST['userPassword']);
    $user_email = trim($_POST['userEmail']);


    $query = "SELECT user_password, user_id FROM users WHERE user_email = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "s", $user_email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Fetch the user's stored hashed password
    if ($row = mysqli_fetch_assoc($result)) {
        $stored_hashed_password = $row["user_password"];
        $user_id = $row["user_id"];

        if($user_email=="admin" && password_verify($user_password, $stored_hashed_password)) {
            $session->login($user_id);
            $user = new User();
            $user->create_user($session->user_id);

            echo trim("success-logged-admin");
            return;
        }
        else if (password_verify($user_password, $stored_hashed_password)) {
            //CREATE NEW SESSION AND BASED ON PASSED PARAMETER USER ID TO IT CREATE NEW USER CLASS
            $session->login($user_id);
            $user = new User();
            $user->create_user($session->user_id);

            echo trim("success-logged-user");



        } else {
            echo "<div class='alert alert-danger col-lg-12 text-center mx-auto' role='alert'>Wrong Credentials</div>";
        }
    } else {
        echo "<div class='alert alert-danger col-lg-12 text-center mx-auto' role='alert'>Wrong Credentials</div>";
    }

    // Close the statement
    mysqli_stmt_close($stmt);



    // ECHO AJAX RESPONSE





?>