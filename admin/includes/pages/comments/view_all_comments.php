

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



    <div class="table-responsive table-custom">
        <table class="table table-custom">

            <thead class=" text-primary">
                <th>Id</th>
                <th>User</th>
                <th>Product</th>
                <th>Rating </th>
                <th>Status </th>
                <th  class=" text-primary text-right">Check feedback</th>
                <th  class=" text-primary text-right">Change status</th>
                <th  class=" text-primary text-right">Delete</th>
            </thead>


            <?php change_status_comments()?>




            <tbody>

                <?php select_and_display_comments();?>

            </tbody>

        </table>
    </div>
</div>
