<?php include("includes/header.php") ?>


<?php
    $searched = '';
    $category = '';
    $size = '';
    $type = '';
    if(isset($_GET["search"])) {
        $searched = $_GET["search"];

    }
    else {
        $searched = '';
    }

    if(isset($_GET["category"])) {
        $category = $_GET["category"];
    }
    else {
        $category = 'mixed';
    }
    #

    if(isset($_GET["size"])) {
        $size = $_GET["size"];
    }
    else {
        $size = 'all';
    }
    if(isset($_GET["type"])) {
        $type = $_GET["type"];

    }
    else {
        $type = 'all';
    }
    if(isset($_GET["brand"])) {
        $brand_id = $_GET["brand"];

    }
    else {
        $brand_id = 'all';
    }
    #

?>
<section class="search-section">
    <div class="search-msg-container">
        Your search for "<?php echo '<b>'.$searched.'</b>'?>" revealed the following
        <br>
        <?php
        echo '<b>'.getSearched_product_count().' results </b>' ;

        ?>
    </div>
    <div class="search-container">
        <form action="search" method="GET" class="search-form">
            <div class="search-input-container flex-row">
                <input type="text" placeholder="Search" name="search">

                <div class="search-icon-container flex-col">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
            </div>
        </form>

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

        <form action="search.php" method="GET" >
        <div class="filter-dropdown inactive-dropdown-filter">



            <input type="hidden" name="search" value="<?php echo htmlspecialchars($searched); ?>">
            <div class="dropdown-content">

                <p class="flex-row"><input <?php  echo $category=="female"? 'checked ' : '' ?> name="category"type="radio" value="female">Womens</p>
                <p class="flex-row"><input <?php  echo $category=="male"? 'checked ' : '' ?>name="category"type="radio" value="male">Mens</p>
                <p class="flex-row"><input <?php  echo $category=="unisex"? 'checked ' : '' ?>name="category"type="radio" value="unisex">Unisex</p>
                <p class="flex-row"><input <?php  echo $category=="mixed" ||  $category=='' ?   'checked ' : '' ?> name="category"type="radio" value="mixed">All</p>




                <button type="submit" class="button-custom">APPLY</button>
            </div>


        </div>

    </div>
    <div class="filter-col flex-row">
        <div class="container-cat-filter flex-row">
            <span>Sizes</span>
            <i class="fa-solid fa-angle-down"></i>
        </div>

        <div class="filter-dropdown inactive-dropdown-filter">

                <div class="dropdown-content">
                    <?php echo displaySizesSelect($size);?>
                    <button type="submit" class="button-custom">APPLY</button>
                </div>

        </div>

    </div>
    <div class="filter-col flex-row">
        <div class="container-cat-filter flex-row">
            <span>Types</span>
            <i class="fa-solid fa-angle-down"></i>
        </div>

        <div class="filter-dropdown inactive-dropdown-filter">

                <div class="dropdown-content types-dropdown">
                    <?php echo get_products_types_select($type);?>
                    <button type="submit" class="button-custom">APPLY</button>
                </div>

        </div>

    </div>
    <div class="filter-col flex-row">
        <div class="container-cat-filter flex-row">
            <span>Brands</span>
            <i class="fa-solid fa-angle-down"></i>
        </div>

        <div class="filter-dropdown inactive-dropdown-filter">

                <div class="dropdown-content">
                    <?php echo displayBrandsSelect($brand_id);?>
                    <button type="submit" class="button-custom">APPLY</button>
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
                    <?php      displayFilters()?>

                    <button class="button-custom">APPLY</button>
                </div>
            </div>

        </div>



    </div>
    </form>
    <div class="chosen_filters wrapper">
        <?php
            if(isset($_GET['brand'])) {
                $brand_id = $_GET['brand'];
                global $database;

                if($brand_id=="all") {
                    $brand_name = "ALL BRANDS";

                }
                else {
                    // Fetch all brands
                    $result_sizes = $database->query_array("SELECT * FROM brands where id =  $brand_id");

                    while ($row = mysqli_fetch_array($result_sizes)) {
                        $brand_name = $row["brand_name"];
                    }
                }
            }
            echo isset($_GET['type']) ? "<span class='chosen_filter'> TYPE - " . htmlspecialchars($_GET['type']) . "</span>" : "";
            echo isset($_GET['size']) ? "<span class='chosen_filter'>SIZE - " . htmlspecialchars($_GET['size']) . "</span>" : "";
            echo isset($_GET['brand']) ? "<span class='chosen_filter'> BRAND - " .  $brand_name . "</span>" : "";
            echo isset($_GET['category']) ? "<span class='chosen_filter'> SEX - " . htmlspecialchars($_GET['category']) . "</span>" : "";
            echo isset($_GET['search']) ? "<span class='chosen_filter'> SEARCHED - " . htmlspecialchars($_GET['search']) . "</span>" : "";

        ?>
    </div>

    <div class="search-grid-products-container wrapper">

        <?php echo displaySearchedProducts();?>


    </div>
</section>





<script src="js/pages/search.js"></script>

<?php include("includes/footer.php") ?>