<script setup>
import { RouterLink, RouterView, useRoute } from 'vue-router'
import Footer from './components/Footer.vue';
import { onMounted, onUnmounted, ref } from 'vue';

const activeSection = ref('banniere');
const sections = ref(['banniere', 'apropos', 'projets', 'contact']);

const handleScroll = () => {
  sections.value.forEach(section => {
    const sectionElement = document.getElementById(section);
    if (sectionElement) {
      const rect = sectionElement.getBoundingClientRect();
      if (rect.top >= 0 && rect.top < window.innerHeight / 2) {
        activeSection.value = section; // Met à jour la section active en fonction du scroll
      }
    }
  });
}

onMounted(() => {
  window.addEventListener('scroll', handleScroll);
});

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll);
});

const route = useRoute()
console.log(route.path);


</script>

<template>
  <header>
    <div class="wrapper">
      <nav v-if="route.path === '/'">
      <!-- <nav > -->
        <a href="#" :class="{ active: activeSection === 'banniere' }">Accueil</a>
        <a href="#apropos" :class="{ active: activeSection === 'apropos' }">A propos</a>
        <a href="#projets" :class="{ active: activeSection === 'projets' }">Projets</a>
        <a href="#contact" :class="{ active: activeSection === 'contact' }">Contact</a>
      </nav>
      <nav v-else>
        <router-link to="/#projets">Accueil</router-link>
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
  margin: 0 auto;
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

    &.active {
      background-color: #59786a;
    }
  }
}
</style>
