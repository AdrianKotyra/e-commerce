<?php include("includes/header.php") ?>

<body class="">

  <div class="wrapper ">
    <?php include("includes/nav.php") ?>
    <?php include("includes/top-nav.php")?>
    <div class="main-panel">



      <div class="content">
        <div class="row">

          <div class="col-md-12">
          <a href="messages.php"><h3>MESSAGES</h3></a>
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

                    case 'reply';
                    include "includes/pages/messages/reply.php";
                    break;


                    default: include "includes/pages/messages/view_all_msgs.php";
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