<?php session_start() ?>
<?php include "../php/functions_admin.php"?>
<?php include "../../public/php/init.php"?>

<?php
global $connection;
$search_post = isset($_POST["data"]) ? $_POST["data"] : "";


if(!empty($search_post) || $search_post!="") {

    $stmt = $connection->prepare("SELECT * from news where post_header LIKE ?");
    $search_param = "%$search_post%";
    $stmt->bind_param("s", $search_param);
    $stmt->execute();
    $search_query = $stmt->get_result();

    $search_count = mysqli_num_rows($search_query);
    if(!$search_query) {
        die("Query Failed" . mysqli_error($connection));
    }


    if($search_count>=1) {

        while($row = mysqli_fetch_assoc($search_query)) {
            $post_id = $row["id"];
            $post_date = $row["post_date"];
            $post_header = $row["post_header"];
            $post_content = $row["post_desc"];


            $post_img = $row["post_img"];
            $post_subheader = $row["post_subheading"];
            $post_banner = $row["post_banner"];
            $post_author = $row["post_author"];

            $post_header_trimmed = substr($post_header, 0, 50);
            $post_subheader_trimmed = substr($post_subheader, 0, 50);

            echo"<tr>";
             echo "<th><input class='check' type='checkbox' data-id-name='id' data-row='news'  id= ".$post_id."></th>";
            echo "<td>$post_id</td>";
            echo "<td>$post_date</td>";
            echo "<td><a class='table-nav-link'  target='_blank' href='../public/news.php?post={$post_id}'>$post_header_trimmed</a></td>";
            echo "<td>$post_subheader_trimmed</td>";

            echo $post_img=='default1.jpg'? "<td><img class='table_img text-primary' width='100' height='100' src='../public/imgs/posts/default/noimage.JPEG'></td>" : "<td><img class='table_img text-primary' width='100' height='100' src='../public/imgs/posts/$post_id/$post_img'></td>";
            echo "<td><img class='table_img text-primary ' width=100 height=100 src='../public/imgs/posts/$post_id/$post_banner'></td>";
            echo "<td>$post_author</td>";

            echo "<td class='text-right' > <span class='table-nav-link post_link' post_id= $post_id >check</span></td>";
            echo "<td class='text-right'><a class='table-nav-link '  href='posts.php?source=edit_post&post_id={$post_id}'>EDIT</a></td>";
            echo "<td class='text-right'> <span class='delete_button table-nav-link '  data-link='posts.php?delete_post=$post_id'> Delete </span></td>";
            echo"</tr>";
        }





    }

    else {
        echo "No results";
    }



} else {
     $per_page =   100;
    select_and_display_posts( $per_page);

}




?>