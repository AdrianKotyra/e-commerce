<?php

class User {
    public $user_id;
    public $user_email;
    public $user_firstname;
    public $user_lastname;
    public $user_password;
    public $user_city;
    public $user_postcode;
    public $user_address;
    public $user_country;
    public $user_status;


    public function create_user($id){
        if($id) {
            global $database;

            $result = $database ->query_array("SELECT * FROM users WHERE user_id = $id");

            while($row = mysqli_fetch_array($result )) {
                $id_selected = $row['user_id'];
                $user_id = $id_selected;
                $user_email = $row['user_email'];
                $user_firstname = $row["user_firstname"];
                $user_lastname = $row["user_lastname"];
                $user_password = $row["user_password"];
                $user_city= $row["user_city"];
                $user_postcode= $row["user_postcode"] ;
                $user_address =$row["user_address"] ;
                $user_country =$row["user_country"] ;





                // if($user_email=="admin" &&  $user_password=="admin") {
                //     $this-> user_status= "admin";
                // }
                // else {
                //     $this-> user_status= "member";
                // }

                $this-> user_status= $user_email=="admin" ? "admin" : "member";
                $this-> user_city= $user_city;
                $this-> user_postcode= $user_postcode;
                $this-> user_address= $user_address;
                $this-> user_country= $user_country;
                $this->user_id =  $id_selected;
                $this->user_password =  $user_password;
                $this->user_email = $user_email;
                $this->user_firstname =  $user_firstname;
                $this->user_lastname = $user_lastname;


            }
        }



        }
    }




?>
