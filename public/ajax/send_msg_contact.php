<?php include "../php/init.php"; ?>

<?php
global $connection;

$user_firstname = trim($_POST['first_name']);
$user_lastname = trim($_POST['last_name']);
$user_email = trim($_POST['email']);

$address = trim($_POST['address']);
$city = trim($_POST['city']);
$postal = trim($_POST['postal']);
$country = trim($_POST['country']);
$message = trim($_POST['message']);

$errors = [];
$min = 3;
$max = 26;

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

// Validate last name
if (strlen($user_lastname) <= 2) {
    $errors[] = "Your last name is too short, should be longer than 2 characters";
}
if (strlen($user_lastname) >= $max) {
    $errors[] = "Your last name is too long, should be shorter than $max characters";
}
if (strpbrk($user_lastname, '0123456789')) {
    $errors[] = "Last name cannot include numbers";
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
    // Insert into database if no errors

    $query = "INSERT INTO messages (user_email, user_firstname, user_lastname, user_address, user_city, user_postal, user_country, user_message) ";
    $query .= "VALUES ('{$user_email}', '{$user_firstname}', '{$user_lastname}', '{$address}', '{$city}', '{$postal}', '{$country}', '{$message}')";

    $create_user_query = mysqli_query($connection, $query);

    if ($create_user_query) {
        echo 1;
    }
}



?>
