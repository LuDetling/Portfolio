<script setup>
import NavAdmin from '@/components/admin/NavAdmin.vue';
import { VITE_API_URL } from '@/config';
import { Form, Field, ErrorMessage } from 'vee-validate';
import { useRoute } from 'vue-router';

import { ref } from 'vue';
import * as yup from 'yup';
import router from '@/router';

import { useCookies } from 'vue3-cookies';
const { cookies } = useCookies();

const route = useRoute();

const title = ref("");
const picture = ref("");
const description = ref("");
const shortDescription = ref("");
const link = ref("");
const tags = ref([]);
const tagsSelected = ref([]);

const schema = yup.object({
    title: yup.string(),
    picture: yup.mixed(),
    description: yup.string(),
    link: yup.string(),
    shortDescription: yup.string(),
})

const getProjet = async () => {
    try {
        const response = await fetch(VITE_API_URL + '/project/' + route.params.projetId);
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        const data = await response.json();
        title.value = data.title;
        picture.value = data.picture;
        description.value = data.description;
        shortDescription.value = data.shortDescription;
        link.value = data.link;
        tagsSelected.value = data.tags.map(tag => tag.id)

        return data;
    } catch (error) {
        console.log(error);
    }
}

getProjet();

const getTags = async () => {
    try {
        const response = await fetch(VITE_API_URL + '/tags');
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        const data = await response.json();
        console.log(data);

        tags.value = data;
        return data;
    } catch (error) {
        console.log(error);
    }
}

getTags();

const updateProjet = async (el) => {
    const formData = new FormData();
    formData.append('_method', 'PUT'); // Use PUT method for update
    formData.append('title', title.value);
    formData.append('picture', picture.value);
    formData.append('description', description.value);
    formData.append('shortDescription', shortDescription.value);
    formData.append('link', link.value);
    formData.append('tags', JSON.stringify(el.tags));

    try {
        const response = await fetch(VITE_API_URL + '/project/' + route.params.projetId, {
            method: 'POST',
            body: formData,
            headers: {
                "Authorization": 'Bearer ' + cookies.get('token'),
            }
        });

        const data = await response.json();
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        router.push({ name: 'admin' });
    } catch (error) {
        console.log(error)
    }
}
</script>

<template>
    <main>
        <router-link to="/admin">admin</router-link>
        <h1 class="text-center mt-12">Projet</h1>
        <Form @submit="updateProjet($event)" :validation-schema="schema" class="mx-auto w-fit">
            <fieldset class="fieldset bg-base-200 border-base-300 rounded-box border p-4">
                <legend class="fieldset-legend">Modifier un projet</legend>
                <label for="title">Titre :</label>
                <Field type="text" name="title" v-model="title" required class="input" />
                <ErrorMessage name="title" />
                <label for="picture">Image :</label>
                <Field type="file" name="picture" v-model="picture" required rules="image" class="file-input" />
                <ErrorMessage name="picture" />
                <label for="description">Description :</label>
                <Field type="text" as="textarea" name="description" v-model="description" required class="textarea" />
                <ErrorMessage name="description" />
                <label for="shortDescription">Description courte :</label>
                <Field as="textarea" type="text" name="shortDescription" v-model="shortDescription" required
                    class="textarea" />
                <ErrorMessage name="shortDescription" />
                <label class="label" v-for="(tag, index) in tags" :key="index">
                    <Field name="tags" type="checkbox" class="checkbox" :value="tag.id" v-model="tagsSelected" />
                    {{ tag.name }}
                </label>

                <button type="submit" class="btn btn-primary">Modifier</button>
            </fieldset>
        </Form>
    </main>
</template>

<style scoped lang="scss">
</style>
