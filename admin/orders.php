<?php include("includes/header.php") ?>

<body class="">

  <div class="wrapper ">
    <?php include("includes/nav.php") ?>
    <?php include("includes/top-nav.php")?>
    <div class="main-panel">



      <div class="content">
        <div class="row">

          <div class="col-md-12">
          <a href="products.php"><h3>ORDERS</h3></a>
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


                    case 'edit_order';
                    include "includes/pages/orders/edit_order.php";
                    break;

                    default: include "includes/pages/orders/view_all_orders.php";
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