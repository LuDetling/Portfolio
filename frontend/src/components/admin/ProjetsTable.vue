<script setup>
import NavAdmin from '@/components/admin/NavAdmin.vue';
import { API_URL, IMAGE_URL } from '@/config';
import { ref } from 'vue';
import { useCookies } from 'vue3-cookies';
const { cookies } = useCookies();

const projets = ref([]);
const page = ref(1);
const totalPages = ref(0);

const fetchProjets = async () => {
    try {
        const response = await fetch(API_URL + '/projects');
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        const data = await response.json();
        projets.value = data.projects;
        return data;
    } catch (error) {
        console.log(error)
    }
}

const changePage = (newPage) => {
    page.value = newPage;
    fetchProjets();
}

fetchProjets();

const deleteProject = async (id) => {
    try {
        const response = await fetch(API_URL + '/project/' + id, {
            method: 'DELETE',
            headers: {
                "Authorization": 'Bearer ' + cookies.get('token'),
            }
        });
        if (!response.ok) {
            throw new Error('Erreur lors de la suppression du projet');
        }
        projets.value = projets.value.filter(projet => projet.id !== id);
    } catch (error) {
        console.error(error);
    }
}

const getImageUrl = (projet) => {
    return IMAGE_URL + '/projects/' + projet.picture;
}

</script>

<template>
    <div class="flex gap-4 items-center place-content-between">
        <h1>Projets</h1>
        <router-link to="/admin/projets/create" class="btn btn-soft btn-accent btn-xs"><font-awesome-icon
                :icon="['fas', 'plus']" /></router-link>
    </div>
    <div class="table_component">
        <table class="table table-zebra">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>tags</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="projet in projets" :key="projet.id">
                    <td class="img-title">
                        <div class="flex items-center gap-2">
                            <img :src="getImageUrl(projet)" :alt="projet.title" class="mask h-12 w-12">
                            <span>{{ projet.title }}</span>
                        </div>
                    </td>
                    <td>{{ projet.shortDescription }}</td>
                    <td>
                        <div class="flex gap-2 flex-wrap">
                            <span v-for="tag in projet.tags" :key="tag.id" class="badge badge-primary text-xs">{{
                                tag.name }}</span>
                        </div>
                    </td>
                    <td class="actions">
                        <div class="flex gap-2">

                            <router-link :to="{ name: 'adminProjetsUpdate', params: { projetId: projet.id } }"
                                class="btn btn-soft btn-info"><font-awesome-icon
                                    :icon="['fas', 'pen-to-square']" /></router-link>
                            <button @click="deleteProject(projet.id)" class="btn btn-soft btn-error"><font-awesome-icon
                                    :icon="['fas', 'trash']" /></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <ul class="pagination">
            <li v-if="page > 1">
                <button @click="changePage(page - 1)"><font-awesome-icon :icon="['fas', 'angle-left']" /></button>
            </li>
            <li v-for="i in totalPages" :key="i" v-if="totalPages > 1">
                <button @click="changePage(i)" :class="{ active: i === page }">{{ i }}</button>
            </li>
            <li v-if="page < totalPages">
                <button @click="changePage(page + 1)"><font-awesome-icon :icon="['fas', 'angle-right']" /></button>
            </li>
        </ul>
    </div>
</template>

<style scoped lang="scss"></style>
