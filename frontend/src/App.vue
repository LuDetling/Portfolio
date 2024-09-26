<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <header>
    <div class="wrapper">
      <nav>
        <RouterLink to="/">Lucas Detling</RouterLink>
        <div>
          <RouterLink to="/">A propos</RouterLink>
          <RouterLink to="#projects">Projets</RouterLink>
        </div>
      </nav>
    </div>
  </header>

  <RouterView />
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
  margin-bottom: 2rem;
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
