<script setup>
import ProjetsHome from '../components/ProjetsHome.vue'
import APropos from '../components/APropos.vue'
import Banniere from '@/components/Banniere.vue';
</script>

<template>
  <main>
    <Banniere/>
    <APropos/>
    <ProjetsHome/>
  </main>
</template>

<style scoped lang="scss">
  main {
    max-width: 80%;
    margin: 4rem auto;
    >section {
      padding: 200px 0;
    }
  }
</style>
