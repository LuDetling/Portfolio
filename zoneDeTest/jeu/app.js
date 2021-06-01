const moveRacket = () => {

    //bordure

    const container = document.querySelector(".container");
    const containerBordure = container.getBoundingClientRect();
    const containerBordureG = containerBordure.left;
    const containerBordureD = containerBordure.right;


        //si la racket g est supp bordure g et si racket d est inf bordure d

    container.addEventListener("mousemove", (e) => {

        //RACKET 

        const racket = document.querySelector(".racket");
        const racketPosition = racket.getBoundingClientRect();
        const racketLeft = racketPosition.left;
        const racketRight = racketPosition.right;
        const racketCentre = (racketRight - racketLeft) / 2;

        const positionMouse = e.clientX;

        // si la position de la souris est supérieur ou égale a la bordure gauche + centre de la racket
        // et si la position de la souris est inférieure ou égale a la bordure droite - centre de la racket
        // alors la position de la racket = position de la souris - le centre de la racket

        if(positionMouse >= containerBordureG + racketCentre && positionMouse <= containerBordureD - racketCentre) {
            racket.style.left = positionMouse - racketCentre + "px";
        }


    })




}

moveRacket();