// systeme de scroll

const backgroundNav = () => {
    const header = document.querySelector("header");

    document.addEventListener("scroll", (e) => {
        let scrollValue = window.scrollY;

        if(scrollValue > 50) {
            header.classList.add("backgroundHeader");
        } else {
            header.classList.remove("backgroundHeader");
        }
    })
}

backgroundNav()

// nav qui change de couleur lors du scroll

const interSection = () => {
    const sections = document.querySelectorAll("section");
    const navigation = document.querySelectorAll(".navigation a")

    document.addEventListener("scroll", (e) => {
        let scrollValue = window.scrollY; // hauteur du scroll

        if (scrollValue >= sections[0].offsetTop * 0.9 && scrollValue < sections[1].offsetTop * 0.9){
            navigation[0].classList.add("navActive");
        } else {
            navigation[0].classList.remove("navActive");
        }
        if (scrollValue >= sections[1].offsetTop * 0.9 && scrollValue < sections[2].offsetTop * 0.9) {
            navigation[1].classList.add("navActive")
        } else {
            navigation[1].classList.remove("navActive")
        }
        if (scrollValue >= sections[2].offsetTop * 0.9 && scrollValue < sections[3].offsetTop * 0.9) {
            navigation[2].classList.add("navActive")
        } else {
            navigation[2].classList.remove("navActive")
            navigation[3].classList.remove("navActive")
        }
        if (scrollValue > sections[3].offsetTop * 0.9) {
            navigation[3].classList.add("navActive")
            navigation[2].classList.remove("navActive")
        } else {
            navigation[3].classList.remove("navActive")
        }
    })

}

interSection();
// systeme de filtre

const activeFiltre = function () {

    const allFiltre = document.querySelector(".allFiltre");
    const htmlCss = document.querySelector(".htmlCss");
    const javaScript = document.querySelector(".javaScript");
    const phpMysql = document.querySelector(".phpMysql");

    const codageHtmlCss = document.querySelectorAll(".codageHtmlCss");
    const codageJavascript = document.querySelectorAll(".codageJavascript");
    const codagePhpMysql = document.querySelectorAll(".codagePhpMysql");

    // ECOUTE AUCUN FILTRE

    allFiltre.addEventListener("click", (e) => {

        allFiltre.classList.add("activeFiltre");
        htmlCss.classList.remove("activeFiltre");
        javaScript.classList.remove("activeFiltre");
        phpMysql.classList.remove("activeFiltre");

        if(allFiltre.classList[1] === "activeFiltre"){
            codageHtmlCss.forEach(element => element.style.display = "flex");
            codageJavascript.forEach(element => element.style.display = "flex");
            codagePhpMysql.forEach(element => element.style.display = "flex");
        }

    })

    // ECOUTE FILTRE HTML/CSS

    htmlCss.addEventListener("click", (e) => {

        htmlCss.classList.add("activeFiltre");
        allFiltre.classList.remove("activeFiltre");
        javaScript.classList.remove("activeFiltre");
        phpMysql.classList.remove("activeFiltre");

        if(htmlCss.classList[1] === "activeFiltre"){
            codageJavascript.forEach(element => element.style.display = "none");
            codagePhpMysql.forEach(element => element.style.display = "none");
            codageHtmlCss.forEach(element => element.style.display = "flex");

        }

    })

    //ECOUTE FILTRE JAVASCRIPT

    javaScript.addEventListener("click", (e) => {

        javaScript.classList.add("activeFiltre");
        htmlCss.classList.remove("activeFiltre");
        allFiltre.classList.remove("activeFiltre");
        phpMysql.classList.remove("activeFiltre");

        if(javaScript.classList[1] === "activeFiltre"){
            codageHtmlCss.forEach(element => element.style.display = "none");
            codagePhpMysql.forEach(element => element.style.display = "none");
            codageJavascript.forEach(element => element.style.display = "flex");

        }

    })

    //ECOUTE FILTRE PHP/MYSQL
    phpMysql.addEventListener("click", (e) => {
        phpMysql.classList.add("activeFiltre");
        htmlCss.classList.remove("activeFiltre");
        javaScript.classList.remove("activeFiltre");
        allFiltre.classList.remove("activeFiltre");

        if(phpMysql.classList[1] === "activeFiltre"){
            codageHtmlCss.forEach(element => element.style.display = "none");
            codageJavascript.forEach(element => element.style.display = "none");
            codagePhpMysql.forEach(element => element.style.display = "flex");

        }

    })


}

activeFiltre()

// FLECHE RETOUR HAUT DE PAGE

const flecheUp = () => {
    const flecheUp = document.querySelector(".goTop");

    document.addEventListener("scroll", (e) => {
        if(window.scrollY === 0){
            flecheUp.style.display = "none";
        } else {
            flecheUp.style.display = "block";
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

    for(let i = 0; i < a.length; i++){
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
        if(e.repeat === false && e.which === 27){
            contenuHamburger.style.transform = "translateY(-100%)";
            hamburgerOverlay.style.display = "none";
        }
    })



}

hamburger();