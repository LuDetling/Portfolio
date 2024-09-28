<script setup>
import ProjetsHome from '../components/ProjetsHome.vue'
import APropos from '../components/APropos.vue'
</script>

<template>
  <main>
    <APropos id="apropos" />
    <ProjetsHome id="projets" />
  </main>
</template>

<style scoped lang="scss">
  main {
    max-width: 80%;
    margin: 4rem auto;
    >section {
      margin: 0 0 10rem;
    }
  }
</style>
