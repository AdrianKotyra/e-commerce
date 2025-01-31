<?php include("includes/header.php") ?>

<section class="hero-section">
    <div class="hero-container">
      <?php
        if(isset($_GET["show"])){
            global $connection;
            $result_product_type =  secure_query_fetch_data("SELECT * FROM types WHERE type_name", $_GET["show"]);
            if(mysqli_num_rows($result_product_type)>0) {
                while ($row = mysqli_fetch_array($result_product_type)) {
                    $type_img = $row["type_img"];
                    $type_name= $row["type_name"];
                }
            }
            else {
                // if category not exist back to index
                Header('Location: index.php');
            }
        }
         else {
            // if not selected category just back to index
            Header('Location: index.php');
        }

      ?>
      <h1 class="category_header"><?php echo $type_name ;?></h1>
      <img class="category_bg"src="imgs/categories/<?php echo $type_img ;?>" alt="">

    </div>




</section>



<section class="search-grid-products">
    <div class="filter-container flex-row wrapper">

        <div class="filters flex-row ">
            <span class="filter_titler">FILTER</span>




            <div class="filter-col flex-row ">
                <div class="container-cat-filter flex-row">
                    <span>Sex</span>
                    <i class="fa-solid fa-angle-down"></i>
                </div>

                <div class="filter-dropdown inactive-dropdown-filter">
                    <?php $_GET["show"];
                        $type = $_GET["show"];
                    ?>
                    <form action="category.php" method="GET">
                        <input type="hidden" name="show" value="<?php echo htmlspecialchars($type); ?>">
                        <div class="dropdown-content">

                            <p class="flex-row"><input name="category"type="radio" value="female">Womens</p>
                            <p class="flex-row"><input name="category"type="radio" value="male">Mens</p>
                            <p class="flex-row"><input name="category"type="radio" value="mixed">Both</p>




                            <button type="submit" class="button-custom">APPLY</button>
                        </div>
                    </form>

                </div>

            </div>
            <div class="filter-col flex-row">
                <div class="container-cat-filter flex-row">
                    <span>cat1</span>
                    <i class="fa-solid fa-angle-down"></i>
                </div>

                <div class="filter-dropdown inactive-dropdown-filter">
                    <div class="dropdown-content">
                        <p>dsdsa</p>
                        <p>dsdsa</p>
                        <p>dsdsa</p>
                        <button class="button-custom">APPLY</button>
                    </div>
                </div>

            </div>
            <div class="filter-col flex-row">
                <div class="container-cat-filter flex-row">
                    <span>cat1</span>
                    <i class="fa-solid fa-angle-down"></i>
                </div>

                <div class="filter-dropdown inactive-dropdown-filter">
                    <div class="dropdown-content">
                        <p>dsdsa</p>
                        <p>dsdsa</p>
                        <p>dsdsa</p>
                        <button class="button-custom">APPLY</button>
                    </div>
                </div>

            </div>
            <div class="filter-col flex-row">
                <div class="container-cat-filter flex-row">
                    <span>cat1</span>
                    <i class="fa-solid fa-angle-down"></i>
                </div>

                <div class="filter-dropdown inactive-dropdown-filter">
                    <div class="dropdown-content">
                        <p>dsdsa</p>
                        <p>dsdsa</p>
                        <p>dsdsa</p>
                        <button class="button-custom">APPLY</button>
                    </div>
                </div>

            </div>

        </div>
        <div class="filter-col flex-row">
                <div class="container-cat-filter flex-row">
                    <span>sort by</span>
                    <i class="fa-solid fa-angle-down"></i>
                </div>

                <div class="filter-dropdown inactive-dropdown-filter">
                    <div class="dropdown-content">
                        <p>dsdsa</p>
                        <p>dsdsa</p>
                        <p>dsdsa</p>
                        <button class="button-custom">APPLY</button>
                    </div>
                </div>

            </div>



    </div>
    <div class="search-grid-products-container wrapper">

        <?php echo displayCategoryProducts($_GET["show"]);?>

    </div>


</section>





<script src="js/pages/search.js"></script>

<?php include("includes/footer.php") ?>