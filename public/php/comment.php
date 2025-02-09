<?php

class Comment {
    public $comment_id;
    public $comment_date;
    public $comment_content;
    public $product_id;
    public $stars_rating;
    public $product_name;
    public $user_name;





    public function create_comment($comment_id) {

        if ($comment_id) {
            global $database;

            // GET COMMENTS
            $result_comments = $database->query_array("SELECT * FROM comments WHERE comment_id = $comment_id");
            while ($row = mysqli_fetch_assoc($result_comments)) {
                $this->comment_id = $row['comment_id'];
                $this->comment_date = $row['comment_date'];
                $this->comment_content = $row['user_comment'];
                $this->product_id = $row['product_id'];
                $this->stars_rating = $row['stars_rating'];
                $this->user_name = $row['user_name'];
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
        if($rows>=1) {
            return  ' <div class="rating-reviews-counts">Based on
            '.$rows. ' reviews
            </div>';
        }
        else {
            return;
        }


    }
    public static function get_average_rating_stars($product_id) {
        global $database;
        $stars_container = '';
        $total_rating = 0;
        $average_rating = 0;
        $result_comments = $database->query_array("SELECT * FROM comments WHERE product_id = $product_id");
        while ($row = mysqli_fetch_assoc($result_comments)) {
            $total_rating+=$row["stars_rating"];
        }
        $number_of_ratings = mysqli_num_rows($result_comments);

        if($number_of_ratings==0) {
           return "No reviews collected for this product yet";
        }

        else {
            $average_rating = floor($total_rating/$number_of_ratings);

            for ($i = 0; $i < $average_rating; $i++) {
                $stars_container .= '<i class="fa-solid fa-star"></i>';
            }

            return    $stars_container;
        }


    }
    public static function get_average_rating($product_id) {
        global $database;

        $total_rating = 0;
        $average_rating = 0;
        $result_comments = $database->query_array("SELECT * FROM comments WHERE product_id = $product_id");
        while ($row = mysqli_fetch_assoc($result_comments)) {
            $total_rating+=$row["stars_rating"];
        }
        $number_of_ratings = mysqli_num_rows($result_comments);
        if($number_of_ratings==0) {
            return;
        }
        $average_rating = $total_rating/$number_of_ratings;
        $formatted_average_rating = number_format($average_rating, 2);


        return    $formatted_average_rating;

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
                            '.$this->user_name.'
                        </span>
                    </div>


                    <hr class="avatar-hr">

                </div>
                <div class="comment-user-content">
                    <div class="comment-user-stars stars">
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
