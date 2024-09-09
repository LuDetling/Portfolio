<script setup>
import { ref, onMounted } from 'vue'

const projects = ref([]);
const urlPictures = 'src/assets/images/';

const fetchProjects = async (url) => {
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
        <div v-for="project in projects" :key="project.id" class="card-projet">
            <img :src="urlPictures + project.picture" />
            <div class="content-project-absolute">
                <div>{{ project.title }}</div>
                <div>{{ project.description }}</div>
            </div>
        </div>
    </div>
</template>

<style scoped lang="scss">
.content-projects {
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