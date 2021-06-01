const span1 = document.querySelector(".span1");
const span2 = document.querySelector(".span2");
const span3 = document.querySelector(".span3");
const hamburger = document.querySelector(".hamburger");

const animHamburger = function() {

    hamburger.addEventListener("click", () => {

        span1.classList.toggle("anim1");
        span2.classList.toggle("anim2");
        span3.classList.toggle("anim3");
        hamburger.classList.toggle("hamburgerAnim");


    })

}

animHamburger();