<?php include("includes/header.php") ?>

<?php Redirect_Not_Logged_User()?>
<section class="user-account-header ">
    <div class="user-account-header-container ">
        <div class="user-info-header">
            <h2 class="desc-user header-title">
                <?php
                    global $user;
                    echo $user->user_firstname.', welcome to your account';
                ?>
            </h2>
        </div>

        <div class="user-info-img">
            <img class="event-img"src="./imgs/account/acc.jpg" />
        </div>

    </div>

</section>

<section class="settings-section wrapper">
    <div class="settion-section-container flex-row">
        <div class="settings_link">

            <a href="account">View Account</a>
            <hr>
            <a href="account?show=orders">My Orders</a>
            <hr>
            <a href="account?show=details">My Details</a>
            <hr>
            <a href="account?show=wishlist">My Wishlist</a>
            <hr>
            <a href="account?show=faq">FAQ</a>
            <hr>
            <a href="account?logout">Log Out</a>
            <hr>

        </div>

        <div class="content-account-user">
        <?php

            if(isset($_GET["show"])) {
                $show = $_GET["show"];

            }
            else {
                $show = "";
            }
            switch($show) {

                case 'orders';
                include "includes/account/orders.php";
                break;

                case 'details';
                include "includes/account/details.php";
                break;

                case 'contact';
                include "includes/account/contact.php";
                break;

                case 'faq';
                include "includes/account/faq.php";
                break;
                case 'wishlist';
                include "includes/account/wishlist.php";
                break;
                default: include("includes/account/view_account.php");
                break;


            }



        ?>

        </div>



    </div>





</section>

<script src="js/countries.js"></script>
<script src="js/pages/account.js"></script>

<?php include("includes/footer.php") ?>