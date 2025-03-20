<?php require_once("helper_functions.php");


function email_order($order_id){
    $new_order = New Order();
    $new_order->order_info_by_order_id($order_id);

    $order_id=$new_order->order_id;
    $transaction_id=$new_order->transaction_id;
    $transaction_status=$new_order->transaction_status;
    $transaction_amount=$new_order->transaction_amount;
    $transaction_currency=$new_order->transaction_currency;
    $transaction_time=$new_order->transaction_time;

    $payer_name=$new_order->payer_name;
    $payer_email=$new_order->payer_email;
    $payer_id=$new_order->payer_id;
    $payer_phone=$new_order->payer_phone;
    $payer_country=$new_order->payer_country;

    $shipping_street=$new_order->shipping_street;
    $shipping_city=$new_order->shipping_city;
    $shipping_state=$new_order->shipping_state;
    $shipping_postal_code=$new_order->shipping_postal_code;
    $shipping_country=$new_order->shipping_country;




    global $database;
    $products_container = '';
    $result_product= $database->query_array("SELECT * FROM order_items where order_id = $order_id");
    while($row = mysqli_fetch_array($result_product)) {
        $product_id = htmlspecialchars($row["product_id"]);
        $product_order = new Product();
        $product_order->create_product($product_id);

        $product_name = htmlspecialchars($product_order->product_name);
        $product_img = htmlspecialchars($product_order->product_img);
        $product_price = htmlspecialchars($row["price"]);
        $product_size= htmlspecialchars($row["size"]);
        $product_quantity = htmlspecialchars($row["quantity"]);

        $products_container.= '
        <tr>
        <td class="column column-1" width="50%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-left: 30px; padding-right: 30px; padding-top: 20px; vertical-align: top;">
             <table class="image_block block-1" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                 <tr>
                     <td class="pad" style="width:100%;padding-right:0px;padding-left:0px;">
                         <div class="alignment" align="center" style="line-height:10px">
                             <div style="max-width: 101.4px;"><img src="https://adriankotyraprojects.co.uk/websites/ecommerce/public/imgs/products/' . $product_name . '/' . $product_img . '" alt="' . $product_name . '" style="display: block; height: auto; border: 0; width: 100%;" width="101.4" alt="a bag of coffee with a design on it" title="a bag of coffee with a design on it" height="auto"></div>
                         </div>
                     </td>
                 </tr>
             </table>
         </td>

         <td class="column column-2" width="50%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-right: 60px; padding-top: 20px; vertical-align: top;">
             <div class="spacer_block block-1" style="height:20px;line-height:20px;font-size:1px;">&#8202;</div>
             <table class="paragraph_block block-2" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
                 <tr>
                     <td class="pad">
                         <div style="color:#f65c03;direction:ltr;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:20px;font-weight:400;letter-spacing:0px;line-height:120%;text-align:left;mso-line-height-alt:24px;">
                             <p style="margin: 0;"><strong>'.$product_name.'</strong></p>
                         </div>
                     </td>
                 </tr>
             </table>
             <table class="paragraph_block block-3" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
                 <tr>
                     <td class="pad" style="padding-bottom:6px;padding-top:6px;">
                         <div style="color:#333333;direction:ltr;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:15px;font-weight:700;letter-spacing:0px;line-height:120%;text-align:left;mso-line-height-alt:18px;">
                             <p style="margin: 0;">Quantity: '.$product_quantity.'</p>
                         </div>
                     </td>
                 </tr>
             </table>
            <table class="paragraph_block block-3" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
                 <tr>
                     <td class="pad" style="padding-bottom:6px;padding-top:6px;">
                         <div style="color:#333333;direction:ltr;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:15px;font-weight:700;letter-spacing:0px;line-height:120%;text-align:left;mso-line-height-alt:18px;">
                             <p style="margin: 0;">Size: '.$product_size.'</p>
                         </div>
                     </td>
                 </tr>
             </table>

             <table class="paragraph_block block-4" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
                 <tr>
                     <td class="pad" style="padding-bottom:6px;padding-top:6px;">
                         <div style="color:#333333;direction:ltr;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:18px;font-weight:700;letter-spacing:0px;line-height:120%;text-align:left;mso-line-height-alt:21.599999999999998px;">
                             <p style="margin: 0;">'.$product_price.' ' .$transaction_currency.'</p>
                         </div>
                     </td>
                 </tr>
             </table>
         </td>
       </tr>';
    }


        $email_content ='
       <!DOCTYPE html>
       <html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="en-US">

       <head>
           <title></title>
           <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
           <meta name="viewport" content="width=device-width, initial-scale=1.0"><!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]--><!--[if !mso]><!-->
           <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@100;200;300;400;500;600;700;800;900" rel="stylesheet" type="text/css"><!--<![endif]-->
           <style>
               * {
                   box-sizing: border-box;
               }

               body {
                   margin: 0;
                   padding: 0;
               }

               a[x-apple-data-detectors] {
                   color: inherit !important;
                   text-decoration: inherit !important;
               }

               #MessageViewBody a {
                   color: inherit;
                   text-decoration: none;
               }

               p {
                   line-height: inherit
               }

               .desktop_hide,
               .desktop_hide table {
                   mso-hide: all;
                   display: none;
                   max-height: 0px;
                   overflow: hidden;
               }

               .image_block img+div {
                   display: none;
               }

               sup,
               sub {
                   font-size: 75%;
                   line-height: 0;
               }

               .row-4 .column-1 .block-1 .button:hover {
                   background-color: #000000 !important;
                   border-bottom: 0 solid transparent !important;
                   border-left: 0 solid transparent !important;
                   border-right: 0px solid transparent !important;
                   border-top: 0 solid transparent !important;
                   color: #ffffff !important;
               }

               @media (max-width:660px) {
                   .desktop_hide table.icons-inner {
                       display: inline-block !important;
                   }

                   .icons-inner {
                       text-align: center;
                   }

                   .icons-inner td {
                       margin: 0 auto;
                   }

                   .image_block div.fullWidth {
                       max-width: 100% !important;
                   }

                   .mobile_hide {
                       display: none;
                   }

                   .row-content {
                       width: 100% !important;
                   }

                   .stack .column {
                       width: 100%;
                       display: block;
                   }

                   .mobile_hide {
                       min-height: 0;
                       max-height: 0;
                       max-width: 0;
                       overflow: hidden;
                       font-size: 0px;
                   }

                   .desktop_hide,
                   .desktop_hide table {
                       display: table !important;
                       max-height: none !important;
                   }

                   .row-3 .column-2 .block-1.divider_block td.pad,
                   .row-3 .column-4 .block-1.divider_block td.pad {
                       padding: 30px 10px 10px !important;
                   }

                   .row-3 .column-2 .block-1.divider_block .alignment table,
                   .row-3 .column-4 .block-1.divider_block .alignment table,
                   .row-7 .column-1 .block-1.divider_block .alignment table {
                       display: inline-table;
                   }

                   .row-3 .column-1 .block-2.paragraph_block td.pad>div,
                   .row-3 .column-3 .block-1.paragraph_block td.pad>div {
                       font-size: 10px !important;
                   }

                   .row-3 .column-1 .block-2.paragraph_block td.pad,
                   .row-6 .row-content {
                       padding: 10px !important;
                   }

                   .row-2 .column-1 .block-1.heading_block h1 {
                       font-size: 30px !important;
                   }

                   .row-3 .column-3 .block-1.paragraph_block td.pad,
                   .row-3 .column-5 .block-1.paragraph_block td.pad {
                       padding: 25px 0 0 !important;
                   }

                   .row-3 .column-5 .block-1.paragraph_block td.pad>div {
                       text-align: center !important;
                       font-size: 10px !important;
                   }

                   .row-5 .column-1 .block-1.heading_block h2 {
                       font-size: 26px !important;
                   }

                   .row-6 .column-2 .block-2.paragraph_block td.pad>div,
                   .row-6 .column-2 .block-3.paragraph_block td.pad>div,
                   .row-6 .column-2 .block-4.paragraph_block td.pad>div {
                       text-align: center !important;
                   }

                   .row-6 .column-2 .block-3.paragraph_block td.pad,
                   .row-6 .column-2 .block-4.paragraph_block td.pad,
                   .row-7 .column-1 .block-1.divider_block td.pad {
                       padding: 10px 0 !important;
                   }

                   .row-7 .column-1 .block-2.paragraph_block td.pad>div,
                   .row-7 .column-1 .block-3.paragraph_block td.pad>div,
                   .row-7 .column-1 .block-4.paragraph_block td.pad>div,
                   .row-7 .column-1 .block-5.paragraph_block td.pad>div,
                   .row-7 .column-1 .block-6.paragraph_block td.pad>div {
                       font-size: 22px !important;
                   }

                   .row-2 .row-content {
                       padding: 30px !important;
                   }

                   .row-4 .row-content {
                       padding: 0 30px 30px !important;
                   }

                   .row-7 .row-content {
                       padding: 15px 30px !important;
                   }

                   .row-3 .column-1 {
                       padding: 10px 0 5px 5px !important;
                   }

                   .row-3 .column-5 {
                       padding: 5px 10px 5px 0 !important;
                   }

                   .row-5 .column-1 {
                       padding: 20px 40px 4px !important;
                   }

                   .row-6 .column-2,
                   .row-7 .column-1 {
                       padding: 0 !important;
                   }
               }
           </style><!--[if mso ]><style>sup, sub { font-size: 100% !important; } sup { mso-text-raise:10% } sub { mso-text-raise:-10% }</style> <![endif]-->
       </head>

       <body class="body" style="background-color: #ffffff; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
           <table class="nl-container" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff;">
               <tbody>
                   <tr>
                       <td>
                           <table class="row row-1" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                               <tbody>
                                   <tr>
                                       <td>
                                           <table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f7f1ed; border-radius: 0 0 20px 20px; color: #000000; width: 640px; margin: 0 auto;" width="640">
                                               <tbody>
                                                   <tr>
                                                       <td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; vertical-align: top;">
                                                           <table class="heading_block block-1" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                                               <tr>
                                                                   <td class="pad">
                                                                       <h1 style="margin: 0; color: #000000; direction: ltr; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 40px; font-weight: 700; letter-spacing: normal; line-height: 180%; text-align: center; margin-top: 0; margin-bottom: 0; mso-line-height-alt: 68.4px;"><span class="tinyMce-placeholder" style="word-break: break-word;">H!-Top Sneakers</span></h1>
                                                                   </td>
                                                               </tr>
                                                           </table>
                                                           <table class="image_block block-2" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                                               <tr>
                                                                   <td class="pad" style="width:100%;padding-right:0px;padding-left:0px;">
                                                                       <div class="alignment" align="center" style="line-height:10px">
                                                                           <div class="fullWidth" style="max-width: 416px;"><img src="https://plus.unsplash.com/premium_photo-1682435561654-20d84cef00eb?q=80&w=2036&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" style="display: block; height: auto; border: 0; width: 100%;" width="416" alt="Logo" title="Logo" height="auto"></div>
                                                                       </div>
                                                                   </td>
                                                               </tr>
                                                           </table>
                                                           <table class="paragraph_block block-3" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
                                                               <tr>
                                                                   <td class="pad">
                                                                       <div style="color:#101112;direction:ltr;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:19px;font-weight:400;letter-spacing:0px;line-height:180%;text-align:center;mso-line-height-alt:34.2px;">

                                                                       </div>
                                                                   </td>

                                                               </tr>
                                                           </table>
                                                       </td>
                                                   </tr>
                                               </tbody>
                                           </table>
                                       </td>
                                   </tr>
                               </tbody>
                           </table>
                           <table class="row row-2" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                               <tbody>
                                   <tr>
                                       <td>
                                           <table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; border-radius: 0; padding: 30px 60px 20px; width: 640px; margin: 0 auto;" width="640">
                                               <tbody>
                                                   <tr>
                                                       <td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 5px; vertical-align: top;">
                                                           <table class="heading_block block-1" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                                               <tr>
                                                                   <td class="pad">
                                                                       <h1 style="margin: 0; color: #000000; direction: ltr; font-size: 34px; font-weight: 800; letter-spacing: -2px; line-height: 120%; text-align: center; margin-top: 30px; margin-bottom: 30px; mso-line-height-alt: 48px;"><span class="tinyMce-placeholder" style="word-break: break-word;">'.$payer_name.' YOUR ORDER WILL BE SHIPPED SOON!</span></h1>
                                                                   </td>
                                                               </tr>
                                                           </table>
                                                       </td>
                                                   </tr>
                                               </tbody>
                                           </table>
                                       </td>
                                   </tr>
                               </tbody>
                           </table>
                           <table class="row row-3" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                               <tbody>
                                   <tr>
                                       <td>
                                           <table class="row-content" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; border-radius: 0; width: 640px; margin: 0 auto;" width="640">
                                               <tbody>
                                                   <tr>
                                                       <td class="column column-1" width="25%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-left: 45px; padding-top: 10px; vertical-align: top;">
                                                           <table class="image_block block-1" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                                               <tr>
                                                                   <td class="pad" style="width:100%;padding-right:0px;padding-left:0px;">
                                                                       <div class="alignment" align="center" style="line-height:10px">
                                                                           <div style="max-width: 11.5px;"><img src="https://d1oco4z2z1fhwp.cloudfront.net/templates/default/8866/check-orange.png" style="display: block; height: auto; border: 0; width: 100%;" width="11.5" alt="Check" title="Check" height="auto"></div>
                                                                       </div>
                                                                   </td>
                                                               </tr>
                                                           </table>
                                                           <table class="paragraph_block block-2" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
                                                               <tr>
                                                                   <td class="pad" style="padding-top:10px;">
                                                                       <div style="color:#000000;direction:ltr;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:18px;font-weight:700;letter-spacing:0px;line-height:120%;text-align:center;mso-line-height-alt:21.599999999999998px;">
                                                                           <p style="margin: 0;">Confirmed</p>
                                                                       </div>
                                                                   </td>
                                                               </tr>
                                                           </table>
                                                       </td>
                                                       <td class="column column-2" width="16.666666666666668%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 5px; vertical-align: top;">
                                                           <table class="divider_block block-1" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                                               <tr>
                                                                   <td class="pad" style="padding-bottom:10px;padding-left:10px;padding-right:10px;padding-top:35px;">
                                                                       <div class="alignment" align="center">
                                                                           <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                                                               <tr>
                                                                                   <td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 2px solid #e1cabf;"><span style="word-break: break-word;">&#8202;</span></td>
                                                                               </tr>
                                                                           </table>
                                                                       </div>
                                                                   </td>
                                                               </tr>
                                                           </table>
                                                       </td>
                                                       <td class="column column-3" width="16.666666666666668%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 5px; vertical-align: top;">
                                                           <table class="paragraph_block block-1" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
                                                               <tr>
                                                                   <td class="pad" style="padding-top:25px;">
                                                                       <div style="color:#e1cabf;direction:ltr;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:18px;font-weight:400;letter-spacing:0px;line-height:120%;text-align:center;mso-line-height-alt:21.599999999999998px;">
                                                                           <p style="margin: 0;">Shipped</p>
                                                                       </div>
                                                                   </td>
                                                               </tr>
                                                           </table>
                                                       </td>
                                                       <td class="column column-4" width="16.666666666666668%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 5px; vertical-align: top;">
                                                           <table class="divider_block block-1" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                                               <tr>
                                                                   <td class="pad" style="padding-bottom:10px;padding-left:10px;padding-right:10px;padding-top:35px;">
                                                                       <div class="alignment" align="center">
                                                                           <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                                                               <tr>
                                                                                   <td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 2px solid #e1cabf;"><span style="word-break: break-word;">&#8202;</span></td>
                                                                               </tr>
                                                                           </table>
                                                                       </div>
                                                                   </td>
                                                               </tr>
                                                           </table>
                                                       </td>
                                                       <td class="column column-5" width="25%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-left: 10px; padding-top: 5px; vertical-align: top;">
                                                           <table class="paragraph_block block-1" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
                                                               <tr>
                                                                   <td class="pad" style="padding-left:10px;padding-top:25px;">
                                                                       <div style="color:#e1cabf;direction:ltr;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:18px;font-weight:400;letter-spacing:0px;line-height:120%;text-align:left;mso-line-height-alt:21.599999999999998px;">
                                                                           <p style="margin: 0;">Delivered</p>
                                                                       </div>
                                                                   </td>
                                                               </tr>
                                                           </table>
                                                       </td>
                                                   </tr>
                                               </tbody>
                                           </table>
                                       </td>
                                   </tr>
                               </tbody>
                           </table>
                           <table class="row row-4" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                               <tbody>
                                   <tr>
                                       <td>
                                           <table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; border-radius: 0; padding: 30px 60px 25px; width: 640px; margin: 0 auto;" width="640">
                                               <tbody>
                                                   <tr>
                                                       <td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 5px; vertical-align: top;">
                                                           <table class="button_block block-1" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                                               <tr>
                                                                   <td class="pad" style="text-align:center;">
                                                                       <div class="alignment" align="center"><a href="www.example.com" target="_blank" style="color:#ffffff;text-decoration:none;">
       <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word"  href="www.example.com"  style="height:42px;width:201px;v-text-anchor:middle;" arcsize="72%" fillcolor="#0d0d0d">
       <v:stroke dashstyle="Solid" weight="0px" color="#f65c03"/>
       <w:anchorlock/>
       <v:textbox inset="0px,0px,0px,0px">
       <center dir="false" style="color:#ffffff;font-family:sans-serif;font-size:16px">

                                                                   </td>
                                                               </tr>
                                                           </table>
                                                       </td>
                                                   </tr>
                                               </tbody>
                                           </table>
                                       </td>
                                   </tr>
                               </tbody>
                           </table>
                           <table class="row row-5" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                               <tbody>
                                   <tr>
                                       <td>
                                           <table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f7f1ed; border-radius: 20px 20px 0 0; color: #000000; width: 640px; margin: 0 auto;" width="640">
                                               <tbody>
                                                   <tr>
                                                       <td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 4px; padding-left: 60px; padding-right: 60px; padding-top: 60px; vertical-align: top;">
                                                           <table class="heading_block block-1" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                                               <tr>
                                                                   <td class="pad">
                                                                       <h2 style="margin: 0; color: #000000; direction: ltr; font-size: 34px; font-weight: 800; letter-spacing: -2px; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0; mso-line-height-alt: 48px;"><span class="tinyMce-placeholder" style="word-break: break-word;">WHATS IN YOUR ORDER?</span></h2>
                                                                   </td>
                                                               </tr>
                                                           </table>
                                                           <table class="paragraph_block block-2" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
                                                               <tr>
                                                                   <td class="pad" style="padding-top:20px;">
                                                                       <div style="color:#000000;direction:ltr;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:18px;font-weight:700;letter-spacing:0px;line-height:120%;text-align:center;mso-line-height-alt:21.599999999999998px;">
                                                                           <p style="margin: 0;">Order Number: '.$transaction_id.'</p>
                                                                       </div>
                                                                   </td>
                                                               </tr>
                                                           </table>
                                                           <div class="spacer_block block-3" style="height:30px;line-height:30px;font-size:1px;">&#8202;</div>
                                                           <table class="divider_block block-4" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                                               <tr>
                                                                   <td class="pad">
                                                                       <div class="alignment" align="center">
                                                                           <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                                                               <tr>
                                                                                   <td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 1px solid #000000;"><span style="word-break: break-word;">&#8202;</span></td>
                                                                               </tr>
                                                                           </table>
                                                                       </div>
                                                                   </td>
                                                               </tr>
                                                           </table>
                                                       </td>
                                                   </tr>
                                               </tbody>
                                           </table>
                                       </td>
                                   </tr>
                               </tbody>
                           </table>
                           <table class="row row-6" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                               <tbody>
                                   <tr>
                                       <td>
                                           <table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f7f1ed; border-radius: 0; color: #000000; padding: 20px; width: 640px; margin: 0 auto;" width="640">
                                               <tbody>


                                                        '.$products_container.'


                                               </tbody>
                                           </table>
                                       </td>
                                   </tr>
                                     <td class="pad">
                <p style="margin: 0; color: #000000; direction: ltr; font-size: 24px; font-weight: 700; letter-spacing: -2px; line-height: 120%; text-align: center; margin-top: 20px; margin-bottom: 20px; mso-line-height-alt: 48px;"><span class="tinyMce-placeholder" style="word-break: break-word;">Total amount: '.$transaction_amount.'</span></p>
                </td>
                               </tbody>
                           </table>

                           <table class="row row-7" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                               <tbody>
                                   <tr>
                                       <td>
                                           <table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f7f1ed; border-radius: 0; color: #000000; width: 640px; margin: 0 auto;" width="640">
                                               <tbody>
                                                   <tr>
                                                       <td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 15px; padding-left: 60px; padding-right: 60px; padding-top: 5px; vertical-align: top;">
                                                           <table class="divider_block block-1" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                                               <tr>
                                                                   <td class="pad" style="padding-bottom:10px;padding-top:10px;">
                                                                       <div class="alignment" align="center">
                                                                           <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                                                               <tr>
                                                                                   <td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 1px solid #000000;"><span style="word-break: break-word;">&#8202;</span></td>
                                                                               </tr>
                                                                           </table>
                                                                       </div>
                                                                   </td>
                                                               </tr>
                                                           </table>
                                                           <table class="paragraph_block block-2" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
                                                               <tr>
                                                                   <td class="pad" style="padding-bottom:20px;padding-top:20px;">
                                                                       <div style="color:#f65c03;direction:ltr;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:16px;font-weight:700;letter-spacing:1px;line-height:120%;text-align:center;mso-line-height-alt:19.2px;">
                                                                           <p style="margin: 0;">SHIPPING TO</p>
                                                                       </div>
                                                                   </td>
                                                               </tr>
                                                           </table>
                                                           <table class="paragraph_block block-3" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
                                                               <tr>
                                                                   <td class="pad" style="padding-bottom:6px;padding-top:6px;">
                                                                       <div style="color:#292725;direction:ltr;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:13px;font-weight:700;letter-spacing:1px;line-height:120%;text-align:center;mso-line-height-alt:15.6px;">
                                                                           <p style="margin: 0;">' .$payer_name.'</p>
                                                                       </div>
                                                                   </td>
                                                               </tr>
                                                           </table>
                                                           <table class="paragraph_block block-4" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
                                                               <tr>
                                                                   <td class="pad" style="padding-bottom:6px;padding-top:6px;">
                                                                       <div style="color:#292725;direction:ltr;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:13px;font-weight:700;letter-spacing:1px;line-height:120%;text-align:center;mso-line-height-alt:15.6px;">
                                                                           <p style="margin: 0;">' .$shipping_country.'</p>
                                                                       </div>
                                                                   </td>
                                                               </tr>
                                                           </table>
                                                           <table class="paragraph_block block-5" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
                                                               <tr>
                                                                   <td class="pad" style="padding-bottom:6px;padding-top:6px;">
                                                                       <div style="color:#292725;direction:ltr;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:13px;font-weight:700;letter-spacing:1px;line-height:120%;text-align:center;mso-line-height-alt:15.6px;">
                                                                           <p style="margin: 0;">' .$shipping_postal_code.'</p>
                                                                       </div>
                                                                   </td>
                                                               </tr>
                                                           </table>
                                                           <table class="paragraph_block block-6" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
                                                               <tr>
                                                                   <td class="pad" style="padding-bottom:6px;padding-top:6px;">
                                                                       <div style="color:#292725;direction:ltr;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:13px;font-weight:700;letter-spacing:1px;line-height:120%;text-align:center;mso-line-height-alt:15.6px;">
                                                                           <p style="margin: 0;">' .$shipping_city.'</p>
                                                                       </div>
                                                                   </td>
                                                               </tr>
                                                           </table>
                                                           <table class="paragraph_block block-6" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
                                                               <tr>
                                                                   <td class="pad" style="padding-bottom:6px;padding-top:6px;">
                                                                       <div style="color:#292725;direction:ltr;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:13px;font-weight:700;letter-spacing:1px;line-height:120%;text-align:center;mso-line-height-alt:15.6px;">
                                                                           <p style="margin: 0;">' .$shipping_state.'</p>
                                                                       </div>
                                                                   </td>
                                                               </tr>
                                                           </table>
                                                       </td>
                                                   </tr>
                                               </tbody>
                                           </table>
                                       </td>
                                   </tr>
                               </tbody>
                           </table>
                           <table class="row row-8" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                               <tbody>
                                   <tr>
                                       <td>
                                           <table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; border-radius: 0; width: 640px; margin: 0 auto;" width="640">
                                               <tbody>
                                                   <tr>
                                                       <td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 5px; vertical-align: top;">
                                                           <table class="empty_block block-1" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                                               <tr>
                                                                   <td class="pad">
                                                                       <div></div>
                                                                   </td>
                                                               </tr>
                                                           </table>
                                                       </td>
                                                   </tr>
                                               </tbody>
                                           </table>
                                       </td>
                                   </tr>
                               </tbody>
                           </table>
                           <table class="row row-9" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                               <tbody>
                                   <tr>
                                       <td>
                                           <table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-radius: 0; color: #000000; padding-bottom: 30px; padding-top: 30px; width: 640px; margin: 0 auto;" width="640">
                                               <tbody>
                                                   <tr>
                                                       <td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top;">
                                                           <table class="empty_block block-1" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                                               <tr>
                                                                   <td class="pad">
                                                                       <div></div>
                                                                   </td>
                                                               </tr>
                                                           </table>
                                                       </td>
                                                   </tr>
                                               </tbody>
                                           </table>
                                       </td>
                                   </tr>
                               </tbody>
                           </table>
                           <table class="row row-10" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                               <tbody>
                                   <tr>
                                       <td>
                                           <table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; border-radius: 0; width: 640px; margin: 0 auto;" width="640">
                                               <tbody>
                                                   <tr>
                                                       <td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top;">
                                                           <table class="empty_block block-1" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                                               <tr>
                                                                   <td class="pad">
                                                                       <div></div>
                                                                   </td>
                                                               </tr>
                                                           </table>
                                                       </td>
                                                   </tr>
                                               </tbody>
                                           </table>
                                       </td>
                                   </tr>
                               </tbody>
                           </table>
                           <table class="row row-11" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                               <tbody>
                                   <tr>
                                       <td>
                                           <table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; border-radius: 0; width: 640px; margin: 0 auto;" width="640">
                                               <tbody>
                                                   <tr>
                                                       <td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 5px; vertical-align: top;">
                                                           <div class="spacer_block block-1" style="height:40px;line-height:40px;font-size:1px;">&#8202;</div>
                                                       </td>
                                                   </tr>
                                               </tbody>
                                           </table>
                                       </td>
                                   </tr>
                               </tbody>
                           </table>
                           <table class="row row-12" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff;">
                               <tbody>
                                   <tr>
                                       <td>
                                           <table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; color: #000000; width: 640px; margin: 0 auto;" width="640">
                                               <tbody>
                                                   <tr>
                                                       <td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 5px; vertical-align: top;">
                                                           <table class="icons_block block-1" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; text-align: center; line-height: 0;">
                                                               <tr>
                                                                   <td class="pad" style="vertical-align: middle; color: #1e0e4b; font-family: "Inter", sans-serif; font-size: 15px; padding-bottom: 5px; padding-top: 5px; text-align: center;"><!--[if vml]><table align="center" cellpadding="0" cellspacing="0" role="presentation" style="display:inline-block;padding-left:0px;padding-right:0px;mso-table-lspace: 0pt;mso-table-rspace: 0pt;"><![endif]-->
                                                                       <!--[if !vml]><!-->
                                                                       <table class="icons-inner" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; display: inline-block; padding-left: 0px; padding-right: 0px;" cellpadding="0" cellspacing="0" role="presentation"><!--<![endif]-->

                                                                       </table>
                                                                   </td>
                                                               </tr>
                                                           </table>
                                                       </td>
                                                   </tr>
                                               </tbody>
                                           </table>
                                       </td>
                                   </tr>
                               </tbody>
                           </table>
                       </td>
                   </tr>
               </tbody>
           </table>
       </body>
    </html>';
    return $email_content;
}