<script setup>
import Projets from '../components/Projets.vue'
import APropos from '../components/APropos.vue'
import Banniere from '@/components/Banniere.vue';
import Contact from '@/components/Contact.vue';

</script>

<template>
  <main>
    <Banniere/>
    <APropos/>
    <Projets/>
    <Contact/>
  </main>
</template>

<style scoped lang="scss">
  main {
    max-width: 90%;
    margin: 4rem auto;
    >section {
      padding: 120px 0;
    }
  }
</style>
