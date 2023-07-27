
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<?php
$conn=mysqli_connect('localhost','root','','tatto_blazers');
$useremail = $_POST['email'];
$sql = "SELECT * FROM `password_reset_tokens` WHERE `user_name` = '$useremail' && `token_used` = 0";
$run= mysqli_query($conn,$sql);
$fetch = mysqli_fetch_array($run);
if(!$run)
{
    echo "query not working";
}
else
{
       $pswtoken = $fetch['token'];
}

$resetLink = 'localhost/abhishek_kodion/demo/reset-new-password.php?link='.urlencode($pswtoken);
// echo $resetLink ;

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
    $mail->Subject = 'password recovery link';
    // $mail->Body    = 'please click on the link to recive password : $resetLink ';
    $mail->Body    = "Click the following link to reset your password: <a href='".$resetLink."' target='__blank'>Click here</a>";

    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';    



$mail->send();

// Redirect to password-recovery-mail.php with success parameter
header("Location: forgot-password.php?success=true");
exit();



    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>






