<template>
    <div v-for="projet in projets" :key="projet.id" class="card-projet">
        <router-link :to="{ name: 'projet', params: { projetId: projet.id } }">
            <img :src="urlPictures + projet.picture" />
            <div class="on-card">
                <div class="title">{{ projet.title }}</div>
                <div class="tags">
                    <div class="tag" v-for="(tag, index) in projet.tags" :key="tag.id">
                        {{ tag.name }}
                    </div>
                </div>
                <div>{{ projet.shortDescription }}</div>
                <!-- <a :href='"projet/" + projet.id' class="more">Voir plus</a> -->
            </div>
        </router-link>
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
    margin: auto;
    width: 250px;

    a {
        color: white;
        position: relative;
        display: block;
        border-radius: 10px;
        overflow: hidden;

        &:hover {
            .on-card {
                transform: translateY(0);
            }
        }

        &::after {
            /* content: ''; */
            width: 100%;
            height: 20px;
            background-color: #2f5041;
            position: absolute;
            bottom: 0;
            z-index: 0;
        }
    }

    img {
        width: 100%;
        display: block;
        border-radius: inherit;
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
    }

    .on-card {
        position: absolute;
        /* top: calc(100% - 6rem); */
        bottom: 0;
        padding: 1rem;
        background-color: #2f5041;
        width: 100%;
        border-top-left-radius: 25px;
        transform: translateY(calc(100% - 3rem));
        box-sizing: border-box;
        transition: .3s;
        z-index: 1;

        &::before {
            content: '';
            position: absolute;
            top: -50px;
            right: 0;
            width: 25px;
            height: 50px;
            background-color: transparent;
            border-bottom-right-radius: 25px;
            box-shadow: 0 25px 0 0 #2f5041;
        }

        .tags {
            display: flex;
            flex-wrap: wrap;
            gap: .5rem;
            margin-bottom: 1rem;

            .tag {
                padding: .3rem .5rem;
                background-color: #59786a;
                border-radius: 20px;
            }
        }
    }

    .title {
        margin-bottom: 1rem;
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