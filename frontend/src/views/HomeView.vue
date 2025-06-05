<script setup>
import Projects from '../components/Projects.vue'
import About from '../components/About.vue'
import Banniere from '@/components/Banniere.vue';
import Contact from '@/components/Contact.vue';
import Prestations from '@/components/Prestations.vue';
import Cv from '@/components/Cv.vue';
</script>

<template>
  <main>
    <Banniere />
    <About />
    <Projects />
    <Cv />
    <!-- <Prestations /> -->
    <Contact />
  </main>
</template>

<style scoped lang="scss">

</style>
