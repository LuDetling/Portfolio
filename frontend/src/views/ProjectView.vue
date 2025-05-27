<script setup>
import { API_URL, IMAGE_URL } from '@/config';
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router'


const route = useRoute()
const projet = ref({});
const urlPictures = '/src/assets/images/';


const fetchProjet = async () => {
    try {
        const response = await fetch(API_URL + '/project/' + route.params.projetId);
        if (!response.ok) throw new Error('Pas de projet trouvé')
        projet.value = await response.json();
    } catch (error) {
        console.log(error);
    }
}

fetchProjet();

const getImageUrl = (projet) => {    
    return IMAGE_URL + '/projects/' + projet.picture;
}
</script>

<template>
    <h1>{{ projet.title }}</h1>
    <img :src="getImageUrl(projet)" :alt='projet.title'>
    <p>{{ projet.description }}</p>
</template>

<style scoped lang="scss"></style>