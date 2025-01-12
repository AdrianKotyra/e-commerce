
<?php

    $user_id =  $user->user_id;
    global $connection;
    global $database;

    $query = "SELECT * FROM users where user_id = $user_id ";
    $result = $database->query_array($query);
    while($row = mysqli_fetch_array($result )) {
        $user_email = $row["user_email"];
        $user_lastname = $row["user_lastname"];
        $user_firstname = $row["user_firstname"];
        $user_password = $row["user_password"];
        $user_address = $row["user_address"];
        $user_city = $row["user_city"];

        $user_country = $row["user_country"];
        $user_postcode = $row["user_postcode"];
    }





?>


<section class="account-details account-info">
    <h1 class="header-title-small" >MY DETAILS</h1>
    <form action="" id="update-account-form" method="POST">
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
    <?php account_update_details()?>

</section>