<?php
session_start();
include "../php/init.php";

global $connection;

$user_email = trim($_POST['userEmail']);
$errors = [];

// Validation
if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format";
}
if (strlen($user_email) <= 3) {
    $errors[] = "Email too short, minimum 3 characters";
}

if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<div class='alert alert-danger col-lg-12 text-center mx-auto' role='alert'>$error</div>";
    }
    exit;
}

// Check if user exists
$query = "SELECT * FROM users WHERE user_email = ?";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, "s", $user_email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) === 0) {
    echo "<div class='alert alert-success text-center'>If account with this email exists you will recieve link to reset your password</div>";
    exit;
}

$row = mysqli_fetch_assoc($result);
$user_firstname = $row['user_firstname']; // or appropriate field

// Generate token and expiry
$token = generateToken();
$hashedToken = hashToken($token);
$token_expiry = date('Y-m-d H:i:s', strtotime('+30 minutes'));

// Delete previous requests
$deleteQuery = "DELETE FROM user_password_reminder WHERE email = ?";
$deleteStmt = mysqli_prepare($connection, $deleteQuery);
mysqli_stmt_bind_param($deleteStmt, "s", $user_email);
mysqli_stmt_execute($deleteStmt);
mysqli_stmt_close($deleteStmt);

// Insert new reminder
$insertQuery = "INSERT INTO user_password_reminder (email, reminder_token, token_expiry, is_verified, created_at) VALUES (?, ?, ?, 0, NOW())";
$insertStmt = mysqli_prepare($connection, $insertQuery);
mysqli_stmt_bind_param($insertStmt, "sss", $user_email, $hashedToken, $token_expiry);
mysqli_stmt_execute($insertStmt);
mysqli_stmt_close($insertStmt);

// Send email
$verifyLink = "https://adriankotyraprojects.co.uk/websites/ecommerce/public/password_remainder.php?token=$hashedToken&email=" . urlencode($user_email);
send_password_reminder($user_firstname, $verifyLink, $user_email);

echo "<div class='alert alert-success text-center'>If account with this email exists you will recieve link to reset your password</div>";
