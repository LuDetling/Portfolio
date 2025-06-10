<script setup>
import Breadcrumbs from '@/components/Breadcrumbs.vue';
import CardsProjets from '@/components/CardsProjets.vue';
import { API_URL } from '@/config';
import { ref, onMounted } from 'vue';


const projets = ref([]);
const page = ref(1);
const totalPages = ref(0);
const urlPictures = '/src/assets/images/';


const fetchProjets = async () => {
    try {
        const response = await fetch(API_URL + `/projects?page=${page.value}`);
        if (!response.ok) throw new Error('Pas de projet trouvé')
        let data = await response.json();
        projets.value = data.projects;
        totalPages.value = data.pages;
        console.log(data);
    } catch (error) {
        console.log(error);
    }
}

fetchProjets();

const changePage = (newPage) => {
    page.value = newPage;
    fetchProjets();
}

</script>

<template>
    <main>
        <section id="projets">
            <Breadcrumbs :items="[{ name: 'Projets', link: '/projets' }]" />
            <div class="terminal-header-project terminal-header">
                <h2>
                    ~/ProjectsView.vue
                </h2>
            </div>
            <div class="terminal-window-project terminal-window">
                <div class="terminal-body-project terminal-body">
                    <div class="content-projets grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        <CardsProjets :projets=projets class=""/>
                    </div>
                </div>
            </div>
            <ul class="pagination">
                <!-- <li v-if="page > 2"><button @click="changePage(page = 1)"><<</button></li> -->
                <li v-if="page > 1">
                    <button @click="changePage(page - 1)"><font-awesome-icon :icon="['fas', 'angle-left']" /></button>
                </li>
                <li v-for="i in totalPages" :key="i" v-if="totalPages > 1">
                    <button @click="changePage(i)" :class="{ active: i === page }">{{ i }}</button>
                </li>
                <li v-if="page < totalPages">
                    <button @click="changePage(page + 1)"><font-awesome-icon :icon="['fas', 'angle-right']" /></button>
                </li>
                <!-- <li v-if="page + 1 < totalPages"><button @click="changePage(page = totalPages)">»</button></li> -->
            </ul>
        </section>
    </main>
</template>

<style scoped lang="scss">
main {
    >section#projets {
        padding: 120px 0;

        .card-projet {
            img {
                width: 100%;
                height: auto;
                object-fit: cover;
            }
        }

        .pagination {
            display: flex;
            justify-content: center;
            gap: .3rem;

            li {
                button {
                    border: none;
                    width: 25px;
                    height: 25px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    border-radius: 5px;
                    cursor: pointer;
                    transition: .3s;

                    &.active,
                    &:hover {
                        background-color: green;
                    }
                }
            }
        }
    }
}
</style>