

<!-- UPDATE FROM FORM TO MYSQL -->

<?php


    if(isset($_GET["user_id"])) {
        global $connection;
        $user_id_to_be_edited = $_GET["user_id"];
    }
    if(isset($_POST["edit_user"])) {

        $user_firstname= trim($_POST["user_firstname"]);
        $user_lastname= trim($_POST["user_lastname"]);
        $user_password= trim($_POST["user_password"]) ;
        $user_email =trim($_POST["user_email"]) ;
        $user_city= trim($_POST["user_city"]);
        $user_postcode= trim($_POST["user_postcode"]) ;
        $user_address =trim($_POST["user_address"]) ;

        $user_country =trim($_POST["user_country"]) ;



        $query_update = "UPDATE users SET ";
        $query_update .= "user_firstname = '{$user_firstname}', ";
        $query_update .= "user_password = '{$user_password}', ";
        $query_update .= "user_lastname = '{$user_lastname}', ";
        $query_update .= "user_email = '{$user_email}', ";
        $query_update .= "user_city = '{$user_city}', ";
        $query_update .= "user_postcode = '{$user_postcode}', ";
        $query_update .= "user_address = '{$user_address}', ";
        $query_update .= "user_country = '{$user_country}' ";
        $query_update .= "WHERE user_id = {$user_id_to_be_edited}";

        $update_details = mysqli_query($connection, $query_update);
        alert_text("User have been updated", "users.php");




    }


?>
<!--  -->

<?php

    if(isset($_GET["user_id"])) {
        global $connection;
        $user_id_to_be_edited = $_GET["user_id"];
        $query = "SELECT * from users where user_id={$user_id_to_be_edited}";
        $select_users_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_users_query)) {

            $user_firstname= $row["user_firstname"];
            $user_lastname= $row["user_lastname"];
            $user_password= $row["user_password"] ;
            $user_email =$row["user_email"] ;
            $user_city= $row["user_city"];
            $user_postcode=$row["user_postcode"] ;
            $user_address =$row["user_address"] ;
            $user_country =$row["user_country"] ;
    }}

?>

    <div class="table-responsive">
    <form action="" method="post" enctype="multipart/form-data">



    <div class="form-group">
        <label for="user_firstname">User Firstname</label>
        <input required type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname;?>">
    </div>


    <div class="form-group">
        <label for="user_lastname">User Lastname</label>
        <input required type="text" class="form-control" name="user_lastname"  value="<?php echo $user_lastname;?>">
    </div>

    <div class="form-group">
        <label for="user_email">User Email</label>
        <input required type="text" class="form-control" name="user_email"  value="<?php echo $user_email;?>">
    </div>
    <div class="form-group">
        <label for="user_password">User password</label>
        <input required type="text" class="form-control" name="user_password"  value="<?php echo $user_password;?>">
    </div>

    <div class="form-group">
        <label for="user_address">User address</label>
        <input  type="text" class="form-control" name="user_address"  value="<?php echo $user_address;?>">
    </div>
    <div class="form-group">
        <label for="user_postcode">User postcode</label>
        <input  type="text" class="form-control" name="user_postcode"  value="<?php echo $user_postcode;?>">
    </div>
    <div class="form-group">
        <label for="user_city">User City</label>
        <input  type="text" class="form-control" name="user_city"  value="<?php echo $user_city;?>">
    </div>
    <div class="form-group">
        <label for="user_country">User country</label>
        <input  type="text" class="form-control" name="user_country"  value="<?php echo $user_country;?>">
    </div>





<div class="form-group">
    <input class="btn btn-primary" type="submit" name="edit_user" value="edit user">
</div>

</form>

</div>