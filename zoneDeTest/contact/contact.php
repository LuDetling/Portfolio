<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Formulaire de contact</title>
</head>

<body>

    <!-- SI RIEN EST VIDE ET QUE LE COOKIE N'EXISTE PAS ALORS ON AJOUTE UN COOKIE QUI DURE 1 MINUTE
    ON POSTE UN MESSAGE COMME QUOI C'EST BIEN ENVOYE -->



    <div class="container">
        <form method="POST">
            <div class="champ">
                <label for="nom-prenom">Nom / Prénom</label>
                <input type="text" name="nom-prenom" id="nom-prenom" required>
            </div>
            <div class="champ">
                <label for="mail">Email</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="champ">
                <label for="numero">Numéro</label>
                <input type="tel" name="numero" id="numero" pattern="[0-9]{10}" required>
            </div>
            <div class="champ-message">
                <label for="message">Message</label>
                <textarea name="message" id="message" cols="30" rows="10" minlength="" maxlength="1000" required></textarea>
            </div>
            <div class="champ-boutton">
                <button type="submit" name="envoie" class="envoyer">Envoyer</button>
            </div>
        </form>
        <?php
        if (isset($_POST["envoie"])) {

            if (!empty($_POST["nom-prenom"]) && !empty($_POST["email"]) && !empty($_POST["numero"]) && !empty($_POST["message"]) && !isset($_COOKIE["envoye"])) {
                setcookie("test", "envoye", time() + 60, null, null ,false, true);
        ?>
                <div class="reception">
                    <p>Votre message à bien été reçu !</p>
                </div>
        <?php
                $name = $_POST["nom-prenom"];
                $email = $_POST["email"];
                $message = $name . ",<br>" . $_POST["message"];

                $header = "MIME-Version: 1.0\r\n";
                $header .= 'From:' . $email . "\n";
                $header .= 'Content-Type:text/html; charset="uft-8"' . "\n";
                $header .= 'Content-Transfer-Encoding: 8bit';

                $to = "portfolio@lucasdetling.com";
                $subject = "Contact : " . $name;
                
                mail($to, $subject, $message, $header);
            }
        }
        ?>
    </div>



</body>

</html>

<!-- if (isset($_POST["sendMail"])) { // si le formulaire est envoyé 
                        if (!empty($_POST["name"]) and !empty($_POST["email"]) and !empty($_POST["message"])) {

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
                            echo "<script> document.location.href='http://lucasdetling.com';</script>";
                        } else {
                            $msg = "tous les champs doivent être remplit petit malin ! ";

                            echo "<script> document.location.href='http://lucasdetling.com';</script>";
                        }
                    } -->