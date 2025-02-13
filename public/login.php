<?php include("includes/header.php") ?>
<section class="login-section">
    <div class="login-wrapper">
        <div class="login" >
            <h1>LOGIN</h1>
            <span>admin/admin</span>
            <div class="alert-container"></div>
            <div class="login-col">
                <label for="login"><b>Email</b></label>
                <input class="email" type="text" name="login">
            </div>
            <div class="login-col">
                <label for="password"><b>password</b></label>
                <input class="password" type="password" name="password">
            </div>

            <span class="reminder_password">Forgot your password?</span>
            <button class="button-custom login-user">Sign in</button>
            <a class="create-acc" href="register.php"><span>create account</span></a>



        </div>






    </div>




</section>


<script src="js/pages/login.js"></script>
<?php include("includes/footer.php") ?>