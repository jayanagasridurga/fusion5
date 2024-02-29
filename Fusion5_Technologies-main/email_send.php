<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP; // Import the SMTP class

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetching values from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mbl_num = $_POST['mbl_num'];
    $message = $_POST['message'];
    // var_dump($_POST); // Debugging line
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

   
    // $mbl_num = isset($_POST['mbl_num']) ? $_POST['mbl_num'] : ''; // Check if mbl_num is set
    // $message = isset($_POST['message']) ? $_POST['message'] : ''; // Check if message is set

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();                                      // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';            // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                             // Enable SMTP authentication
        $mail->Username   = 'manikumarmadatha1149@gmail.com';       // SMTP username
        $mail->Password   = 'nuxruirjmyuvqldy';            // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                              // TCP port to connect to

        // Recipients
        $mail->setFrom($email,$name);
        $mail->addAddress('madathamani60@gmail.com','Fusion5 Technologies');     // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Submitted By:' . $name;
        $mail->Body    = "Name: $name <br> Email: $email <br> Number: $mbl_num <br> Message:$message";
      
        $mail->send();
              echo "Message: " . $message . "<br>";
        // echo 'Message has been sent';
        echo "<script> alert('Thank You very much for submiting the form. We will contact you shortly.'); window.location.href='contact.php'; </script>";
        //echo "<script> <button type="button" class="btn-close" disabled aria-label="Close">Thank you</button>; window.location.href='index.php'; </script>"
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>

