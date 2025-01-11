<?php include("includes/header.php") ?>

<section class="login-section">
    <div class="login-wrapper">
        <form class="login" action="" method="POST">
            <h1>Create account</h1>
            <div class="alert-container"></div>
            <div class="login-col">
                <label for="Firstname"><b>First name</b></label>
                <input class="firstname" type="text" name="firstname">
            </div>
            <div class="login-col">
                <label for="Lastname"><b>Last name</b></label>
                <input class="lastname" ype="text" name="lastname">
            </div>
            <div class="login-col">
                <label for="email"><b>Email</b></label>
                <input class="email" type="text" name="email">
            </div>
            <div class="login-col">
                <label for="password"><b>password</b></label>
                <input class="password" type="password" name="password">
            </div>

            <button name="login-form" class="button-custom register-acc-trigger">Create</button>


        </form>


    </div>




</section>


<script src="js/pages/register.js"></script>
<?php include("includes/footer.php") ?>