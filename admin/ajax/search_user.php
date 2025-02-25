<?php session_start() ?>
<?php include "../php/functions_admin.php"?>
<?php include "../../public/php/init.php"?>

<?php
global $connection;
$search_user = isset($_POST["data"]) ? $_POST["data"] : "";


if(!empty($search_user) || $search_user!="") {
    $stmt = $connection->prepare("SELECT * FROM users WHERE user_firstname LIKE ?");
    $search_param = "%$search_user%";
    $stmt->bind_param("s", $search_param);
    $stmt->execute();
    $search_query = $stmt->get_result();

    $search_count = mysqli_num_rows($search_query);
    if(!$search_query) {
        die("Query Failed" . mysqli_error($connection));
    }


    if($search_count>=1) {
        while($row = mysqli_fetch_array($search_query)) {
            $user_email = $row["user_email"];
            $user_id = $row["user_id"];
            $user_firstname= $row["user_firstname"];
            $user_lastname= $row["user_lastname"];

            $user_country= $row["user_country"];
            $user_city= $row["user_city"];
            // DONT DISPLAY ADMIN details IN USERS
            if( $user_email!="admin") {

                echo "<tr>";


                echo "<td>" . $user_id . "</td>";

                echo "<td>" . $user_firstname . "</td>";
                echo "<td>" . $user_lastname . "</td>";
                echo "<td>" . $user_country . "</td>";
                echo "<td>" . $user_city . "</td>";
                echo "<td>" . $user_email . "</td>";
                echo "<td class='text-right'><a class='table-nav-link' href='users.php?source=edit_user&user_id={$user_id}'>EDIT</a></td>";
                echo "<td class='text-right'> <span class='table-nav-link delete_button' data-link='users.php?delete_user=$user_id'> Delete </span></td>";
                echo "</tr>";
            }





    }}
    else {
        echo "No results";
    }



} else {
    select_and_display_users();


}





?>