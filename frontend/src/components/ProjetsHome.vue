<script setup>
import { ref, onMounted } from 'vue'
import Cards from './Cards.vue';

const projects = ref([]);

const fetchProjects = async () => {
    try {
        const response = await fetch("https://127.0.0.1:8000/api/projects");
        if (!response.ok) throw new Error('Erreur lors du fetch des projects')
        projects.value = await response.json();
        console.log(projects.value);
    } catch (error) {
        console.error(error.message)
    }
}

onMounted(() => {
    fetchProjects()
})
</script>

<template>
    <div class="content-projects">
        <Cards :projects=projects></Cards>
        <Cards :projects=projects></Cards>
        <Cards :projects=projects></Cards>
        <Cards :projects=projects></Cards>
    </div>
</template>

<style scoped lang="scss">
.content-projects {
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

        .content-project-absolute {
            position: absolute;
            bottom: 0;
            left: 0;
            background-color: green;
        }
    }
}
</style>