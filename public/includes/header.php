<?php session_start();
ob_start();

include "php/init.php"?>
<?php log_out()?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="height=device-height, width=device-width, initial-scale=1.0, minimum-scale=1.0, target-densitydpi=device-dpi">
    <title>Hi-Top Sneakers</title>

    <!-- font awesome -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="imgs/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="imgs/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="imgs/icons/favicon-16x16.png">
    <!-- custom css -->
    <link rel="stylesheet" href="css/stylesheets/stylesheets.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- slider latest -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css">


    <!-- fancybox -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
      <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"
      />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- hero slider -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.css" integrity="sha512-pmAAV1X4Nh5jA9m+jcvwJXFQvCBi3T17aZ1KWkqXr7g/O2YMvO8rfaa5ETWDuBvRq6fbDjlw4jHL44jNTScaKg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.js" integrity="sha512-hRhHH3+D9xVKPpodEiYzHWIG8CWbCjp7LCdZ00K3/6xsdC3iT0OlPJLIwxSMEl07gya1Ae8iAqXjMMLpzqqh0w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- product slider -->
    <script src="https://cdn.jsdelivr.net/npm/@accessible360/accessible-slick@1.0.1/slick/slick.min.js"></script>


</head>


<body>
<!-- --------------COOKIES----------- -->

<?php include("includes/cookies.php") ?>

<!-- --------------BLACK MASK----------- -->
<div class="body-mask"></div>
<div class="body-mask-nav"></div>
<!-- --------------MODAL WINDOW----------- -->
<div class="modal-container">



</div>
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
<!-- --------------BASKET----------- -->
<?php include("includes/basket-user.php") ?>
<!-- --------------WISHLIST----------- -->
<?php include("includes/wishlist-user.php") ?>
<!-- --------------LOGIN----------- -->
<?php include("includes/login-user.php") ?>

<!-- --------------REMINDER----------- -->
<?php include("includes/reminder-user.php") ?>
<!-- --------------BLACK NAV FOR CHECKOUT----------- -->
<?php
basename($_SERVER['PHP_SELF']) != "check_out.php"?
include("includes/nav.php") : include("includes/nav_checkout.php");

?>
<?php include("includes/nav-mobile.php") ?>






</body>
</html>
