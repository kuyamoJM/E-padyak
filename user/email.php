
<?php
//Import PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

//Create an instance of PHPMailer
$mail = new PHPMailer(true); // pass true to enable debugging and handle errors

try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; // enable debugging    

    $mail->isSMTP(); // use smtp connection to send email                                       

    $mail->Host = 'smtp.gmail.com'; //set up the gmail SMTP host name                     

    $mail->SMTPAuth = true; // use SMTP Authentication to allow your account to authenticate                                 $mail->Username = '<YOUR-GMAIL-EMAIL-ADDRESS>';                     $mail->Password = '<YOUR-ACCOUNT-PASSWORD>';                               $mail->Port = 587; // set the SMTP port in Gmail

    $mail->SMTPSecure = "tls"; // use TLS when sending the email                             

    $mail->setFrom('epadyak2022@gmail.com', 'OPTIONAL NAME'); //defining the sender

    $mail->addAddress('jm.larga.salido@gmail.com', 'John Doe');

    // define the HTML Body. (you can refer this from an HTML file too)
    $mail->Body = '<h1>Hello World!</h1> <p>This is my first email!</p>';

    $mail->send(); //send the emailecho 'The email has been sent';
} catch (Exception $e) {
    echo "We ran into an error while sending the email: {$mail->ErrorInfo}";
}
?>