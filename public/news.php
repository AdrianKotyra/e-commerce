<?php include("includes/header.php") ?>

<section class="contact-hero-banner">
    <div class="hero-container">
      <?php
        if(isset($_GET["post"])){

            $post_id = $_GET["post"];

            $new_post = new Post();
            $new_post->create_post($post_id);
            $post_id= $new_post->post_id;
            $post_date= $new_post->post_date;
            $post_date_formated = format_date($post_date);
            $post_header=$new_post->post_header;
            $post_desc=$new_post->post_desc;
            $post_img=$new_post->post_img;
            $post_banner=$new_post->post_banner;
            $post_sub_heading = $new_post->post_sub_heading;
            $post_author = $new_post->post_author;


        }
         else {
            // if not selected post just back to index
            Header('Location: index.php');
        }

      ?>
      <h1 class="category_header"><?php echo $post_header ;?></h1>
      <img class="category_bg"src="imgs/posts/post<?php echo $post_id."/".$post_banner ;?>" alt="">

    </div>






</section>

<section class="post-section ">
  <div class="post-container wrapper-extra">
    <div class="post-col date-sub-heading-container ">
      <span class="direction-post flex-row">
        <a href="index.php"> Home </a>
        &nbsp;
        <span> /</span>
        &nbsp;
        <a href="news_all.php"> News </a>
        &nbsp;
        <span>/ </span>
        &nbsp;
        <a href="news.php?post=<?php echo  $post_id;?>"> Post </a>

      </span>

      <span class="date-post"><?php echo $post_date_formated;?></span>
      <h1 class="section-header header-mobile-post"><?php echo $post_header;?></h1>
      <p class="sub-heading-post"><?php echo $post_sub_heading;?></p>



    </div>
    <div class="post-col header-container">
      <h1 class="section-header header-fullscreen-post"><?php echo $post_header;?></h1>
      <img src="imgs/posts/post<?php echo  $post_id.'/'.$post_img;?>" alt="">
      <p class="post-content"><?php echo $post_desc;?></p>


      <span class="post-author"> <br><b>
      News <br><br><?php echo  $post_author;?>
      </b>
      </span>


    </div>
  </div>




</section>

<section class="more-posts wrapper">
  <h5>More posts</h5>
  <div class="grid-section-all-posts ">
          <?php echo generate_posts_allposts();?>

  </div>

</section>







<?php include("includes/footer.php") ?>