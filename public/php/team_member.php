<?php

class Team_member {
    public $name;
    public $surname;
    public $desc;
    public $image;
    public $role;

    public function create_team($id) {
        if ($id) {
            global $database;
            $result_posts = $database->query_array("SELECT * FROM team WHERE id = $id");
            while ($row = mysqli_fetch_array($result_posts)) {

                $this->name= $row['name'];
                $this->surname= $row['surname'];
                $this->desc= $row['description'];
                $this->image= $row['image'];
                $this->role= $row['role'];

                }
            }


        }



    public function team_cart() {
        $full_name = htmlspecialchars($this->name . ' ' . $this->surname);
        $desc = htmlspecialchars($this->desc);
        $role = htmlspecialchars($this->role);
        $image = htmlspecialchars($this->image);

        $template_cart = '
        <div class="team_cart">
                <div class="team_cart_container">

                    <img class="team_cart_image_cross" src="./imgs/icons/cross.svg">
                    <img class="team_cart_image" src="./imgs/' . $image . '" alt="' . $full_name . '" class="team_cart_img">
                    <div class="team_cart_info">
                        <span class="team_cart_desc team_cart_name">' . $full_name . '</span>
                        <div class="team_cart_info_container">
                            <span class="team_cart_desc team_cart_role">' . $role . '</span>
                            <img class="team_cart_image_info" src="./imgs/icons/info.svg" alt="info" class="team_cart_img">
                        </div>
                        <p class="team_cart_bio">' . $desc . '</p>
                    </div>
                </div>
            </div>
        ';
    return $template_cart;


}
}
?>
