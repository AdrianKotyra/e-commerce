<?php include("includes/header.php") ?>

<body class="">

  <div class="wrapper ">
    <?php include("includes/nav.php") ?>
    <?php include("includes/top-nav.php")?>
    <div class="main-panel">

      <div class="content">
        <div class="row">

          <div class="col-md-12">
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
                    case 'add_product';
                    include "includes/pages/products/add_products.php";
                    break;

                    case 'edit_product';
                    include "includes/pages/products/edit_products.php";
                    break;

                    case 'show';
                    include "includes/pages/products/view_stock.php";
                    break;
                    case 'edit_stock';
                    include "includes/pages/products/edit_stock.php";
                    break;
                    case 'add_stock';
                    include "includes/pages/products/add_stock.php";
                    break;

                    default: include "includes/pages/products/view_all_products.php";
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