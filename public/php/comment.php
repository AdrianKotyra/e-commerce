<?php

class Comment {
    public $comment_id;
    public $comment_date;
    public $comment_content;
    public $product_id;
    public $stars_rating;
    public $product_name;

    public $comment_user_id;
    public $user_firstname;
    public $user_lastname;




    public function create_comment($comment_id) {

        if ($comment_id) {
            global $database;

            // GET COMMENTS
            $result_comments = $database->query_array("SELECT * FROM comments WHERE comment_id = $comment_id");
            while ($row = mysqli_fetch_assoc($result_comments)) {
                $this->comment_id = $row['comment_id'];
                $this->comment_date = $row['comment_date'];
                $this->comment_user_id = $row['user_id'];
                $this->comment_content = $row['user_comment'];
                $this->product_id = $row['product_id'];
                $this->stars_rating = $row['stars_rating'];
            }

            // GET USER INFO
            $result_user = $database->query_array("SELECT * FROM users WHERE user_id = $this->comment_user_id");
            while ($row = mysqli_fetch_assoc($result_user)) {
                $this->user_firstname = $row['user_firstname'];
                $this->user_lastname = $row['user_lastname'];
            }

            // GET PRODUCT INFO
            $result_product = $database->query_array("SELECT * FROM products WHERE product_id =$this->product_id");
            while ($row = mysqli_fetch_assoc($result_product)) {
                $this->product_name = $row['product_name'];
            }
        }
    }

    public static function get_number_comments($product_id) {
        global $database;
        $result_comments = $database->query_array("SELECT * FROM comments WHERE product_id = $product_id");
        $rows = mysqli_num_rows($result_comments);

        return  $rows;

    }
    function comment_cart(){
        $stars_container = '';
        for ($i = 0; $i < $this->stars_rating; $i++) {
            $stars_container .= '<i class="fa-solid fa-star"></i>';
        }

        $comment_template = '
           <div class="comment-product-col ">
            <hr>
            <div class="comment-product-col-container flex-row">
                <hr>
                <div class="comment-user-col flex-row">
                    <div class="flex-col">
                        <div class="user-avatar">
                            A
                        </div>
                        <span class="user-name">
                            '.$this->user_firstname.'
                        </span>
                    </div>


                    <hr class="avatar-hr">

                </div>
                <div class="comment-user-content">
                    <div class="comment-user-stars">
                        '. $stars_container.'
                    </div>
                    <div class="comment-user-product-name">
                        '.$this->product_name.'
                    </div>
                    <div class="comment-user-product-content">
                      '.$this->comment_content.'

                    </div>
                    <div class="comment-user-product-date">
                        '.$this->comment_date.'
                    </div>

                </div>
                <hr>
            </div>
        </div>
        ';
        return $comment_template;

    }



}
?>
