<section class="prod-similar">
    <h5>Similar</h5>
    <div class="similar_container flex-col">

        <?php
         if(isset($_GET["show"])) {
            $new_prod_id = $_GET["show"];
            $new_prod_check = new Product();
            $new_prod_check->create_product($new_prod_id);
            $prod_type_checked = $new_prod_check->product_type;

        }

        echo displaySimilarProducts($prod_type_checked, 4, $new_prod_id);?>
    </div>

</section>