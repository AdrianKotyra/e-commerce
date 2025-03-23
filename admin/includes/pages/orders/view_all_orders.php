

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
<div class="filter-col text-right">
<form action="">
            <div class="container-cat-filter  ">
                <span>sort by</span>
                <i class="fa-solid fa-angle-down"></i>
            </div>

                <div class="filter-dropdown filter-dropdown-product inactive-dropdown-filter ">
                    <div class="dropdown-content ">
                    <?php      displayFiltersOrders()?>

                        <button class="button-custom btn btn-primary btn-round">APPLY</button>
                    </div>
                </div>
            </form>
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



            <tbody class="posts_table">

                <?php select_and_display_orders();?>

            </tbody>

        </table>
    </div>
<?php reset_status_new("orders");?>
