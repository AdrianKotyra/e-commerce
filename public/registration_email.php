<?php session_start(); ?>
<?php include("includes/header.php") ?>

<!-- if not code created in session back to main page -->
<?php

if (!isset($_SESSION["create_acc_code"])) {
    header("Location: index.php");
    exit;
}
?>








<section class="register-section-email">
  <?php
  // if account created succesfull display off form
 if($_POST["code"] !== $_SESSION["create_acc_code"]) {
  ?>
      <h3>Activate account</h3>
      <p>
          <?php echo $_SESSION["create_acc_firstname"]; ?>, a registration email has been sent to
          <b><?php echo $_SESSION["create_acc_email"]; ?></b>. <br>
          It might take couple of minutes to recieve the link. <br>
          Please activate your account by providing the code below:
      </p>

      <form action="" method="POST">
          <input type="text" class="form form-control" name="code" placeholder="Enter activation code" required>
          <input type="hidden" name="firstname" value="<?php echo $_SESSION["create_acc_firstname"]; ?>">
          <input type="hidden" name="lastname" value="<?php echo $_SESSION["create_acc_lastname"]; ?>">
          <input type="hidden" name="email" value="<?php echo $_SESSION["create_acc_email"]; ?>">
          <input type="hidden" name="password" value="<?php echo $_SESSION["create_acc_password"]; ?>">
          <br>
          <button type="submit" name="create_account_activate" class="button-custom">Confirm</button>
      </form>

  <?php
  }
  ?>



  <?php if(isset($_POST["create_account_activate"])) {

    $firstname = isset($_POST["firstname"]) ? $_POST["firstname"] : "";
    $lastname = isset($_POST["lastname"]) ? $_POST["lastname"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";

    $query_email = "SELECT * from users where user_email = '$email'";
    $query_email_check = mysqli_query($connection, $query_email);

    if(isset($_POST["code"]) && $_POST["code"]==$_SESSION["create_acc_code"] && mysqli_num_rows($query_email_check)==0) {




      $query = "INSERT INTO users (user_firstname, user_lastname, user_email, user_password ) ";
      $query .= "VALUES('{$firstname}', '{$lastname}', '{$email}', '{$password}')";
      $create_user_query = mysqli_query($connection, $query);
        echo "<div class='account-created-window'>
          <h3>Welcome $firstname, Your account has been successfully created.</h3> <br>
          <br>
            <div class='img-container'>
               <a href='index.php'>continue</a>
              <img src='https://images.unsplash.com/photo-1615440321519-dda3d4b5ccab?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'>
            </div>


          </div>
      ";

    }

    elseif(isset($_POST["code"]) && $_POST["code"]==$_SESSION["create_acc_code"] && mysqli_num_rows($query_email_check)>=1) {
      echo '<div class="alert alert-danger text-center" role="alert">
      Account with this email already is registered.
      </div>';

    }
    elseif(isset($_POST["code"]) && $_POST["code"]!=$_SESSION["create_acc_code"] && mysqli_num_rows($query_email_check)==0) {

      echo '<div class="alert alert-danger text-center" role="alert">
          provided code is incorrect
          </div>';

      }

}
  ?>

</section>


<script src="js/pages/register.js"></script>
<?php include("includes/footer.php") ?>

<?php
