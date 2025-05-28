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
    <main class="flex gap-4 flex-wrap justify-between">
        <div class="w-full md:w-3/6 ">
            <img :src="getImageUrl(projet)" :alt='projet.title'>
        </div>
        <div class="w-full md:w-2/6">
            <h1 class="text-5xl mb-4">{{ projet.title }}</h1>
            <p>{{ projet.description }}</p>
            <a :href="projet.link" class="btn btn-primary" v-if="projet.link" target="_blank">Découvrir</a>
        </div>
    </main>
</template>

<style scoped lang="scss"></style>