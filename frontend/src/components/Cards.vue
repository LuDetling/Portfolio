<template>
    <div v-for="project in projects" :key="project.id" class="card-projet">
        <img :src="urlPictures + project.picture" />
        <div class="content-project-absolute-background">
            <div class="content-project-absolute">
                <div>{{ project.title }}</div>
                <div>{{ project.shortDescription }}</div>
                <a :href='"project/" + project.id' class="more">Voir plus</a>
            </div>
        </div>
    </div>
</template>

<script setup>
const urlPictures = 'src/assets/images/';

const props = defineProps({
    projects: Array
})
</script>

<style scoped lang="scss">
.card-projet {
    width: 21%;
    margin: auto;
    overflow: hidden;
    position: relative;

    &:hover {
        .content-project-absolute-background {
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

    .content-project-absolute-background {
        background-color: rgba(0, 0, 0, .7);
        position: absolute;
        overflow: hidden;
        bottom: 0;
        width: 100%;
        height: 0;
        transition: .3s;
        display: flex;
        align-items: center;

        .content-project-absolute {
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