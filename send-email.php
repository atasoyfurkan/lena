<?php
$header = "From: noreply@example.com\r\n";
$header.= "MIME-Version: 1.0\r\n";
$header.= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$header.= "X-Priority: 1\r\n";

$status = mail("furkanatasoy65@gmail.com", "deneme", "deneme123333", $header);

if($status)
{
    echo '<p>Your mail has been sent!</p>';
} else {
    echo '<p>Something went wrong. Please try again!</p>';
}
?>
 
<!-- include your own success html here -->
 
Thank you for contacting us. We will be in touch with you very soon.
 