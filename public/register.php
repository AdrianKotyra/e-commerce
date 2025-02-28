<?php include("includes/header.php") ?>

<section class="register-section">
    <div class="reg-wrapper">
        <form class="reg-form flex-col" action="" method="POST">
            <h1>Create account</h1>
            <div class="alert-container-register"></div>
            <div class="login-col flex-col">
                <label for="Firstname"><b>First name</b></label>
                <input class="firstname_reg" type="text" name="firstname">
            </div>
            <div class="login-col  flex-col">
                <label for="Lastname"><b>Last name</b></label>
                <input class="lastname_reg" ype="text" name="lastname">
            </div>
            <div class="login-col  flex-col">
                <label for="email"><b>Email</b></label>
                <input class="email_reg" type="text" name="email">
            </div>
            <div class="login-col  flex-col">
                <label for="password"><b>password</b></label>
                <input class="password_reg" type="password" name="password">
            </div>

            <button name="login-form" class="button-custom register-acc-trigger">Create</button>


        </form>


    </div>




</section>


<script src="js/pages/register.js"></script>
<?php include("includes/footer.php") ?>