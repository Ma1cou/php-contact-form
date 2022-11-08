<?php
$errors = '';
$myemail = 'mico.rauma@edu.redu.fi';
if(empty($_POST['name'])  || 
   empty($_POST['email']) || 
   empty($_POST['message']))
{
    $errors .= "\n Error: Täytä kaikki kohdat.";
}

$name = $_POST['name']; 
$email_address = $_POST['email']; 
$message = $_POST['message']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Vääränlainen Sähköposti osoite";
}

if( empty($errors)) {

$to = $myemail;
$email_subject = "Uusi Viesti Henkilöltä: $name";
$email_body = "Sinulle on saapunut uusi viesti.".

" Tässä on tiedot:\n Name: $name \n ".

"Sähköposti: $email_address\n Viesti: \n $message";

$headers = "From: $myemail\n";

$headers .= "Reply-To: $email_address";

mail($to, $email_subject, $email_body, $headers);

header('Location: kiitos.html');

}
?>
