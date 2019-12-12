<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = '13101999nemish@gmail.com';                     // SMTP username
    $mail->Password   = 'afggycrwhiodkkfp';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to
    $email=$_GET['email'];
    $username=$_GET['username'];
    //Recipients
    $mail->setFrom('13101999nemish@gmail.com', 'NEMISH/KUMAR');
    $mail->addAddress($email,$username);     // Add a recipient
   
    // Content
    $mail->isHTML(true); 
     // Set email format to HTML
     
     $pass= rand(1000000,9999999); 
    try{
       
        
	$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=PhpProject','root','');
	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE Login SET Password=? WHERE Username=?";
        $stmt = $dbhandler->prepare($sql);
        $stmt->execute(array($pass,$username));
    }
    catch(PDOException $e){
            echo $e->getMessage();
    } 
    $mail->Subject = 'Hello '.$username;
    $mail->Body    = 'Your new password is '.$pass.'<br>After getting this mail please kindly reset your password';
    $mail->AltBody = 'This is the body in plain text for non-Word mail clients';

    $mail->send();
    echo 'Message has been sent';
    header('Location:../../Files/Login.php?mail=sent');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}