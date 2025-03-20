<?php session_start(); ?>
<?php ob_start()?>

<?php include("./php/functions_admin.php")?>
<?php include("../public/php/init.php")?>
<?php log_out()?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Dashboard
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />

  <link href="./assets/css/bootstrap-dashboard.css?v=2.0.1" rel="stylesheet" />

  <link href="./assets/css/custom.css" rel="stylesheet" />
  <!-- public css -->
  <link href="./assets/css/comment.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- charts -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript"></script>
   <!-- quill text editor -->
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

</head>
<div class="modal-window-container">

</div>
<div class="body-mask"></div>
<!-- --------------LOADER----------- -->
<div class="loader">
  <svg viewBox="0 0 200 200">
    <circle cx="100" cy="100" r="50"></circle>
  </svg>
  <svg viewBox="0 0 200 200">
    <circle cx="100" cy="100" r="50"></circle>
  </svg>
  <svg viewBox="0 0 200 200">
    <circle cx="100" cy="100" r="50"></circle>
  </svg>
</div>
<!-- Redirect if user not admin -->
<?php if($session->signed_in!=true || $user->user_status!="admin") {
   header("Location: ../public/index.php");
  }
 ?>
