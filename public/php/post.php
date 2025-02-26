<?php

class Post {
    public $post_id;

    public $post_date;
    public $post_header;
    public $post_desc;
    public $post_img;
    public $post_sub_heading;
    public $post_banner;
    public $post_author;
    public function create_post($id) {
        if ($id) {
            global $database;
            $result_posts = $database->query_array("SELECT * FROM news WHERE id = $id");
            while ($row = mysqli_fetch_array($result_posts)) {


                $this->post_id= $row['id'];
                $this->post_date= $row['post_date'];
                $this->post_header= $row['post_header'];
                $this->post_desc= $row['post_desc'];
                $this->post_img= $row['post_img'];
                $this->post_sub_heading= $row['post_subheading'];
                $this->post_banner= $row['post_banner'];
                $this->post_author= $row['post_author'];

                }
            }


        }



        public function MainPostCart(){
        $template_cart = '
        <a class="read-more-post-cart"href="news.php?post='.$this->post_id.'">
            <div class="event-col">
                <div class="desc-news-col">
                    <p class="post-event-main-header">'.$this->post_header.'</p>
                    <div class="flex-row">

                            <span >
                                read more
                            </span>

                        <div class="img-container">
                            <i class="fa-solid fa-chevron-right"></i>
                        </div>
                    </div>

                </div>
                <img class="event-img"src="imgs/posts/'.$this->post_header.'/'.$this->post_banner.'" />
            </div>
        </a>
            ';
            return $template_cart;
        }


        public function AllpostsCart(){



            $template_cart = '
            <a class="read-more-post-cart"href="news.php?post='.$this->post_id.'">
                <div class="event-col">
                    <div class="desc-news-col">
                        <p class="post-event-main-header">'.$this->post_header.'</p>
                        <div class="flex-row">

                                <span >
                                    read more
                                </span>

                            <div class="img-container">
                                <i class="fa-solid fa-chevron-right"></i>
                            </div>
                        </div>

                    </div>
                    <img class="event-img"src="imgs/posts/'.$this->post_header.'/'.$this->post_banner.'" />
                </div>
            </a>
                ';
                return $template_cart;
            }
}
?>
