<?php include("includes/header.php") ?>



    <?php include("includes/sections/hero-section.php") ?>
    <?php include("includes/sections/slider-hero-section.php") ?>
    <?php



    // global $connection;

    // // Define your product_id (e.g., from user input, hardcoded for now)
    // $product_id = 1;

    // $query = "SELECT product_name FROM products WHERE product_id = ?";
    // $stmt = mysqli_prepare($connection, $query);

    // // Bind the input value to the placeholder
    // mysqli_stmt_bind_param($stmt, "i", $product_id); // "i" = integer

    // // Execute and fetch
    // mysqli_stmt_execute($stmt);
    // mysqli_stmt_store_result($stmt);
    // mysqli_stmt_bind_result($stmt, $product_name);
    // mysqli_stmt_fetch($stmt);

    // // Safe echo
    // echo htmlspecialchars($product_name);

    // // Close the statement
    // mysqli_stmt_close($stmt);



    // $query = "SELECT product_name FROM products WHERE category = ?";
    //     $stmt = mysqli_prepare($connection, $query);
    //     mysqli_stmt_bind_param($stmt, "s", $category);
    //     mysqli_stmt_execute($stmt);
    //     mysqli_stmt_bind_result($stmt, $product_name);

    //     while (mysqli_stmt_fetch($stmt)) {
    //         echo htmlspecialchars($product_name) . "<br>";
    //     }

    //     mysqli_stmt_close($stmt);

?>

    <?php include("includes/sections/slider-section.php") ?>
    <?php section_slider_products("Hi-Top Sneakers") ?>

    <?php section_detailed_products("Outdoor Shoes")?>
    <?php section_slider_products("Sports Shoes") ?>
    <?php section_detailed_products("Seasonal Sneakers")?>
    <?php include("includes/sections/event-section.php") ?>
    <?php section_slider_products("Casual Sneakers") ?>
    <?php section_slider_products("Limited Edition Collectibles") ?>


    <?php section_slider_trending() ?>
    <?php include("includes/sections/video-section.php") ?>
    <?php include("includes/sections/brands-section.php") ?>
    <?php include("includes/sections/news-section.php") ?>
    <?php include("includes/sections/newsletter-section.php") ?>

    <script src="js/pages/index.js"></script>
    <script src="js/jquery.flexslider-min.js"></script>
    <?php include("includes/footer.php") ?>
