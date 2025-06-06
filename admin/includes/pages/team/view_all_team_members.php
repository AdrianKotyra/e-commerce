

<div class="card-header">
    <h4 class="card-title"> All users</h4>
</div>
<div class="card-body">

    <a href="team.php?source=add_team_member">
    <button type="submit" class="btn btn-primary btn-round">Add new Team member</button>

    </a>
    <div class="alert-box-user-deletion confirmationWindowModal">

        <div class="buttons-message-container">
            <p></p>
            <div class="buttons-ok-cancel">
                <button class="accept_button">OK</button>

            </div>

        </div>

    </div>
    <div class="input-group no-border">
        <input type="text" value="" class="form-control searcher-team" placeholder="Search by user last name...">
        <div class="input-group-append">
            <div class="input-group-text">
            <i class="nc-icon nc-zoom-split"></i>
            </div>
        </div>
    </div>
    <?php delete_team_member()?>
    <div class="table-responsive table-custom">
        <table class="table">

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
                <th>Name</th>
                <th>Surname</th>
                <th>role</th>
                <th>image</th>
                <th  class=" text-primary text-right"> Description </th>
                <th  class=" text-primary text-right">Edit</th>
                <th  class=" text-primary text-right">Delete</th>
            </thead>



            <tbody class="users_table">

                <?php
                    $per_page = 10;
                    select_and_display_team($per_page);

                ?>

            </tbody>

        </table>
        <?php  pagination_links("team",  $per_page);?>
    </div>
</div>
<?php reset_status_new("team");?>
