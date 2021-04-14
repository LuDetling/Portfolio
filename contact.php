<?php

$to = "local.lucas.detling@gmail.com";
$name = $_POST["name"];
$subject = "contact : ".$name;
$message = $_POST["message"];
$header = "FROM : ";

mail($to, $subject, $message, $header);

// mail($to, $subject, $message, $header);

// if (isset($_POST["sendMail"])) {

//     $name = isset($_POST["name"]);

//     // destinataire
//     $to  = 'local.lucas.detling@gmail.com';

//     // Sujet
//     $subject = 'Contact: ';

//     // message
//     $message = isset($_POST["message"]);

//     // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
//     $header = "MIME-Version: 1.0\r\n";
//     $header .= 'From:"VOTRE NOM"<email-expediteur@example.org>' . "\n";
//     $header .= 'Content-Type:text/html; charset="uft-8"' . "\n";
//     $header .= 'Content-Transfer-Encoding: 8bit';

//     // Envoi
//     mail($to, $subject, $message, $header);
// };

