<template>
    <div v-for="projet in projets" :key="projet.id" class="card-projet">
        <router-link :to="{ name: 'projet', params: { projetId: projet.id } }">
            <img :src="getImageUrl(projet)" />
            <div class="on-card bg-base-100">
                <div class="title">{{ projet.title }}</div>
                <div class="description">{{ projet.shortDescription }}</div>
                <div class="flex flex-wrap gap-2">
                    <div class="badge badge-soft badge-secondary" v-for="(tag, index) in projet.tags" :key="tag.id">
                        {{ tag.name }}
                    </div>
                </div>
                <div class="btn btn-primary mt-4">Accéder</div>
                <!-- <a :href='"projet/" + projet.id' class="more">Voir plus</a> -->
            </div>
        </router-link>
    </div>
</template>

<script setup>
import { IMAGE_URL } from '@/config';


const urlPictures = '/src/assets/images/';

const getImageUrl = (projet) => {
    return IMAGE_URL + '/projects/' + projet.picture;
}

const props = defineProps({
    projets: Array
})
</script>

<style scoped lang="scss">
.card-projet {
    margin: auto;
    width: 100%;
    // height: 350px;

    a {
        position: relative;
        display: block;
        border-radius: 10px;
        overflow: hidden;
        height: 350px;
        width: 100%;
        border: 2px solid #C1DBE3;

        &:hover {
            .on-card {
                transform: translateY(0);
            }
        }
    }

    img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: top;
        display: block;
        border-radius: inherit;
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
    }

    .on-card {
        position: absolute;
        bottom: 0;
        padding: 1rem;
        width: 100%;
        border-top-left-radius: 25px;
        transform: translateY(calc(100% - 79px));
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
            box-shadow: 0 25px 0 0 #0f172a;
        }

        .description {
            margin-bottom: 1rem;
            font-size: 14px;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
            line-height: 15px;
        }
    }

    .title {
        margin-bottom: .5rem;
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