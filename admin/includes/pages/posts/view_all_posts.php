<div class="card-header">
    <h4 class="card-title"> All posts</h4>
</div>
<a href="posts.php?source=add_post">
    <button class="btn btn-primary btn-round">Add post</button>
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
        <div class="container-cat-filter ">
            <span>sort by</span>
            <i class="fa-solid fa-angle-down"></i>
        </div>

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
                <th>date</th>
                <th>header</th>
                <th>subheader</th>

                <th>img </th>
                <th>banner</th>
                <th>author</th>
                <th class=" text-primary text-right">content</th>
                <th  class=" text-primary text-right">Edit</th>
                <th  class=" text-primary text-right">Delete</th>
            </thead>

            <div class="input-group no-border">
                <input type="text" value="" class="form-control searcher-post" placeholder="Search by post header...">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                    </div>
                </div>
            </div>

            <tbody class="posts_table">

                <?php
                $per_page = 20;
                select_and_display_posts($per_page);

                ?>

            </tbody>

        </table>
        <?php  pagination_links("news",  $per_page);?>
    </div>

<?php reset_status_new("news");?>