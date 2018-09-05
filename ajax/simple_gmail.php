<?php
// Importamos la clase PHPMailer classes con su nombre global
// Esto debe estar en el principio del script no dentro de una funcion
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Cargamos Composer's autoloader
require '../public/vendor/autoload.php';

$user = isset($_POST['user'])?$_POST['user']:"";
$pass = isset($_POST['pass'])?$_POST['pass']:"";
$fromname = isset($_POST['fromname'])?$_POST['fromname']:"";
$to = isset($_POST['to'])?$_POST['to']:"";
$toname = isset($_POST['toname'])?$_POST['toname']:"";
$cc = isset($_POST['cc'])?$_POST['cc']:"";
$bcc = isset($_POST['bcc'])?$_POST['bcc']:"";
$attachments = isset($_POST['attachments'])?$_POST['attachments']:"";
$subject = isset($_POST['subject'])?$_POST['subject']:"";
$body = isset($_POST['body'])?$_POST['body']:"";

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = $user;                 // SMTP username
    $mail->Password = $pass;                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($user, $fromname);
    $mail->addAddress($to, $toname);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo($user, $fromname);

    if ($cc != "") {
      $mail->addCC($cc);
    }

    if ($bcc != "") {
      $mail->addBCC($bcc);
    }

    if ($attachments != '') {
      foreach ($attachments as $value) {
        $mail->addAttachment($value);
      }
    }

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;

    if ($mail->send()) {
      $resp = array('resp' => 1);
    } else {
      $resp = array('resp' => 0);
    }


} catch (Exception $e) {
  $resp = array('resp' => 'Mensaje no se pudo enviar. Error de envio: '.$mail->ErrorInfo);
}
echo json_encode($resp);
?>
