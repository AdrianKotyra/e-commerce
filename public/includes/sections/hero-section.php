
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


            default:        include "includes/slider-hero/slider-unisex.php";
            break;

        }


      ?>

    </div>




</section>
<div class="slider">
	<div class="slide-track">
		<div class="slide">
			<img src="../public/imgs/companies/img (1).svg" height="100" width="250" alt="" />
		</div>
		<div class="slide">
        <img src="../public/imgs/companies/img (2).svg" height="100" width="250" alt="" />
		</div>
		<div class="slide">
        <img src="../public/imgs/companies/img (3).svg" height="100" width="250" alt="" />
		</div>
		<div class="slide">
        <img src="../public/imgs/companies/img (4).svg" height="100" width="250" alt="" />
		</div>
		<div class="slide">
        <img src="../public/imgs/companies/img (5).svg" height="100" width="250" alt="" />
		</div>
		<div class="slide">
        <img src="../public/imgs/companies/img (6).svg" height="100" width="250" alt="" />
		</div>
		<div class="slide">
        <img src="../public/imgs/companies/img (7).svg" height="100" width="250" alt="" />
		</div>
		<div class="slide">
        <img src="../public/imgs/companies/img (8).svg" height="100" width="250" alt="" />
		</div>
		<div class="slide">
        <img src="../public/imgs/companies/img (9).svg" height="100" width="250" alt="" />
		</div>
        <div class="slide">
        <img src="../public/imgs/companies/img (10).svg" height="100" width="250" alt="" />
		</div>

        <div class="slide">
        <img src="../public/imgs/companies/img (11).svg" height="100" width="250" alt="" />
		</div>

        <div class="slide">
        <img src="../public/imgs/companies/img (12).svg" height="100" width="250" alt="" />
		</div>

        <div class="slide">
        <img src="../public/imgs/companies/img (13).svg" height="100" width="250" alt="" />
		</div>

        <div class="slide">
        <img src="../public/imgs/companies/img (14).svg" height="100" width="250" alt="" />
		</div>



	</div>
</div>
