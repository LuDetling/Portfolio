<template>
    <div v-for="projet in projets" :key="projet.id" class="card-projet">
        <img :src="urlPictures + projet.picture" />
        <div class="title">{{ projet.title }}</div>
        <div>{{ projet.shortDescription }}</div>
        <a :href='"projet/" + projet.id' class="more">Voir plus</a>
        <router-link :to="{ name: 'projet', params: { projetId: projet.id } }"></router-link>
    </div>
</template>

<script setup>
const urlPictures = '/src/assets/images/';

const props = defineProps({
    projets: Array
})
</script>

<style scoped lang="scss">
.card-projet {
    width: 200px;
    margin: auto;
    overflow: hidden;
    position: relative;
    padding: 1rem;
    background-color: #1f131f;
    border-radius: 20px;

    img {
        width: 100%;
        display: block;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
        margin-bottom: 1rem;
    }

    .title {
        margin-bottom: .3rem;
    }

    .more {
        color: #1f1f1f;
        display: block;
        width: fit-content;
        text-align: center;
        margin: 1rem auto 0;
        background-color: white;
        padding: .3rem 1.5rem;
        text-decoration: none;
        transition: .3s;
        &:hover {
            background-color: #1f131f;
            color: white;
        }
    }
}
</style>