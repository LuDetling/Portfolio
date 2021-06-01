<?php
if (isset($_POST["sendMail"])) { // si le formulaire est envoyé 
    if (!empty($_POST["name"]) and !empty($_POST["email"]) and !empty($_POST["message"]) && !isset($_COOKIE["envoye"])) {
        setcookie("envoye", "envoye", time() + 60);
        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $name . ",<br>" . $_POST["message"];
        $to = "portfolio@lucasdetling.com";
        $subject = "contact : " . $name;

        $header = "MIME-Version: 1.0\r\n";
        $header .= 'From:' . $email . "\n";
        $header .= 'Content-Type:text/html; charset="uft-8"' . "\n";
        $header .= 'Content-Transfer-Encoding: 8bit';

        mail($to, $subject, $message, $header);
        header("Location: /#contact");
        // echo "<script> document.location.href='https://lucasdetling.com';</script>";
    } else {
        setcookie("spam", "spam", time() + 10);
        header("Location: /#contact");
        // echo "<script> document.location.href='https://lucasdetling.com';</script>";
    }
}
