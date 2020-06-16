<!DOCTYPE html>
<html>
<head>
  <title></title>

  <style>

    .but {
  background-color: #FF5733;
  border: none;
  color: white;
  padding: 10px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
    input[type=text] {
  padding: 10px 32px;
  border: 2px solid red;
  border-radius: 4px;
  left: 20px;
  }
 input[type=email] {
  padding: 10px 32px;
  border: 2px solid red;
  border-radius: 4px;
  }
   .form-control {
  padding: 50px 32px;
  border: 2px solid red;
  border-radius: 4px;
  }

  body{
    background-color: #FAEBD7;
  }


</style>
</head>
<body>
<div class="container">
<h1 class="text-center">Contacter client</h1>
<hr>
  <?php 
    if(isset($_POST['sendmail'])) {
      require 'autoload.php';
      require 'crd.php';
      require'class.phpmailer.php';
      require'class.smtp.php';

      $mail = new PHPMailer;

     //$mail->SMTPDebug = 4;                               // Enable verbose debug output

      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = EMAIL;                 // SMTP username
      $mail->Password = PASS;                           // SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 25;                                    // TCP port to connect to

      $mail->setFrom(EMAIL, 'Dsmart Tutorials');
      $mail->addAddress($_POST['email']);     // Add a recipient

      $mail->addReplyTo(EMAIL);
      // print_r($_FILES['file']); exit;
      //for ($i=0; $i < count($_FILES['file']['tmp_name']) ; $i++) { 
        //$mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]);    // Optional name
      //}
      $mail->isHTML(true);                                  // Set email format to HTML

      $mail->Subject = $_POST['subject'];
      $mail->Body    = '<div style="border:2px solid red;">This is the HTML message body <b>in bold!</b></div>';
      $mail->AltBody = $_POST['message'];

      if(!$mail->send()) {
          echo 'Message could not be sent.';
          echo 'Mailer Error: ' . $mail->ErrorInfo;
      } else {
          echo 'Message has been sent';
      }
    }
   ?>
  <div class="row">
    <div class="col-md-9 col-md-offset-2">
        <form role="form" method="post" enctype="multipart/form-data">
          <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="email">Email dest:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" maxlength="50">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="subject">Sujet ici:</label>
                    <input type="text" class="form-control" id="subject" name="subject" value="" maxlength="50">
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="name">Message:</label>
                    <textarea class="form-control" type="textarea" id="message" name="message" placeholder="Your Message Here" maxlength="6000" rows="4"></textarea>
                </div>
            </div>

             <div class="row">
                <div class="col-sm-9 form-group">
                    <button class="but" type="submit" name="sendmail" class="btn btn-lg btn-success btn-block">Envoyer</button>
                </div>
            </div>
        </form>
  </div>
</div>
</body>
</html>