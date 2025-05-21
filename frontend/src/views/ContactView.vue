<script setup>
import Contact from '@/components/Contact.vue';
import { ref } from 'vue';

</script>

<template>
    <main>
        <Contact />
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
