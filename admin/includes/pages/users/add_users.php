



<?php

validate_user_registration()


?>

<form action="" method="post" enctype="multipart/form-data">






    <div class="form-group">
        <label for="user_firstname">User Firstname</label>
        <input required type="text" class="form-control" name="user_firstname">
    </div>


    <div class="form-group">
        <label for="user_lastname">User Lastname</label>
        <input required type="text" class="form-control" name="user_lastname">
    </div>

    <div class="form-group">
        <label for="user_email">User Email</label>
        <input required type="text" class="form-control" name="user_email">
    </div>
    <div class="form-group">
        <label for="user_password">User password</label>
        <input required type="password" class="form-control" name="user_password">
    </div>

    <div class="form-group">
        <label for="user_address">User address</label>
        <input  type="text" class="form-control" name="user_address">
    </div>
    <div class="form-group">
        <label for="user_postcode">User postcode</label>
        <input  type="text" class="form-control" name="user_postcode">
    </div>
    <div class="form-group">
        <label for="user_city">User City</label>
        <input  type="text" class="form-control" name="user_city">
    </div>
    <div class="form-group">
        <label for="user_country">User country</label>
        <input  type="text" class="form-control" name="user_country">
    </div>





    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
    </div>

</form>