<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta property="og:image" content="img/IMG_0124noir.jpg" />
    <meta property="og:type" content="article" />
    <meta property="og:description" content="Mon site concernant mon expérience dans le domaine du web." />
    <meta property="og:locale" content="fr_FR" />
    <meta property="og:title" content="Site web Lucas Detling" />

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
                <a href="#competences" class="headerCompetence navInactive">Compétences</a>
                <a href="#projets" class="headerProjets navInactive">Portfolio</a>
                <a href="#cv" class="headerCv navInactive">CV</a>
                <a href="#contact" class="headerContact navInactive">Contact</a>
                <a href="zoneDeTest/zonedetest.php" class="navInactive">Zone De Test</a>
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
        <div class="boxSection">
            <a href="#hautDePage"><img src="img/iconeFlecheUp.png" alt="" class="goTop"></a>

            <div class="backgroundAPropos">
                <section class="aPropos section" id="aPropos">
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


            <!-- COMPETENCES -->

            <div class="backgroundCompetences" id="competences">
                <section class="competences section">
                    <h3 class="titre">Compétences</h3>
                    <div class="competence">
                        <p>Html/CSS</p>
                        <div class="barre">
                            <div class="barreHtml"></div>
                        </div>
                    </div>
                    <div class="competence">
                        <p>JavaScript</p>
                        <div class="barre">
                            <div class="barreJs"></div>
                        </div>
                    </div>
                    <div class="competence">
                        <p>PHP</p>
                        <div class="barre">
                            <div class="barrePhp"></div>
                        </div>
                    </div>
                    <div class="competence">
                        <p>MySQL</p>
                        <div class="barre">
                            <div class="barreMysql"></div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- PORTFOLIO -->

            <div class="backgroundProjets">
                <section class="articleVitrine section" id="projets">
                    <h3 class="titre">Portfolio</h3>
                    <ul>
                        <li class="list activeFiltre" data-filter="tous">Tous</li>
                        <li class="list" data-filter="html">HTML/CSS</li>
                        <li class="list" data-filter="js">JavaScript</li>
                        <li class="list" data-filter="php">PHP/MySQL</li>
                    </ul>

                    <div class="vitrine">
                        <div class="box-projet html">
                            <img src="img/reservia.png" alt="" class="image-projet">
                            <div class="overlay">
                                <a href="https://ludetling.github.io/LucasDetling_2_22022021/" target="_blank"><img src="img/hyperlien.png" alt=""></a>
                                <a href="https://github.com/LuDetling/LucasDetling_2_22022021" target="_blank"><img src="img/iconeGit.png" alt="github"></a>
                            </div>
                        </div>
                        <div class="box-projet php">
                            <img src="img/volnay.png" alt="" class="image-projet">
                            <div class="overlay">
                                <a href="http://www.lucasdetling.com/projets/volnay/" target="_blank"><img src="img/hyperlien.png" alt=""></a>
                                <a href="https://github.com/LuDetling/volnay" target="_blank"><img src="img/iconeGit.png" alt="github"></a>
                            </div>
                        </div>
                        <div class="box-projet js">
                            <img src="img/orinoco.png" alt="" class="image-projet">
                            <div class="overlay">
                                <a href="https://ludetling.github.io/Projet5/contenu%20projet/index.html" target="_blank"><img src="img/hyperlien.png" alt=""></a>
                                <a href="https://github.com/LuDetling/Projet5" target="_blank"><img src="img/iconeGit.png" alt="github"></a>
                            </div>
                        </div>
                        <div class="box-projet html">
                            <img src="img/zozor.png" alt="" class="image-projet">
                            <div class="overlay">
                                <a href="https://ludetling.github.io/zozor/" target="_blank"><img src="img/hyperlien.png" alt=""></a>
                                <a href="https://github.com/LuDetling/zozor" target="_blank"><img src="img/iconeGit.png" alt="github"></a>
                            </div>
                        </div>
                        <div class="box-projet html js php">
                            <img src="img/site.png" alt="" class="image-projet">
                            <div class="overlay">
                                <a href="https://www.lucasdetling.com"><img src="img/hyperlien.png" alt=""></a>
                                <a href="https://github.com/LuDetling/Portfolio/tree/dev" target="_blank"><img src="img/iconeGit.png" alt="github"></a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>


            <!-- CV -->
            <div class="backgroundCv">
                <section class="cv section" id="cv">
                    <h3 class="titre">CV</h3>
                    <a href="img/cv.pdf" target="_blank" class="cvDesktop"><img src="img/cv.png" alt=""></a>
                </section>
            </div>


            <!-- CONTACT -->

            <div class="backgroundContact">
                <section class="contact section" id="contact">
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



                        <div class="formulaireContact">
                            <form class="formContact" method="POST" action="sendmail.php">
                                <p>Envoyez moi un mail : </p>
                                <div class="nomMail">
                                    <input type="text" name="name" class="inputName" placeholder="Votre nom" required value="<?

                                                                                                                                ?>">
                                    <input type="email" name="email" class="inputEmail" placeholder="Votre email" required value="<?

                                                                                                                                    ?>">
                                </div>
                                <textarea name="message" class="inputMessage" placeholder="Votre message" required><?
                                                                                                                    if (isset($_POST["message"])) {
                                                                                                                        echo $_POST["message"];
                                                                                                                    }
                                                                                                                    ?></textarea>
                                <button type="submit" name="sendMail" class="envoyerMail">Envoyer un mail</button>
                                <p class="reception"></p>

                                <?php
                                if (isset($_COOKIE["envoye"]) && !isset($_COOKIE["spam"])) {
                                    echo "<p>Votre message a bien été envoyé !</p>";
                                } else if(isset($_COOKIE["envoye"]) && isset($_COOKIE["spam"])){
                                    echo "<p>Veuillez patienter une minute avant de renvoyer un message !</p>";
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </section>
            </div>

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
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>

</body>

</html>