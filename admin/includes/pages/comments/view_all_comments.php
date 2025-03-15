

<div class="card-header">
    <h4 class="card-title"> All comments</h4>
</div>
<div class="card-body">


    <div class="alert-box-user-deletion confirmationWindowModal">

        <div class="buttons-message-container">
            <p></p>
            <div class="buttons-ok-cancel">
                <button class="accept_button">OK</button>

            </div>

        </div>

    </div>
    <?php delete_comments()  ?>

    <div class="filter-col flex-row text-right">
        <form action="">
            <div class="container-cat-filter flex-row ">
                <span>sort by</span>
                <i class="fa-solid fa-angle-down"></i>
            </div>

            <div class="filter-dropdown filter-dropdown-product inactive-dropdown-filter ">
                <div class="dropdown-content ">
                <?php      displayFiltersComments()?>

                    <button class="button-custom btn btn-primary btn-round">APPLY</button>
                </div>
            </div>
        </form>




    </div>

    <div class="table-responsive table-custom">
        <table class="table table-custom">

            <thead class=" text-primary">
                <th>Id</th>
                <th>User</th>
                <th>Product</th>
                <th>Rating </th>
                <th>date </th>
                <th>Status </th>
                <th  class=" text-primary text-right">Check feedback</th>
                <th  class=" text-primary text-right">Change status</th>
                <th  class=" text-primary text-right">Delete</th>
            </thead>
            <div class="input-group no-border">
                <input type="text" value="" class="form-control searcher-comment" placeholder="Search by product name...">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                    </div>
                </div>
            </div>

            <?php change_status_comments()?>




            <tbody class="comments_table">

                <?php select_and_display_comments();?>

            </tbody>

        </table>
    </div>
</div>
