const backgroundClose = document.querySelector(".menu-background-close");

const closeMenu = () => {
  const background = document.querySelector(
    ".menu-background-close .background"
  );
  background.addEventListener("click", (e) => {
    backgroundClose.classList.remove("menu-background-open");
  });
};

const openMenu = () => {
  const hamburger = document.querySelector(".burger-menu");
  hamburger.addEventListener("click", (e) => {
    backgroundClose.classList.add("menu-background-open");
  });
};

closeMenu();
openMenu();
