
<section class="hero-section">
    <div class="hero-container">
      <?php
        if(isset($_GET["category"])){
          $category = $_GET["category"];
        }
        else {
            $category = "";
        }
        switch($category) {
            case 'male';
            include "includes/slider-hero/slider-men.php";
            break;

            case 'female';
            include "includes/slider-hero/slider-female.php";
            break;


            default:        include "includes//slider-hero/slider-unisex.php";
            break;

        }


      ?>

    </div>




</section>
