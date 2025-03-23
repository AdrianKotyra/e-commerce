<?php include("includes/header.php") ?>

<body class="">

  <div class="wrapper ">
    <?php include("includes/nav.php") ?>
    <?php include("includes/top-nav.php")?>
    <div class="main-panel">



      <div class="content">
        <div class="row">

          <div class="col-md-12">
          <a href="sneaker_month.php"><h3>SNEAKER OF MONTH</h3></a>
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

                    case 'change_sneaker_month_id';
                    include "includes/pages/sneaker_month/change_sneaker_approve.php";
                    break;

                    case 'change_sneaker';
                    include "includes/pages/sneaker_month/change_sneaker.php";
                    break;

                    default: include "includes/pages/sneaker_month/view_sneaker.php";
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