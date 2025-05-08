

<section class="hero-section-main-top">

<?php
if(isset($_GET["category"])) {
    $source = $_GET["category"];

}
else {
    $source = "";
}
switch($source) {
    case 'male';
    include "./includes/slider-hero-main/slider-hero-main-man.php";
    break;

    case 'female';
    include "./includes/slider-hero-main/slider-hero-main-woman.php";
    break;
    case 'unisex';
    include "./includes/slider-hero-main/slider-hero-main-unisex.php";
    break;

    default: include "./includes/slider-hero-main/slider-hero-main-all.php";
    break;


}
?>

</section>
