<script setup>
import Breadcrumbs from '@/components/Breadcrumbs.vue';
import { VITE_API_URL, VITE_IMAGE_URL } from '@/config';
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router'


const route = useRoute()
const projet = ref({});
const urlPictures = '/src/assets/images/';


const fetchProjet = async () => {
    try {
        const response = await fetch(VITE_API_URL + '/project/' + route.params.projetId);
        if (!response.ok) throw new Error('Pas de projet trouvé')
        projet.value = await response.json();
    } catch (error) {
        console.log(error);
    }
}

fetchProjet();

const getImageUrl = (projet) => {
    return VITE_IMAGE_URL + '/projects/' + projet.picture;
}
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

                    <div class="flex gap-4 flex-wrap justify-between project">
                        <div class="w-full md:w-3/6">
                            <img :src="getImageUrl(projet)" :alt='projet.title'>
                            <div class="trait my-4"></div>
                            <div class="flex flex-wrap gap-2 ">
                                <div class="badge badge-soft badge-primary" v-for="(tag, index) in projet.tags"
                                    :key="tag.id">
                                    {{ tag.name }}
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-2/6">
                            <h1 class="text-5xl mb-4">{{ projet.title }}</h1>
                            <p class="description">{{ projet.description }}</p>
                            <a :href="projet.link" class="btn btn-primary mt-8" v-if="projet.link != 'null'"
                                target="_blank">Visiter le site</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>

<style scoped lang="scss">
.description {
    white-space: pre-line;
}

.trait {
    display: block;
    width: 100%;
    height: 1px;
    background-color: #142238;
}
</style>