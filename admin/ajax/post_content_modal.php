<?php session_start() ?>
<?php include "../php/functions_admin.php"?>
<?php include "../../public/php/init.php"?>

<?php
global $connection;
$post_id = isset($_POST["data"]) ? $_POST["data"] : "";


if(!empty($post_id) || $post_id!="") {

        $query = "SELECT * from news where id =  $post_id";
        $select_users_query = mysqli_query($connection, $query);
        if (!$select_users_query) {
            die("Query Failed: " . mysqli_error($connection));
        }
        while($row = mysqli_fetch_assoc($select_users_query)) {
            $post_desc = $row["post_desc"];
            $post_header = $row["post_header"];



           echo '  <div class="confirmationWindowModal">
                <img class="cross_modal_admin exit-modal"src="../public/imgs/icons/cross.svg" alt="">

                <div class="message-container-feedback">
                  <div class="comment-container-view">
                        <h3>'.$post_header.'</h3>
                        <p>'.$post_desc.'</p>


                    </div>
                </div>
            </div>';
        }





    }

    else {
        echo "No results";
    }






?>