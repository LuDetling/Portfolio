<script setup>
import { RouterLink, RouterView, useRoute } from 'vue-router'
import Footer from './components/Footer.vue';
import { onMounted, onUnmounted, ref } from 'vue';

const activeSection = ref('banniere');
const sections = ref(['banniere', 'apropos', 'projets', 'contact', 'prestations']);
const darkmode = ref(true);

if (!localStorage.getItem('darkmode')) {
  localStorage.setItem('darkmode', darkmode.value);
} else if (localStorage.getItem('darkmode') === "false") {
  darkmode.value = false;
  document.querySelector('body').classList.remove('darkmode');
} else {
  darkmode.value = true
  document.querySelector('body').classList.add('darkmode');
}

const changeMode = () => {
  darkmode.value = !darkmode.value;
  document.querySelector('body').classList.toggle('darkmode');
  localStorage.setItem('darkmode', darkmode.value)
}

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

</script>

<template>
  <header>
    <div class="wrapper">
      <nav v-if="route.path === '/'">
        <div class="left-nav">
          <a href="#apropos" :class="{ active: activeSection === 'apropos' }">A propos</a>
          <a href="#projets" :class="{ active: activeSection === 'projets' }">Projets</a>
        </div>
        <div class="center-nav">
          <a href="#" class="logo">
            <img src="/src/assets/images/logo-blanc.png" alt="Mon logo">
          </a>
        </div>
        <div class="right-nav">
          <a href="#prestations" :class="{ active: activeSection === 'prestations' }">Prestations</a>
          <a href="#contact" :class="{ active: activeSection === 'contact' }">Contact</a>
        </div>
      </nav>
      <nav v-else>
        <router-link to="/#projets">Accueil</router-link>
      </nav>
    </div>
  </header>
  <button @click="changeMode()" :class="['mode', darkmode ? 'darkmode' : 'lightmode']">
    <font-awesome-icon :icon="['fas', darkmode ? 'moon' : 'sun']" />
  </button>

  <RouterView />

  <Footer />
</template>

<style scoped lang="scss">
.logo {
  padding: 0 1rem;

  img {
    display: block;
    width: 50px;
  }
}

.mode {
  cursor: pointer;
  position: fixed;
  top: 1rem;
  right: 1rem;
  background: none;
  border: none;
  font-size: 1.2rem;

  &:hover {
    animation: rotating 3s linear infinite;

  }

  &.darkmode {
    color: white;
  }

  &.lightmode {
    color: #1f1f1f;
  }
}

@keyframes rotating {
  0% {
    transform: rotate(0deg);
  }

  100% {
    transform: rotate(360deg);
  }
}

header {
  position: sticky;
  top: 1rem;
  z-index: 9999;
  width: fit-content;
  margin: 0 auto;
  overflow: hidden;
  border-radius: 40px;
}

nav {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: stretch;
  margin: auto;
  font-size: 1.2rem;
  background-color: rgba(51, 93, 74, 0.8);
  backdrop-filter: blur(4px);

  .left-nav,
  .right-nav,
  .center-nav {
    display: flex;
  }

  .left-nav,
  .right-nav {
    a {
      width: 110px;
      padding: 0 .3rem;
    }
  }

  a {
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    color: white;
    transition: .2s;
    padding: 1rem 0;
    position: relative;
    overflow: hidden;

    &:hover {
      background-color: rgba($color: #2F5041, $alpha: 1);
    }

    &.active {
      /* background-color: rgba(144, 78, 85, .8); */
      background-color: rgba($color: #2F5041, $alpha: 1);

    }
  }
}
</style>
