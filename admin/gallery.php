<?php include("includes/header.php") ?>

<body class="">

  <div class="wrapper ">
    <?php include("includes/nav.php") ?>
    <?php include("includes/top-nav.php")?>
    <div class="main-panel">



      <div class="content">
        <div class="row">

          <div class="col-md-12">
          <a href="gallery.php"><h3>GALLERY</h3></a>
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
                    case 'add_img';
                    include "includes/pages/gallery/add_img.php";
                    break;


                    default: include "includes/pages/gallery/view_gallery.php";
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