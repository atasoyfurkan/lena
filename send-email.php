<?php
if(isset($_POST['email'])) {
    

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "furkanatasoy65@gmail.com";
    $email_subject = "Contact Lena Grup";
 
    function died($error) {
        // your error code can go here
        echo "Üzgünüz. Girilen bilgiler hatalı.";
        echo "Hatalar:<br /><br />";
        echo $error."<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['subject']) ||
        !isset($_POST['message'])
        ) {
        died('Eksik bilgi.');       
    }
 
     
 
    $name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $subject = $_POST['subject']; // required
    $message = $_POST['message']; // not required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'Geçersiz e-posta adresi<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'Geçersiz isim<br />';
  }
 
  if(!preg_match($string_exp,$subject)) {
    $error_message .= 'Geçersiz konu<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Subject: ".clean_string($subject)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Message: ".clean_string($message)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
$status = mail($email_to, $email_subject, $email_message, $headers);  
if($status) {
    echo "Gönderildi";
}
else {
    echo "HATA! Gönderilemedi.";
}
?>
 
<!-- include your own success html here -->
 İletişime geçtiğiniz için teşekkür ederiz. En kısa sürede yardımcı olacağız.
 
<?php
 
}
?>