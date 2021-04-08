// systeme de scroll

const activeScroll = function () {

    const header = document.querySelector(".header");
    const projets = document.querySelector(".headerProjets")

    window.addEventListener("scroll", (e) => {

        // console.log(window.innerHeight);
        // console.log(window.scrollY);
        // console.log(document.body.offsetHeight);

        scrollValue = (window.innerHeight + window.scrollY) / (document.body.offsetHeight)

        if (scrollValue > 0.54) {
            header.classList.add("backgroundHeader");
        } else {
            header.classList.remove("backgroundHeader")
        }
        if (scrollValue > 0.65 && scrollValue < 0.86) {
            projets.classList.add("navActive");
        } else {
            projets.classList.remove("navActive");
        }
        // console.log(scrollValue);
    })

}

activeScroll()

// systeme de filtre

const activeFiltre = function () {

    const allFiltre = document.querySelector(".allFiltre");
    const htmlCss = document.querySelector(".htmlCss");
    const javaScript = document.querySelector(".javaScript");
    const codageHtmlCss = document.querySelectorAll(".codageHtmlCss");
    const codageJavascript = document.querySelectorAll(".codageJavascript");

    codageHtmlCss.forEach(element => console.log(element));

    // ECOUTE AUCUN FILTRE

    allFiltre.addEventListener("click", (e) => {
        allFiltre.classList.add("activeFiltre");
        htmlCss.classList.remove("activeFiltre");
        javaScript.classList.remove("activeFiltre");

        if(allFiltre.classList[1] === "activeFiltre"){
            codageHtmlCss.forEach(element => element.style.display = "block");
            codageJavascript.forEach(element => element.style.display = "block");
        }

    })

    // ECOUTE FILTRE HTML/CSS

    htmlCss.addEventListener("click", (e) => {

        htmlCss.classList.add("activeFiltre");
        allFiltre.classList.remove("activeFiltre");
        javaScript.classList.remove("activeFiltre");

        if(htmlCss.classList[1] === "activeFiltre"){
            codageJavascript.forEach(element => element.style.display = "none");
            codageHtmlCss.forEach(element => element.style.display = "block");

        }

    })

    //ECOUTE FILTRE JAVASCRIPT

    javaScript.addEventListener("click", (e) => {

        javaScript.classList.add("activeFiltre");
        htmlCss.classList.remove("activeFiltre");
        allFiltre.classList.remove("activeFiltre");

        if(javaScript.classList[1] === "activeFiltre"){
            codageHtmlCss.forEach(element => element.style.display = "none");
            codageJavascript.forEach(element => element.style.display = "block");

        }

    })

}

activeFiltre()