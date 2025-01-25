<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../assets/mailer/src/Exception.php';
require '../assets/mailer/src/PHPMailer.php';
require '../assets/mailer/src/SMTP.php';

require_once '../classes/clients.php';
$client = new Clients ();
$result;

if (isset($_POST["schedID"])) {
    $schedID = $_POST["schedID"];
    $result = $client->getServiceBy($schedID);
} 


$mail = new PHPMailer(true);

try {
    //File
    $pdfFilePath = '../php/email_pdf/Service report.pdf';

   
    
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;     
    $mail->SMTPOptions = [
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true,
        ],
    ];
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'ragosdavidwork@gmail.com'; // gmail
    $mail->Password = 'jchzjcrpdcnzekvp'; // gmail app password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->setFrom('ragosdavidwork@gmail.com', "Notification"); // gmail
    $mail->isHTML(true);
    $mail->Subject = "KVP Monitoring Notification";
    $mail->addCC('dandanragos@gmail.com');     //Add a recipient
    $mail->addAttachment(path: $pdfFilePath);

    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('../mmr/VER-24-01-637.pdf');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Calibration/Verification Delayed Schedules';
    $mail->Body    = '<html lang="en">
                    <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>New User Entry Notification</title>
                    </head>
                <body style="margin: 0; padding: 0; font-family: Arial, sans-serif;">
                 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color: #edf2f7;">
    <tr>
      <td align="center" valign="top" style="padding: 30px;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="max-width: 700px; background-color: #ffffff; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
          <tr>
            <td style="padding: 20px;">
              <h1 style="font-size: 24px; color: #333333; margin-bottom: 20px;">Notification</h1>
              <p style="font-size: 16px; color: #718096; margin-bottom: 17px;">Greetings,</p>
              
              <p style="font-size: 16px; color: #718096; margin-bottom: 17px;">  
              Please find the details in the attached report for your review :</p>
              
              <ul style="font-size: 16px; color: #718096; margin-bottom: 17px;">
                  <li>
                      <b>FileName:</b> Service report.pdf
                  </li>
                  <li>
                      <b>Description:</b> : Contains service report details.
                  </li>
              </ul>
              
              <p style="font-size: 16px; color: #718096; margin-bottom: 17px;">Please note: This is an automated email. Kindly do not reply to this message. 
              If you have any questions or require further assistance, please contact us at kvp@gmail.com.
                Thank you for your understanding and cooperation.</p>
              <p style="font-size: 16px; color: #718096; margin-bottom: 26px;">Thank you for your attention.</p>

              <p style="font-size: 16px; color: #718096; margin-bottom: 5px;">Regards,</p>
              <p style="font-size: 16px; color: #718096; margin-top: 0;">KVP</p>
              <div style="border-top: 1px solid #dadbdd; margin-top: 20px;"></div>
              <p style="font-size: 14px; color: #718096; margin-top: 20px;">If you have received this message in error, please disregard. It may have been sent to you by mistake. We apologize for any inconvenience. Thank you.</p>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    foreach ($result as $row) {
        try {
            // Clear all previous recipients before adding a new one
            $mail->clearAddresses();
            $mail->addAddress($row["email"]);
            // Send email
            $mail->send();
        } catch (Exception $e) {
            // Handle invalid email or send failure
        
        }
    }
    echo json_encode(["response" => "success",
                "message" => "Mail sent successfully"]);
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


?>