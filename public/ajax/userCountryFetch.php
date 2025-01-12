<?php session_start();
    include "../php/init.php";



    global $database;
    global $user;
    $user_id =  $user->user_id;

    $query = "SELECT * FROM users where user_id = $user_id ";
    $result = $database->query_array($query);
    while($row = mysqli_fetch_array($result )) {
        $user_country = $row["user_country"];
        echo $user_country;
    }



?>