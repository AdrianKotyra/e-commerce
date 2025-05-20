<section class="video-section ">
    <div class="video-section-container  wrapper">

        <?php
               if(isset($_GET["category"])) {
                $category = $_GET["category"];

            }
            else {
                $category = "";
            }

            switch($category) {
                case 'male';
                echo '  <video  src="videos/men.mp4" type="video/mp4" autoplay loop preload="none" muted width="100%"height="100%" ></video>';
                break;

                case 'female';
                echo '  <video   src="videos/women.mp4" type="video/mp4" autoplay loop preload="none"  muted width="100%"height="100%" ></video>';
                break;

                case 'unisex';
                echo '  <video   src="videos/uni.mp4" type="video/mp4" autoplay loop preload="none" muted width="100%"height="100%" ></video>';
                break;


                default:   echo '  <video src="videos/red.mp4" type="video/mp4" autoplay preload="none" loop muted width="100%"height="100%" ></video>';
                break;


            }

        ?>

        <div class="desc-video">
            <h3>Sport Sneakers</h3>
            <div class="desc-text">
                <a href="category.php?type=Sports%20Shoes&category=female">
                    <button class="button-custom-img" >SHOP WOMENS</button>
                </a>
               <a href="category.php?type=Sports%20Shoes&category=male">
                <button  class="button-custom-img"  >SHOP MENS</button>

               </a>

            </div>
        </div>
    </div>
</section>