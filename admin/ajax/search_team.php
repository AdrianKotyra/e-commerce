<?php session_start() ?>
<?php include "../php/functions_admin.php"?>
<?php include "../../public/php/init.php"?>

<?php
global $connection;
$search_user = isset($_POST["data"]) ? $_POST["data"] : "";


if(!empty($search_user) || $search_user!="") {
    $stmt = $connection->prepare("SELECT * FROM team WHERE surname LIKE ?");
    $search_param = "%$search_user%";
    $stmt->bind_param("s", $search_param);
    $stmt->execute();
    $search_query = $stmt->get_result();

    $search_count = mysqli_num_rows($search_query);
    if(!$search_query) {
        die("Query Failed" . mysqli_error($connection));
    }


    if($search_count>=1) {
        while($row = mysqli_fetch_array($search_query)) {

        $user_id = $row["id"];
        $image= $row["image"];
        $user_lastname= $row["surname"];
        $role= $row["role"];
        $user_firstname= $row["name"];
        echo "<tr>";
        echo "<th><input class='check' type='checkbox' data-id-name='id' data-row='team'  id= ".$user_id."></th>";
        echo "<td>" . $user_id . "</td>";

        echo "<td>" . $user_firstname . "</td>";
        echo "<td>" . $user_lastname . "</td>";
        echo "<td>" . $role . "</td>";
        echo "<td> <img class='table_img text-primary' width='100' height='100' src='../public/imgs/$image'></td>";
        echo "<td class='text-right' > <span class='table-nav-link team_link' team_member_id= $user_id >check</span></td>";
        echo "<td class='text-right'><a class='table-nav-link' href='team.php?source=edit_team_member&user_id={$user_id}'>EDIT</a></td>";
        echo "<td class='text-right'> <span class='table-nav-link delete_button' data-link='team.php?delete_team_member=$user_id'> Delete </span></td>";
        echo "</tr>";





    }}
    else {
        echo "No results";
    }



} else {
    $per_page = 100;
    select_and_display_team($per_page);


}





?>