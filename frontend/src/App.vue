<script setup>
import { RouterLink, RouterView, useRoute } from 'vue-router'
import Footer from './components/Footer.vue';
import { onMounted, onUnmounted, ref } from 'vue';

const activeSection = ref('banniere');
const sections = ref(['banniere', 'apropos', 'projets', 'contact', 'prestations']);
const darkmode = ref(false);

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
    <svg v-if="!darkmode" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
      stroke="currentColor" className="size-6">
      <path strokeLinecap="round" strokeLinejoin="round"
        d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
    </svg>
    <svg v-else xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
      stroke="currentColor" className="size-6">
      <path strokeLinecap="round" strokeLinejoin="round"
        d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
    </svg>
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

  svg {
    width: 32px;
  }

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
