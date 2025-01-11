<?php include "../php/init.php"?>

<?php
    global $connection;

    $user_firstname = trim($_POST['userName']);
    $user_lastname = trim($_POST['userSurname']);
    $user_password = trim($_POST['userPassword']);
    $user_email = trim($_POST['userEmail']);


    $errors = [];
    $min = 3;
    $max = 26;



    $query_email = "SELECT * from users where user_email = '$user_email'";

    $query_email_check = mysqli_query($connection, $query_email);

    if(mysqli_num_rows($query_email_check)>0) {
        $errors[] = "Account with this email already exists";
    }

    if(strlen($user_firstname)<=2) {

        $errors[] = "Your username is too short, should be longer than 2 characters";
    }
    if (strpbrk($user_firstname, '0123456789')) {
        $errors[] = "Username can not include numbers";
    }

    if (strpbrk($user_lastname, '0123456789')) {
        $errors[] = "Username can not include numbers";
    }

    if(strlen($user_firstname)>=$max) {

        $errors[] = "Your username is too long, should be shorter than $max characters";
    }

    if(strlen($user_lastname)<=2) {

        $errors[] = "Your lastname is too short, should be longer than 2 characters";
    }
    if(strlen($user_lastname)>=$max) {

        $errors[] = "Your lastname is too long, should be shorter than $max characters";
    }
    if(strlen($user_email)>=$max) {

        $errors[] = "Your email is too long, should be shorter than $max characters";
    }

    if(strlen($user_email)<=$min) {

        $errors[] = "Your email is too short, should be longer than $min characters";
    }


    if(!empty($errors)) {
        foreach ($errors as $error) {
            echo "

            <div class='alert alert-danger col-lg-12 text-center mx-auto' role='alert'>
                $error
            </div>
            ";
        }
    }

    if(empty($errors)) {


        $query = "INSERT INTO users (user_firstname, user_lastname, user_email, user_password ) ";
        $query .= "VALUES('{$user_firstname}', '{$user_lastname}', '{$user_email}', '{$user_password}')";


        $create_user_query = mysqli_query($connection, $query);

        if($create_user_query) {


            echo  '<div class="alert alert-success text-center" role="alert">
                Your account has been created.
            </div>';

        }
    }

// }




?>