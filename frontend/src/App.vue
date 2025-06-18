<script setup>
import Footer from './components/Footer.vue';
import Navigation from './components/Navigation.vue';
import { RouterLink, RouterView, useRoute } from 'vue-router'
import { onMounted, onUnmounted, ref } from 'vue';
import { useAuthStore } from './stores/auth';

const activeSection = ref('banniere');
const sections = ref(['banniere', 'about', 'projets', 'cv', 'contact', 'prestations']);

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
const auth = useAuthStore()
const open = ref(false)

</script>

<template>
  <header>
    <div class="wrapper">
      <nav id="desktop">
        <router-link to="/#about" :class="{ active: activeSection === 'about' }">A propos</router-link>
        <router-link to="/#projets" :class="{ active: activeSection === 'projets' }">Projets</router-link>
        <router-link to="/#cv" :class="{ active: activeSection === 'cv' }">CV</router-link>
        <router-link to="/#contact" activeClass>Contact</router-link>
        <div class="flex gap-4" v-if="auth.user">
          <router-link to="/admin" activeClass>Admin</router-link>
          <button @click="auth.logout()">Logout</button>
        </div>
      </nav>
      <button class="icone-burger" @click="open = !open">
        <font-awesome-icon :icon="['fas', 'bars']" />
      </button>
      <nav id="burger" :class="open ? 'open' : null">
        <ul>
          <li>
            <router-link to="/#about" :class="{ active: activeSection === 'about' }">A propos</router-link>
          </li>
          <li>
            <router-link to="/#projets" :class="{ active: activeSection === 'projets' }">Projets</router-link>
          </li>
          <li>
            <router-link to="/#cv" :class="{ active: activeSection === 'cv' }">CV</router-link>
          </li>
          <li>
            <router-link to="/#contact" activeClass>Contact</router-link>
          </li>
        </ul>
      </nav>
    </div>
  </header>

  <div class="content">
    <RouterView />
  </div>

  <Footer />
</template>

<style lang="scss" scoped>
#desktop {
  @media screen and (max-width: 499px) {
    display: none;
  }
}


.icone-burger {
  margin-left: auto;
  display: block;
}

#burger,
.icone-burger {
  @media screen and (min-width: 500px) {
    display: none;
  }
}

#burger {
  max-height: 0;
  transition: .5s;
  background: rgba($color: #0f172a, $alpha: .5);
  padding: 0;
  backdrop-filter: blur(10px);

  &.open {
    max-height: 120px;
    padding: 10px;
  }
}

header {
  z-index: 100;
}

.wrapper {
  position: fixed;
  top: 20px;
  right: 20px;

  nav {
    display: flex;
    gap: 1rem;
    backdrop-filter: blur(10px);
    border-radius: 10px;
    overflow: hidden;
    padding: 10px;

  }

  a,
  button {
    transition: .3s;
    cursor: pointer;
    font-family: 'Courier New', Courier, monospace;

    &:hover,
    &:active,
    &:focus {
      // text-shadow: 0 5px 20px rgba(0, 255, 65, 0.7);
      text-shadow: 0 5px 20px rgba(212, 212, 212, .7);
    }
  }
}

.content {
  z-index: 1;
  margin: 20px;
}
</style>
