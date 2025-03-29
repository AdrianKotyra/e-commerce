<?php include("includes/header.php");?>


<section class="register-section-email">


<?php
if (isset($_POST['create_account_activate']) && isset($_GET['token']) && isset($_GET['email']) && isset($_POST['code'])) {



    global $connection;

    $code  = $_POST['code'];
    $email = $_GET['email'];
    $token = $_GET['token'];

    // Fetch user from DB
    $query = "SELECT id, firstname, surname, hash_password,  verification_token, token_expiry, 	verification_code, is_verified FROM users_register WHERE email = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);
    $hash_password = $user["hash_password"];
    $user_lastname = $user["surname"];
    $user_firstname = $user["firstname"];
    $user_email = $_GET['email'];

    if (!$user || $user['is_verified']) {
        die("Invalid or already verified!");

    }

    // Check token and expiry
    if ($code === $user['verification_code'] ) {

      // Activate account
      $update_query = "UPDATE users_register SET is_verified = 1, verification_token = NULL, token_expiry = NULL WHERE id = ?";
      $update_stmt = mysqli_prepare($connection, $update_query);
      mysqli_stmt_bind_param($update_stmt, "i", $user['id']);
      mysqli_stmt_execute($update_stmt);

      // create account
      // Prepare SQL query
      $query2 = "INSERT INTO users
      (user_email, user_firstname, user_lastname, user_password)
      VALUES (?, ?, ?, ?)";

      // Prepare the statement
      $stmt_create_account = mysqli_prepare($connection, $query2);

      // Bind parameters
      mysqli_stmt_bind_param($stmt_create_account, "ssss",
      $user_email,
      $user_firstname,
      $user_lastname,
      $hash_password,
      );
      mysqli_stmt_execute($stmt_create_account);


      send_account_created( $user_firstname, $email);

      echo "<div class='account-created-window'>
              <h3>Welcome, Your account has been successfully created.</h3>
              <br>
              <div class='img-container'>
                  <a href='index.php'>Continue</a>
                  <img src='https://images.unsplash.com/photo-1615440321519-dda3d4b5ccab?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'>
              </div>
            </div>";
    }

    else {
        echo "Invalid or expired verification link.";
    }
}
else
{
  echo '<h3>Activate account</h3>
    <form action="" method="POST">
        <input type="text" class="form form-control" name="code" placeholder="Enter activation code" required>
        <button type="submit" name="create_account_activate" class="button-custom">Confirm</button>
    </form>';
}
?>

</section>

<script src="js/pages/register.js"></script>
<?php include("includes/footer.php"); ?>
