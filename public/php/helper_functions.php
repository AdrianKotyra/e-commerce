<?php  require_once("init.php");


function log_out(){
if(isset($_GET["logout"])) {
    global $session;
    $session ->log_out();

}

}
function Redirect_Not_Logged_User() {
    global $session;
    if ($session->signed_in===false) {
        Header('Location: index.php');
    }




}
function slider_section_category_products($category_products) {
    $section =
    '<section class="trending_section">
        <h3 class="section-header">
            '.$category_products.'
        </h3>
        <div class="container-section vetical-scroll-grab-class flex-row shopping-row">'
            . displaySliderProducts($category_products) . '
        </div>
    </section>';
    echo $section;
}

function displaySliderProducts($cat_name) {
    global $connection;
    $output = '';
    // Sanitize and escape the category name to prevent SQL injection
    $cat_name = mysqli_real_escape_string($connection, $cat_name);

    // Retrieve the category ID
    $query = "SELECT cat_id FROM categories WHERE cat_name = '$cat_name'";
    $select_categories = mysqli_query($connection, $query);

    if (!$select_categories) {
        die("Query failed: " . mysqli_error($connection));
    }

    // Fetch category ID if it exists
    if ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row["cat_id"];

        // Retrieve related product IDs
        $query2 = "SELECT prod_id FROM rel_categories_products WHERE cat_id = $cat_id";
        $select_products = mysqli_query($connection, $query2);

        if (!$select_products) {
            die("Query failed: " . mysqli_error($connection));
        }


        while ($product_row = mysqli_fetch_assoc($select_products)) {
            $prod_id = $product_row["prod_id"];

            $product_new = new Product();
            $product_new->create_product($prod_id);

            $output.= $product_new->product_slider_Template();

        }
    }
    return $output;

}

function login_User_link(){
    global $session;
    global $user;
    if ($session->signed_in===false) {
        echo '
            <a href="login.php" class="user-container-profile login-icon">
                <i class="fa-regular fa-user"></i>
            </a>
            <a class="login-nav-link" href="login.php">
                <span class="login-nav">
                    LOG IN
                </span>

            </a>';
    }
    if ($session->signed_in===true && $user-> user_status=="admin") {
        echo '
         <a href="../admin/index.php" class="user-container-profile login-icon">
            <i class="fa-regular fa-user"></i>
        </a>
        <a class="login-nav-link" href="../admin/index.php">
            <span class="login-nav">
                ADMIN
            </span>

        </a>';
    }


    if ($session->signed_in===true && $user-> user_status=="member") {
        echo '
        <a href="account.php" class="user-container-profile login-icon">
            <i class="fa-regular fa-user"></i>
        </a>
        <a class="login-nav-link" href="account.php">
            <span class="login-nav">
                MY ACCOUNT
            </span>

        </a>';
    }
}


function account_update_details(){

    global $connection;
    global $user;
    $message = '';
    $errors = [];
    $min = 3;
    $max = 26;

    $user_id       =  $user->user_id;
    $user_password =  $_POST['user_password'];
    $user_firstname = $_POST['first_name'];
    $user_lastname =  $_POST['last_name'];
    $user_email    =  $_POST['email'];


    $user_postal =  $_POST['postal'];
    $user_city =  $_POST['city'];
    $user_address =  $_POST['address'];
    $user_country =  $_POST['country'];


    if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "invalid email format";
    }

    if (strpbrk($user_firstname, '0123456789')) {

        $errors[] = "Username can not include numbers";
    }
    if (strpbrk($user_lastname, '0123456789')) {

        $errors[] = "Lastname can not include numbers";
    }
    if(strlen($user_address)<=$min) {

        $errors[] = "Users address is too short, should be longer than $min characters";
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
             $message .='<div class="alert alert-danger text-center" role="alert">
            '.$error.'
            </div>';
        }
    } else {

        $query_update = "UPDATE users SET ";
        $query_update .= "user_email = '{$user_email}', ";
        $query_update .= "user_lastname = '{$user_lastname}', ";
        $query_update .= "user_firstname = '{$user_firstname}', ";
        $query_update .= "user_password = '{$user_password}', ";
        $query_update .= "user_address = '{$user_address}', ";
        $query_update .= "user_country = '{$user_country}', ";
        $query_update .= "user_postcode = '{$user_postal}', ";
        $query_update .= "user_city = '{$user_city}' ";
        $query_update .= "WHERE user_id = {$user_id}";


        $update_user = mysqli_query($connection, $query_update);
        if ($update_user) {
            $message = '<div class="alert alert-success text-center" role="alert">
            Details Updated
            </div>';

        } else {
            $message = "Error updating details: " . mysqli_error($connection);
        }


    }

    return $message;

}

















?>
