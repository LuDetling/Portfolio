// systeme de scroll

const backgroundNav = () => {
    const header = document.querySelector("header");

    document.addEventListener("scroll", (e) => {
        let scrollValue = window.scrollY;

        if (scrollValue > 50) {
            header.classList.add("backgroundHeader");
        } else {
            header.classList.remove("backgroundHeader");
        }
    })
}

backgroundNav()

// nav qui ajoute une barre sous la section lors du scroll

const interSection = () => {
    const sections = document.querySelectorAll(".section");
    const navigation = document.querySelectorAll(".navigation a")
    const boxSection = document.querySelector(".boxSection");

    document.addEventListener("scroll", (e) => {

        let scrollValue = window.scrollY; // hauteur du scroll

        if (scrollValue > boxSection.offsetTop * 0.9) {
            for (let i = 0; i < sections.length; i++) {

                let tailleSection = sections[i].offsetTop + sections[i].offsetHeight;

                if (scrollValue >= sections[i].offsetTop * 0.9 && scrollValue < tailleSection * 0.9) { // si la hauteur du scroll est entre 2 sections
                    navigation[i].classList.add("navActive");
                } else {
                    navigation[i].classList.remove("navActive");
                }
            }
        }
        else {
            navigation[0].classList.remove("navActive");
        }

    })

}

interSection();

// BARRE DE COMPETENCE 

const barreCompetence = () => {
    let competence = document.querySelectorAll(".competence");

    document.addEventListener("scroll", (e) => {

        let scrollWindow = window.scrollY / .75;

        if (scrollWindow >= competence[0].offsetTop) {

            let barreHtml = document.querySelector(".barreHtml");
            let barreJs = document.querySelector(".barreJs");
            let barrePhp = document.querySelector(".barrePhp");
            let barreMysql = document.querySelector(".barreMysql");

            barreHtml.style.width = "75%";
            barreJs.style.width = "65%";
            barrePhp.style.width = "55%";
            barreMysql.style.width = "50%";


        }
    })

}

barreCompetence();

// systeme de filtre

const activeFiltre = function () {

    $(document).ready(function () {
        $(".list").click(function () {
            const value = $(this).attr("data-filter");
            if (value == 'tous') {
                $(".box-projet").show("1000");
            } else {
                $(".box-projet").not("." + value).hide("1000");
                $(".box-projet").filter("." + value).show("1000");
            }
        })

        // COULEUR SUR CLASS ACTIVE

        $(".list").click(function () {
            $(this).addClass("activeFiltre").siblings().removeClass("activeFiltre");
        })
    })


}

activeFiltre()

// FLECHE RETOUR HAUT DE PAGE

const flecheUp = () => {
    const flecheUp = document.querySelector(".goTop");

    document.addEventListener("scroll", (e) => {
        if (window.scrollY === 0) {
            flecheUp.style.transform = "translateY(150%)";
        } else {
            flecheUp.style.transform = "translateY(-40%)";
        }
    })
}

flecheUp()

//afficher la fleche si la position du scroll n'est pas a 0

// menu burger

const hamburger = () => {

    let boutonHamburger = document.querySelector(".hamburger");
    let hamburgerOverlay = document.querySelector(".hamburgerOverlay");
    let contenuHeader = document.querySelector(".contenuNav");
    let contenuHamburger = document.querySelector(".hamburgerSidebar");
    contenuHamburger.innerHTML = contenuHeader.innerHTML;
    let a = document.querySelectorAll(".hamburgerSidebar a");

    boutonHamburger.addEventListener("click", (e) => {
        e.preventDefault();
        contenuHamburger.style.transform = "translateY(0%)";
        hamburgerOverlay.style.display = "block";
    })

    for (let i = 0; i < a.length; i++) {
        a[i].addEventListener("click", (e) => {
            contenuHamburger.style.transform = "translateY(-100%)";
            hamburgerOverlay.style.display = "none";
        })
    }

    hamburgerOverlay.addEventListener("click", (e) => {
        e.preventDefault();
        contenuHamburger.style.transform = "translateY(-100%)";
        hamburgerOverlay.style.display = "none";

    })

    boutonHamburger.addEventListener("keydown", (e) => {
        if (e.repeat === false && e.which === 27) {
            contenuHamburger.style.transform = "translateY(-100%)";
            hamburgerOverlay.style.display = "none";
        }
    })



}

hamburger();