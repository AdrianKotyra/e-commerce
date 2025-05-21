<div class="filter-modal-container">
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

  <div class="cross-filter">
      <i class="fa-solid fa-xmark"></i>
  </div>
  <h3>FILTER/SORT BY</h3>
   <div class="filter-col filter-col-mobile flex-row ">
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
    <div class="filter-col filter-col-mobile flex-row">
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
    <div class="filter-col filter-col-mobile flex-row">
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
    <div class="filter-col filter-col-mobile flex-row">
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

    <div class="filter-col filter-col-mobile flex-row">
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



</div>