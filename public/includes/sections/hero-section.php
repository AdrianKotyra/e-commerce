<?php
        if(isset($_GET["category"])) {
            $cat = $_GET["category"];
        } else {
            $cat = '';
        }


    ?>
<div class="main-banner" id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <div class="thumb">
                            <div class="inner-content">
                                <h4>We Are H!-Top Sneakers</h4>
                                <span>Sneakers for everyone!</span>

                            </div>
                            <img src="./imgs/hero_section/main.jpg">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content ">
                                            <h4>Women</h4>
                                            <span>Best Sneakers For Women</span>
                                        </div>
                                        <div class="category_hero_female hover-content  <?php if($cat== "female" ) { echo 'active_category'; } ?>">
                                            <div class="inner">
                                                <h4>Women</h4>
                                                <p>Best Sneakers For Women</p>
                                                <div class="main-border-button">
                                                    <a href="index.php?category=female">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="./imgs/hero_section/woman.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Men</h4>
                                            <span>Best Sneakers For Men</span>
                                        </div>
                                        <div class="category_hero_man hover-content  <?php if($cat== "male" ) { echo 'active_category'; } ?>">
                                            <div class="inner">
                                                <h4>Men</h4>
                                                <p>Best Sneakers For Men </p>
                                                <div class="main-border-button">
                                                    <a href="index.php?category=male">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="./imgs/hero_section/man.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Unisex</h4>
                                            <span>Best Sneakers for men and women</span>
                                        </div>
                                        <div class="category_hero_unisex hover-content  <?php if($cat== "unisex" ) { echo 'active_category'; } ?>">
                                            <div class="inner">
                                                <h4>Unisex</h4>
                                                <p>Best Sneakers for men and women</p>
                                                <div class="main-border-button">
                                                    <a href="index.php?category=unisex">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="./imgs/hero_section/uni.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>All </h4>
                                            <span>Best Sneakers for everyone</span>
                                        </div>
                                        <div class="hover-content  <?php if($cat== "" ) { echo 'active_category'; } ?>">
                                            <div class="inner">
                                                <h4>All</h4>
                                                <p>Best Sneakers for everyone</p>
                                                <div class="main-border-button">
                                                    <a href="index.php">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="./imgs/hero_section/all.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="slider">
	<div class="slide-track">
		<div class="slide">
			<img loading="lazy" src="../public/imgs/companies/img (1).svg" height="100" width="250" alt="" />
		</div>
		<div class="slide">
        <img loading="lazy" src="../public/imgs/companies/img (2).svg" height="100" width="250" alt="" />
		</div>
		<div class="slide">
        <img loading="lazy" src="../public/imgs/companies/img (3).svg" height="100" width="250" alt="" />
		</div>
		<div class="slide">
        <img loading="lazy" src="../public/imgs/companies/img (4).svg" height="100" width="250" alt="" />
		</div>
		<div class="slide">
        <img loading="lazy" src="../public/imgs/companies/img (5).svg" height="100" width="250" alt="" />
		</div>
		<div class="slide">
        <img loading="lazy" src="../public/imgs/companies/img (6).svg" height="100" width="250" alt="" />
		</div>
		<div class="slide">
        <img loading="lazy" src="../public/imgs/companies/img (7).svg" height="100" width="250" alt="" />
		</div>
		<div class="slide">
        <img loading="lazy" src="../public/imgs/companies/img (8).svg" height="100" width="250" alt="" />
		</div>
		<div class="slide">
        <img loading="lazy" src="../public/imgs/companies/img (9).svg" height="100" width="250" alt="" />
		</div>
        <div class="slide">
        <img loading="lazy" src="../public/imgs/companies/img (10).svg" height="100" width="250" alt="" />
		</div>

        <div class="slide">
        <img loading="lazy" src="../public/imgs/companies/img (11).svg" height="100" width="250" alt="" />
		</div>

        <div class="slide">
        <img loading="lazy" src="../public/imgs/companies/img (12).svg" height="100" width="250" alt="" />
		</div>

        <div class="slide">
        <img loading="lazy" src="../public/imgs/companies/img (13).svg" height="100" width="250" alt="" />
		</div>

        <div class="slide">
        <img loading="lazy" src="../public/imgs/companies/img (14).svg" height="100" width="250" alt="" />
		</div>



	</div>
</div>