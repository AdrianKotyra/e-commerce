<?php include("includes/header.php") ?>

<section class="hero-section">
    <div class="hero-container">
    <?php
        global $connection;

        // Redirect if neither type nor brand is set
        if (!isset($_GET["brand"]) && !isset($_GET["type"])) {
            header('Location: index.php');
            exit;
        }

        // Defaults
        $type_name = "all";
        $type_img = "all.jpg";

        // Case 1: Specific type provided
        if (isset($_GET["type"]) && $_GET["type"] !== "all") {
            $type = $_GET["type"];
            $query = "SELECT * FROM types WHERE type_name =  '$type'";
            $select_type = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_type)) {
                $type_img = $row["type_img"];
                $type_name = $row["type_name"];
            }

        }
        // Case 2: Brand is provided and type is "all"
        else if (isset($_GET["brand"]) && isset($_GET["type"]) && $_GET["type"] === "all") {
            $brand_id = intval($_GET["brand"]);
            $query2 = "SELECT * FROM brands WHERE id = $brand_id";
            $select_brands = mysqli_query($connection, $query2);

            if ($product_row = mysqli_fetch_assoc($select_brands)) {
                $type_name = $product_row["brand_name"];
                $type_img = "all.jpg";
            }
        }
        ?>

      <h1 class="category_header"><?php echo $type_name ;?></h1>
      <img class="category_bg"src="imgs/categories/<?php echo $type_img ;?>" alt="">

    </div>




</section>

<?php

    $category = '';
    $size = '';


    if(isset($_GET["category"])) {
        $category = $_GET["category"];
    }
    else {
        $category = 'mixed';
    }

    if(isset($_GET["size"])) {
        $size = $_GET["size"];
    }
    else {
        $size = 'all';
    }
    if(isset($_GET["brand"])) {
        $brand_id = $_GET["brand"];
    }
    else {
        $brand_id = 'all';
    }
    if (isset($_GET["type"]) ) {
        $type = $_GET["type"];
    }
    else {
         $type = "all";
    }

?>



<section class="search-grid-products">
<div class="filter-container flex-row wrapper">

<div class="filters flex-row ">
    <span class="filter_titler">FILTER</span>




    <div class="filter-col flex-row ">
        <div class="container-cat-filter flex-row">
            <span>Sex</span>
            <i class="fa-solid fa-angle-down"></i>
        </div>

        <form action="category.php" method="GET" >
        <div class="filter-dropdown inactive-dropdown-filter">



            <input type="hidden" name="type" value="<?php echo htmlspecialchars($type); ?>">
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

            <div class="filter-dropdown filter-dropdown-product inactive-dropdown-filter ">
                <div class="dropdown-content ">
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


        ?>
    </div>

    <div class="search-grid-products-container wrapper">

    <?php echo displayCategoryProducts($type);?>


    </div>
</section>




<script src="js/pages/search.js"></script>

<?php include("includes/footer.php") ?>