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

<div class="table-responsive table-custom">
        <table class="table ">

            <thead class=" text-primary">
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
                <input type="text" value="" class="form-control searcher-post" placeholder="Search by post name...">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                    </div>
                </div>
            </div>

            <tbody class="products_table">

                <?php select_and_display_posts();?>

            </tbody>

        </table>
    </div>