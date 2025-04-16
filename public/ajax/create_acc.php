<?php session_start(); ?>
<?php include "../php/init.php"?>

<?php
    global $connection;

    $user_firstname = trim($_POST['userName']);
    $user_lastname = trim($_POST['userSurname']);
    $user_password = trim($_POST['userPassword']);
    $user_email = trim($_POST['userEmail']);
    $accept_terms = trim($_POST['acceptTerms']);






    $errors = [];
    $min = 3;
    $max = 26;


    $query_email = "SELECT * from users where user_email = '$user_email'";

    $query_email_check = mysqli_query($connection, $query_email);


    if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "invalid email format";
    }


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
           <div class='alert alert-danger col-lg-12 text-center mx-auto' role='alert'>$error</div>

            ";
        }
    }

    if(empty($errors)) {



        // Generate verification token and hashed password
        $token = generateToken();
        $hashedToken = hashToken($token);
        $hashedPassword = password_hash($user_password, PASSWORD_BCRYPT);
        $token_expiry =      date('Y-m-d H:i:s', strtotime('+30 minutes'));
        // Generate a proper 6-digit activation code
        $activation_code_generate = str_pad(random_int(100000, 999999), 6, '0', STR_PAD_LEFT);


        if(isset($user_email)) {
            // Use prepared statements to prevent SQL injection
            $query = "SELECT email FROM users_register WHERE email = ?";
            $stmt = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($stmt, "s", $user_email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            if(mysqli_stmt_num_rows($stmt) >= 1) {
                // User exists, proceed to delete securely
                $query_delete = "DELETE FROM users_register WHERE email = ?";
                $stmt_delete = mysqli_prepare($connection, $query_delete);
                mysqli_stmt_bind_param($stmt_delete, "s", $user_email);
                mysqli_stmt_execute($stmt_delete);
                // Close statements
                mysqli_stmt_close($stmt);
                mysqli_stmt_close($stmt_delete);

            }



            // Prepare SQL query
            $query2 = "INSERT INTO users_register
                (email, hash_password, firstname, surname, verification_token, token_expiry, verification_code, is_verified, created_at)
                VALUES (?, ?, ?, ?, ?, ?, ?, 0, NOW())";

            // Prepare the statement
            $stmt = mysqli_prepare($connection, $query2);

            // Bind parameters
            mysqli_stmt_bind_param($stmt, "sssssss",
                $user_email,
                $hashedPassword,
                $user_firstname,
                $user_lastname,
                $hashedToken,
                $token_expiry,
                $activation_code_generate
            );

        // Execute the query
        mysqli_stmt_execute($stmt);

        // Close statement
        mysqli_stmt_close($stmt);

        // Generate verification link
        $verifyLink = "https://adriankotyraprojects.co.uk/websites/ecommerce/public/registration_email.php?token=$token&email=" . urlencode($user_email);

        // Send email
        send_create_account_email($user_firstname,  $verifyLink, $activation_code_generate, $user_email);

        echo trim('pass');

    }

}









?>