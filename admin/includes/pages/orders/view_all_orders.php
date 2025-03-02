<div class="card-header">
    <h4 class="card-title"> All orders</h4>
</div>

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
                <th>ttranscation id</th>
                <th>date</th>
                <th>amount</th>
                <th>payer</th>

                <th class=" text-primary text-right">info</th>
                <th  class=" text-primary text-right">Edit</th>
                <th  class=" text-primary text-right">Delete</th>
            </thead>

            <div class="input-group no-border">
                <input type="text" value="" class="form-control searcher-order" placeholder="Search by order ...">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                    </div>
                </div>
            </div>

            <tbody class="posts_table">

                <?php select_and_display_orders();?>

            </tbody>

        </table>
    </div>