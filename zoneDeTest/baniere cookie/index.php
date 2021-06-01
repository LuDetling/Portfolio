<?php 
if(isset($_GET["accepte-cookie"])){
    setcookie("accepte-cookie", "true", time() + 60);
    header("Location: index.php");
}
?>
 
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Cookies</title>
</head>

<body>


    <?php
    if (!isset($_COOKIE["accepte-cookie"])) {
    ?>
        <div class="banniere">
            <div class="text-banniere">
                <p>Notre site utilise des cookies pour une meileure expérience</p>
            </div>
            <div class="button-banniere">
                <a href="?accepte-cookie">J'accepte</a>
            </div>
        </div>

    <?php
    } else {
        echo "<p>Vous avez accepter les cookies, veuillez patienter 1 minutes !</p>";
    }
    ?>
</body>

</html>