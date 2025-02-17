

<div class="card-header">
    <h4 class="card-title"> All users</h4>
</div>
<div class="card-body">

    <a href="users.php?source=add_users">
    <button type="submit" class="btn btn-primary btn-round">Add new user</button>
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
        <table class="table">

            <thead class=" text-primary">
                <th>id</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Country </th>
                <th> City </th>
                <th> Email </th>
                <th  class=" text-primary text-right">Edit</th>
                <th  class=" text-primary text-right">Delete</th>
            </thead>



            <tbody>

                <?php select_and_display_users();?>

            </tbody>

        </table>
    </div>
</div>
