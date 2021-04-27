<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dosis&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="img/ld.png">
    <title>Portfolio Lucas Detling</title>
</head>

<body>
    <!-- HEADER -->

    <header class="header">
        <div class="contenuNav">
            <nav class="navigation">
                <a href="#aPropos" class="headerAPropos navInactive">A Propos</a>
                <a href="#projets" class="headerProjets navInactive">Portfolio</a>
                <a href="#cv" class="headerCv navInactive">CV</a>
                <a href="#contact" class="headerContact navInactive">Contact</a>
            </nav>
        </div>
        <div class="headerIcone">
            <a href="mailto:lucas.detling@gmail.com"><img src="img/iconeMail.png" alt="" class="iconeMailHeader"></a>
            <a href="https://www.linkedin.com/in/lucas-detling/"><img src="img/iconeLinkedin.png" alt="linkedin"></a>
            <a href="https://github.com/LuDetling" target="_blank"><img src="img/iconeGit.png" alt="github"></a>
        </div>

    </header>
    <button class="hamburger">&#9776;</button>
    <div class="hamburgerSidebar"></div>
    <div class="hamburgerOverlay"></div>

    <!-- PRESENTATION -->
    <main class="main">

        <div class="presentation" id="hautDePage">
            <div class="description">
                <h1>Lucas Detling</h1>
                <h3>Développeur web junior</h3>
            </div>
        </div>

        <!-- A PROPOS -->

        <a href="#hautDePage"><img src="img/iconeFlecheUp.png" alt="" class="goTop"></a>

        <div class="backgroundAPropos">
            <section class="aPropos" id="aPropos">
                <h3 class="titre">A Propos</h3>
                <p>Recherche alternance - Développeur Web.</p>
                <p>Actuellement en formation prep'apprentissage développeur web via OpenClassroom,
                    je suis à la recherche d'une entreprise pouvant m'accueillir pour effectuer mon alternance. Cela me permettrait d'allier enseignement théorique et formation pratique
                    en vue d'obtenir mon diplôme et développer mes expériences professionnelles.</p>
                <p> Pour mettre toutes les chances de mon côté j'ai souhaité réaliser mon propre site au travers duquel je partage mes projets précédemment réalisés ainsi que mon parcours
                    et mes compétences. Ce site a été également un bon défi dans sa réalisation, il m'a permis de développer davantage mes compétences sur certains langages informatiques.
                </p>
                <p> Je suis passionné, assidu et autonome.</p>
                <p>Au plaisir d'échanger avec vous !</p>
            </section>
        </div>

        <div class="traitSection"></div>

        <!-- PORTFOLIO -->

        <div class="backgroundProjets">
            <section class="articleVitrine" id="projets">
                <h3 class="titre">Portfolio</h3>
                <ul>
                    <li class="allFiltre activeFiltre">Tous</li>
                    <li class="htmlCss">HTML/CSS</li>
                    <li class="javaScript">JavaScript</li>
                    <li class="phpMysql">PHP/MySQL</li>
                </ul>

                <div class="vitrine">
                    <div class="image_overlay codageHtmlCss">
                        <img src="img/reservia.png" alt="">
                        <div class="overlay">
                            <a href="https://ludetling.github.io/LucasDetling_2_22022021/" target="_blank" ><img src="img/hyperlien.png" alt=""></a>
                            <a href="https://github.com/LuDetling/LucasDetling_2_22022021" target="_blank"><img src="img/iconeGit.png" alt="github"></a>
                        </div>
                    </div>
                    <div class="image_overlay codagePhpMysql">
                        <img src="img/volnay.png" alt="">
                        <div class="overlay">
                            <a href="http://www.lucasdetling.com/projets/volnay/" target="_blank" ><img src="img/hyperlien.png" alt=""></a>
                            <a href="https://github.com/LuDetling/volnay" target="_blank"><img src="img/iconeGit.png" alt="github"></a>
                        </div>
                    </div>
                    <div class="image_overlay codageJavascript">
                        <img src="img/orinoco.png" alt="">
                        <div class="overlay">
                            <a href="https://ludetling.github.io/Projet5/contenu%20projet/index.html" target="_blank" ><img src="img/hyperlien.png" alt=""></a>
                            <a href="https://github.com/LuDetling/Projet5" target="_blank"><img src="img/iconeGit.png" alt="github"></a>
                        </div>
                    </div>
                    <div class="image_overlay codageHtmlCss">
                        <img src="img/zozor.png" alt="">
                        <div class="overlay">
                            <a href="https://ludetling.github.io/zozor/" target="_blank" ><img src="img/hyperlien.png" alt=""></a>
                            <a href="https://github.com/LuDetling/zozor" target="_blank"><img src="img/iconeGit.png" alt="github"></a>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="traitSection"></div>

        <!-- CV -->
        <div class="backgroundCv">
            <section class="cv" id="cv">
                <h3 class="titre">CV</h3>
                <a href="img/cv.pdf" target="_blank" class="cvDesktop"><img src="img/cv.png" alt=""></a>
            </section>
        </div>

        <div class="traitSection"></div>

        <!-- CONTACT -->

        <div class="backgroundContact">
            <section class="contact" id="contact">
                <h3 class="titre">Contact</h3>
                <div class="boxContact">
                    <div class="informationContact">
                        <img src="img/iconeTel.png" alt="" class="iconeTel">
                        <p>06.68.37.28.76</p>
                        <img src="img/iconeMail.png" alt="" class="iconeMail">
                        <p><a href="mailto:lucas.detling@gmail.com">lucas.detling@gmail.com</a></p>
                        <img src="img/iconeLocation.png" alt="" class="iconeLocation">
                        <p>Avenue Verdier, 92120, Montrouge</p>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2627.210125690865!2d2.311513651426591!3d48.81605211153875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e670ff4af4886b%3A0x3403e64f50c48a89!2sAvenue%20Verdier%2C%2092120%20Montrouge!5e0!3m2!1sfr!2sfr!4v1618411466669!5m2!1sfr!2sfr" style="border:0;" allowfullscreen="" loading="lazy" class="carte"></iframe>
                    </div>

                    <!-- FORMULAIRE DE CONTACT A REVOIR -->

                    <?php
                    if (isset($_POST["sendMail"])) { // si le formulaire est envoyé 
                        if (!empty($_POST["name"]) and !empty($_POST["email"]) and !empty($_POST["message"])) {

                            $name = $_POST["name"];
                            $email = $_POST["email"];
                            $message = $name . ",<br>" . $_POST["message"];
                            $to = "portfolio@lucasdetling.com";
                            $subject = "contact : ". $name;

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
                    }
                    ?>

                    <div class="formulaireContact">
                        <form class="formContact" method="POST">
                            <p>Envoyer moi un mail : </p>
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
            <a href="mailto:lucas.detling@gmail.com"><img src="img/iconeMail.png" alt="" class="iconeMailHeader"></a>
            <a href="https://www.linkedin.com/in/lucas-detling/"><img src="img/iconeLinkedin.png" alt="linkedin"></a>
            <a href="https://github.com/LuDetling" target="_blank"><img src="img/iconeGit.png" alt="github"></a>
        </div>
        <p>© 2021 Lucas DETLING, Tous droits réservés.</p>
    </footer>
    <script src="js/app.js"></script>
</body>

</html>