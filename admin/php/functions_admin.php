<?php

    function check_record($table, $id_table_name, $id){
        global $connection;
        // Check if record exists
        $query_check = "SELECT * FROM $table WHERE $id_table_name = $id";
        $result_check = mysqli_query($connection, $query_check);


        return mysqli_num_rows($result_check) > 0;

    }

    function escape_string($string) {
        global $connection;
        return mysqli_real_escape_string($connection, $string);
    }


    function select_and_display_users() {
    global $connection;

    $query = "SELECT * from users";
    $select_users_query = mysqli_query($connection, $query);
    if (!$select_users_query) {
        die("Query Failed: " . mysqli_error($connection));
    }
    while($row = mysqli_fetch_assoc($select_users_query)) {

        $user_email = $row["user_email"];
        $user_id = $row["user_id"];
        $user_firstname= $row["user_firstname"];
        $user_lastname= $row["user_lastname"];

        $user_country= $row["user_country"];
        $user_city= $row["user_city"];
        // DONT DISPLAY ADMIN details IN USERS
        if( $user_email!="admin") {

            echo "<tr>";


            echo "<td>" . $user_id . "</td>";

            echo "<td>" . $user_firstname . "</td>";
            echo "<td>" . $user_lastname . "</td>";
            echo "<td>" . $user_country . "</td>";
            echo "<td>" . $user_city . "</td>";
            echo "<td>" . $user_email . "</td>";
            echo "<td class='text-right'><a class='table-nav-link' href='users.php?source=edit_user&user_id={$user_id}'>EDIT</a></td>";
            echo "<td class='text-right'> <span class='table-nav-link delete_button' data-link='users.php?delete_user=$user_id'> Delete </span></td>";
            echo "</tr>";
        }

    }


}


function delete_users(){
    if(isset($_GET["delete_user"])) {
        global $connection;
        $user_to_be_deleted = $_GET["delete_user"];

        // delete user account


        $query = "DELETE from users WHERE user_id={$user_to_be_deleted}";
        $delete_user_account = mysqli_query($connection, $query);




    }
}

function change_status_comments(){
    if(isset($_GET["change_status"])) {
        global $connection;
        $comment_id = $_GET["change_status"];
        $query = "SELECT * from comments where comment_id = $comment_id";
        $select_comment_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_comment_query)) {

            $comment_status_selected = $row["approved"];
            $comment_id_selected = $row["comment_id"];

            if($comment_status_selected=="approved") {
                $query_updated_Status = "UPDATE `comments` SET `approved`='unapproved' where comment_id = $comment_id_selected";
            }
            else {
                $query_updated_Status = "UPDATE `comments` SET `approved`='approved' where comment_id = $comment_id_selected";
            }
            $upate_status = mysqli_query($connection, $query_updated_Status);

        }



    }
}
function select_and_display_comments() {
    global $connection;
    global $product;

    $query = "SELECT * from comments order by approved DESC";
    $select_users_query = mysqli_query($connection, $query);
    if (!$select_users_query) {
        die("Query Failed: " . mysqli_error($connection));
    }
    while($row = mysqli_fetch_assoc($select_users_query)) {

        $comment_id = $row["comment_id"];
        $user_comment = $row["user_comment"];
        $stars_rating= $row["stars_rating"];
        $stars_container= "";
        for ($i = 0; $i < $stars_rating; $i++) {
            $stars_container .= '<i class="fa-solid fa-star main-color"></i>';
        }

        $user_name= $row["user_name"];
        $product_id= $row["product_id"];

        $product_new = new Product();
        $product_new ->create_product($product_id);
        $product_name = $product_new->product_name;
        $product_category = Product::getproductCategory($product_id);
        $approved= $row["approved"];




        echo "<tr>";
        echo "<td>" . $comment_id . "</td>";
        echo "<td>" . $user_name . "</td>";
        echo "<td > <a target='_blank' href='../../ecommerce/public/products.php?show=$product_id&category=$product_category'>$product_name </a></td>";
        echo "<td>" . $stars_container . "</td>";
        echo "<td>" . $approved . "</td>";
        echo "<td class='text-right'><span class='table-nav-link comment-id-link' data-comment-id=$comment_id>CHECK</span></td>";
        echo "<td class='text-right'><span class='change_status_button table-nav-link' data-link='comments.php?change_status={$comment_id}'>CHANGE</span></td>";
        echo "<td class='text-right'> <span class='delete_button table-nav-link' data-link='comments.php?delete_comment=$comment_id'> Delete </span></td>";
        echo "</tr>";


    }

}

function delete_comments(){
    if(isset($_GET["delete_comment"])) {
        global $connection;
        $comment_to_be_deleted = $_GET["delete_comment"];
        $query = "DELETE from comments WHERE comment_id={$comment_to_be_deleted}";
        $delete_comment = mysqli_query($connection, $query);
    }
}
function chart_cart_template($icon, $column_name){
    $number_records_col = get_row_count($column_name);
    $html = '<a class="col-lg-3 col-md-6 col-sm-6 chart-small" href="'.$column_name.'.php">

                <div class="card card-stats">
                    <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon '.$icon.' text-warning"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">'.$column_name.'</p>
                                <p class="card-title">'.$number_records_col.'<p>

                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="card-footer ">
                    <hr>

                </div>
            </div>

        </a>';
return $html;
}
function select_and_display_product_stock() {
    global $connection;
    if(isset($_GET["product_id"])) {
        $product_id = $_GET["product_id"];
        $query = "SELECT * from rel_products_sizes where prod_id =  $product_id ";
        $select_prod_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_prod_query)) {
            $size_id = $row["size_id"];
            $stock= $row["stock"];


            $query2 = "SELECT * from sizes where id = $size_id ";
            $select_sizes_query = mysqli_query($connection, $query2);
            while($row = mysqli_fetch_assoc($select_sizes_query)) {
                $size= $row["size"];
                echo " <tr>  ";

                echo "<td>". $size. "</td>";
                echo "<td>". $stock. "</td>";
                echo "<td><a href='products.php?source=edit_stock&product_id={$product_id}&size_id={$size_id}'>EDIT</a></td>";
                echo "<td > <span class='delete_button' data-link='products.php?source=show&delete_size=$size_id&product_id={$product_id}'> Delete </span></td>";
                echo " </tr>  ";
            }

        }
    }
    if(isset($_GET["delete_size"]) && isset($_GET["product_id"])) {
        $size_id = $_GET["delete_size"];
        $prod_id =  $_GET["product_id"];

        $query = "DELETE from rel_products_sizes WHERE size_id=$size_id AND prod_id = $prod_id";
        $delete_stock= mysqli_query($connection, $query);
        if($delete_stock) {
            echo '<script> window.location.href = "products.php?source=show&product_id='.$prod_id.'" </script>';
        }


    }

}
function select_and_display_products() {
    global $connection;
    global $product;
    $query = "SELECT * FROM products ORDER BY product_id DESC";

    $select_users_query = mysqli_query($connection, $query);
    if (!$select_users_query) {
        die("Query Failed: " . mysqli_error($connection));
    }
    while($row = mysqli_fetch_assoc($select_users_query)) {

        $product_id = $row["product_id"];
        $product_name = $row["product_name"];
        $product_img = $row["product_img"];
        $product_price = $row["product_price"];


        $product_category = Product::getproductCategory($product_id);
        $product_reviews_number = Product::get_product_reviews_number($product_id);


        // Loop through each column in the row
        echo "<td > $product_id</td>";

        echo "<td > <a target='_blank'  href='../../ecommerce/public/products.php?show=$product_id&category=$product_category'>$product_name </a></td>";
        echo "<td><img src='../public/imgs/products/$product_name/$product_img'></td>";

        echo "<td > $product_price</td>";
        echo "<td > $product_category</td>";
        echo "<td > <span class='table-nav-link product_link' product_id= $product_id >$product_reviews_number</span></td>";
        echo "<td class='text-right'><a class='table-nav-link' href='products.php?source=show&product_id={$product_id}'>STOCK</a></td>";
        echo "<td class='text-right'><a class='table-nav-link'href='products.php?source=edit_product&product_id={$product_id}'>EDIT</a></td>";
        echo "<td class='text-right'> <span class='table-nav-link delete_button' data-link='products.php?delete_product=$product_id'> Delete </span></td>";
        echo " </tr>  ";




    }


    if(isset($_GET["delete_product"])) {
    global $connection;
    $product_id = $_GET["delete_product"];

    // delete product


    $query = "DELETE from products WHERE product_id={$product_id}";
    $delete_product = mysqli_query($connection, $query);
    echo '<script> window.location.href = "products.php" </script>';


}}
function validate_staff() {
    $errors = [];
    $min = 3;
    $max = 26;

    if(isset($_POST['add_staff'])){

        global $connection;

        $staff_firstname= trim($_POST["staff_firstname"]);
        $staff_lastname= trim($_POST["staff_lastname"]);
        $staff_vocation= trim($_POST["staff_vocation"]) ;
        $staff_description= trim($_POST["staff_description"]) ;

        $post_image        = $_FILES['image']['name'];
        $post_image_temp   = $_FILES['image']['tmp_name'];
        $destination_img_upload = "../public/imgs/staff_images/$post_image";




        if(strlen($staff_description)<=$min) {

            $errors[] = "Staff description is too short, should be longer than $min characters";
        }
        if(strlen($staff_description)<=$min) {

            $errors[] = "Staff description is too short, should be longer than $min characters";
        }
        if(strlen($staff_firstname)<=$min) {

            $errors[] = "Staff username is too short, should be longer than $min characters";
        }
        if(strlen($staff_firstname)>=$max) {

            $errors[] = "Staff username is too long, should be shorter than $max characters";
        }

        if(strlen($staff_lastname)<=$min) {

            $errors[] = "Staff lastname is too short, should be longer than $min characters";
        }
        if(strlen($staff_lastname)>=$max) {

            $errors[] = "Staff lastname is too long, should be shorter than $max characters";
        }
        if(strlen($staff_vocation)>=$max) {

            $errors[] = "Staff vocation is too long, should be shorter than $max characters";
        }
        if(strlen($staff_vocation)<=$min) {

            $errors[] = "Staff vocation is too short, should be longer than $min characters";
        }



        if(!empty($errors)) {
            foreach ($errors as $error) {
                echo "

                <div class='alert alert-danger col-lg-12 text-center mx-auto' role='alert'>
                    $error
                </div>
                <br>";
            }
        }

        if(empty($errors)) {
            $status = "false";

            // if no uploaded image give it default image
            if($post_image ===""){
                $post_image="default-avatar.jpg";
            }

            move_uploaded_file($post_image_temp, $destination_img_upload );

            $query = "INSERT INTO staff (staff_firstname, staff_lastname, staff_vocation, staff_description, staff_image) ";
            $query .= "VALUES('{$staff_firstname}', '{$staff_lastname}', '{$staff_vocation}' , '{$staff_description}' , '{$post_image}' )";



            $create_staff_query = mysqli_query($connection, $query);

            if($create_staff_query) {

                alert_text("Staff has been added", "staff.php");
            }
        }
    }
}
function validate_user_registration() {
    $errors = [];
    $min = 3;
    $max = 26;

    if(isset($_POST['create_user'])){

        global $connection;

        $user_firstname= trim($_POST["user_firstname"]);
        $user_lastname= trim($_POST["user_lastname"]);
        $user_password= trim($_POST["user_password"]) ;

        $user_email =trim($_POST["user_email"]) ;


        $user_city= trim($_POST["user_city"]);
        $user_postcode= trim($_POST["user_postcode"]) ;
        $user_address =trim($_POST["user_address"]) ;

        $user_country =trim($_POST["user_country"]) ;



        $query_email = "SELECT * from users where user_email = '$user_email'";
        $query_email_check = mysqli_query($connection, $query_email);

        if(mysqli_num_rows($query_email_check)>=1) {
            $errors[] = "Account with $user_email email already exists";
        }


        if (strpbrk($user_firstname, '0123456789')) {

            $errors[] = "Username can not include numbers";
        }
        if (strpbrk($user_lastname, '0123456789')) {

            $errors[] = "Lastname can not include numbers";
        }

        if(strlen($user_firstname)<=$min) {

            $errors[] = "Users username is too short, should be longer than $min characters";
        }
        if(strlen($user_firstname)>=$max) {

            $errors[] = "Users username is too long, should be shorter than $max characters";
        }

        if(strlen($user_lastname)<=$min) {

            $errors[] = "Users lastname is too short, should be longer than $min characters";
        }
        if(strlen($user_lastname)>=$max) {

            $errors[] = "Users lastname is too long, should be shorter than $max characters";
        }
        if(strlen($user_email)>=$max) {

            $errors[] = "Users email is too long, should be shorter than $max characters";
        }
        if(strlen($user_email)<=$min) {

            $errors[] = "Users email is too short, should be longer than $min characters";
        }


        if(!empty($errors)) {
            foreach ($errors as $error) {
                echo "

                <div class='alert alert-danger col-lg-12 text-center mx-auto' role='alert'>
                    $error
                </div>
                <br>";
            }
        }

        if(empty($errors)) {

            $query = "INSERT INTO users (user_firstname, user_lastname, user_email, user_password, user_address, user_country, user_postcode, user_city ) ";
            $query .= "VALUES('{$user_firstname}', '{$user_lastname}', '{$user_email}', '{$user_password}', '{$user_address}', '{$user_country}', '{$user_postcode}', '{$user_city}')";


            $create_user_query = mysqli_query($connection, $query);

            if($create_user_query) {

                alert_text("User has been added", "users.php");
            }
        }
    }
}

function select_user_option(){
    global $connection;
    $query = "SELECT * from users";
    $select_users_query = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_users_query)) {
        $user_id = $row["user_id"];
        $user_firstname = $row["user_firstname"];
        $user_lastname = $row["user_lastname"];
        echo '<option value="'. $user_id.'">
            '. $user_firstname.' '.$user_lastname.'

        </option>';
    }
}
function select_movies_option(){
    global $connection;
    $query = "SELECT * from movies";
    $select_movie_query = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_movie_query)) {
        $movie_id = $row["id"];
        $movie_name = $row["title"];

        echo '<option value="'. $movie_id.'">
            '. $movie_name.'


        </option>';
    }
}
function select_and_display_reviews() {
    global $connection;

    $query = "SELECT * from reviews";
    $select_reviews_query = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_reviews_query)) {
        $review_id = $row["id"];
        $review = $row["review"];
        $movie_review_id = $row["movie_review_id"];
        $user_review_id = $row["user_review_id"];
        $review_date = $row["review_date"];

        $query2 = "SELECT * from users where user_id = $user_review_id";
        $select_users_query = mysqli_query($connection, $query2);
        while($row = mysqli_fetch_assoc($select_users_query)) {
            $user_firstname = $row["user_firstname"];
            $user_lastname = $row["user_lastname"];
            $user_image = $row["user_img"];

        $query3 = "SELECT * from movies where id = $movie_review_id";
        $select_movie_query = mysqli_query($connection, $query3);
        while($row = mysqli_fetch_assoc($select_movie_query)) {

            $movie_review_title = $row["title"];

            echo"<tr>";
            echo "<td>$review_id</td>";
            echo "<td>$review</td>";
            echo "<td>$movie_review_id</td>";
            echo "<td>$movie_review_title</td>";
            echo "<td>$user_review_id</td>";
            echo "<td>$review_date</td>";
            echo "<td>$user_firstname  $user_lastname </td>";

            echo "<td><img class='table_img' width=100 height=100 src='../public/imgs/users_avatars/$user_image'></td>";

            echo "<td><a href='reviews.php?source=edit_reviews&id={$review_id}'>EDIT</a></td>";
            echo "<td > <span class='delete_button'  data-link='reviews.php?delete_review=$review_id'> Delete </span></td>";
            echo"</tr>";
            // <a href='reviews.php?delete_review={$review_id}'>DELETE</a>
        } }


        if(isset($_GET["delete_review"])) {
            $review_to_be_deleted = $_GET["delete_review"];
            $query = "DELETE from reviews WHERE id={$review_to_be_deleted}";
            $delete_review = mysqli_query($connection, $query);
            echo '<script> window.location.href = "reviews.php" </script>';

        }

    }
}
function select_and_display_gallery() {
    global $connection;

    $query = "SELECT * from gallery order by id desc";
    $select_users_query = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_users_query)) {
        $image_id = $row["id"];
        $image_name = $row["image_name"];
        $image_title = $row["image_title"];

        echo"<tr>";
        echo "<td>$image_id</td>";
        echo "<td>$image_name</td>";
        echo "<td>$image_title</td>";
        echo "<td><img class='table_img' width=100 height=100 src='../public/imgs/gallery_cinema/$image_name'></td>";
        echo "<td><a href='gallery.php?source=edit_image&image_id={$image_id}'>EDIT</a></td>";
        echo "<td > <span class='delete_button'  data-link='gallery.php?delete_image=$image_id'> Delete </span></td>";
        // echo "<td><a href='movies.php?delete_movie={$movie_id}'>DELETE</a></td>";
        echo"</tr>";
    }

    if(isset($_GET["delete_image"])) {
        $image_to_be_deleted = $_GET["delete_image"];
        // delete user img
        $query2 = "SELECT * from gallery WHERE id = $image_to_be_deleted";
        $delete_gallery_img = mysqli_query($connection, $query2);
        while($row = mysqli_fetch_assoc($delete_gallery_img)) {
            $gallery_img = $row["image_name"];

            $destination_img_upload = "../public/imgs/gallery_cinema/$gallery_img";

            if (file_exists($destination_img_upload)) {
                unlink($destination_img_upload);

            }
        }

               // delete user record


        $query_delete_gallery_image= "DELETE from gallery WHERE id={$image_to_be_deleted}";
        $query_delete_gallery_image = mysqli_query($connection, $query_delete_gallery_image);

        echo '<script> window.location.href = "gallery.php" </script>';

    }


}
function select_and_display_top_rated_movies() {
    $age_limit = user_logged_age_movies_selection();
    global $connection;
    global $database;

    $age_limit = user_logged_age_movies_selection();
            global $database;
            global $connection;
            $query = $database->query_array("
                SELECT
                    movies.age,
                    movies.title,
                    movies.description,
                    movies.id,
                    movies.poster,
                    movies.trailer_link,
                    movies.year,
                    reviews.review_rating,
                    reviews.movie_review_id
                FROM movies
                INNER JOIN reviews ON movies.id = reviews.movie_review_id
                WHERE movies.age <= $age_limit
                AND reviews.review_rating >= 8 LIMIT 10


        ");

        while ($row = mysqli_fetch_array($query)) {
        $movie_rating = $row["review_rating"];
        $movie_id = $row["id"];
        $movie_title = $row["title"];
        $movie_poster = $row["poster"];

        $movie_age  = $row["age"];
        echo"<tr>";
        echo "<td>$movie_id</td>";
        echo "<td>$movie_title</td>";

        echo "<td> $movie_rating /10</td>";
        echo "<td><img class='table_img' width=100 height=100 src='../public/$movie_poster'></td>";
        echo "<td>$movie_age+</td>";

        }

}









function select_and_display_most_movies() {
    $age_limit = user_logged_age_movies_selection();
    global $connection;
    global $database;

    $query1 = $database->query_array("SELECT * from movies_views order by views DESC LIMIT 10 offset 0");
    while ($row = mysqli_fetch_array($query1)) {
        $movie_id = $row["movie_id"];
        $movie_views = $row["views"];
        $query2 = $database->query_array("SELECT * from movies where id =  $movie_id and movies.age <= $age_limit");

        while ($row = mysqli_fetch_array($query2)) {

        $movie_id = $row["id"];
        $movie_title = $row["title"];
        $movie_poster = $row["poster"];

        $movie_age  = $row["age"];
        echo"<tr>";
        echo "<td>$movie_id</td>";
        echo "<td>$movie_title</td>";

        echo "<td> $movie_views</td>";
        echo "<td><img class='table_img' width=100 height=100 src='../public/$movie_poster'></td>";
        echo "<td>$movie_age+</td>";

        }

    }








}

function select_and_display_movies() {
    global $connection;

    $query = "SELECT * from movies order by id desc";
    $select_users_query = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_users_query)) {
        $movie_id = $row["id"];
        $movie_title = $row["title"];
        $movie_poster = $row["poster"];
        $movie_desc  = $row["description"];
        $movie_trailer_link  = $row["trailer_link"];
        $release_date  = $row["year"];
        $movie_age  = $row["age"];
        echo"<tr>";
        echo "<td>$movie_id</td>";
        echo "<td>$movie_title</td>";
        echo "<td>$release_date</td>";
        echo "<td>$movie_desc</td>";
        echo "<td>$movie_trailer_link</td>";
        echo "<td><img class='table_img' width=100 height=100 src='../public/$movie_poster'></td>";
        echo "<td>$movie_age+</td>";
        echo "<td><a href='movies.php?source=edit_movie&movie_id={$movie_id}'>EDIT</a></td>";
        echo "<td > <span class='delete_button'  data-link='movies.php?delete_movie=$movie_id'> Delete </span></td>";
        // echo "<td><a href='movies.php?delete_movie={$movie_id}'>DELETE</a></td>";
        echo"</tr>";
    }

    if(isset($_GET["delete_movie"])) {
        $movie_to_be_deleted = $_GET["delete_movie"];
        // delete relational column before deleting movie
        $query_delete_movie_genres = "DELETE from movies_genres WHERE movie_id={$movie_to_be_deleted}";
        $delete_movie_genre = mysqli_query($connection, $query_delete_movie_genres);
        // delete movie after deleting relational column

        $query = "DELETE from movies WHERE id={$movie_to_be_deleted}";
        $delete_movie = mysqli_query($connection, $query);

        echo '<script> window.location.href = "movies.php" </script>';

    }


}
function select_and_display_genres() {
    global $connection;

    $query = "SELECT * from genres";
    $select_genres_query = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_genres_query)) {
        $genre_id = $row["id"];
        $genre_name = $row["name"];
        $genre_desc = $row["desc"];
        $category_img = $row["category_img"];

        echo"<tr>";
        echo "<td>$genre_id</td>";
        echo "<td>$genre_name</td>";
        echo "<td>$genre_desc</td>";
        echo "<td><img class='table_img' width=100 height=100 src='../public/$category_img'></td>";
        echo "<td><a href='genres.php?source=edit_genre&genre_id={$genre_id}'>EDIT</a></td>";
        echo "<td > <span class='delete_button'  data-link='genres.php?delete_genre=$genre_id'> Delete </span></td>";
        // echo "<td><a href='genres.php?delete_genre={$genre_id}'>DELETE</a></td>";
        echo"</tr>";
    }

    if(isset($_GET["delete_genre"])) {


        $genre_to_be_deleted = $_GET["delete_genre"];



        // delete user img
        $query2 = "SELECT * from genres WHERE id = $genre_to_be_deleted";
        $delete_genre_img = mysqli_query($connection, $query2);
        while($row = mysqli_fetch_assoc($delete_genre_img)) {
            $category_image = $row["category_img"];

            $destination_img_upload = "../public/$category_image";
            if (file_exists($destination_img_upload)) {
                unlink($destination_img_upload);

            }
        }


        $query = "DELETE from genres WHERE id={$genre_to_be_deleted}";
        $delete_movie = mysqli_query($connection, $query);
        echo '<script> window.location.href = "genres.php" </script>';

    }


}
function select_and_display_bookings() {
    global $connection;
    global $database;
    $query = "SELECT * from bookings";
    $select_genres_query = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_genres_query)) {
        $id = $row["id"];
        $ticket_id = $row["ticket_id"];
        $date_bookings = $row["date_booking"];
        $time_show = $row["time_show"];
        $seat = $row["seat_number"];
        $user_id = $row["user_id"];
        $price = $row["ticket_price"];

        $user_name_query = $database-> query_array("SELECT * from users where user_id = $user_id");
        while($row = mysqli_fetch_assoc($user_name_query)) {
            $user_firstname = $row["user_firstname"];
            $user_lastname = $row["user_lastname"];
        }
        echo"<tr>";
        echo "<td>$id</td>";
        echo "<td>$ticket_id</td>";
        echo "<td>$date_bookings</td>";
        echo "<td>$time_show</td>";
        echo "<td>$price</td>";
        echo "<td>$seat</td>";
        echo "<td>$user_id</td>";
        echo "<td>$user_firstname $user_lastname</td>";




        echo "<td > <span class='delete_button'  data-link='bookings.php?delete_bookings=$id'> Delete </span></td>";
        // echo "<td><a href='genres.php?delete_genre={$genre_id}'>DELETE</a></td>";
        echo"</tr>";
    }

    if(isset($_GET["delete_bookings"])) {


        $id = $_GET["delete_bookings"];




        $query = "DELETE from bookings WHERE id={$id}";
        $delete_movie = mysqli_query($connection, $query);
        echo '<script> window.location.href = "bookings.php" </script>';

    }


}
function select_and_display_posts() {
    global $connection;

    $query = "SELECT * from news";
    $select_genres_query = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_genres_query)) {
        $post_id = $row["id"];
        $post_date = $row["post_date"];
        $post_header = $row["post_header"];
        $post_content = $row["post_desc"];


        $post_img = $row["post_img"];
        $post_subheader = $row["post_subheading"];
        $post_banner = $row["post_banner"];
        $post_author = $row["post_author"];

        $post_content_trimmed = substr($post_content, 0, 50);
        $post_header_trimmed = substr($post_header, 0, 50);
        $post_subheader_trimmed = substr($post_subheader, 0, 50);
        echo"<tr>";
        echo "<td>$post_id</td>";
        echo "<td>$post_date</td>";
        echo "<td>$post_header_trimmed</td>";
        echo "<td>$post_subheader_trimmed</td>";
        echo "<td>$post_content_trimmed</td>";
        echo "<td><img class='table_img text-primary' width='100' height='100' src='../public/imgs/posts/$post_header/$post_img'></td>";
        echo "<td><img class='table_img text-primary ' width=100 height=100 src='../public/imgs/posts/$post_header/$post_banner'></td>";
        echo "<td>$post_author</td>";


        echo "<td class='text-right'><a href='posts.php?source=edit_post&post_id={$post_id}'>EDIT</a></td>";
        // echo "<td><a href='posts.php?delete_post={$post_id}'>DELETE</a></td>";
        echo "<td class='text-right'> <span class='delete_button '  data-link='posts.php?delete_post=$post_id'> Delete </span></td>";
        echo"</tr>";
    }

    if(isset($_GET["delete_post"])) {
        $post_to_be_deleted = $_GET["delete_post"];
        // delete post img
        $query2 = "SELECT * from news WHERE id = $post_to_be_deleted";
        $delete_post_img = mysqli_query($connection, $query2);
        while($row = mysqli_fetch_assoc($delete_post_img)) {


            $destination_img_upload = $row["post_img"];
            if (file_exists($destination_img_upload)) {
                unlink($destination_img_upload);

            }
        }


        $query = "DELETE from news WHERE post_id={$post_to_be_deleted}";
        $delete_post = mysqli_query($connection, $query);
        echo '<script> window.location.href = "posts.php" </script>';

    }


}
function select_and_display_staff() {
    global $connection;

    $query = "SELECT * from staff";
    $select_genres_query = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_genres_query)) {
        $staff_id = $row["id"];
        $staff_lastname = $row["staff_lastname"];
        $staff_firstname = $row["staff_firstname"];
        $staff_description = $row["staff_description"];
        $staff_vocation = $row["staff_vocation"];
        $staff_image = $row["staff_image"];


        echo"<tr>";
        echo "<td>$staff_id</td>";
        echo "<td>$staff_firstname</td>";
        echo "<td>$staff_lastname</td>";
        echo "<td>$staff_description</td>";
        echo "<td>$staff_vocation</td>";
        echo "<td><img class='table_img' width=100 height=100 src='../public/imgs/staff_images/$staff_image'></td>";

        echo "<td><a href='staff.php?source=edit_staff&staff_id={$staff_id}'>EDIT</a></td>";
        // echo "<td><a href='posts.php?delete_post={$post_id}'>DELETE</a></td>";
        echo "<td > <span class='delete_button'  data-link='staff.php?delete_staff=$staff_id'> Delete </span></td>";
        echo"</tr>";
    }

    if(isset($_GET["delete_staff"])) {
        $staff_to_be_deleted = $_GET["delete_staff"];
        $query2 = "SELECT * from staff WHERE id = $staff_to_be_deleted";
        $delete_staff_img = mysqli_query($connection, $query2);
        while($row = mysqli_fetch_assoc($delete_staff_img)) {
            $staff_img = $row["staff_image"];

            $destination_img_upload = "../public/imgs/staff_images/$staff_img";

            if (file_exists($destination_img_upload)) {
                unlink($destination_img_upload);

            }
        }

        // delete user record

        $query = "DELETE from staff WHERE id={$staff_to_be_deleted}";
        $delete_staff = mysqli_query($connection, $query);
        echo '<script> window.location.href = "staff.php" </script>';

    }


}
function select_and_display_forum_posts() {
    global $connection;
    global $database;
    $query = $database->query_array("SELECT * from forum_posts");
    while($row = mysqli_fetch_assoc($query)) {
        $post_id = $row["id"];
        $post_user_id = $row["post_user_id"];
        $post_title = $row["post_title"];
        $post_text = $row["post_text"];
        $post_img = $row["post_img"];
        $post_date = $row["post_date"];
        $post_user_id = $row["post_user_id"];
        $post_date = $row["post_date"];

        $user_name_query = $database-> query_array("SELECT * from users where user_id = $post_user_id");
        while($row = mysqli_fetch_assoc($user_name_query)) {
            $user_firstname = $row["user_firstname"];
            $user_lastname = $row["user_lastname"];
        }
        echo"<tr>";
        echo "<td>$post_id</td>";
        echo "<td>$post_title</td>";
        echo "<td><p>$post_text</p></td>";
        echo "<td> $user_firstname $user_lastname</td>";
        echo "<td><img class='table_img' width=100 height=100 src='../public/$post_img'></td>";
        echo "<td>$post_date</td>";

        echo "<td><a href='forum.php?source=edit_post&post_id={$post_id}'>EDIT</a></td>";
        // echo "<td><a href='posts.php?delete_post={$post_id}'>DELETE</a></td>";
        echo "<td > <span class='delete_button'  data-link='forum.php?delete_post=$post_id'> Delete </span></td>";
        echo"</tr>";
    }

    if(isset($_GET["delete_post"])) {
            $post_to_be_deleted = $_GET["delete_post"];
            // delete user img
            $query2 = "SELECT * from forum_posts WHERE id = $post_to_be_deleted";
            $delete_user_img = mysqli_query($connection, $query2);
            while($row = mysqli_fetch_assoc($delete_user_img)) {
                $user_img = $row["post_img"];

                $destination_img_upload = $user_img;

                if (file_exists($destination_img_upload)) {
                    unlink($destination_img_upload);

                }
            }

            // delete user record

        $query = "DELETE from forum_posts WHERE id={$post_to_be_deleted}";
        $delete_post = mysqli_query($connection, $query);
        echo '<script> window.location.href = "forum.php" </script>';

    }


}

function get_row_count($col_name){
    global $connection;
    $query = "SELECT * FROM $col_name";
    $select_all_records = mysqli_query($connection, $query);
    $row_counts = mysqli_num_rows( $select_all_records);
    // decrement by 1 dont include admin account
    $col_name=="users"? $row_counts=$row_counts-1 : "";
    return $row_counts;
}

function delete_all_notifications_messages(){
    global $connection;

    $query = "DELETE FROM  message_admin_notification";
    $del_not_query = mysqli_query($connection, $query);

}
function show_admin_messages_num_nav(){
    global $connection;
    $num_1 = 1;
    $query = "SELECT * FROM  message_admin_notification";
    $create_msg_query = mysqli_query($connection, $query);
   $number_rows = mysqli_num_rows( $create_msg_query);
   if( $number_rows>=1) {

    echo '<span class="message_num_admin">

    '.$number_rows.'
    </span>';
   }


}

function delete_admin_nots_on_get(){
    if(isset($_GET["delete_nots"])) {
        delete_all_notifications_messages();
        header("Location: admin_messages.php");
    }
}
function show_admin_messages_num(){
    global $connection;
    $num_1 = 1;
    $query = "SELECT * FROM  message_admin_notification";
    $create_msg_query = mysqli_query($connection, $query);
   $number_rows = mysqli_num_rows( $create_msg_query);


    echo $number_rows;




}
function select_and_display_admins_messages() {
    global $connection;

    // Combined query with LEFT JOIN
    $query = "
        SELECT
            m.id, m.message, m.msg_date, m.user_firstname, m.user_lastname, m.user_email,
            n.message_id
        FROM messages_to_admin m
        LEFT JOIN message_admin_notification n ON m.id = n.message_id
        ORDER BY m.msg_date DESC
    ";

    // Execute the query
    $select_messages_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_messages_query)) {
        $id  = $row["id"];
        $message = $row["message"];
        $msg_date = $row["msg_date"];
        $user_firstname = $row["user_firstname"];
        $user_lastname = $row["user_lastname"];
        $user_email = $row["user_email"];
        $message_id = $row["message_id"]; // From the join

        // Add class 'new_message' if the message ID is present in message_admin_notification
        if ($message_id == $id) {
            echo "<tr class='new_message'>";
        } else {
            echo "<tr>";
        }

        // Display message data in table rows
        echo "<td>$id</td>";
        echo "<td>$user_firstname</td>";
        echo "<td>$user_lastname</td>";
        echo "<td>$message</td>";
        echo "<td>$msg_date</td>";
        echo "<td>$user_email</td>";
        echo "<td><a href='admin_messages.php?source=reply_msg&msg_id={$id}'>reply</a></td>";
        echo "<td><span class='delete_button' data-link='admin_messages.php?delete_message=$id'>Delete</span></td>";
        echo "</tr>";
    }






    if(isset($_GET["delete_message"])) {
        $msg_to_be_deleted = $_GET["delete_message"];
        $query = "DELETE from messages_to_admin WHERE id={$msg_to_be_deleted}";
        $delete_msg = mysqli_query($connection, $query);
        $query2 = "DELETE FROM  message_admin_notification where message_id={$msg_to_be_deleted}";
        $del_not_query = mysqli_query($connection, $query2);
        echo '<script> window.location.href = "admin_messages.php" </script>';

    }


}


function select_and_display_tickets() {
    global $connection;
    $query = "SELECT * from movies";
    $select_users_query = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_users_query)) {
        $movie_id = $row["id"];
        $movie_title = $row["title"];


        $query2 = "SELECT * from tickets where ticket_movie_id = $movie_id";
        $select_genres_query = mysqli_query($connection, $query2);
        while($row = mysqli_fetch_assoc($select_genres_query)) {
            $ticket_id = $row["ticket_id"];
            $ticket_movie_id = $row["ticket_movie_id"];
            $ticket_price = $row["ticket_price"];
            $ticket_quantity = $row["ticket_quantity"];


            echo"<tr>";
            echo "<td>$ticket_id</td>";
            echo "<td>$ticket_movie_id</td>";
            echo "<td>$movie_title</td>";

            echo "<td>$ticket_price</td>";
            echo "<td>$ticket_quantity</td>";
            echo "<td><a href='tickets.php?source=edit_ticket&ticket_id={$ticket_id}'>EDIT</a></td>";
            // echo "<td><a href='comments.php?delete_comment={$comment_id}'>DELETE</a></td>";
            echo "<td > <span class='delete_button' data-link='tickets.php?delete_ticket=$ticket_id'> Delete </span></td>";
            echo"</tr>";



        }


    }

    if(isset($_GET["delete_ticket"])) {
        $ticket_to_be_deleted = $_GET["delete_ticket"];
        $query = "DELETE from tickets WHERE ticket_id={$ticket_to_be_deleted}";
        $delete_ticket = mysqli_query($connection, $query);
        echo '<script> window.location.href = "tickets.php" </script>';

    }


}
function select_and_display_tickets_not_assigned() {

    global $connection;


    $query = "SELECT * FROM movies WHERE id NOT IN (SELECT ticket_movie_id FROM tickets)";
    $select_movies_query = mysqli_query($connection, $query);


    // Loop through the results and display the available movies
    while ($row = mysqli_fetch_assoc($select_movies_query)) {
        $movie_id = $row["id"];
        $movie_title = $row["title"];

        echo "<tr>";
        echo "<td>$movie_id</td>";
        echo "<td>$movie_title</td>";
        echo "<td><a href='tickets.php?source=assign_ticket_movie&movie_id={$movie_id}'>Assign</a></td>";
        echo "</tr>";
    }

    if(isset($_GET["delete_ticket"])) {
        $ticket_to_be_deleted = $_GET["delete_ticket"];
        $query = "DELETE from tickets WHERE ticket_id={$ticket_to_be_deleted}";
        $delete_ticket = mysqli_query($connection, $query);
        echo '<script> window.location.href = "tickets.php" </script>';

    }




}


function alert_text($text, $link){
    echo '<div class="alert alert-success alert-dismissible fade text-center show row-custom" role="alert">'
    .$text.'
    <a class="edit-icon" href="'.$link.'">
        <img src="../public/imgs/icons/exit.svg">
    </a>
    </div>';
}
function alert_text_warning($text){
    echo '<div class="alert alert-danger alert-dismissible fade show text-center row-custom" role="alert">'
    .$text.'

    </div>';
}

function display_kinds_options() {
    global $connection;
    global $database;
    // Check if movie_id is set
    if (isset($_GET["movie_id"])) {
        $movie_id = intval($_GET["movie_id"]);

        $result1 = $database->query_array("SELECT movie_kind_id FROM movies_kinds WHERE movie_id = $movie_id");

        $selected_kinds = [];
        while ($row = mysqli_fetch_assoc($result1)) {
            $selected_kinds[] = intval($row["movie_kind_id"]);
        }
        $result2 = $database->query_array("SELECT id, name FROM kinds");


        while ($row = mysqli_fetch_assoc($result2)) {
            $kind_id = intval($row["id"]);
            $kind_name = htmlspecialchars($row["name"], ENT_QUOTES, 'UTF-8');
            $checked = in_array($kind_id, $selected_kinds) ? 'checked' : '';
            if( $kind_name != "popular" &&  $kind_name !="Top Rated") {
                echo '<div>
                <input type="checkbox" name="movie_kinds[]" value="' . $kind_id . '" ' . $checked . ' id="genre_' . $kind_id . '">
                <label for="genre_' . $kind_id . '">' . $kind_name . '</label><br>
              </div>';
            }

        }


    }
}
function display_times_table_options_assigning_ticket() {
    global $connection;

    // Check if movie_id is set
    if (isset($_GET["movie_id"])) {
        $movie_id = intval($_GET["movie_id"]);
        $query = "SELECT * from tickets where ticket_movie_id = $movie_id";
        $find_movie = mysqli_query($connection, $query);
        while($row = mysqli_fetch_array($find_movie)) {
            $ticket_id = $row["ticket_id"];
        }

        $stmt1 = $connection->prepare("SELECT time_id FROM movies_time_tables WHERE movie_id = ?");
        $stmt1->bind_param("i", $movie_id);
        $stmt1->execute();
        $result1 = $stmt1->get_result();

        $selected_times = [];
        while ($row = $result1->fetch_assoc()) {
            $selected_times[] = intval($row["time_id"]);
        }

        // Prepare and execute query to get all times
        $stmt2 = $connection->prepare("SELECT time_id, time FROM time_tables");
        $stmt2->execute();
        $result2 = $stmt2->get_result();

        // Display checkboxes for all genres
        while ($row = $result2->fetch_assoc()) {
            $time_id = intval($row["time_id"]);
            $time= htmlspecialchars($row["time"], ENT_QUOTES, 'UTF-8');
            $checked =  'checked';
            echo '<div>
                    <input  type="checkbox" name="movie_times[]" value="' . $time_id . '" ' . $checked . ' id="genre_' . $time_id . '">
                    <label for="genre_' . $time_id . '">' . $time . '</label><br>
                  </div>';
        }

        // Close statements
        $stmt1->close();
        $stmt2->close();
    }
}


function display_times_table_options() {
    global $connection;

    // Check if movie_id is set
    if (isset($_GET["ticket_id"])) {
        $ticket_id = intval($_GET["ticket_id"]);
        $query = "SELECT * from tickets where ticket_id = $ticket_id";
        $find_movie = mysqli_query($connection, $query);
        while($row = mysqli_fetch_array($find_movie)) {
            $movie_id = $row["ticket_movie_id"];
        }

        $stmt1 = $connection->prepare("SELECT time_id FROM movies_time_tables WHERE movie_id = ?");
        $stmt1->bind_param("i", $movie_id);
        $stmt1->execute();
        $result1 = $stmt1->get_result();

        $selected_times = [];
        while ($row = $result1->fetch_assoc()) {
            $selected_times[] = intval($row["time_id"]);
        }

        // Prepare and execute query to get all times
        $stmt2 = $connection->prepare("SELECT time_id, time FROM time_tables");
        $stmt2->execute();
        $result2 = $stmt2->get_result();

        // Display checkboxes for all genres
        while ($row = $result2->fetch_assoc()) {
            $time_id = intval($row["time_id"]);
            $time= htmlspecialchars($row["time"], ENT_QUOTES, 'UTF-8');
            $checked = in_array($time_id, $selected_times) ? 'checked' : '';
            echo '<div>
                    <input  type="checkbox" name="movie_times[]" value="' . $time_id . '" ' . $checked . ' id="genre_' . $time_id . '">
                    <label for="genre_' . $time_id . '">' . $time . '</label><br>
                  </div>';
        }

        // Close statements
        $stmt1->close();
        $stmt2->close();
    }
}
function display_genres_options() {
    global $connection;

    // Check if movie_id is set
    if (isset($_GET["movie_id"])) {
        $movie_id = intval($_GET["movie_id"]);

        // Prepare and execute query to get genres associated with the movie
        $stmt1 = $connection->prepare("SELECT genre_id FROM movies_genres WHERE movie_id = ?");
        $stmt1->bind_param("i", $movie_id);
        $stmt1->execute();
        $result1 = $stmt1->get_result();

        $selected_genres = [];
        while ($row = $result1->fetch_assoc()) {
            $selected_genres[] = intval($row["genre_id"]);
        }

        // Prepare and execute query to get all genres
        $stmt2 = $connection->prepare("SELECT id, name FROM genres");
        $stmt2->execute();
        $result2 = $stmt2->get_result();

        // Display checkboxes for all genres
        while ($row = $result2->fetch_assoc()) {
            $genre_id = intval($row["id"]);
            $genre_name = htmlspecialchars($row["name"], ENT_QUOTES, 'UTF-8');
            $checked = in_array($genre_id, $selected_genres) ? 'checked' : '';
            echo '<div>
                    <input type="checkbox" name="movie_genre[]" value="' . $genre_id . '" ' . $checked . ' id="genre_' . $genre_id . '">
                    <label for="genre_' . $genre_id . '">' . $genre_name . '</label><br>
                  </div>';
        }

        // Close statements
        $stmt1->close();
        $stmt2->close();
    }
}

function display_kinds_options_add_movie() {
    global $connection;
    global $database;

    $result2 = $database->query_array("SELECT * FROM kinds");


    while ($row = mysqli_fetch_assoc($result2)) {
        $kind_id = $row["id"];
        $kind_name = $row["name"];
        // NOW ALLOWED ASSIGNIG MOVIES TO TOP RATED OR MOST RATED BECAUSE ITS RELATED TO USERS RATINGS AND VIEWS
        if( $kind_name!="popular" && $kind_name!="Top Rated") {
            echo '<div>
            <input type="checkbox" name="movie_kinds[]" value="' . $kind_id . ' id="genre_' . $kind_id . '">
            <label for="genre_' . $kind_id . '">' . $kind_name . '</label><br>
        </div>';
        }

    }



}
function display_genres_options_add_movie() {

    global $connection;

    $query_3 = "SELECT * from genres";
    $select_genres_names_all = mysqli_query($connection, $query_3);
    while($row = mysqli_fetch_assoc($select_genres_names_all)) {
        $genre_id = $row["id"];
        $genre_name = $row["name"];
        echo ' <div> <input type="checkbox" name="movie_genre[]" value="'.$genre_id.'">
        <label for="movie_genre">'.$genre_name.'</label><br>  </div>';
    }


}
function render_faq_table(){
    global $connection;


    $query = "SELECT * FROM faq";
    $search_query = mysqli_query($connection, $query);
    $search_count = mysqli_num_rows($search_query);
    if(!$search_query) {
        die("Query Failed" . mysqli_error($connection));
    }
    if($search_count>=1) {
        while($row = mysqli_fetch_array($search_query)) {
            $question_id = $row["id"];
            $question = $row["question"];
            $answer = $row["answer"];

            echo"<tr>";
            echo "<td>$question_id</td>";
            echo "<td>$question</td>";
            echo "<td>$answer</td>";

            echo "<td><a href='faq.php?source=edit_faq&faq_id={$question_id}'>EDIT</a></td>";
            // echo "<td><a href='faq.php?delete_faq={$question_id}'>DELETE</a></td>";
            echo "<td > <span class='delete_button' data-link='faq.php?delete_faq=$question_id'> Delete </span></td>";
            echo"</tr>";
    }}

    if(isset($_GET["delete_faq"])) {
        $faq_to_be_deleted = $_GET["delete_faq"];
        $query = "DELETE from faq WHERE id={$faq_to_be_deleted}";
        $delete_faq = mysqli_query($connection, $query);
        echo '<script> window.location.href = "faq.php" </script>';

    }

}
function render_quiz_table(){
    global $connection;


    $query = "SELECT * FROM quiz";
    $search_query = mysqli_query($connection, $query);
    $search_count = mysqli_num_rows($search_query);
    if(!$search_query) {
        die("Query Failed" . mysqli_error($connection));
    }
    if($search_count>=1) {
        while($row = mysqli_fetch_array($search_query)) {
            $question_id = $row["id"];
            $question = $row["question"];
            $img_src = $row["img_src"];
            $correct_answer = $row["correct_answer"];
            $choices = $row["choices"];


            echo"<tr>";
            echo "<td>$question_id</td>";
            echo "<td>$question</td>";
            echo "<td> <img style='object-fit: cover'  width='100px' height='100px' src='../public/" . $img_src . "'></td>";

            echo "<td>$correct_answer</td>";
            echo "<td>$choices</td>";


            // echo "<td><a href='faq.php?delete_faq={$question_id}'>DELETE</a></td>";
            echo "<td > <span class='delete_button' data-link='quiz.php?delete_question=$question_id'> Delete </span></td>";
            echo"</tr>";
    }}

    if(isset($_GET["delete_question"])) {
        $question_to_be_deleted = $_GET["delete_question"];
        $query = "DELETE from quiz WHERE id={$question_to_be_deleted}";
        $delete_quiz= mysqli_query($connection, $query);
        echo '<script> window.location.href = "quiz.php" </script>';

    }

}

function edit_movies_genres(){
    global $connection;

    $movie_id_to_be_edited = $_GET["movie_id"];
    // DELETE ALL RELATIONS BEFORE INSERTING NEW
    $query_delete = "DELETE from movies_genres where movie_id = $movie_id_to_be_edited";
    $query_delete_relations_genres_movie = mysqli_query($connection, $query_delete);
    // INSERTING NEW RELATIONS MOVIE_GENRES

    $selected_genres_ids = $_POST['movie_genre'] ?? []; // Using null coalescing operator to ensure $selected_genres_ids is an array

    if (!empty($selected_genres_ids)) {
        foreach ($selected_genres_ids as $genres_id) {
            // Construct the SQL query
            $query2 = "INSERT INTO movies_genres(movie_id, genre_id) ";
            $query2 .= "VALUES('{$movie_id_to_be_edited}', '{$genres_id}')";

            // Execute the query
            $query_insert_movies_genres = mysqli_query($connection, $query2);

            // Check if the query execution was successful
            if (!$query_insert_movies_genres) {
                die("Query failed: " . mysqli_error($connection));
            }
        }
    }

}

function edit_movies_kinds(){
    global $connection;

    $movie_id_to_be_edited = $_GET["movie_id"];
    // DELETE ALL RELATIONS BEFORE INSERTING NEW
    $query_delete_movies_kinds = "DELETE from movies_kinds where movie_id = $movie_id_to_be_edited";
    $query_delete_relations_kinds_movie = mysqli_query($connection, $query_delete_movies_kinds);
    // INSERTING NEW RELATIONS MOVIE_GENRES

    $selected_kinds_ids = $_POST['movie_kinds'] ?? []; // Using null coalescing operator to ensure $selected_genres_ids is an array

    if (!empty($selected_kinds_ids)) {
        foreach ($selected_kinds_ids as $kinds_id) {
            // Construct the SQL query
            $query3 = "INSERT INTO movies_kinds(movie_id, movie_kind_id) ";
            $query3 .= "VALUES('{$movie_id_to_be_edited}', '{$kinds_id}')";

            // Execute the query
            $query_insert_movies_kinds = mysqli_query($connection, $query3);

            // Check if the query execution was successful
            if (!$query_insert_movies_kinds) {
                die("Query failed: " . mysqli_error($connection));
            }
        }
    }
}


function adding_ticket_times_when_assigning($movie_id){
    global $connection;
      // UPDATE TIME TABLES WHEN ASSIGNING MOVIE TICKET
                // DELETE ALL RELATIONS BEFORE INSERTING NEW
                $query_delete_movies_times = "DELETE from movies_time_tables where movie_id = $movie_id";
                $query_delete_times = mysqli_query($connection, $query_delete_movies_times);
                // INSERTING NEW RELATIONS MOVIE_GENRES

                $selected_times_ids = $_POST['movie_times'] ?? []; // Using null coalescing operator to ensure $selected_genres_ids is an array

                if (!empty($selected_times_ids)) {
                    foreach ($selected_times_ids as $times_id) {
                        // Construct the SQL query
                        $query3 = "INSERT INTO movies_time_tables(movie_id, time_id) ";
                        $query3 .= "VALUES('{$movie_id}', '{$times_id}')";

                        // Execute the query
                        $query_insert_movies_kinds = mysqli_query($connection, $query3);

                        // Check if the query execution was successful
                        if (!$query_insert_movies_kinds) {
                            die("Query failed: " . mysqli_error($connection));
                        }
                    }
                }
}
function edit_ticket_times(){
    global $connection;
    if (isset($_GET["ticket_id"])) {
        $ticket_id = intval($_GET["ticket_id"]);
        $query = "SELECT * from tickets where ticket_id = $ticket_id";
        $find_movie = mysqli_query($connection, $query);
        while($row = mysqli_fetch_array($find_movie)) {
            $movie_id_to_be_edited = $row["ticket_movie_id"];
        }
    }

    // DELETE ALL RELATIONS BEFORE INSERTING NEW
    $query_delete_movies_times = "DELETE from movies_time_tables where movie_id = $movie_id_to_be_edited";
    $query_delete_times = mysqli_query($connection, $query_delete_movies_times);
    // INSERTING NEW RELATIONS MOVIE_GENRES

    $selected_times_ids = $_POST['movie_times'] ?? []; // Using null coalescing operator to ensure $selected_genres_ids is an array

    if (!empty($selected_times_ids)) {
        foreach ($selected_times_ids as $times_id) {
            // Construct the SQL query
            $query3 = "INSERT INTO movies_time_tables(movie_id, time_id) ";
            $query3 .= "VALUES('{$movie_id_to_be_edited}', '{$times_id}')";

            // Execute the query
            $query_insert_movies_kinds = mysqli_query($connection, $query3);

            // Check if the query execution was successful
            if (!$query_insert_movies_kinds) {
                die("Query failed: " . mysqli_error($connection));
            }
        }
    }
}

// function delete_user(){
//     global $connection;
//     if(isset($_GET["delete_user"])) {
//         $user_to_be_deleted = $_GET["delete_user"];
//         $query = "DELETE from users WHERE user_id={$user_to_be_deleted}";
//         $delete_user = mysqli_query($connection, $query);
//         header("location: users.php");
//     }
// }


?>