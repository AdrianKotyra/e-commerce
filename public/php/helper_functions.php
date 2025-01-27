<?php  require_once("init.php");

function secure_query_fetch_data($query, $param){
    global $database;
    $category = $database->escape_string(trim($param));
    $stmt = $database->prepare("$query = ?");
    $stmt->bind_param("s", $category); // Bind the category as a string
    $stmt->execute();
    $result_product_type = $stmt->get_result();
    return $result_product_type;
}

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
// ------------------DISPLAY PRODUCTS CATEGORY-----------------------------
function displayCategoryProducts($type_products) {
    global $connection;
    $output = '';
    // Sanitize and escape the category name to prevent SQL injection
    $type_products = mysqli_real_escape_string($connection, $type_products);
    // Retrieve the type ID
    $query = "SELECT * FROM types WHERE type_name = '$type_products'";
    $select_product_types = mysqli_query($connection, $query);
    if (!$select_product_types) {
        die("Query failed: " . mysqli_error($connection));
    }
    // Fetch category ID if it exists
    if ($row = mysqli_fetch_assoc($select_product_types)) {
        $type_id = $row["id"];
        // Retrieve related product IDs
        $query2 = "SELECT * FROM rel_types_products WHERE type_id = $type_id ";

        $select_products = mysqli_query($connection, $query2);
        if (!$select_products) {
            die("Query failed: " . mysqli_error($connection));
        }
        while ($product_row = mysqli_fetch_assoc($select_products)) {
            $prod_id = $product_row["product_id"];

            if(isset($_GET["category"])){
                $category_products_ids = listenCategory();
                if (in_array($prod_id, $category_products_ids)) {
                    $product_new = new Product();
                    $product_new->create_product($prod_id);
                    $output.= $product_new->product_category_card();
                }
            } else {
                $product_new = new Product();
                $product_new->create_product($prod_id);
                $output.= $product_new->product_category_card();
            }
    }
    return $output;

}}




// ------------------GET 4 PRODUCTS OF DETAILED SECTION---------------------
function displayDetailedProducts($type_products) {
    global $connection;
    $output = '';
    // Sanitize and escape the category name to prevent SQL injection
    $type_products = mysqli_real_escape_string($connection, $type_products);
    // Retrieve the type ID
    $query = "SELECT * FROM types WHERE type_name = '$type_products'";
    $select_product_types = mysqli_query($connection, $query);
    if (!$select_product_types) {
        die("Query failed: " . mysqli_error($connection));
    }
    // Fetch category ID if it exists
    if ($row = mysqli_fetch_assoc($select_product_types)) {
        $type_id = $row["id"];
        // Retrieve related product IDs
        $query2 = "SELECT * FROM rel_types_products WHERE type_id = $type_id LIMIT 4 OFFSET 0";

        $select_products = mysqli_query($connection, $query2);
        if (!$select_products) {
            die("Query failed: " . mysqli_error($connection));
        }
        while ($product_row = mysqli_fetch_assoc($select_products)) {
            $prod_id = $product_row["product_id"];

            if(isset($_GET["category"])){
                $category_products_ids = listenCategory();
                if (in_array($prod_id, $category_products_ids)) {
                    $product_new = new Product();
                    $product_new->create_product($prod_id);
                    $output.= $product_new->product_detailed_section_Template();
                }
            } else {
                $product_new = new Product();
                $product_new->create_product($prod_id);
                $output.= $product_new->product_detailed_section_Template();
            }
    }
    return $output;

}}

// ------------------SECTION DETAILED PRODUCTS 5 IMAGES---------------------
function section_detailed_products($type_products) {
    $section =
    '<section class="product-section">
        <div class="product-section-container flex-row wrapper">
            <div class="prod-main-img">
                <img src="./imgs/detailed_section/'.$type_products.'.jpg" />
                <span class="desc-main">
                    <a href="category.php?show='.$type_products.'">
                        <p>'.$type_products.'</p>

                        <button class="button-custom-img">SHOP NOW</button>
                    </a>
                </span>
            </div>

            <div class="prod-sub-imgs">
                '.displayDetailedProducts($type_products).'

            </div>


        </div>


    </section>';


    echo $section;
}
// ------------------SECTION SLIDER---------------------
function section_slider_products($type_products) {
    $section =
    '<section class="trending_section">
        <a href="category.php?show='.$type_products.'">
            <h3 class="section-header">
                '.$type_products.'
            </h3>
        </a>
        <div class="container-section vetical-scroll-grab-class flex-row shopping-row">'
            . displaySliderProducts($type_products) . '
        </div>
    </section>';
    echo $section;
}

// create list of products ids based on GET category
function listenCategory(){

    if(isset($_GET["category"])){
        global $connection;
        $cat_name = $_GET["category"];
        $prod_list_category = [];
        $query_select_cat = "SELECT * FROM categories WHERE cat_name = '$cat_name '";
        $select_cat = mysqli_query($connection, $query_select_cat);
        while ($row = mysqli_fetch_assoc($select_cat)) {
            $cat_id = $row["cat_id"];
            $query_cat_id = "SELECT * FROM rel_categories_products WHERE cat_id = '$cat_id'";
            $select_product_id = mysqli_query($connection, $query_cat_id);
            while ($row = mysqli_fetch_assoc($select_product_id)) {
                $prod_id = $row["prod_id"];
                $prod_list_category[]= $prod_id;
            }

        }

    }
    return  $prod_list_category;
}



// ------------------GET SLIDER PRODUCTS---------------------


function displaySliderProducts($type_products) {
    global $connection;
    $output = '';
    // Sanitize and escape the category name to prevent SQL injection
    $type_products = mysqli_real_escape_string($connection, $type_products);


    // Retrieve the type ID
    $query = "SELECT * FROM types WHERE type_name = '$type_products'";
    $select_product_types = mysqli_query($connection, $query);

    if (!$select_product_types) {
        die("Query failed: " . mysqli_error($connection));
    }

    // Fetch category ID if it exists
    if ($row = mysqli_fetch_assoc($select_product_types)) {
        $type_id = $row["id"];

        // Retrieve related product IDs
        $query2 = "SELECT * FROM rel_types_products WHERE type_id = $type_id";
        $select_products = mysqli_query($connection, $query2);


        if (!$select_products) {
            die("Query failed: " . mysqli_error($connection));
        }


        while ($product_row = mysqli_fetch_assoc($select_products)) {
            $prod_id = $product_row["product_id"];

            if(isset($_GET["category"])){
                $category_products_ids = listenCategory();

                if (in_array($prod_id, $category_products_ids)) {
                    $product_new = new Product();
                    $product_new->create_product($prod_id);

                    $output.= $product_new->product_slider_Template();
                }

            } else {
                $product_new = new Product();
                $product_new->create_product($prod_id);
                $output.= $product_new->product_slider_Template();
            }
    }
    return $output;

}}

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
