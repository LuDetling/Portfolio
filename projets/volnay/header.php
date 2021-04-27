<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>

<body>

    <header class="header">
        <div class="tout_en_haut">
            <select name="langues" class="langues">
                <option value="fr">FR</option>
                <option value="eng">ENG</option>
            </select>
            <a href="index.php"><img src="img/VOLNAY_PARIS.png" alt="logo Volnay Paris" class="logo_volnay"></a>
            <a href="#"><img src="img/panier_a_crotte.svg" alt="pannier shopping" class="icone_shopping"></a>
        </div>
        <div class="menu">
            <a href="#">L'Histoire</a>
            <a href="fragrances.php" <?php if ($encours == 'rubrique2') { echo 'class="lienactif"'; } ?>>Fragrances</a>
            <a href="#">Contact</a>
        </div>
    </header>
</body>

</html>
