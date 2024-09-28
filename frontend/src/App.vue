<script setup>
import { RouterLink, RouterView } from 'vue-router'
import Footer from './components/Footer.vue';
</script>

<template>
  <header>
    <div class="wrapper">
      <nav>
        <RouterLink to="/">Lucas Detling</RouterLink>
        <div>
          <RouterLink to="/">A propos</RouterLink>
          <a href="#projets">Projets</a>
        </div>
      </nav>
    </div>
  </header>

  <RouterView />

  <Footer />
</template>

<style scoped lang="scss">
header {
  position: sticky;
  top: 0;
  background-color: #1f1f1f;
  z-index: 9999;
  box-shadow: 0 4px 4px hsla(0, 0%, 4%, .3);
}

nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  max-width: 80%;
  margin: auto;
  padding: 2rem 0;
  font-size: 1.2rem;


  a {
    text-decoration: none;
    color: white;
    transition: .2s;

    &:hover {
      color: #4A90E2;
    }
  }

  div {
    a {
      &:not(:last-child) {
        margin-right: 2rem;
      }
    }
  }
}
</style>
