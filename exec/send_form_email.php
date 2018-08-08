<?php

$family = $_POST['req_from_company'];

$phone = $_POST['req_from_contact_pers'];

$email = $_POST['req_from_index']; 
 
$bind = $_POST['req_from_adress'];

$formcontent=" De la: $email  \n Telefon: $phone\n  Produs interesat: $family \n Web-site: $bind";
 
$recipient = "ldozerl@gmail.com";

$subject = "Contact Form";

$mailheader = "De la: $email \r\n";

mail($recipient, $subject, $formcontent, $mailheader) or die("<p style='background:#DB4A37;color: #FFFFFF; margin: 0 0 0 -7px; padding: 0; text-align: center;

   '>Error! </p>");

echo "<p style='background:#DB4A37;color: #FFFFFF; margin: 0 0 0 -7px; padding: 0; text-align: center;

   '>Multumim, cererea Dvs. este procesata! </p> " ;

?>

