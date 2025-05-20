<?php session_start() ?>

<?php include "../../public/php/init.php"?>

<?php
global $connection;
$teamMemberId = isset($_POST["data"]) ? $_POST["data"] : "";


if(!empty($teamMemberId) || $teamMemberId!="") {

        $query = "SELECT * from team where id =  $teamMemberId";
        $select_users_query = mysqli_query($connection, $query);
        if (!$select_users_query) {
            die("Query Failed: " . mysqli_error($connection));
        }
        while($row = mysqli_fetch_assoc($select_users_query)) {
            $user_desc = $row["description"];
            $user_id = $row["id"];
            $image= $row["image"];
            $user_lastname= $row["surname"];
            $user_firstname= $row["name"];
            $role= $row["role"];


           echo '  <div class="confirmationWindowModal">
                <img class="cross_modal_admin exit-modal exit_modal_trigger"src="../public/imgs/icons/cross.svg" alt="">
                <i class="fa-solid fa-expand expand-icon"></i>
                <div class="team_container">

                    <img class="table_img text-primary" width="100" height="100" src="../public/imgs/'.$image.'">
                    <h2>'.$user_firstname.' '.$user_lastname.'</h2>
                    <h3>'.$role.'</h3>
                    <p>'.$user_desc.'</p>

                </div>
            </div>';
        }





    }

    else {
        echo "No results";
    }






?>