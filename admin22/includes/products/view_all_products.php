<a href="products.php?source=add_product">
    <button class="button-admin">Add product</button>
</a>
<div class="alert-box-user-deletion confirmationWindowModal">



    <div class="buttons-message-container">
        <p></p>
        <div class="buttons-ok-cancel">
            <button class="accept_button">OK</button>

        </div>

    </div>

</div>

<table class="table table-bordered table-hover">
                <thead>
                    <tr>

                       <?php select_table_cols("products")?>
                       <th>Stock</th>
                       <th>Edit</th>
                       <th>Delete</th>
                    </tr>
                </thead>
                <tbody>

                    <?php select_and_display_products();?>


                </tbody>
</table>
