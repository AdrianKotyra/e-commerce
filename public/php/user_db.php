<?php

class User {
    public $user_id;
    public $user_email;
    public $user_firstname;
    public $user_lastname;
    public $user_password;


    public function create_user($id){
        if($id) {
            global $database;

            $result = $database ->query_array("SELECT * FROM users WHERE user_id = $id");

            while($row = mysqli_fetch_array($result )) {
                $id_selected = $row['user_id'];
                $user_email = $row['user_email'];
                $user_firstname = $row["user_firstname"];
                $user_lastname = $row["user_lastname"];
                $user_id = $id_selected;

                $this->user_id =  $id_selected;
                $this->user_email = $user_email;
                $this->user_firstname =  $user_firstname;
                $this->user_lastname = $user_lastname;


            }
        }



        }
    }




?>
