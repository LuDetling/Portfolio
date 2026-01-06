<script setup>
import Breadcrumbs from '@/components/Breadcrumbs.vue';
import { VITE_API_URL, VITE_IMAGE_URL } from '@/config';
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router'
import { useAuthStore } from '@/stores/auth';
// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from 'swiper/vue';

// Import Swiper styles
import 'swiper/css';
import 'swiper/css/navigation';

// Import required modules
import { Navigation } from 'swiper/modules';

// Configurer les modules à utiliser
const modules = [Navigation];

const authStore = useAuthStore();

const route = useRoute()
const projet = ref({});
const urlPictures = '/src/assets/images/';
const cleanedContent = ref('');
const fetchProjet = async () => {
    try {
        const response = await fetch(VITE_API_URL + '/project/' + route.params.projetId);
        if (!response.ok) throw new Error('Pas de projet trouvé')
        projet.value = await response.json();
        cleanedContent.value = projet.value.description.replace(/&nbsp;/g, ' ');
        return projet.value;
    } catch (error) {
        console.log(error);
    }
}

fetchProjet();

const getPicture = (projet) => {
    return VITE_IMAGE_URL + '/projects/' + projet.picture;
}

const getImage = (image) => {
    return VITE_IMAGE_URL + '/projects/' + image.path;;
}

const onSwiper = (swiper) => {
    console.log(swiper);
};
const onSlideChange = () => {
    console.log('slide change');
};

</script>

<template>
    <main>
        <section>
            <Breadcrumbs :items="[{ name: 'Projets', link: '/projets' }, { name: projet.title, link: '' }]" />
            <div class="terminal-header-project terminal-header">
                <h2> ~/Projects.vue </h2>
            </div>
            <div class="terminal-window-project terminal-window">
                <div class="terminal-body-project terminal-body">

                    <div class="flex gap-12 flex-wrap md:flex-nowrap justify-between project">
                        <div class="w-full md:w-3/6">
                            <img :src="getPicture(projet)" :alt='projet.title'>
                            <div class="trait my-4"></div>
                            <div class="flex flex-wrap gap-2 ">
                                <div class="badge badge-soft badge-primary" v-for="(tag, index) in projet.tags"
                                    :key="tag.id">
                                    {{ tag.name }}
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-3/6">
                            <h1 class="text-5xl mb-4">{{ projet.title }}</h1>
                            <p class="description" v-html="cleanedContent"></p>
                            <div class="flex mt-8 gap-4">
                                <a :href="projet.link" class="btn btn-primary "
                                    v-if="projet.link && projet.link !== 'null'" target="_blank">Visiter le site</a>
                                <router-link :to="'/admin/projets/' + projet.id" v-if="authStore.user"
                                    class="btn btn-secondary">Update</router-link>
                            </div>
                        </div>
                    </div>
                    <!-- AJOUTER les images -->
                    <div class="swiper-container-custom relative mt-16">
                        <swiper :modules="modules" :slides-per-view="3" :space-between="30" loop :navigation="{
                            prevEl: '.swiper-btn-prev',
                            nextEl: '.swiper-btn-next'
                        }" class="flex gap-4">
                            <swiper-slide v-for="(image, index) in projet.images" :key="index">
                                <img :src="getImage(image)" :alt="projet.title" class="block">
                            </swiper-slide>
                        </swiper>

                        <!-- Navigation externe -->
                        <button class="swiper-btn swiper-btn-prev">‹</button>
                        <button class="swiper-btn swiper-btn-next">›</button>

                    </div>
                </div>
            </div>
        </section>
    </main>
</template>

<style lang="scss">
.description {
    white-space: pre-line;

    ul {
        padding-left: 2rem;
    }
}

.trait {
    display: block;
    width: 100%;
    height: 1px;
    background-color: #142238;
}

.swiper-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 1;
    font-size: 3rem;
    cursor: pointer;
    color: #71f79f;
    transition: .3s;

    &:hover {
        color: #ce70b3;
    }

    &.swiper-btn-next {
        right: -1.5rem;
    }

    &.swiper-btn-prev {
        left: -1.5rem;
    }
}
</style>