<?php include("includes/header.php") ?>
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

            <a href="">View Account</a>
            <hr>
            <a href="">My Orders</a>
            <hr>
            <a href="">My Details</a>
            <hr>
            <a href="">Contact us</a>
            <hr>
            <a href="">FAQ</a>
            <hr>
            <a href="">Log Out</a>
            <hr>

        </div>

        <div class="grid-setting-links">
            <div class="grid-link-col">

                <a href="">
                    <div class="grid-link-icon">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </div>

                    <span> My Orders</span>

                </a>
            </div>
            <div class="grid-link-col">
                <a href="">My Details</a>
            </div>
            <div class="grid-link-col">
                <a href="">Contact us</a>
            </div>
            <div class="grid-link-col">
                <a href="">FAQ</a>
            </div>
            <div class="grid-link-col">
                <a href="">Log Out</a>
            </div>


        </div>

    </div>




</section>

<?php include("includes/sections/slider-prod-section.php") ?>
<?php include("includes/footer.php") ?>