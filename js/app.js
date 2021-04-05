const header = document.querySelector(".header");
console.log(header.classList);
window.addEventListener("scroll", (e) => {

    // console.log(window.innerHeight);
    // console.log(window.scrollY);
    // console.log(document.body.offsetHeight);

    scrollValue = (window.innerHeight + window.scrollY) / (document.body.offsetHeight)

    if(scrollValue > 0.54){
        header.classList.add("backgroundHeader");
    } else {
        header.classList.remove("backgroundHeader")
    }

    console.log(scrollValue);
})
