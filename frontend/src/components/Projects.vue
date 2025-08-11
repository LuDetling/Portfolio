<script setup>
import { ref, onMounted } from 'vue'
import CardsProjets from './CardsProjets.vue';
import { VITE_API_URL } from '@/config';

const projets = ref([]);

const fetchProjets = async () => {
    try {
        const response = await fetch(VITE_API_URL + "/projects");
        if (!response.ok) throw new Error('Pas de projets trouvé')

        let data = await response.json();
        projets.value = data.projects;
    } catch (error) {
        console.error(error.message)
    }
}

onMounted(() => {
    fetchProjets()
})


</script>

<template>
    <section id="projets">
        <div class="terminal-header-project terminal-header">
            <h2>
                ~/Projects.vue
            </h2>
        </div>
        <div class="terminal-window-project terminal-window">
            <div class="terminal-body terminal-body-project ">
                <div class="content-projets grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <CardsProjets :projets=projets  heading="h3"/>
                </div>
                <router-link to="/projets" class="btn btn-secondary more">Voir plus</router-link>
            </div>
        </div>
    </section>
</template>

<style scoped lang="scss">
#projets {
    .btn-secondary {
        display: block;
        width: fit-content;
        margin-inline: auto;
        margin-top: 3rem;
    }

    .more {
        font-size: 1rem;
    }
}
</style>