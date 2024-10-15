<script setup>
import { RouterLink, RouterView } from 'vue-router'
import Footer from './components/Footer.vue';

</script>

<template>
  <header>
    <div class="wrapper">
      <nav>
        <a href="#">Accueil</a>
        <a href="#apropos">A propos</a>
        <!-- <a href="#">LD</a> -->
        <a href="#projets">Projets</a>
        <a href="#contact">Contact</a>
      </nav>
    </div>
  </header>

  <RouterView />

  <Footer />
</template>

<style scoped lang="scss">
header {
  position: sticky;
  top: 1rem;
  background-color: rgba(51, 93, 74, 0.8);
  z-index: 9999;
  /* box-shadow: 0 4px 4px hsla(0, 0%, 4%, .3); */
  width: fit-content;
  margin: auto;
  backdrop-filter: blur(4px);
  overflow: hidden;
  border-radius: 40px;
}

nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin: auto;
  font-size: 1.2rem;


  a {
    text-decoration: none;
    color: white;
    transition: .2s;
    padding: 1rem;
    position: relative;
    display: block;
    overflow: hidden;

    &:hover {
      background-color: #59786a;
    }
  }
}
</style>
