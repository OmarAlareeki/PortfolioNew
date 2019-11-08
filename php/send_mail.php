<?php
    $mailfrom = $_POST['mail_from'];
    $mailSub = $_POST['mail_sub'];
    $mailMsg = $_POST['mail_msg'];

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'p3plcpnl1031.prod.phx3.secureserver.net';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'omar@omarproductions.com';                 // SMTP username
    $mail->Password = '2468Omar@';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($mailfrom);                       // mailer address
    // $mail->addReplyTo('omaraz2003@yahoo.com');
    $mail->addAddress('omarproductions2018@gmail.com');     // Add a recipient

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $mailSub;
    $mail->Body    = $mailMsg . 'The sender was :' . $mailfrom;

    $mail->send();
    echo 'Your message has been recieved';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Thank you for your Message</title>
  <style>

    h3{
      font-size: 20px;
      color: green;
      margin: 10px;
    }
    ul li{
      list-style: none;
    }
    body{
      background-color: #fff;
      border-top:35px solid green;
      margin:0;
    }
    div{
      border: 2px solid black;
      width: 60%;
      padding: 20px;
      font-size: 20px;
      border-radius: 20px/50px;
    }
    h4{
      border-bottom:3px solid green;
      width: 40%;
    }
  </style>
</head>
<body>
<ul>
  <li>
    <div><p><h3>Your message:<br></h3><?php echo $mailMsg; ?></p></div></li>
  <li><h3>Thank you for your message!</h3></li>
  <li><h5>I will respond to this email <h3>[ <?php echo $mailfrom; ?> ]</h3> as soon as possible.</h5></li>
  <h4>Thanks again</h4>
  <h5>If you want a faster respond, you can email me directly through:</h5>
  <h4>omarproductions2018@gmail.com</h4>
</ul>
</body>
</html>



