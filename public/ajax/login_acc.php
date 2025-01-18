<?php session_start();
include "../php/init.php"?>

<?php
    $user_password = trim($_POST['userPassword']);
    $user_email = trim($_POST['userEmail']);
    $result_finding_users = $database -> query_array("SELECT * FROM users WHERE user_email = '$user_email' AND user_password = '$user_password'");
    $num_rows = mysqli_num_rows($result_finding_users);
   // WRONG CREDENTIALS
    if($num_rows==0) {

        $data = "<div class='alert alert-danger col-lg-12 text-center mx-auto' role='alert'>Wrong Credentials</div>";
    }
    // ADMIN LOGIN
    if ($user_email==="admin" && $user_password) {
        $result_finding_admin = $database -> query_array("SELECT * FROM users WHERE user_email = '$user_email' AND user_password = '$user_password'");
        $num_rows_admin = mysqli_num_rows($result_finding_admin);
        if($num_rows_admin) {
            while ($row = mysqli_fetch_array($result_finding_users)) {
                $admin_id = $row["user_id"];
                $data = "admin";
                $session->login($admin_id);
                $user = new User();
                $user->create_user($session->user_id);

            }

        }


    }
    //USER LOGIN
    else {
        while ($row = mysqli_fetch_array($result_finding_users)) {
            $user_id = $row["user_id"];
              //    CREATE NEW SESSION AND BASED ON PASSED PARAMETER USER ID TO IT CREATE NEW USER CLASS
            $session->login($user_id);
            $user = new User();
            $user->create_user($session->user_id);
            $data = "success-logged";

        }
    }
    // ECHO AJAX RESPONSE
    echo trim($data);




?>