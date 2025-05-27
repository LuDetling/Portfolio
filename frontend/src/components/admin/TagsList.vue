<script setup>
import NavAdmin from '@/components/admin/NavAdmin.vue';
import { API_URL } from '@/config';
import { ref } from 'vue';

import { useCookies } from 'vue3-cookies';
const { cookies } = useCookies();

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
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + cookies.get('token')
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
    <div class="flex gap-4 items-center place-content-between mb-4">
        <h2>Tags</h2>
        <router-link to="/admin/tags/create" class="btn btn-soft btn-accent btn-xs">
            <font-awesome-icon :icon="['fas', 'plus']" />
        </router-link>
    </div>
    <ul class="list gap-2">
        <li v-for="tag in tags" :key="tag.id">
            <div class="flex gap-2 items-center place-content-between">
                <span class="tag-name">{{ tag.name }}</span>
                <div class="flex  gap-2">
                    <router-link :to="{ name: 'adminTagsUpdate', params: { tagId: tag.id } }"
                        class="btn btn-soft btn-info btn-xs"><font-awesome-icon
                            :icon="['fas', 'pen-to-square']" /></router-link>
                    <button @click="deleteTag(tag.id)" class="btn btn-soft btn-error btn-xs"><font-awesome-icon
                            :icon="['fas', 'trash']" /></button>
                </div>

            </div>
        </li>
    </ul>
</template>

<style scoped lang="scss"></style>
