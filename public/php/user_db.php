<?php

class User {
    public $user_id;
    public $user_email;
    public $user_img;
    public $user_firstname;
    public $user_lastname;
    public $user_dob;
    public $user_age;
    public $user_password;

    public function calculateAge($user_dob) {
        // Convert the birth date into a DateTime object
        $user_dob = new DateTime($user_dob);
        // Get today's date using DateTime
        $today = new DateTime(date("Y-m-d"));

        // Calculate the difference between today and the birth date
        $age = $today->diff($user_dob)->y;


        $this->user_age =   $age;
    }

    public function create_user($id){
        if($id) {
            global $database;

            $result = $database ->query_array("SELECT * FROM users WHERE user_id = $id");

            while($row = mysqli_fetch_array($result )) {
                $id_selected = $row['user_id'];
                $user_email = $row['user_email'];
                $user_img = $row['user_img'];
                $user_firstname = $row["user_firstname"];
                $user_lastname = $row["user_lastname"];
                $user_dob =  $row["user_DOB"];
                $user_id = $id_selected;

                $this->user_id =  $id_selected;
                $this->user_email = $user_email;
                $this->user_img =  $user_img;
                $this->user_firstname =  $user_firstname;
                $this->user_lastname = $user_lastname;
                $this->user_dob =   $user_dob;

                // calc user age based on DOB
                $this->calculateAge($user_dob);

            }
        }



        }
    }




?>
