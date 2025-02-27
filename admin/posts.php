<?php include("includes/header.php") ?>

<body class="">

  <div class="wrapper ">
    <?php include("includes/nav.php") ?>
    <?php include("includes/top-nav.php")?>
    <div class="main-panel">



      <div class="content">
        <div class="row">

          <div class="col-md-12">
          <a href="posts.php"><h3>POSTS</h3></a>
            <div class="card">

            <div class="card-body">
            <?php




                if(isset($_GET["source"])) {
                    $source = $_GET["source"];

                }
                else {
                    $source = "";
                }
                switch($source) {
                    case 'add_post';
                    include "includes/pages/posts/add_post.php";
                    break;

                    case 'edit_post';
                    include "includes/pages/posts/edit_post.php";
                    break;


                    default: include "includes/pages/posts/view_all_posts.php";
                    break;


                }



                ?>
                </div>
              </div>
            </div>
          </div>
          <?php include("includes/footer.php")?>
        </body>

        </html>