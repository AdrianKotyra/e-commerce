<?php session_start();
include "../php/init.php"?>

<?php
    $user_password = trim($_POST['userPassword']);
    $user_email = trim($_POST['userEmail']);
    $result_finding_users = $database -> query_array("SELECT * FROM users WHERE user_email = '$user_email' AND user_password = '$user_password'");
    $num_rows = mysqli_num_rows($result_finding_users);
    if($num_rows==0) {
        // no need json encoding because it is simple string
        $data = "<div class='alert alert-danger col-lg-12 text-center mx-auto' role='alert'>Wrong Credentials</div>";
        echo trim($data);
    }
    else {
        while ($row = mysqli_fetch_array($result_finding_users)) {
            $user_id = $row["user_id"];
              //    CREATE NEW SESSION AND BASED ON PASSED PARAMETER USER ID TO IT CREATE NEW USER CLASS
            $session->login($user_id);
            $user = new User();
            $user->create_user($session->user_id);
            $data = "success-logged";
            echo trim($data);
        }
    }




?>