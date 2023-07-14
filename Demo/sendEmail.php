<?php
$useremail = $_POST['email'];

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      /Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'abhishek.kodion@gmail.com';                     //SMTP username
    $mail->Password   = 'gqldxkuzgbiroisa';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('abhishek.kodion@gmail.com');
    $mail->addAddress($useremail);     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Welcome to tatto Balzers';
    $mail->Body    = 'Welcome to Tattoo Blazers!

    We are thrilled to have you join our vibrant community of tattoo enthusiasts and art lovers. Whether you are a seasoned tattoo enthusiast or someone looking to get their first ink, Tattoo Blazers is the perfect place for you.
    
    At Tattoo Blazers, we believe that tattoos are a powerful form of self-expression and art. We are dedicated to providing you with a platform where you can explore the world of tattoos, discover talented artists, and connect with like-minded individuals who share your passion.
    
    Our website is designed to be your ultimate resource for all things tattoo-related. From articles and guides on different tattoo styles, trends, and aftercare tips, to showcasing the works of exceptional tattoo artists from around the world, we strive to offer you a comprehensive and inspiring experience.
    
    Feel free to browse through our extensive gallery of tattoo designs, where you will find a wide range of styles, from traditional to modern, black and gray to vibrant colors. And if you are looking for a talented artist to bring your tattoo vision to life, our artist directory will help you connect with skilled professionals in your area.
    
    As a member of our community, you wll also have the opportunity to participate in engaging discussions, share your own tattoo experiences, and seek advice from our knowledgeable members. We value your input and look forward to fostering a supportive and inclusive environment where everyone feels comfortable expressing themselves.
    
    Thank you for choosing Tattoo Blazers. Get ready to embark on an exciting journey into the world of tattoos. Whether you are here to find inspiration, connect with fellow enthusiasts, or embark on your own tattoo adventure, we are here to guide you every step of the way.
    
    Enjoy your time with us, and may your tattoo journey be filled with creativity, artistry, and meaningful experiences!
    
    Warm regards,
    
    The Tattoo Blazers Team';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    // echo 'Message has been sent';
} catch (Exception $e) {
    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}