<div class="card-header">
    <h4 class="card-title"> All images</h4>
</div>
<a href="gallery.php?source=add_img">
    <button class="btn btn-primary btn-round">Add image</button>
</a>
<div class="alert-box-user-deletion confirmationWindowModal">



    <div class="buttons-message-container">
        <p></p>
        <div class="buttons-ok-cancel">
            <button class="accept_button">OK</button>

        </div>

    </div>

</div>
<div class="filter-col  text-right">
    <form action="">


        <div class="filter-dropdown filter-dropdown-product inactive-dropdown-filter ">
            <div class="dropdown-content ">
            <?php      displayFiltersPosts()?>

                <button class="button-custom btn btn-primary btn-round">APPLY</button>
            </div>
        </div>
    </form>




</div>
<div class="table-responsive table-custom">
        <table class="table ">

            <thead class=" text-primary">
                <th>id</th>
                <th>img src</th>
                <th>title</th>
                <th>img</th>
                <th  class=" text-primary text-right">Delete</th>
            </thead>



            <tbody class="posts_table">

                <?php
                $per_page = 20;
                select_and_display_gallery( $per_page);

                ?>

            </tbody>

        </table>
        <?php  pagination_links("gallery",  $per_page);?>
    </div>

<?php reset_status_new("news");?>