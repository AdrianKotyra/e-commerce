<?php include("includes/header.php") ?>
<?php //Redirect_Not_Logged_User()?>
<section class="user-account-header">
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
            <img class="event-img"src="https://images.pexels.com/photos/27639777/pexels-photo-27639777/free-photo-of-voiture-de-sport-blanche-toyota-garee-dans-un-parking-souterrain.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" />
        </div>

    </div>

</section>

<section class="settings-section">
    <div class="settion-section-container flex-row">
        <div class="settings_link">

            <a href="account.php">View Account</a>
            <hr>
            <a href="account.php?show=orders">My Orders</a>
            <hr>
            <a href="account.php?show=details">My Details</a>
            <hr>
            <a href="account.php?show=contact">Contact us</a>
            <hr>
            <a href="account.php?show=faq">FAQ</a>
            <hr>
            <a href="account.php?logout">Log Out</a>
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

                default: include("includes/account/view_account.php");
                break;


            }



        ?>

        </div>



    </div>





</section>
<script src="js/countries.js"></script>
<script src="js/pages/account.js"></script>
<?php include("includes/sections/slider-prod-section.php") ?>
<?php include("includes/footer.php") ?>