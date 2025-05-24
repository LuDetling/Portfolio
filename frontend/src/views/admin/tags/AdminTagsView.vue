<script setup>
import NavAdmin from '@/components/admin/NavAdmin.vue';
import { API_URL } from '@/config';
import { ref } from 'vue';

const tags = ref([]);
const fetchTags = async () => {
    try {
        const response = await fetch(API_URL + '/tags');
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        const data = await response.json();
        tags.value = data;
    } catch (error) {
        console.log(error)
    }
}

fetchTags();

const deleteTag = async (id) => {
    try {
        const response = await fetch(API_URL + '/tags/' + id, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json'
            }
        });
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        tags.value = tags.value.filter(tag => tag.id !== id);
    } catch (error) {
        console.log(error)
    }
}

</script>

<template>
    <NavAdmin name="Ajouter" path="/admin/tags/create" />
    <main>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Modifier/Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="tag in tags" :key="tag.id">
                    <td>{{ tag.id }}</td>
                    <td>{{ tag.name }}</td>
                    <td>
                        <router-link :to="{ name: 'adminTagsUpdate', params: { tagId: tag.id } }">Modifier</router-link>
                        <button @click="deleteTag(tag.id)">Supprimer</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>
</template>

<style scoped lang="scss"></style>
