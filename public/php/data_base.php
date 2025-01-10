<?php
    include("config.php");
    class Database {
        public $connection;
        function __construct() {

            $this->open_db_connection();
        }

        public function open_db_connection() {

            $this-> connection  = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME );


        }
        public function query_array($sql) {
            $result = mysqli_query($this->connection, $sql);

            return $result;
        }
        public function escape_string($string) {
            $escaped_string = mysqli_real_escape_string($this->connection, $string);
            return $escaped_string;
        }
        public function the_insert_id(){
            return mysqli_insert_id($this->connection);
        }
        public function test(){
            $test = "fsdfdsfdsfds";
            return $test;
        }




    }

    $database = new Database();



?>