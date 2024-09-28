<script setup>
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router'

const route = useRoute()
const projet = ref({});
const urlPictures = '/src/assets/images/';


const fetchProjet = async () => {
    try {
        const response = await fetch('https://127.0.0.1:8000/api/project/' + route.params.projetId);
        if (!response.ok) throw new Error('Pas de projet trouvé')
        projet.value = await response.json();
    } catch (error) {
        console.log(error);
    }
}

onMounted(() => {
    fetchProjet();
})
</script>

<template>
    <h1>{{ projet.title }}</h1>
    <img :src="urlPictures + projet.picture" :alt='projet.title'>
    <p>{{ projet.description }}</p>
</template>

<style scoped lang="scss"></style>