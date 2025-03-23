<?php include "../php/init.php"?>

<?php
    global $connection;

    $userName = trim($_POST['userName']);
    $userFeedback = trim($_POST['userFeedback']);
    $userEmail = trim($_POST['userEmail']);
    $productId = trim($_POST['productId']);
    $rating = trim($_POST['rating']);
    $today = date("Y-m-d");

    $errors = [];
    $min = 3;
    $max = 26;

    if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "invalid email format";
    }

    if(strlen($userName)<=2) {

        $errors[] = "Your username is too short, should be longer than 2 characters";
    }
    if (strpbrk($userName, '0123456789')) {
        $errors[] = "Username can not include numbers";
    }


    if(strlen($userName)>=$max) {

        $errors[] = "Your username is too long, should be shorter than $max characters";
    }



    if(strlen($userEmail)>=$max) {

        $errors[] = "Your email is too long, should be shorter than $max characters";
    }

    if(strlen($userEmail)<=$min) {

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


        $query = "INSERT INTO comments (user_comment, product_id, comment_date, stars_rating, user_name, approved) ";
        $query .= "VALUES('{$userFeedback}', '{$productId}', '{$today}', '{$rating}',  '{$userName}', 'unapproved')";


        $create_user_query = mysqli_query($connection, $query);

        if($create_user_query) {


            echo  '<div class="alert alert-success text-center" role="alert">
                Feedback has been recieved. Waiting for approval.
            </div>';

        }
    }

// }




?>