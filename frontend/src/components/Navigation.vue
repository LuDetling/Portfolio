<script setup>
import { RouterLink, RouterView, useRoute } from 'vue-router'
import { onMounted, onUnmounted, ref } from 'vue';
const activeSection = ref('banniere');
const sections = ref(['banniere', 'about', 'projets', 'contact', 'prestations']);

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
</script>

<template>
    <header>
        <div class="wrapper">
            <nav>
                <div class="show-text">
                    <router-link to="/#about" :class="{ active: activeSection === 'about' }">A propos</router-link>
                </div>
                <div class="show-text">
                    <router-link to="/#projets" :class="{ active: activeSection === 'projets' }">Projets</router-link>
                </div>
                <router-link to="/contact" activeClass>Contact</router-link>
            </nav>
        </div>
    </header>

</template>