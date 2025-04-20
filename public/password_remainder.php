<?php include("includes/header.php"); ?>
<section class="register-section-email">

<?php
if (isset($_POST['reset-password']) && isset($_GET['token']) && isset($_GET['email'])) {

    global $connection;

    $new_password = $_POST["new_password"];
    $hash_password = password_hash($new_password, PASSWORD_DEFAULT);

    $email = $_GET['email'];
    $token = $_GET['token'];

    // Fetch token from DB
    $query = "SELECT email, reminder_token, token_expiry, is_verified FROM user_password_reminder WHERE email = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if (!$user || $user['is_verified']) {
        die("Invalid or already verified!");
    }

    // Check token and expiry
    if ($user['reminder_token'] === $token && $user['email'] === $email) {

        // Mark token as used
        $update_query = "UPDATE user_password_reminder SET is_verified = 1, reminder_token = NULL, token_expiry = NULL WHERE email = ?";
        $update_stmt = mysqli_prepare($connection, $update_query);
        mysqli_stmt_bind_param($update_stmt, "s", $email);
        mysqli_stmt_execute($update_stmt);

        // Update password in users table
        $query2 = "UPDATE users SET user_password = ? WHERE user_email = ?";
        $stmt_create_account = mysqli_prepare($connection, $query2);
        mysqli_stmt_bind_param($stmt_create_account, "ss", $hash_password, $email);
        mysqli_stmt_execute($stmt_create_account);

        // Email confirmation
        send_account_reset_password($email);

        echo "<div class='account-created-window'>
                <h3>Your password has been changed.</h3>
              </div>";
    } else {
        echo "Invalid or expired verification link.";
    }
} else {
    echo '<h3>Reset your password</h3>
    <form action="" method="POST">
        <input type="password" class="form form-control" name="new_password" placeholder="Enter new password" required>
        <button type="submit" name="reset-password" class="button-custom">Confirm</button>
    </form>';
}
?>

</section>

<?php include("includes/footer.php"); ?>
