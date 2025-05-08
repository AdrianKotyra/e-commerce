<?php  require_once("init.php");
require_once("email_order.php");
// Load mailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once __DIR__ . '/../vendor/autoload.php';
// Load the .env file
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
function send_create_account_email($user_firstname,  $verifyLink, $activation_code_generate, $user_email){



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
              <h1 style="font-size: 20px; line-height: 24px;   padding: 10px; font-weight: 600; text-decoration: none; color: #000000;">'.$user_firstname.' thank you for registering on our website! </h1>
              <p style="font-size: 19px; line-height:  24px;  padding: 10px; font-weight: 400; text-decoration: none; color: #919293;">To activate your account, please click the link below and enter the provided code:</p>
              <p style="font-size: 25px; line-height:  24px;   padding: 10px; font-weight: 800; text-decoration: none; color: #919293;">'.$activation_code_generate.'</p>

              <a href="'.$verifyLink.'" target="_blank" style="background-color: #000000; font-size: 15px; line-height: 22px; font-weight: normal; text-decoration: none; padding: 12px 15px; color: #ffffff; border-radius: 5px; display: inline-block;">
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





$EMAIL_ENV = $_ENV['EMAIL'] ?? null;
$PASSWORD_ENV = $_ENV['PASS'] ?? null;
$mail = new PHPMailer(true);

try {
    // SMTP Settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.mail.yahoo.com'; // SMTP server (e.g., smtp.gmail.com)
    $mail->SMTPAuth   = true;
    $mail->Username   = $EMAIL_ENV;
    $mail->Password   = $PASSWORD_ENV;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use TLS
    $mail->Port       = 587; // Port for TLS (465 for SSL)

    // Email Content
    $mail->setFrom($EMAIL_ENV, 'H1-Top-Sneakers');
    $mail->addAddress($user_email, 'New Member');
    $mail->Subject = 'Account confirmation';
    $mail->Body    = $email_content;

    $mail->isHTML(true);
    $mail->send();

} catch (Exception $e) {
    echo "Error: {$mail->ErrorInfo}";
}
}
function send_password_reminder($user_firstname,  $verifyLink, $user_email){



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
               <h1 style="font-size: 20px; line-height: 24px;   padding: 10px; font-weight: 600; text-decoration: none; color: #000000;">'.$user_firstname.' you requested password reset! </h1>
               <p style="font-size: 19px; line-height:  24px;  padding: 10px; font-weight: 400; text-decoration: none; color: #919293;">To reset password please click the link below :</p>


               <a href="'.$verifyLink.'" target="_blank" style="background-color: #000000; font-size: 15px; line-height: 22px; font-weight: normal; text-decoration: none; padding: 12px 15px; color: #ffffff; border-radius: 5px; display: inline-block;">
                 Reset password
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





 $EMAIL_ENV = $_ENV['EMAIL'] ?? null;
 $PASSWORD_ENV = $_ENV['PASS'] ?? null;
 $mail = new PHPMailer(true);

 try {
     // SMTP Settings
     $mail->isSMTP();
     $mail->Host       = 'smtp.mail.yahoo.com'; // SMTP server (e.g., smtp.gmail.com)
     $mail->SMTPAuth   = true;
     $mail->Username   = $EMAIL_ENV;
     $mail->Password   = $PASSWORD_ENV;
     $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use TLS
     $mail->Port       = 587; // Port for TLS (465 for SSL)

     // Email Content
     $mail->setFrom($EMAIL_ENV, 'H1-Top-Sneakers');
     $mail->addAddress($user_email, 'New Member');
     $mail->Subject = 'Reset Password';
     $mail->Body    = $email_content;

     $mail->isHTML(true);
     $mail->send();

 } catch (Exception $e) {
     echo "Error: {$mail->ErrorInfo}";
 }
 }
function send_account_created($userName, $email){



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
     src="https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
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
               <p style="font-size: 19px; line-height:  24px;  padding: 10px; font-weight: 400; text-decoration: none; color: #919293;">Your account has been create successfuly</p>


             </td>
           </tr>
         </tbody>
       </table>
     <!-- End single column section -->

   </div>
 </body>
 </html>
 ';





 $EMAIL_ENV = $_ENV['EMAIL'] ?? null;
 $PASSWORD_ENV = $_ENV['PASS'] ?? null;
 $mail = new PHPMailer(true);

 try {
     // SMTP Settings
     $mail->isSMTP();
     $mail->Host       = 'smtp.mail.yahoo.com'; // SMTP server (e.g., smtp.gmail.com)
     $mail->SMTPAuth   = true;
     $mail->Username   = $EMAIL_ENV;
     $mail->Password   = $PASSWORD_ENV;
     $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use TLS
     $mail->Port       = 587; // Port for TLS (465 for SSL)

     // Email Content
     $mail->setFrom($EMAIL_ENV, 'H1-Top-Sneakers');
     $mail->addAddress($email, 'New Member');
     $mail->Subject = 'Account Created';
     $mail->Body    = $email_content;

     $mail->isHTML(true);
     $mail->send();

 } catch (Exception $e) {
     echo "Error: {$mail->ErrorInfo}";
 }
 }
 function send_account_reset_password($email){



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
     src="https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
     align="center"
     width="600"
     height="350"
     />

     <!-- Start single column section -->
     <table align="center" style="text-align: center; vertical-align: top; width: 600px; max-width: 600px; background-color: #ffffff;" width="600";>
         <tbody>
           <tr>
             <td style="width: 596px; vertical-align: top; padding-left: 30px; padding-right: 30px; padding-top: 30px; padding-bottom: 40px;" width="596">
               <h1 style="font-size: 20px; line-height: 24px;   padding: 10px; font-weight: 600; text-decoration: none; color: #000000;">Your password has been reset successfully! </h1>



             </td>
           </tr>
         </tbody>
       </table>
     <!-- End single column section -->

   </div>
 </body>
 </html>
 ';





 $EMAIL_ENV = $_ENV['EMAIL'] ?? null;
 $PASSWORD_ENV = $_ENV['PASS'] ?? null;
 $mail = new PHPMailer(true);

 try {
     // SMTP Settings
     $mail->isSMTP();
     $mail->Host       = 'smtp.mail.yahoo.com'; // SMTP server (e.g., smtp.gmail.com)
     $mail->SMTPAuth   = true;
     $mail->Username   = $EMAIL_ENV;
     $mail->Password   = $PASSWORD_ENV;
     $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use TLS
     $mail->Port       = 587; // Port for TLS (465 for SSL)

     // Email Content
     $mail->setFrom($EMAIL_ENV, 'H1-Top-Sneakers');
     $mail->addAddress($email, 'New Member');
     $mail->Subject = 'Reset Password';
     $mail->Body    = $email_content;

     $mail->isHTML(true);
     $mail->send();

 } catch (Exception $e) {
     echo "Error: {$mail->ErrorInfo}";
 }
 }
function send_invoice($order_id, $email){

 $email_content = email_order($order_id);
 $EMAIL_ENV = $_ENV['EMAIL'] ?? null;
 $PASSWORD_ENV = $_ENV['PASS'] ?? null;
 $mail = new PHPMailer(true);

 try {
     // SMTP Settings
     $mail->isSMTP();
     $mail->Host       = 'smtp.mail.yahoo.com'; // SMTP server (e.g., smtp.gmail.com)
     $mail->SMTPAuth   = true;
     $mail->Username   = $EMAIL_ENV;
     $mail->Password   = $PASSWORD_ENV;
     $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use TLS
     $mail->Port       = 587; // Port for TLS (465 for SSL)

     // Email Content
     $mail->setFrom($EMAIL_ENV, 'H1-Top-Sneakers');
     $mail->addAddress($email, 'New Member');
     $mail->Subject = 'Order confirmation';
     $mail->Body    = $email_content;

     $mail->isHTML(true);
     $mail->send();

 } catch (Exception $e) {
     echo "Error: {$mail->ErrorInfo}";
 }
 }
function galleryAboutImages(){
    global $connection;
    $query = "SELECT * FROM gallery limit 4 offset 0";
    $select_brands = mysqli_query($connection, $query);

    if (!$select_brands) {
        die("Query failed: " . mysqli_error($connection));
    }
    $counter = 0;
    while ($row = mysqli_fetch_assoc($select_brands)) {
        $img_src = $row["img_src"];
        $img_title = $row["img_title"];
        $counter +=1;
        $col_size = '';
        if($counter==1){
            $col_size = "col-lg-8";
        }
        if($counter==2){
            $col_size = "col-lg-4";
        }
        if($counter==3){
            $col_size = "col-lg-6";
        }
        if($counter==4){
            $col_size = "col-lg-6";
        }
        $logo_company_icon = '

            <div class="'.$col_size.' col-gallery-img">
                <span class="gallery-img-desc">
                    '.$img_title.'
                </span>
                <a href="gallery.php">
                    <img src="./imgs/gallery/'.$img_src.'" alt="">
                </a>
            </div>

        ';

        echo $logo_company_icon;

    }

}
function galleryMainImages(){
    global $connection;
    $query = "SELECT * FROM gallery ";
    $select_brands = mysqli_query($connection, $query);

    if (!$select_brands) {
        die("Query failed: " . mysqli_error($connection));
    }
    $counter = 0;
    while ($row = mysqli_fetch_assoc($select_brands)) {
        $img_src = $row["img_src"];
        $img_id = ["id"];
        $img_title = $row["img_title"];
        $counter +=1;
        $col_size = '';
        if($counter==1){
            $col_size = "col-lg-8";
        }
        if($counter==2){
            $col_size = "col-lg-4";
        }
        if($counter==3){
            $col_size = "col-lg-6";
        }
        if($counter==4){
            $col_size = "col-lg-6";
        }
        if ($counter == 4) {
            $counter = 0;
        }
        $logo_company_icon = '

            <a href="./imgs/gallery/'.$img_src.'" class="animate-on-scroll '.$col_size.' col-gallery-img" data-fancybox="1" data-caption="'.$img_title.'" data-fancybox-index="1">
                <span class="gallery-img-desc">
                    '.$img_title.'
                </span>

                <img src="./imgs/gallery/'.$img_src.'" alt="">

            </a>

        ';

        echo $logo_company_icon;

    }

}
function display_brands_section(){
    global $connection;
    $query = "SELECT * FROM brands";
    $select_brands = mysqli_query($connection, $query);

    if (!$select_brands) {
        die("Query failed: " . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_assoc($select_brands)) {
        $brand_name = $row["brand_name"];
        $brand_id = $row["id"];
        $logo_img = $row["logo"];

        $logo_company_icon = '
            <a href="category.php?type=all&category=mixed&size=all&type=all&brand='.$brand_id.'">
                <div class="brand-logo">
                    <img src="./imgs/brands/'.$logo_img.'">


                </div>
            </a>

        ';

        echo $logo_company_icon;

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
function pagination_main_products($col_name, $per_page, $product_id){
    global $connection;
    $query_select_cols = "SELECT COUNT(*) as count FROM $col_name where product_id = $product_id";
    $result = mysqli_query($connection, $query_select_cols);
    $row = mysqli_fetch_assoc($result);
    $total_items = (int) $row['count'];
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $totalPages = ceil($total_items / $per_page);
    $page = max(1, min($totalPages, $page));
    $start = ($page - 1) * $per_page;
    return $start;

}
function pagination_links_main_products($col_name, $per_page, $product_id){
    global $connection;

    $query_select_cols = "SELECT COUNT(*) as count FROM $col_name where product_id = $product_id";
    $result = mysqli_query($connection, $query_select_cols);
    $row = mysqli_fetch_assoc($result);
    $total_items = (int) $row['count'];
    $totalPages = ceil($total_items / $per_page);

    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    // Build the base URL without "page" parameter
    $params = $_GET;
    unset($params['page']); // remove old page param if exists
    $base_url = basename($_SERVER['PHP_SELF']) . '?' . http_build_query($params);

    if (!empty($params)) {
        $base_url .= '&'; // if other params exist, add &
    }

    echo "<div class='pagination-container'>";
    echo "<div class='pagination-container-pages'>";

    for($i = 1; $i <= $totalPages; $i++) {
        $pagination_link_class = $i == $page ? "active_link_pagination" : "";
        echo '<a class="'.$pagination_link_class.'" href="'.$base_url.'page='.$i.'">'.$i.'</a> ';
    }
    echo "</div>";

    if ($page > 1) {
        echo '<a href="'.$base_url.'page=' . ($page - 1) . '">Prev</a> ';
    }
    if ($page < $totalPages) {
        echo '<a href="'.$base_url.'page=' . ($page + 1) . '">Next</a>';
    }

    echo "</div>";
}
function pagination_main_wishlist_account($col_name, $per_page, $user_id){
    global $connection;
    $query_select_cols = "SELECT COUNT(*) as count FROM $col_name where user_id =  $user_id";
    $result = mysqli_query($connection, $query_select_cols);
    $row = mysqli_fetch_assoc($result);
    $total_items = (int) $row['count'];
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $totalPages = ceil($total_items / $per_page);
    $page = max(1, min($totalPages, $page));
    $start = ($page - 1) * $per_page;
    return $start;

}
function pagination_main_wishlist_account_links($col_name, $per_page, $user_id){
    global $connection;

    $query_select_cols = "SELECT COUNT(*) as count FROM $col_name where user_id =  $user_id";
    $result = mysqli_query($connection, $query_select_cols);
    $row = mysqli_fetch_assoc($result);
    $total_items = (int) $row['count'];
    $totalPages = ceil($total_items / $per_page);

    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    // Build the base URL without "page" parameter
    $params = $_GET;
    unset($params['page']); // remove old page param if exists
    $base_url = basename($_SERVER['PHP_SELF']) . '?' . http_build_query($params);

    if (!empty($params)) {
        $base_url .= '&'; // if other params exist, add &
    }

    echo "<div class='pagination-container'>";
    echo "<div class='pagination-container-pages'>";

    for($i = 1; $i <= $totalPages; $i++) {
        $pagination_link_class = $i == $page ? "active_link_pagination" : "";
        echo '<a class="'.$pagination_link_class.'" href="'.$base_url.'page='.$i.'">'.$i.'</a> ';
    }
    echo "</div>";

    if ($page > 1) {
        echo '<a href="'.$base_url.'page=' . ($page - 1) . '">Prev</a> ';
    }
    if ($page < $totalPages) {
        echo '<a href="'.$base_url.'page=' . ($page + 1) . '">Next</a>';
    }

    echo "</div>";
}
function pagination_main_orders_account($col_name, $per_page, $user_id){
    global $connection;
    $query_select_cols = "SELECT COUNT(*) as count FROM $col_name where user_db_id =  $user_id";
    $result = mysqli_query($connection, $query_select_cols);
    $row = mysqli_fetch_assoc($result);
    $total_items = (int) $row['count'];
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $totalPages = ceil($total_items / $per_page);
    $page = max(1, min($totalPages, $page));
    $start = ($page - 1) * $per_page;
    return $start;

}
function pagination_main_orders_account_links($col_name, $per_page, $user_id){
    global $connection;

    $query_select_cols = "SELECT COUNT(*) as count FROM $col_name where user_db_id =  $user_id";
    $result = mysqli_query($connection, $query_select_cols);
    $row = mysqli_fetch_assoc($result);
    $total_items = (int) $row['count'];
    $totalPages = ceil($total_items / $per_page);

    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    // Build the base URL without "page" parameter
    $params = $_GET;
    unset($params['page']); // remove old page param if exists
    $base_url = basename($_SERVER['PHP_SELF']) . '?' . http_build_query($params);

    if (!empty($params)) {
        $base_url .= '&'; // if other params exist, add &
    }

    echo "<div class='pagination-container'>";
    echo "<div class='pagination-container-pages'>";

    for($i = 1; $i <= $totalPages; $i++) {
        $pagination_link_class = $i == $page ? "active_link_pagination" : "";
        echo '<a class="'.$pagination_link_class.'" href="'.$base_url.'page='.$i.'">'.$i.'</a> ';
    }
    echo "</div>";

    if ($page > 1) {
        echo '<a href="'.$base_url.'page=' . ($page - 1) . '">Prev</a> ';
    }
    if ($page < $totalPages) {
        echo '<a href="'.$base_url.'page=' . ($page + 1) . '">Next</a>';
    }

    echo "</div>";
}
function format_date($originalDate){

    $formattedDate = date("F j, Y", strtotime($originalDate));
    return $formattedDate;
}

function displayAllcomments($product_id, $start, $per_page){
    global $connection;

    $query = "SELECT * FROM comments where product_id = $product_id AND approved = 'approved' order by comment_date desc limit $per_page OFFSET $start ";
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
        if(mysqli_num_rows($select_posts)>=1) {
            while ($row = mysqli_fetch_assoc($select_posts)) {
                $post_id = $row["id"];
                $new_post = new Post();
                $new_post->create_post($post_id);
                echo $new_post->AllpostsCart();
            }
        }
        else {
            echo "No results";
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
    $query = "SELECT * FROM news ORDER BY id DESC LIMIT 6 OFFSET 0";
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

function displayBrandsSelect($brandGET) {
    global $database;
    $brands_selects = '';
    $list_brands = [];

    // Fetch all brands
    $result_sizes = $database->query_array("SELECT * FROM brands ORDER BY id");

    if ($result_sizes) {
        foreach ($result_sizes as $row) {
            $list_brands[] = [
                "brand_id" => $row["id"],
                "brand_name" => $row["brand_name"]
            ];
        }
    }

    // Default "all" option
    $checked = ($brandGET == "all") ? "checked" : '';
    $brands_selects .= '<p class="flex-row size-radio"><input ' . $checked . ' name="brand" type="radio" value="all">All</p>';

    // Generate radio buttons for brands
    foreach ($list_brands as $brand) {
        $checked = ($brandGET == $brand["brand_id"]) ? "checked" : '';
        $brands_selects .= '<p class="flex-row size-radio">
                                <input ' . $checked . ' name="brand" type="radio" value="' . $brand["brand_id"] . '">' . htmlspecialchars($brand["brand_name"]) . '
                            </p>';
    }

    return $brands_selects;
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


function getSearched_product_count(){
    if (isset($_GET["search"])) {
        global $connection;
        $searched = $_GET["search"];


        $query = "SELECT * FROM products WHERE product_name LIKE '%$searched%'";
        $searched_products = mysqli_query($connection, $query);

        $count_rows = mysqli_num_rows( $searched_products);
        return $count_rows;
    }
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
            // Filter by brand if set
            if (isset($_GET["brand"])&& $_GET["brand"] != "all" ){
                $brands_products_ids = listBrands();
                if (!in_array($prod_id, $brands_products_ids)) {
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

        } else {
            $output= "No results";
        }


    }

    else {
        if(empty($list_products_ids)) {
            $output= "No results";
        }
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

    // Secure Query Preparation
    $type_products_safe = mysqli_real_escape_string($connection, $type_products);

    // If type is "all", select all types
    if ($type_products_safe == "all") {
        $query = "SELECT * FROM types";
    }
    // Else select a specific type based on the name
    else {
        $query = "SELECT * FROM types WHERE type_name = '$type_products_safe'";
    }

    $select_product_types = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_product_types)) {
        $type_id = $row["id"];

        // Retrieve related product IDs based on type_id
        $query2 = "SELECT product_id FROM rel_types_products WHERE type_id = $type_id";
        $select_products = mysqli_query($connection, $query2);

        while ($product_row = mysqli_fetch_assoc($select_products)) {
            $prod_id = $product_row["product_id"];
            $include_product = true;  // Flag to decide if product should be included

            // Filter by category if set
            if (isset($_GET["category"]) && $_GET["category"] != "mixed") {
                $category_products_ids = listenCategory(); // Assuming listenCategory() fetches the category IDs
                if (!in_array($prod_id, $category_products_ids)) {
                    $include_product = false;
                }
            }

            // Filter by brand if set
            if (isset($_GET["brand"]) && $_GET["brand"] != "all") {
                $brands_products_ids = listBrands(); // Assuming listBrands() fetches brand IDs
                if (!in_array($prod_id, $brands_products_ids)) {
                    $include_product = false;
                }
            }

            // Filter by size if set
            if ($include_product && isset($_GET["size"]) && $_GET["size"] != "all") {
                $list_of_products_ids_in_size = get_Products_list_ids_by_size(); // Assuming this fetches size-related product IDs
                if (!in_array($prod_id, $list_of_products_ids_in_size)) {
                    $include_product = false;
                }
            }

            // Add product to the list if it passes filters
            if ($include_product) {
                if (!in_array($prod_id, $list_products_ids)) {
                    $list_products_ids[] = $prod_id;
                }
            }
        }
    }

    // Display products

    // FILTER products if filter is set
    if (isset($_GET["filter"])) {
        $filter_get = mysqli_real_escape_string($connection, $_GET["filter"]);
        if (count($list_products_ids) > 0) {
            $in_clause = "(" . implode(",", array_map("intval", $list_products_ids)) . ")";
            $query3 = "SELECT product_id FROM products WHERE product_id IN $in_clause ORDER BY $filter_get";
            $select_products_filtered = mysqli_query($connection, $query3);

            if ($select_products_filtered) {
                while ($row = mysqli_fetch_assoc($select_products_filtered)) {
                    $product_id_filtered = $row["product_id"];
                    $product_new = new Product();
                    $product_new->create_product($product_id_filtered);
                    $output .= $product_new->product_category_card();
                }
            }
        } else {
            echo "no results";
        }
    }
    // Else display all products without filtering
    else {
        if(empty($list_products_ids)) {
            echo "no results";
        }
        else {
            foreach ($list_products_ids as $product_id) {
                $product_new = new Product();
                $product_new->create_product($product_id);
                $output .= $product_new->product_category_card();
            }
        }

    }

    return $output;
}


    function nav_account($section_name){
    $account_navigation = '
      <section class="account-details account-info">

    <h1 class="header-title-small" >'.$section_name.'</h1>
    <section class="account-details account-info">
    <div class="accordion-item account-mobile-menu">
            <h2 class="accordion-header" id="desc2">
                <div class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <h1 class="header-title-small-mobile " >'.$section_name.'</h1>
                    <img src="./imgs/icons/arrow-down-accordian.svg" alt="">
                </div>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="desc2" data-bs-parent="#accordionExample">
                <div class="accordion-body faq-prod-desc">
                <div class="grid-setting-links">
                <div class="grid-link-col">
                    <a href="account.php?show=orders">
                        <div class="grid-link-icon">
                        <i   i class="fa-regular fa-credit-card"></i>
                        </div>
                        <span> My Orders</span>
                    </a>
                </div>
                <div class="grid-link-col">
                    <a href="account.php?show=details">
                        <div class="grid-link-icon">
                            <i class="fa-regular fa-user"></i>
                        </div>
                        <span>My Details</span>
                    </a>
                </div>
                <div class="grid-link-col">
                    <a href="account.php?show=contact">
                        <div class="grid-link-icon">
                            <i class="fa-regular fa-comment"></i>
                        </div>
                        <span>Contact us</span>
                    </a>
                </div>
                <div class="grid-link-col">
                    <a href="account.php?show=faq">
                        <div class="grid-link-icon">
                            <i class="fa-regular fa-circle-question"></i>
                        </div>
                        <span>FAQ</span>
                    </a>
                </div>
            </div>
                </div>
            </div>
        </div>


    </section>
    ';
    return $account_navigation;

}


function generateToken() {
    return bin2hex(random_bytes(32)); // Secure random 64-character token
}

function hashToken($token) {
    return hash('sha256', $token);
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


            if (isset($_GET["category"]) && ($_GET["category"] == "female" || $_GET["category"] == "male" || $_GET["category"] == "unisex")) {
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

            }
            else if($product_instance->product_category =="male") {
                $chosen_cat_sizes_list = $all_sizes_men_list;

            }
            else {
                $chosen_cat_sizes_list = $all_sizes_men_list;


            }
             if (!empty($product_instance->product_sizes_list)) {
                 foreach ($chosen_cat_sizes_list as $size) {
                     // creating class to hightlight avilable sizes based on if size is in avilable sizes of product and then addings attributes
                     $available_class = in_array($size, $product_instance->product_sizes_list)? "available-size " : '';
                     $available_attribute = in_array($size, $product_instance->product_sizes_list)? 'selected data-prod-id="' . $product_instance->product_id . '" data-prod-size="' . $size . '"'
                         : '';
                     $sizes_html .= '<'.$tag.' ' . $available_attribute . ' class="size-item ' . $available_class . '" value='.htmlspecialchars($size).'>' . htmlspecialchars($size) . '</'.$tag.'>';
                 }
             }

    return $sizes_html;
}
// ------------------SECTION DETAILED PRODUCTS 5 IMAGES---------------------
function section_detailed_products($type_products) {

    if (isset($_GET["category"]) && ($_GET["category"] == "female" || $_GET["category"] == "male" || $_GET["category"] == "unisex")) {

        $category = $_GET["category"]? $_GET["category"] : "";

        $img_src = '<img loading="lazy" src="./imgs/detailed_section/'.$type_products.'_'.$category.'.WEBP" />';



    }
    else {
        $img_src = '<img loading="lazy" src="./imgs/detailed_section/'.$type_products.'_mix.WEBP" />';
    }
    if (isset($_GET["category"])){
        $cat_link = '&category='.$_GET["category"].'&size=all&type=Outdoor+Shoes&brand=all';
    }
    else {
        $cat_link = '';
    }
    $section =
    '<section class="product-section">
        <div class="product-section-container flex-row wrapper">
            <div class="prod-main-img">
                '.$img_src.'
                <span class="desc-main">
                    <a href="category.php?type='.$type_products.$cat_link.'">
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
    if (isset($_GET["category"])){
        $cat_link = '&category='.$_GET["category"].'&size=all&type='.$type_products.'&brand=all';
    }
    else {
        $cat_link = '';
    }
    $section =
    '<section class="trending_section wrapper">
        <a href="category.php?type='.$type_products.$cat_link.'">
            <h3 class="section-header">
                '.$type_products.'
            </h3>
        </a>

        <div class="card-slider">'
        . displaySliderProducts($type_products) . '
        </div>
    </section>';
    echo $section;
}
// ------------------SECTION SLIDER---------------------
function section_slider_trending() {
    if (isset($_GET["category"])){
        $cat_link = '&category='.$_GET["category"].'&size=all&type=all&filter=product_views+DESC';
    }
    else {
        $cat_link = '&category=mixed&size=all&type=all&brand=all&filter=product_views+DESC';
    }
    $section =
    '<section class="trending_section wrapper">
        <a href="category.php?type=all'.$cat_link.'">
            <h3 class="section-header">
                Trending
            </h3>
        </a>
        <div class="card-slider">'
            . displayTrendyProducts(8) . '
        </div>
    </section>';
    echo $section;
}
// create list of products ids based on GET category
function listenCategory($product_category=null){
    global $connection;
    if(isset($_GET["category"])){

        $cat_name = $_GET["category"];
    }
    if($product_category!=null) {
        $cat_name = $product_category;
    }
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


return  $prod_list_category;
}

// create list of products ids based on brands
function listBrands(){

    if(isset($_GET["brand"])){
        global $connection;
        $brand_id = $_GET["brand"];
        $prod_list_brands = [];
        $query_select_cat = "SELECT product_id FROM rel_products_brands WHERE brand_id = '$brand_id '";
        $select_products_ids = mysqli_query($connection, $query_select_cat);
        while ($row = mysqli_fetch_assoc($select_products_ids)) {
            $product_id = $row["product_id"];

            $prod_list_brands[]= $product_id;


        }

    }
    return  $prod_list_brands;
}
// create list of products ids based on GET type
function get_Products_list_ids_by_type_name() {
    if(isset($_GET["type"])) {
        global $connection;
        $type_name =  $_GET["type"];

        $list_prod_ids = [];
        $type_products =  $_GET["type"];
        if( $type_name!="all") {
            $query = "SELECT * FROM types WHERE type_name = '$type_name'";
        }
        else {
            $query = "SELECT * FROM types";
        }

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

        $product_new = new Product();
        $product_new ->create_product($prod_id_displated_prod);
        $product_category =    $product_new->product_category;


        while ($product_row = mysqli_fetch_assoc($select_products)) {
            $prod_id = $product_row["product_id"];

            $category_products_ids = listenCategory($product_category);

            if (in_array($prod_id, $category_products_ids) &&  $counter<=$limit) {
                $counter+= 1;


                // make sure products are different that the one displayed

                if($prod_id!=$prod_id_displated_prod) {
                    $product_new->create_product($prod_id);

                    $output.= $product_new->product_similar_card();
                }

            }


    }
    return $output;

}}
// ----------------get newest products-------------------------------
function displayNewest() {
    global $connection;
     $output = '';



        $query = "SELECT product_id FROM products  order by product_id  DESC LIMIT 8  OFFSET 0";
        $select_products = mysqli_query($connection, $query);

        $new_list_products = [];
        if (!$select_products) {
            die("Query failed: " . mysqli_error($connection));
        }


        while ($product_row = mysqli_fetch_assoc($select_products)) {
            $prod_id = $product_row["product_id"];

            if (isset($_GET["category"]) && ($_GET["category"] == "female" || $_GET["category"] == "male" || $_GET["category"] == "unisex")) {
                $category_products_ids = listenCategory();
                // sort ids in desc order before checking if id in list
                $sorted[] =  rsort($category_products_ids);
                if (in_array($prod_id, $sorted)) {
                    $product_new = new Product();
                    $product_new->create_product($prod_id);
                    $name = $product_new->product_name;
                    $img1 = $product_new->product_img;
                    $output .=
                    '<div class="swiper-slide">
                        <figure class="slide-bgimg" loading="lazy"></figure>
                        <img loading="lazy" src="./imgs/products/'.$name.'/'.$img1.'" />

                        <div class="content">
                            <a href="products.php?show='.$prod_id.'">
                            <p class="title">'.$name.'</p>
                            </a>


                        </div>
                    </div>';
                }

            } else {
                $product_new = new Product();
                $product_new->create_product($prod_id);
                $name = $product_new->product_name;
                $id = $product_new->product_id;
                $img1 = $product_new->product_img;
                $output .= '<div class="swiper-slide">
                <figure class="slide-bgimg" loading="lazy"></figure>
                <img loading="lazy" src="./imgs/products/'.$name.'/'.$img1.'" />

                <div class="content">
                    <a href="products.php?show='.$id.'">
                    <p class="title">'.$name.'</p>
                    </a>


                </div>
            </div>';

            }
    }
    return $output;

}

// GET HERO SLIDER LIMITED PRODUCTS
function displaySliderHeroProducts($type_products) {
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

            if (isset($_GET["category"]) && ($_GET["category"] == "female" || $_GET["category"] == "male" || $_GET["category"] == "unisex")) {
                $category_products_ids = listenCategory();

                if (in_array($prod_id, $category_products_ids)) {
                    $product_new = new Product();
                    $product_new->create_product($prod_id);

                    $output .= $product_new->product_hero_slider();
                }
            } else {
                $product_new = new Product();
                $product_new->create_product($prod_id);
                $output .= $product_new->product_hero_slider();
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

            if (isset($_GET["category"]) && ($_GET["category"] == "female" || $_GET["category"] == "male" || $_GET["category"] == "unisex")) {
                $category_products_ids = listenCategory();

                if (in_array($prod_id, $category_products_ids)) {
                    $product_new = new Product();
                    $product_new->create_product($prod_id);

                    $output .= $product_new->product_slider_Template();
                }
            } else {
                $product_new = new Product();
                $product_new->create_product($prod_id);
                $output .= $product_new->product_slider_Template();
            }

    }
    return $output;

}}

function display_nav_brands($category="mixed"){
    global $connection;
    $query2 = "SELECT * FROM brands LIMIT 12 OFFSET 0";
    $select_brands = mysqli_query($connection, $query2);


    if (!$select_brands) {
        die("Query failed: " . mysqli_error($connection));
    }


    while ($product_row = mysqli_fetch_assoc($select_brands)) {
        $brand_name = $product_row["brand_name"];
        $brand_id = $product_row["id"];
        echo '<a href="  category.php?type=all&category='.$category.'&size=all&type=all&brand='.$brand_id.'"class="nav-brands-links">
        '.$brand_name .'

        </a>';
    }

}
function display_nav_cats(){
    global $connection;
    $query2 = "SELECT * FROM types";
    $select_types = mysqli_query($connection, $query2);


    if (!$select_types) {
        die("Query failed: " . mysqli_error($connection));
    }

    echo '<a href="category.php?type=all&category=mixed&size=all&brand=all" class="nav-brands-links">
    ALL';

    while ($row = mysqli_fetch_assoc($select_types)) {
        $type_name = $row["type_name"];
        $type_id = $row["id"];
        echo '<a href="category.php?type='.$type_name.'&category=mixed&size=all&brand=all" class="nav-brands-links">
        '.$type_name .'

        </a>';
    }

}
function login_User_link(){
    global $session;
    global $user;
    if ($session->signed_in===false) {
        echo '
        <div class="nav-link-wrapper">
            <a class="user-container-profile login-icon login-trigger">
                <span class="login-nav-link login-trigger wide-screen-nav-link-desc">Log in</span>
                <i class="fa-regular fa-user nav-icon"></i>
            </a>


        </div>';
    }
    if ($session->signed_in===true && $user-> user_status=="admin") {
        echo '
        <div class="nav-link-wrapper">
        <a href="../admin/dashboard.php" class="user-container-profile login-icon">
            <i class="fa-regular fa-user nav-icon"></i>
        </a>
        <a class="login-nav-link" href="../admin/dashboard.php">
            <span class="login-nav wide-screen-nav-link-desc">
                ADMIN
            </span>

        </a>
                </div>
        ';
    }


    if ($session->signed_in===true && $user-> user_status=="member") {
        echo '
            <div class="nav-link-wrapper">

        <a class="login-nav-link" href="account.php">
            <span class="login-nav wide-screen-nav-link-desc">
                '.$user-> user_firstname.'
            </span>

        </a>
           <a href="account.php" class="user-container-profile login-icon">
            <i class="fa-regular fa-user nav-icon"></i>
        </a>
        </div>';
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
