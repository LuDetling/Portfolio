<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>Portfolio Lucas Detling</title>
</head>

<body>
    <!-- HEADER -->

    <header class="header">
        <nav class="navigation">
            <a href="#aPropos" class="headerAPropos navInactive">A Propos</a>
            <a href="#projets" class="headerProjets navInactive">Portfolio</a>
            <a href="#cv" class="headerCv navInactive">CV</a>
            <a href="#contact" class="headerContact navInactive">Contact</a>
        </nav>
        <div class="headerIcone">
            <a href="mailto:lucas.detling@gmail.com"><img src="img/iconeMail.png" alt=""></a>
            <a href="https://www.linkedin.com/in/lucas-detling/"><img src="img/iconeLinkedin.png" alt="linkedin"></a>
            <a href="https://github.com/LuDetling" target="_blank"><img src="img/iconeGit.png" alt="github"></a>
        </div>
    </header>

    <!-- PRESENTATION -->

    <div class="presentation" id="hautDePage">
        <div class="description">
            <h1>Lucas Detling</h1>
            <h3>Développeur web junior</h3>
        </div>
    </div>

    <main class="main">

        <!-- A PROPOS -->

        <a href="#hautDePage"><img src="img/iconeFlecheUp.png" alt="" class="goTop"></a>

        <div class="backgroundAPropos">
            <section class="aPropos" id="aPropos">
                <h1 class="titre">A Propos</h1>
                <p>Développeur Web junior.</p>
                <p>Je suis à la recherche d'une entreprise pour effectuer mon alternance et obtenir mon diplôme de
                    développeur web. </p>
                <p> Pour mettre toutes les chances de mon côtés j'ai réalisé ce site pour pouvoir partager
                    mon expérience.</p>
                <p> Je suis motivé, sérieux et autonome.</p>
                <p>J'ai réalisé quelques projets avec la formation préaprentissage développeur web OpenClassroom.</p>
            </section>
        </div>

        <div class="traitSection"></div>

        <!-- PORTFOLIO -->

        <div class="backgroundProjets">
            <section class="articleVitrine" id="projets">
                <h1 class="titre">Portfolio</h1>
                <ul>
                    <li class="allFiltre activeFiltre">Tous</li>
                    <li class="htmlCss">HTML/CSS</li>
                    <li class="javaScript">JavaScript</li>
                </ul>
                <div class="vitrine">
                    <a href="https://ludetling.github.io/zozor/" target="_blank" class="codageHtmlCss"><img src="img/zozor_classe.png" alt=""></a>
                    <a href="https://ludetling.github.io/LucasDetling_2_22022021/" target="_blank" class="codageHtmlCss"><img src="img/Reservia.svg" alt=""></a>
                    <a href="https://ludetling.github.io/Projet5/contenu%20projet/index.html" class="codageJavascript" target="_blank"><img src="img/orinoco.png" alt=""></a>
                </div>
            </section>
        </div>

        <div class="traitSection"></div>

        <!-- CV -->

        <section class="cv" id="cv">
            <h1 class="titre">CV</h1>
            <a href="img/cv.pdf" target="_blank" class="cvDesktop"><img src="img/CV.jpg" alt=""></a>
            <a href="img/cv.pdf" target="_blank" class="cvMobile"><img src="img/IMG_0124.jpg" alt="">test</a>
        </section>

        <div class="traitSection"></div>

        <!-- CONTACT -->

        <div class="backgroundContact">
            <section class="contact" id="contact">
                <h1 class="titre">Contact</h1>
                <div class="boxContact">
                    <div class="informationContact">
                        <p>téléphone : </p>
                        <p>06.68.37.28.76</p>
                        <p>mail : </p>
                        <p><a href="mailto:lucas.detling@gmail.com">lucas.detling@gmail.com</a></p>
                        <p>adresse : </p>
                        <p>Avenue Verdier, 92120, Montrouge</p>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2627.210125690865!2d2.311513651426591!3d48.81605211153875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e670ff4af4886b%3A0x3403e64f50c48a89!2sAvenue%20Verdier%2C%2092120%20Montrouge!5e0!3m2!1sfr!2sfr!4v1618411466669!5m2!1sfr!2sfr" style="border:0;" allowfullscreen="" loading="lazy" class="carte"></iframe>
                    </div>

                    <!-- FORMULAIRE DE CONTACT A REVOIR -->

                    <?php
                    if (isset($_POST["sendMail"])) { // si le formulaire est envoyé

                        if (!empty($_POST["name"]) and !empty($_POST["email"]) and !empty($_POST["message"])) {
                            $name = $_POST["name"];
                            $email = $_POST["email"];
                            $message = $_POST["message"];

                            $to = "local.lucas.detling@gmail.com";
                            $subject = "contact : ";
                            $header = "FROM : ";

                            mail($to, $subject, $message, $header);
                            header("Location: http://localhost/Portfolio/#contact"); //permet de ne pas spam f5
                        } else {
                            $msg = "tous les champs doivent être remplit petit malin ! ";
                            header("Location: http://localhost/Portfolio/#contact");
                        }
                    }

                    ?>

                    <div class="formulaireContact">
                        <form action="" class="formContact" method="POST">
                            <div class="nomMail">
                                <input type="text" name="name" class="inputName" placeholder="Votre nom" required value="<? if(isset($_POST[" name"])){ echo $_POST["name"]; }?>">
                                <input type="email" name="email" class="inputEmail" placeholder="Votre email" required value="<? if(isset($_POST[" email"])){ echo $_POST["email"]; }?>">
                            </div>
                            <textarea name="message" class="inputMessage" placeholder="Votre message" required><? if(isset($_POST["message"])){ echo $_POST["message"]; }?></textarea>
                            <button type="submit" name="sendMail" class="envoyerMail">Envoyer un mail</button>
                        </form>
                        <?php
                        if (isset($msg)) {
                            echo $msg;
                        }
                        ?>
                    </div>
                </div>
            </section>
        </div>





    </main>

    <!-- FOOTER -->

    <footer class="footer">
        <div class="footerIcone">
            <a href="mailto:lucas.detling@gmail.com"><img src="img/iconeMail.png" alt=""></a>
            <a href="https://www.linkedin.com/in/lucas-detling/"><img src="img/iconeLinkedin.png" alt="linkedin"></a>
            <a href="https://github.com/LuDetling" target="_blank"><img src="img/iconeGit.png" alt="github"></a>
        </div>
        <p>© 2021 Lucas DETLING, Tous droits réservés.</p>
    </footer>
</body>
<script src="js/app.js"></script>

</html>