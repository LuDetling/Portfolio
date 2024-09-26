<template>
    <div v-for="projet in projets" :key="projet.id" class="card-projet">
        <img :src="urlPictures + projet.picture" />
        <div class="content-projet-absolute-background">
            <div class="content-projet-absolute">
                <div>{{ projet.title }}</div>
                <div>{{ projet.shortDescription }}</div>
                <a :href='"projet/" + projet.id' class="more">Voir plus</a>
                <router-link :to="{ name: 'projet', params: { projetId: projet.id } }"></router-link>
            </div>
        </div>
    </div>
</template>

<script setup>
const urlPictures = 'src/assets/images/';

const props = defineProps({
    projets: Array
})
</script>

<style scoped lang="scss">
.card-projet {
    width: 21%;
    margin: auto;
    overflow: hidden;
    position: relative;

    &:hover {
        .content-projet-absolute-background {
            height: 100%;
        }
    }

    &:first-child {
        border-top-left-radius: 20px;
    }

    &:nth-child(4) {
        border-top-right-radius: 20px;
    }

    &:nth-child(5) {
        border-bottom-left-radius: 20px;
    }

    &:nth-child(8) {
        border-bottom-right-radius: 20px;
    }

    img {
        width: 100%;
        display: block;
    }

    .content-projet-absolute-background {
        background-color: rgba(0, 0, 0, .7);
        position: absolute;
        overflow: hidden;
        bottom: 0;
        width: 100%;
        height: 0;
        transition: .3s;
        display: flex;
        align-items: center;

        .content-projet-absolute {
            padding: 1rem;
            width: 100%;
            position: relative;

            .more {
                color: #1f1f1f;
                display: block;
                width: fit-content;
                text-align: center;
                margin: 2rem auto 0;
                background-color: white;
                padding: .3rem 1.5rem;
                text-decoration: none;
            }
        }
    }
}
</style>