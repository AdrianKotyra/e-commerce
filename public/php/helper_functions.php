<?php  require_once("init.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
function send_create_account_email($userName, $activation_code_generate, $email){
   $email_content =
'

<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>

  <!--[if gte mso 9]>
  <xml>
    <o:OfficeDocumentSettings>
      <o:AllowPNG/>
      <o:PixelsPerInch>96</o:PixelsPerInch>
    </o:OfficeDocumentSettings>
  </xml>
  <![endif]-->

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="x-apple-disable-message-reformatting">
  <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge"><!--<![endif]-->

    <!-- Your title goes here -->
    <title>Newsletter</title>
    <!-- End title -->

    <!-- Start stylesheet -->
    <style type="text/css">
      a,a[href],a:hover, a:link, a:visited {
        /* This is the link colour */
        text-decoration: none!important;
        color: #0000EE;
      }
      .link {
        text-decoration: underline!important;
      }
      p, p:visited {
        /* Fallback paragraph style */
        font-size:15px;
        line-height:24px;

        font-weight:300;
        text-decoration:none;
        color: #000000;
      }
      h1 {
        /* Fallback heading style */
        font-size:22px;
        line-height:24px;

        font-weight:normal;
        text-decoration:none;
        color: #000000;
      }
      .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td {line-height: 100%;}
      .ExternalClass {width: 100%;}
    </style>
    <!-- End stylesheet -->

</head>

<body style="text-align: center; margin: 0; padding-top: 10px; padding-bottom: 10px; padding-left: 0; padding-right: 0; -webkit-text-size-adjust: 100%;background-color: #f2f4f6; color: #000000" align="center">

  <!-- Fallback force center content -->
  <div style="text-align: center;">

    <!-- Email not displaying correctly -->
    <table align="center" style="text-align: center; vertical-align: middle; width: 600px; max-width: 600px;" width="600">
      <tbody>
        <tr>
          <td style="width: 596px; vertical-align: middle;" width="596">
          </td>
        </tr>
      </tbody>
    </table>
    <!-- Email not displaying correctly -->

    <!-- Start container for logo -->
    <table align="center" style="text-align: center; vertical-align: top; width: 600px; max-width: 600px; background-color: #ffffff;" width="600">
      <tbody>
        <tr>
          <td style="width: 596px; vertical-align: top; padding-left: 0; padding-right: 0; padding-top: 15px; padding-bottom: 15px;" width="596">
            <p style="font-size: 28px; line-height: 24px;  font-weight: 800; text-decoration: none; color: #919293;">HI TOP-SNEAKERS</p>
          </td>
        </tr>
      </tbody>
    </table>
    <!-- End container for logo -->

    <!-- Hero image -->
   <img
    style="width: 600px; max-width: 600px; height: 350px; max-height: 350px; text-align: center; object-fit: cover;"
    alt="Hero image"
    src="https://images.unsplash.com/photo-1600269452121-4f2416e55c28?q=80&w=1965&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
    align="center"
    width="600"
    height="350"
    />

    <!-- Start single column section -->
    <table align="center" style="text-align: center; vertical-align: top; width: 600px; max-width: 600px; background-color: #ffffff;" width="600";>
        <tbody>
          <tr>
            <td style="width: 596px; vertical-align: top; padding-left: 30px; padding-right: 30px; padding-top: 30px; padding-bottom: 40px;" width="596">
              <h1 style="font-size: 20px; line-height: 24px;   padding: 10px; font-weight: 600; text-decoration: none; color: #000000;">'.$userName.' thank you for registering on our website! </h1>
              <p style="font-size: 19px; line-height:  24px;  padding: 10px; font-weight: 400; text-decoration: none; color: #919293;">To activate your account, please click the link below and enter the provided code:</p>
              <p style="font-size: 25px; line-height:  24px;   padding: 10px; font-weight: 800; text-decoration: none; color: #919293;">'.$activation_code_generate.'</p>

              <a href="https://adriankotyraprojects.co.uk/websites/ecommerce/public/registration_email.php" target="_blank" style="background-color: #000000; font-size: 15px; line-height: 22px; font-weight: normal; text-decoration: none; padding: 12px 15px; color: #ffffff; border-radius: 5px; display: inline-block;">
                Activate account
              </a>

            </td>
          </tr>
        </tbody>
      </table>
    <!-- End single column section -->

  </div>
</body>
</html>
';




require '../composer/vendor/autoload.php'; // Load PHPMailer

$mail = new PHPMailer(true);

try {
    // SMTP Settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.mail.yahoo.com'; // SMTP server (e.g., smtp.gmail.com)
    $mail->SMTPAuth   = true;
    $mail->Username   = '';
    $mail->Password   = '';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use TLS
    $mail->Port       = 587; // Port for TLS (465 for SSL)

    // Email Content
    $mail->setFrom('adriankotyra@yahoo.com', 'H1-Top-Sneakers');
    $mail->addAddress($email, 'New Member');
    $mail->Subject = 'Account confirmation';
    $mail->Body    = $email_content;

    $mail->isHTML(true);
    $mail->send();

} catch (Exception $e) {
    echo "Error: {$mail->ErrorInfo}";
}
}




function get_products_types_nav($category) {
    $type = isset($_GET["type"]) ? $_GET["type"] : '';
    global $connection;

    $query = "SELECT * FROM types;";
    $select_product_types = mysqli_query($connection, $query);

    if (!$select_product_types) {
        die("Query failed: " . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_assoc($select_product_types)) {
        $type_names = $row["type_name"];
        $class_active = ($type == $type_names && isset($_GET["category"]) && $_GET["category"] == $category)
            ? "active-type-class-$category"
            : "";

        echo '<a class="'.$class_active.'" href="category.php?type='.$type_names.'&category='.$category.'">
            <span>'.$type_names.'</span>
        </a>';
    }
}
function format_date($originalDate){

    $formattedDate = date("F j, Y", strtotime($originalDate));
    return $formattedDate;
}

function displayAllcomments($product_id){
    global $connection;

    $query = "SELECT * FROM comments where product_id = $product_id AND approved = 'approved'";
    $select_comments = mysqli_query($connection, $query);
    if(mysqli_num_rows($select_comments)>=1) {
        while ($row = mysqli_fetch_assoc($select_comments)) {
            $comment_id = $row["comment_id"];
            $new_comment = new Comment();
            $new_comment->create_comment($comment_id);
            echo $new_comment->comment_cart();

        }
    }

}



function generate_posts_allposts() {
    global $connection;
    if(isset($_GET["search"])) {
        $searched = $_GET["search"];
        $query = "SELECT * FROM news  where post_header LIKE '%$searched%' order by id desc";
        $select_posts = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($select_posts)) {
            $post_id = $row["id"];
            $new_post = new Post();
            $new_post->create_post($post_id);
            echo $new_post->AllpostsCart();
        }

    }
    else {
        $query = "SELECT * FROM news order by id desc";
        $select_posts = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($select_posts)) {
            $post_id = $row["id"];
            $new_post = new Post();
            $new_post->create_post($post_id);
            echo $new_post->AllpostsCart();
        }
    }


}



function generate_posts_main() {
    global $connection;
    $query = "SELECT * FROM news ORDER BY id DESC LIMIT 3 OFFSET 0";
    $select_posts = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_posts)) {
        $post_id = $row["id"];
        $new_post = new Post();
        $new_post->create_post($post_id);
        echo $new_post->MainPostCart();
    }

}


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

// ------------------DISPLAY all types  PRODUCTS -----------------------------

function get_products_types_select($typeGET){
    global $connection;
    $types = "";
    $checked = '';
    $query = "SELECT * FROM types";
    $select_product_types = mysqli_query($connection, $query);
    if (!$select_product_types) {
        die("Query failed: " . mysqli_error($connection));
    }
    $checked = $typeGET == "all"? "checked" : '';
    $types.='<p class="flex-row size-radio"><input '.$checked.' name="type"type="radio" value="all">all</p>';
    while ($row = mysqli_fetch_assoc($select_product_types)) {
        $type_name = $row["type_name"];
        $checked = $typeGET == $type_name? "checked" : '';
        $types.='<p class="flex-row size-radio"><input '.$checked.' name="type"type="radio" value="'.$type_name.'">'.$type_name.'</p>';
    }
    return $types;
}




// ------------------DISPLAY all sizes PRODUCTS -----------------------------

function displaySizesSelect($sizeGET){
    global $database;
    $checked = '';
    $sizes='';
    $result_sizes = $database->query_array("SELECT * FROM sizes order by size");
    while ($row = mysqli_fetch_array($result_sizes)) {
        $list_sizes[] = $row["size"];
    }
    $checked = $sizeGET == "all"? "checked" : '';
    $sizes.='<p class="flex-row size-radio"><input '.$checked.' name="size"type="radio" value="all">all</p>';
    foreach ($list_sizes as $size ) {
        $checked = $sizeGET == $size? "checked" : '';
        $sizes.=  '<p class="flex-row size-radio"><input '.$checked.' name="size"type="radio" value="'.$size.'">'.$size.'</p>';
    }

    return $sizes;
}


function displayFilters(){
    if(isset($_GET["filter"])) {
        $filter = $_GET["filter"];
    } else {
        $filter = '';
    }
    $checked_price_asc = $filter =="product_price ASC"?  "checked" : '';
    $checked_price_desc = $filter =="product_price DESC"?  "checked" : '';
    $checked_alp_asc = $filter =="product_name ASC"?  "checked" : '';
    $checked_alp_desc = $filter =="product_name DESC"?  "checked" : '';
    $checked_popularity_desc = $filter =="product_views DESC"?  "checked" : '';

    $content = '
    <p class="flex-row filter-radio"><input name="filter"'.$checked_price_asc.' type="radio" value="product_price ASC">PRICE, LOW TO HIGH</p>
    <p class="flex-row filter-radio"><input name="filter"'.$checked_price_desc.' type="radio" value="product_price DESC">PRICE, HIGH TO LOW</p>
    <p class="flex-row filter-radio"><input name="filter"'.$checked_alp_asc.' type="radio" value="product_name ASC">Alphabetically, Z-A</p>
    <p class="flex-row filter-radio"><input name="filter"'.$checked_alp_desc.' type="radio" value="product_name DESC">Alphabetically, A-Z</p>
    <p class="flex-row sfilter-radio"><input name="filter" '.$checked_popularity_desc.' type="radio" value="product_views DESC">POPULARITY</p>';
    echo $content;

}



// ------------------DISPLAY searched PRODUCTS -----------------------------
function displaySearchedProducts() {
    global $connection;
    $output = '';

    if (isset($_GET["search"])) {
        $searched = $_GET["search"];
        $list_products_ids = [];


        $query = "SELECT * FROM products WHERE product_name LIKE '%$searched%'";
        $searched_products = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($searched_products)) {
            $prod_id = $row["product_id"];
            $include_product = true;  // Flag to decide if product should be included

            // Filter by category if set
            if (isset($_GET["category"]) && $_GET["category"] != "mixed") {
                $category_products_ids = listenCategory();
                if (!in_array($prod_id, $category_products_ids)) {
                    $include_product = false;
                }
            }

            // Filter by type if set
            if ($include_product && isset($_GET["type"]) && $_GET["type"] != "all") {
                $list_of_products_ids_in_type = get_Products_list_ids_by_type_name();
                if (!in_array($prod_id, $list_of_products_ids_in_type)) {
                    $include_product = false;
                }
            }

            // Filter by size if set
            if ($include_product && isset($_GET["size"]) && $_GET["size"] != "all") {
                $list_of_products_ids_in_size = get_Products_list_ids_by_size();
                if (!in_array($prod_id, $list_of_products_ids_in_size)) {
                    $include_product = false;
                }
            }



            // Add product to the list if it passes filters
            if ($include_product) {
                $list_products_ids[] = $prod_id;
            }
        }

      // FILTER products

      if (isset($_GET["filter"])) {
        $filter_get = $_GET["filter"];
        if (is_array($list_products_ids) && count($list_products_ids) > 0) {
            $in_clause = "(" . implode(",", array_map("intval", $list_products_ids)) . ")";
            $query3 = "SELECT product_id FROM products WHERE product_id IN $in_clause ORDER BY $filter_get";
            $select_products_filtered = mysqli_query($connection, $query3);

            if ($select_products_filtered) {
                $output = '';
                while ($row = mysqli_fetch_assoc($select_products_filtered)) {
                    $product_id_filtered = $row["product_id"];
                    $product_new = new Product();
                    $product_new->create_product($product_id_filtered);
                    $output .= $product_new->product_category_card();
                }
            }

        }


    }

    else {
        foreach ($list_products_ids as $product_id) {
        $product_new = new Product();
        $product_new->create_product($product_id);
        $output .= $product_new->product_category_card();

        }

    }

    return $output;
}

return;
}


// ------------------DISPLAY PRODUCTS CATEGORY-----------------------------
function displayCategoryProducts($type_products) {
    $list_products_ids = [];
    global $connection;
    $output = '';

    $query = "SELECT * FROM types WHERE type_name = '$type_products'";
    $select_product_types = mysqli_query($connection, $query);


    if ($row = mysqli_fetch_assoc($select_product_types)) {
        $type_id = $row["id"];
        // Retrieve related product IDs
        $query2 = "SELECT * FROM rel_types_products WHERE type_id = $type_id ";
        $select_products = mysqli_query($connection, $query2);

        while ($product_row = mysqli_fetch_assoc($select_products)) {
            $prod_id = $product_row["product_id"];
            $include_product = true;  // Flag to decide if product should be included

            // Filter by category if set
            if (isset($_GET["category"]) && $_GET["category"] != "mixed") {
                $category_products_ids = listenCategory();
                if (!in_array($prod_id, $category_products_ids)) {
                    $include_product = false;
                }
            }


            // Filter by size if set
            if ($include_product && isset($_GET["size"]) && $_GET["size"] != "all") {
                $list_of_products_ids_in_size = get_Products_list_ids_by_size();
                if (!in_array($prod_id, $list_of_products_ids_in_size)) {
                    $include_product = false;
                }
            }



            // Add product to the list if it passes filters
            if ($include_product) {
                $list_products_ids[] = $prod_id;
            }
        }

        // Display products

        // FILTER products

        if (isset($_GET["filter"])) {
            $filter_get = $_GET["filter"];
            if (is_array($list_products_ids) && count($list_products_ids) > 0) {
                $in_clause = "(" . implode(",", array_map("intval", $list_products_ids)) . ")";
                $query3 = "SELECT product_id FROM products WHERE product_id IN $in_clause ORDER BY $filter_get";
                $select_products_filtered = mysqli_query($connection, $query3);

                if ($select_products_filtered) {
                    $output = '';
                    while ($row = mysqli_fetch_assoc($select_products_filtered)) {
                        $product_id_filtered = $row["product_id"];
                        $product_new = new Product();
                        $product_new->create_product($product_id_filtered);
                        $output .= $product_new->product_category_card();
                    }
                }

            }


        }

        else {
            foreach ($list_products_ids as $product_id) {
            $product_new = new Product();
            $product_new->create_product($product_id);
            $output .= $product_new->product_category_card();

            }

        }

        return $output;
    }

    return;
}




// ------------------GET 4 PRODUCTS OF DETAILED SECTION---------------------
function displayDetailedProducts($type_products) {
    global $connection;
    $output = '';
    $counter = 1;
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
            // GET ONLY 4 PRODUCTS by creating counter and incrementing counter


            if(isset($_GET["category"]) && $_GET["category"]!="mixed"){
                $category_products_ids = listenCategory();

                if (in_array($prod_id, $category_products_ids) && $counter<=4) {
                    $counter+=1;
                    $product_new = new Product();
                    $product_new->create_product($prod_id);
                    $output.= $product_new->product_detailed_section_Template();
            } }

            else {

                if($counter<=4) {
                    $counter+=1;
                    $product_new = new Product();
                    $product_new->create_product($prod_id);
                    $output.= $product_new->product_detailed_section_Template();
                }

            }
    }
    return $output;

}}

function generate_product_grid_sizes($product_instance){
    if($product_instance->product_category =="female") {
        $chosen_grid = 'women-grid';
    }
    else {
        $chosen_grid = 'men-grid';
    }
    return $chosen_grid;
}

function generate_sizes_html($product_instance, $tag){
            // Generate the list of sizes as HTML
            $sizes_html = '';
            $chosen_grid = '';
            $chosen_cat_sizes_list = '';
            $all_sizes_men_list = [3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14];
            $all_sizes_women_list = [2, 3, 4, 5, 6, 7, 8, 9];
            $currentPage= basename($_SERVER['PHP_SELF']);
            $available_size_color_class = '';

            if($product_instance->product_category =="female") {
            $chosen_cat_sizes_list = $all_sizes_women_list;
            $available_size_color_class = "available-size-female";
            }
            else if($product_instance->product_category =="male") {
                $chosen_cat_sizes_list = $all_sizes_men_list;
                $available_size_color_class = "available-size-male";
            }
            else {

                $chosen_cat_sizes_list = $all_sizes_men_list;
                $available_size_color_class = "available-size-uni";

            }
             if (!empty($product_instance->product_sizes_list)) {
                 foreach ($chosen_cat_sizes_list as $size) {
                     // creating class to hightlight avilable sizes based on if size is in avilable sizes of product and then addings attributes
                     $available_class = in_array($size, $product_instance->product_sizes_list)? "available-size $available_size_color_class " : '';
                     $available_attribute = in_array($size, $product_instance->product_sizes_list)? 'selected data-prod-id="' . $product_instance->product_id . '" data-prod-size="' . $size . '"'
                         : '';
                     $sizes_html .= '<'.$tag.' ' . $available_attribute . ' class="size-item ' . $available_class . '" value='.htmlspecialchars($size).'>' . htmlspecialchars($size) . '</'.$tag.'>';
                 }
             }

    return $sizes_html;
}
// ------------------SECTION DETAILED PRODUCTS 5 IMAGES---------------------
function section_detailed_products($type_products) {

    if(isset($_GET["category"])) {

        $category = $_GET["category"];

        $img_src = '<img src="./imgs/detailed_section/'.$type_products.'_'.$category.'.jpg" />';



    }
    else {
        $img_src = '<img src="./imgs/detailed_section/'.$type_products.'_mix.jpg" />';
    }

    $section =
    '<section class="product-section">
        <div class="product-section-container flex-row wrapper">
            <div class="prod-main-img">
                '.$img_src.'
                <span class="desc-main">
                    <a href="category.php?type='.$type_products.'">
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
        <a href="category.php?type='.$type_products.'">
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
// ------------------SECTION SLIDER---------------------
function section_slider_trending() {
    $section =
    '<section class="trending_section">
        <a href="category.php?type=Trending">
            <h3 class="section-header">
                Trending
            </h3>
        </a>
        <div class="container-section vetical-scroll-grab-class flex-row shopping-row">'
            . displayTrendyProducts(8) . '
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
// create list of products ids based on GET type
function get_Products_list_ids_by_type_name() {
    if(isset($_GET["type"])) {
        global $connection;
        $type_name =  $_GET["type"];

        $list_prod_ids = [];
        $type_products =  $_GET["type"];
        $query = "SELECT * FROM types WHERE type_name = '$type_name'";
        $select_product_types = mysqli_query($connection, $query);

        while ($product_row = mysqli_fetch_assoc($select_product_types)) {
            $type_id = $product_row["id"];

            $query2 = "SELECT * FROM rel_types_products WHERE type_id = $type_id ";
            $select_products = mysqli_query($connection, $query2);
            while ($product_row = mysqli_fetch_assoc($select_products)) {
                $prod_id = $product_row["product_id"];
                $list_prod_ids[] = $prod_id;
            }
        }
        }

        return  $list_prod_ids;


}
// create list of products ids based on size GET
function get_Products_list_ids_by_size() {
    if(isset($_GET["size"])) {
        global $connection;
        $size =  $_GET["size"];

        $list_prod_ids = [];
        $size =  $_GET["size"];
        $query = "SELECT * FROM sizes WHERE size =  $size";
        $select_sizes = mysqli_query($connection, $query);

        while ($product_row = mysqli_fetch_assoc($select_sizes)) {
            $size_id = $product_row["id"];

            $query2 = "SELECT * FROM rel_products_sizes WHERE size_id = $size_id ";
            $select_products = mysqli_query($connection, $query2);
            while ($product_row = mysqli_fetch_assoc($select_products)) {
                $prod_id = $product_row["prod_id"];
                $list_prod_ids[] = $prod_id;
            }
        }
    }

    return  $list_prod_ids;


}
// ------------------GET trendy PRODUCTS by views---------------------
function displayTrendyProducts($LIMIT) {
    global $connection;
    $output = '';
    $query = "SELECT * FROM products ORDER BY product_views DESC LIMIT $LIMIT OFFSET 0";
    $select_products_by_views = mysqli_query($connection, $query);

    while ($product_row = mysqli_fetch_assoc($select_products_by_views)) {
        $prod_id = $product_row["product_id"];

        if(isset($_GET["category"]) && $_GET["category"]!="mixed"){
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
}






// ------------------GET SLIDER PRODUCTS---------------------


function displaySimilarProducts($type_products,  $limit, $prod_id_displated_prod) {
    global $connection;
    $output = '';

    $counter = 1;
    // take_first_index_of_list_of_product_types
    $type_products_selected = $type_products[0];
    print_r($type_products[0]);
    // Retrieve the type ID
    $query = "SELECT * FROM types WHERE type_name = '$type_products_selected'";
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

            if(isset($_GET["category"]) && $_GET["category"]!="mixed"){
                $category_products_ids = listenCategory();

                if (in_array($prod_id, $category_products_ids) &&  $counter<=$limit) {
                    $counter+= 1;
                    $product_new = new Product();

                    // make sure products are different that the one displayed

                    if($prod_id!=$prod_id_displated_prod) {
                        $product_new->create_product($prod_id);

                        $output.= $product_new->product_similar_card();
                    }

                }

            }
    }
    return $output;

}}


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

            if(isset($_GET["category"]) && $_GET["category"]!="mixed"){
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
            <a class="user-container-profile login-icon login-trigger">
                <i class="fa-regular fa-user"></i>
            </a>
            <div class="login-nav-link login-trigger">
                <span class="login-nav">
                    LOG IN
                </span>

            </div>


            ';
    }
    if ($session->signed_in===true && $user-> user_status=="admin") {
        echo '

        <a class="login-nav-link" href="../admin/dashboard.php">
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
                '.$user-> user_firstname.'
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
