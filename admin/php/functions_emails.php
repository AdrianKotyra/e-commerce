<?php

require_once  '../public/vendor/autoload.php';
// Load the .env file
   // Load mailer
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable("../public/php");
$dotenv->load();
function sendReplyMsg($email, $username, $reply){


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
                  <h1 style="font-size: 20px; line-height: 24px;   padding: 10px; font-weight: 600; text-decoration: none; color: #000000;">'.$username.' thank you for your message! </h1>
                    '.$reply.'


                </td>
              </tr>
            </tbody>
          </table>
        <!-- End single column section -->

      </div>
    </body>
    </html>
      ';



    $mail = new PHPMailer(true);
    $EMAIL_ENV = $_ENV['EMAIL'] ?? null;
    $PASSWORD_ENV = $_ENV['PASS'] ?? null;

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
        $mail->Subject = 'Message Reply';
        $mail->Body    = $email_content;

        $mail->isHTML(true);
        $mail->send();

    } catch (Exception $e) {
        echo "Error: {$mail->ErrorInfo}";
    }
}
?>