<!DOCTYPE html>
<html lang="en">
<?php include("includes/admin_header.php")?>

    <body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include("includes/nav.php")?>

        <div id="page-wrapper">
            <div class="container-fluid">


            <div class="row">

                <div class="col-lg-12">
                    <a href="products.php"  class="text-center">
                        <h1 class="page-header">
                        Products

                        </h1>
                    </a>




                </div>
            </div>


            </div>



            <?php

                if(isset($_GET["source"])) {
                    $source = $_GET["source"];

                }
                else {
                    $source = "";
                }
                switch($source) {
                    case 'add_product';
                    include "includes/products/add_products.php";
                    break;

                    case 'edit_product';
                    include "includes/products/edit_products.php";
                    break;

                    case 'show';
                    include "includes/products/view_stock.php";
                    break;
                    case 'edit_stock';
                    include "includes/products/edit_stock.php";
                    break;
                    case 'add_stock';
                    include "includes/products/add_stock.php";
                    break;

                    default: include "includes/products/view_all_products.php";
                    break;


                }



            ?>



        </div>


    </div>


    <?php include("includes/admin_footer.php") ?>

</body>

</html>