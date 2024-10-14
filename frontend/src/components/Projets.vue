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
    <section id="projets" class="section-projets">
        <h2>Projets</h2>
        <div class="content-projets">
            <Cards :projets=projets></Cards>
            <Cards :projets=projets></Cards>
            <Cards :projets=projets></Cards>
        </div>
        <a href="#projets">+</a>
        <div>Projets en plus qui s'ouvre</div>
    </section>
</template>

<style scoped lang="scss">
.section-projets {
    h2 {
        text-align: center;
        margin: 2rem 0;
        font-size: 1.5rem;
    }

    .content-projets {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-template-rows: repeat(2, 1fr);
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