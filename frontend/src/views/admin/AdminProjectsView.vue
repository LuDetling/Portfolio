<script setup>
import NavAdmin from '@/components/admin/NavAdmin.vue';
import { API_URL } from '@/config';
import { ref } from 'vue';

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
        console.log(projets.value);
    } catch (error) {
        console.log(error)
    }
}

const changePage = (newPage) => {
    page.value = newPage;
    fetchProjets();
}

fetchProjets();

</script>

<template>
    <NavAdmin />
    <main>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Titre</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="projet in projets" :key="projet.id">
                    <td>{{ projet.id }}</td>
                    <td>{{ projet.title }}</td>
                    <td>{{ projet.shortDescription }}</td>
                </tr>
            </tbody>
        </table>
        <ul class="pagination">
                <!-- <li v-if="page > 2"><button @click="changePage(page = 1)"><<</button></li> -->
                <li v-if="page > 1"><button @click="changePage(page - 1)"><</button></li>
                <li v-for="i in totalPages" :key="i" v-if="totalPages > 1">
                    <button @click="changePage(i)" :class="{ active: i === page }">{{ i }}</button>
                </li>
                <li v-if="page < totalPages"><button @click="changePage(page + 1)">></button></li>
                <!-- <li v-if="page + 1 < totalPages"><button @click="changePage(page = totalPages)">»</button></li> -->
            </ul>
    </main>
</template>

<style scoped lang="scss"></style>
