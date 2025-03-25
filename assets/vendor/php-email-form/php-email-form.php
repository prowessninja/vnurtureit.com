use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Gmail SMTP Server Configuration
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'contact@amensit.com';  
    $mail->Password   = 'YOUR-APP-PASSWORD-HERE';  // Use App Password, NOT your real password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Email Headers
    $mail->setFrom('contact@amensit.com', 'AmenSit Support');
    $mail->addAddress('recipient@example.com', 'Recipient Name'); 

    // Email Content
    $mail->isHTML(true);
    $mail->Subject = 'Test Email from AmenSit';
    $mail->Body    = 'This is a test email sent using <b>PHPMailer</b>!';
    $mail->AltBody = 'This is a plain text version of the email.';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Error: {$mail->ErrorInfo}";
}
