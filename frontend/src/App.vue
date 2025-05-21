<script setup>
import { RouterLink, RouterView, useRoute } from 'vue-router'
import Footer from './components/Footer.vue';
import { onMounted, onUnmounted, ref } from 'vue';

const activeSection = ref('banniere');
const sections = ref(['banniere', 'apropos', 'projets', 'contact', 'prestations']);

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
      <nav>
        <!-- <div class="left-nav"> -->
          <!-- <a href="#apropos" :class="{ active: activeSection === 'apropos' }">A propos</a> -->
          <router-link to="/" activeClass>Accueil</router-link>
          <!-- <a href="#projets" :class="{ active: activeSection === 'projets' }">Projets</a> -->
          <router-link to="/projets" activeClass>Projets</router-link>
        <!-- </div> -->
        <!-- <div class="center-nav">
          <router-link to="/" class="logo">
            <img src="/src/assets/images/logo-blanc.png" alt="Mon logo">
          </router-link>
        </div> -->
        <!-- <div class="right-nav"> -->
          <!-- <a href="#prestations" :class="{ active: activeSection === 'prestations' }">Prestations</a> -->
          <router-link to="/contact" activeClass>Contact</router-link>
          <router-link to="/login" activeClass>Login</router-link>
        <!-- </div> -->
      </nav>
    </div>
  </header>

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
  // background-color: rgba(51, 93, 74, 0.8);
  background-color: rgba($color: #9094ff, $alpha: .8);
  backdrop-filter: blur(4px);
  height: 50px;

  .left-nav,
  .right-nav,
  .center-nav {
    display: flex;
  }

  // .left-nav,
  // .right-nav {
  // }
  // a {
  //   // width: 110px;
  //   padding: 0 .5rem;
  // }
  
  a {
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    color: #ebfef8;
    transition: .2s;
    padding: 1rem 0.5rem;
    position: relative;
    overflow: hidden;
    width: 85px;
    
    &:hover,&.router-link-exact-active {
      background-color: #9094ff;
      // background-color: rgba($color: #2F5041, $alpha: 1);
    }

    &.active {
      /* background-color: rgba(144, 78, 85, .8); */
      // background-color: rgba($color: #2F5041, $alpha: 1);

    }
  }
}
</style>
