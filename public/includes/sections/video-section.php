<section class="video-section">
    <div class="video-section-container">

        <?php
               if(isset($_GET["category"])) {
                $category = $_GET["category"];

            }
            else {
                $category = "";
            }

            switch($category) {
                case 'male';
                echo '  <video src="videos/men.mp4" type="video/mp4" autoplay loop muted width="100%"height="100%" ></video>';
                break;

                case 'female';
                echo '  <video src="videos/women.mp4" type="video/mp4" autoplay loop muted width="100%"height="100%" ></video>';
                break;

                case 'unisex';
                echo '  <video src="videos/uni.mp4" type="video/mp4" autoplay loop muted width="100%"height="100%" ></video>';
                break;


                default:   echo '  <video src="videos/all.mp4" type="video/mp4" autoplay loop muted width="100%"height="100%" ></video>';
                break;


            }

        ?>

        <div class="desc-video">
            <h3>Retro/Classic Sneakers</h3>
            <div class="flex-row">
                <button>SHOP MENS</button>
                <button>SHOP WOMENS</button>
            </div>
        </div>
    </div>
</section>