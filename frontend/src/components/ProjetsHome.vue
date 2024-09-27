<script setup>
import { ref, onMounted } from 'vue'
import Cards from './Cards.vue';

const projets = ref([]);

const fetchProjets = async () => {
    try {
        const response = await fetch("https://127.0.0.1:8000/api/projects");
        if (!response.ok) throw new Error('Pas de projets trouvé')
        projets.value = await response.json();
        console.log(projets.value);
    } catch (error) {
        console.error(error.message)
    }
}

onMounted(() => {
    fetchProjets()
})
</script>

<template>
    <div class="content-projets">
        <Cards :projets=projets></Cards>
        <Cards :projets=projets></Cards>
        <Cards :projets=projets></Cards>
        <Cards :projets=projets></Cards>
    </div>
</template>

<style scoped lang="scss">
.content-projets {
    display: flex;
    flex-wrap: wrap;
    gap: 2rem 3%;
    margin: 2rem auto;

    .card-projet {
        width: 25%;
        position: relative;

        img {
            display: block;
            width: 100%;
        }

        .content-projet-absolute {
            position: absolute;
            bottom: 0;
            left: 0;
            background-color: green;
        }
    }
}
</style>