<?php
if (isset($_POST["update-account"])) {
    $message = account_update_details();
}
?>


<?php
    $user_id =  $user->user_id;
    $user_email = $user->user_email;
    $user_lastname = $user->user_lastname;
    $user_firstname = $user->user_firstname;
    $user_password =$user->user_password;
    $user_address = $user->user_address;
    $user_city = $user->user_city;
    $user_country = $user->user_country;
    $user_postcode = $user->user_postcode;

?>


<section class="account-details account-info">
    <h1 class="header-title-small" >MY DETAILS</h1>
    <form action="account.php?show=details" id="update-account-form" method="POST">
    <div class="grid-account-details">
        <div class="details-account-col">
            <label   for="first_name">Email </label>
            <input class="form-control"  type="text" name="email" value="<?php echo  $user_email;?>">

        </div>
        <div class="details-account-col">
            <label   for="user_password">passwprd </label>
            <input class="form-control"  type="password" name="user_password" value="<?php echo  $user_password;?>">

        </div>
        <div class="details-account-col">
            <label   for="first_name">First name </label>
            <input class="form-control"  type="text" name="first_name" value="<?php echo  $user_firstname;?>">

        </div>

        <div class="details-account-col">
            <label for="last_name">Last name </label>
            <input class="form-control"  type="text" name="last_name" value="<?php echo  $user_lastname;?>">

        </div>

        <div class="details-account-col">
            <label  for="address">Address </label>
            <input class="form-control"  type="text" name="address" value="<?php echo  $user_address;?>">

        </div>

        <div class="details-account-col city-input flex-row ">
            <div class="flex-col">
                <label for="city">City</label>
                <input class="form-control" type="text" name="city" value="<?php echo  $user_city;?>">
            </div>

            <div class="flex-col">
                <label  for="postal">Postal/ZIP code</label>
                <input class="form-control" type="text" name="postal" value="<?php echo  $user_postcode;?>">
            </div>

        </div>


        <div class="details-account-col">
            <label for="country">Country/region</label>
            <select id="country" name="country" class="form-control">
                <option value="<?php echo  $user_country;?>">

                </option>


            </select>
        </div>




    </div>
    <button type="submit" name="update-account"class="button-custom update-account">UPDATE</button>
    </form>
    <?php if(!empty($message)) {
        echo $message;
    }?>

</section>