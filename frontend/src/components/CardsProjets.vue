<template>
    <div v-for="projet in projets" :key="projet.id"
        :class="['card-projet', projet.id == openInfo ? 'open-info' : null]">
        <img :src="getImageUrl(projet)" />
        <div class="blur-card">
            <div class="on-card bg-base-100">
                <div class="title flex justify-between">{{ projet.title }} <button @click="toggle(projet.id)"
                        class="cursor-pointer"><font-awesome-icon :icon="['fas', 'plus']" /></button>
                </div>
                <div class="description" v-html="projet.shortDescription"></div>
                <div class="flex flex-wrap gap-2">
                    <div class="badge badge-soft badge-primary" v-for="(tag, index) in projet.tags" :key="tag.id">
                        {{ tag.name }}
                    </div>
                </div>
                <router-link :to="{ name: 'projet', params: { projetId: projet.id } }">
                    <div class="btn btn-secondary mt-4">Découvrir</div>
                </router-link>
                <!-- <a :href='"projet/" + projet.id' class="more">Voir plus</a> -->
            </div>
        </div>
    </div>
</template>

<script setup>
import { VITE_IMAGE_URL } from '@/config';
import { ref } from 'vue';

const getImageUrl = (projet) => {
    return VITE_IMAGE_URL + '/projects/' + projet.picture;
}

const openInfo = ref(null)

const props = defineProps({
    projets: Array
})

const toggle = (id) => {
    openInfo.value = openInfo.value === id ? null : id
}

</script>

<style scoped lang="scss">
.card-projet {
    margin: auto;
    position: relative;
    display: block;
    border-radius: 10px;
    overflow: hidden;
    width: 100%;
    // cursor: pointer;

    .fa-plus {
        transition: .5s;
        // background-color: #142238;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 12px;
        height: 12px;
        padding: .2rem;
        font-size: 1rem;
        color: #91c4f2;
    }

    &:hover,
    &.open-info {
        .on-card {
            transform: translateY(0);
        }

        img {
            filter: grayscale(0);
        }

    }

    &.open-info {
        .fa-plus {
            opacity: 0;
            transform: rotate(90deg);
        }
    }

    img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: top;
        display: block;
        border-radius: inherit;
        filter: grayscale(1);
        transition: .3s;
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
        aspect-ratio: 1;
    }

    .on-card {
        position: absolute;
        bottom: 0;
        padding: 1rem;
        width: 100%;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        transform: translateY(calc(100% - 78px));
        box-sizing: border-box;
        transition: .3s;
        z-index: 1;

        .description {
            margin-bottom: 1rem;
            font-size: 14px;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
            line-height: 15px;
            margin-top: .5rem;

            &::after {
                content: '';
                margin-top: 1rem;
                display: block;
                width: 100%;
                height: 1px;
                background-color: #142238;
            }
        }
    }

    .title {
        margin-bottom: .5rem;
        color: #71f79f;
        font-weight: bold;
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