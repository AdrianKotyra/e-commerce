

<?php  validate_team();?>


<form action="" method="post" enctype="multipart/form-data">






    <div class="form-group">
        <label for="user_firstname">User Firstname</label>
        <input required type="text" class="form-control" name="user_firstname">
    </div>


    <div class="form-group">
        <label for="user_lastname">User Lastname</label>
        <input required type="text" class="form-control" name="user_lastname">
    </div>

    <div class="form-group">

        <label for="user_desc">Description</label>

        <textarea required type="text" class="form-control" name="user_desc">

        </textarea>
    </div>
    <input  type="file" name="img">
    <br> <br>
    <label for="role">ROLE</label>
    <div class="form-group">
        <select name="role">

            <?php display_team_member_role_options();?>

        </select>
    </div>




    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_team" value="Add team member">
    </div>

</form>