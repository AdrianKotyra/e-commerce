<div class="card-header">
    <h4 class="card-title"> All product</h4>
</div>
<a href="products.php?source=add_product">
    <button class="btn btn-primary btn-round">Add product</button>
</a>
<div class="alert-box-user-deletion confirmationWindowModal">



    <div class="buttons-message-container">
        <p></p>
        <div class="buttons-ok-cancel">
            <button class="accept_button">OK</button>

        </div>

    </div>

</div>

<div class="table-responsive table-custom">
        <table class="table ">

            <thead class=" text-primary">
                <th>id</th>
                <th>Name</th>
                <th>img</th>
                <th>price </th>
                <th>Gender</th>
                <th>Reviews</th>
                <th class=" text-primary text-right"> stock </th>
                <th  class=" text-primary text-right">Edit</th>
                <th  class=" text-primary text-right">Delete</th>
            </thead>

            <div class="input-group no-border">
                <input type="text" value="" class="form-control searcher-product" placeholder="Search by product name...">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                    </div>
                </div>
            </div>

            <tbody class="products_table">

                <?php select_and_display_products();?>

            </tbody>

        </table>
    </div>