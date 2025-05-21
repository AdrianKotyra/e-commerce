

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
                <th>
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item delete_all">Delete</a>

                        </div>
                    </div>
                </th>
                <th>id</th>
                <th>ttranscation id</th>
                <th>date</th>
                <th>amount</th>
                <th>payer email</th>
                <th>payer name</th>
                <th class=" text-primary text-right">info</th>
                <th  class=" text-primary text-right">Edit</th>
                <th  class=" text-primary text-right">Delete</th>
            </thead>



            <tbody class="posts_table">

                <?php
                     $per_page = 20;
                select_and_display_orders( $per_page);

                ?>

            </tbody>

        </table>
        <?php  pagination_links("orders",  $per_page);?>
    </div>
<?php reset_status_new("orders");?>
