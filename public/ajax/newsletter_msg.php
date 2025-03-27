<?php include "../php/init.php"; ?>

<?php
global $connection;

$user_firstname = trim($_POST['first_name']);
$user_email = trim($_POST['email']);


$errors = [];
$min = 3;
$max = 26;

// Securely prepare and execute the query
$query_check = "SELECT user_email FROM newsletters WHERE user_email = ?";
$stmt = mysqli_prepare($connection, $query_check);
mysqli_stmt_bind_param($stmt, "s", $user_email);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

// Validate if email exists
if (mysqli_stmt_num_rows($stmt) >= 1) {
    $errors[] = "Email already subscribed";
}

// Close statement
mysqli_stmt_close($stmt);

// Validate email
if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format";
}

// Validate first name
if (strlen($user_firstname) <= 2) {
    $errors[] = "Your first name is too short, should be longer than 2 characters";
}
if (strpbrk($user_firstname, '0123456789')) {
    $errors[] = "First name cannot include numbers";
}
if (strlen($user_firstname) >= $max) {
    $errors[] = "Your first name is too long, should be shorter than $max characters";
}


// Validate email length
if (strlen($user_email) >= $max) {
    $errors[] = "Your email is too long, should be shorter than $max characters";
}
if (strlen($user_email) <= $min) {
    $errors[] = "Your email is too short, should be longer than $min characters";
}

// Display errors if any
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<div class='alert alert-danger col-lg-12 text-center mx-auto' role='alert'>$error</div>";
    }
    return;
} else {
// Prepare the SQL query
$query = "INSERT INTO newsletters (user_email, user_name) VALUES (?, ?)";
$stmt = mysqli_prepare($connection, $query);

if ($stmt) {

    mysqli_stmt_bind_param($stmt, "ss", $user_email, $user_firstname);


    if (mysqli_stmt_execute($stmt)) {
        echo 1; // Success
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }


    mysqli_stmt_close($stmt);
} else {
    echo "Statement preparation failed: " . mysqli_error($connection);
}

}



?>
