const items = document.querySelectorAll("img");
const nbSlide = items.length;
const suivant = document.querySelector(".droite");
const precedent = document.querySelector(".gauche");
let count = 0;

function slideSuivante() {
    items[count].classList.remove("active");

    if(count < nbSlide - 1) {
        count++;
    } else {
        count = 0;
    }

    items[count].classList.add("active");
}

suivant.addEventListener("click", slideSuivante);

function slidePrecedente (){
    items[count].classList.remove("active")

    if(count > 0){
        count--;
    } else {
        count = nbSlide - 1;
    }

    items[count].classList.add("active");
}

precedent.addEventListener("click", slidePrecedente);

function keyPress(e) {
    if(e.keyCode === 37){
        slidePrecedente();
    } else if(e.keyCode === 39){
        slideSuivante();
    }
}

document.addEventListener("keydown", keyPress);