<script setup>
import { ref, onMounted } from 'vue'
import CardsProjets from './CardsProjets.vue';
import { API_URL } from '@/config';

const projets = ref([]);

const fetchProjets = async () => {
    try {
        const response = await fetch(API_URL + "/projects");
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
        <h2>Projets</h2>
        <div class="content-projets">
            <CardsProjets :projets=projets />
        </div>
        <!-- <a href="#projets">+</a>
        <div>Projets en plus qui s'ouvre</div> -->
    </section>
</template>

<style scoped lang="scss">
#projets {

    .content-projets {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;

        @media screen and (max-width: 938px) {
            display: flex;
            flex-wrap: wrap;
        }

        .card-projet {
            width: 25%;
            position: relative;

            .content-projet-absolute {
                position: absolute;
                bottom: 0;
                left: 0;
                background-color: green;
            }
        }
    }
}
</style>