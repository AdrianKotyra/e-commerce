<?php
class Session{

    public $signed_in = false;
    public $user_id;

    function __construct() {
     
   
        $this->check_login();


    }
    public function is_signed_in(){
        return $this->signed_in;
    }
    public function login($id) {
        
    
        $_SESSION["user_id"] = $id;
       
        $this->user_id = $_SESSION["user_id"];
        $this->signed_in = true;
    

    }
    public function log_out() {
        unset($_SESSION["user_id"]);
        unset($this->user_id);
        $this->signed_in = false;
    }
    private function check_login() {
        if(isset($_SESSION["user_id"])) {
            $this->user_id =$_SESSION["user_id"];
            $this->signed_in = true;
      
        } else {
            unset($this->user_id);
            $this->signed_in = false;
        }
    }
    
    
}

$session = new Session();
if ($session->signed_in===true) {
    $user = new User();
    $user->create_user($session->user_id);
   
}
?>