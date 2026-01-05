<script setup>
import NavAdmin from '@/components/admin/NavAdmin.vue';
import { VITE_API_URL } from '@/config';
import { Form, Field, ErrorMessage } from 'vee-validate';

import Editor from 'primevue/editor';


import { ref } from 'vue';
import * as yup from 'yup';
import router from '@/router';

import { useCookies } from 'vue3-cookies';
const { cookies } = useCookies();

const title = ref("");
const picture = ref("");
const images = ref([]);
const description = ref("");
const shortDescription = ref("");
const link = ref("");
const tags = ref([]);
const tagsSelected = ref([])
const t = ref(false)


const schema = yup.object({
    title: yup.string(),
    picture: yup.mixed(),
    images: yup.mixed(),
    description: yup.string(),
    shortDescription: yup.string(),
    link: yup.string(),
    tagsSelected: yup.array().of(yup.number())
})

const getTags = async () => {
    try {
        const response = await fetch(VITE_API_URL + '/tags');
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        const data = await response.json();
        tags.value = data;
        return data;
    } catch (error) {
        console.log(error);
    }
}

getTags();

const createProjet = async (el) => {
    const formData = new FormData();
    formData.append('title', title.value);
    formData.append('picture', picture.value);
    formData.append('description', description.value);
    formData.append('shortDescription', shortDescription.value);
    formData.append('link', link.value);
    images.value.forEach((file) => {
        formData.append('images[]', file);
    });
    tagsSelected.value = el.tags

    if (!Array.isArray(tagsSelected.value) && tagsSelected.value) {
        formData.append('tags', JSON.stringify([tagsSelected.value]))
    } else {
        formData.append('tags', JSON.stringify(tagsSelected.value))
    }

    try {
        const response = await fetch(VITE_API_URL + '/project/create', {
            method: 'POST',
            body: formData,
            headers: {
                'Authorization': 'Bearer ' + cookies.get('token')
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

const handleFiles = (e) => {
    images.value = Array.from(e.target.files);
}
</script>

<template>
    <main>
        <router-link to="/admin">admin</router-link>
        <h1 class="text-center mt-8">Projet</h1>
        <Form @submit="createProjet($event)" :validation-schema="schema" class="mx-auto w-fit mt-8">
            <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
                <legend class="fieldset-legend">Créer un projet</legend>
                <label for="title">Titre :</label>
                <Field type="text" name="title" v-model="title" required class="input" />
                <ErrorMessage name="title" />
                <label for="picture">Image :</label>
                <Field type="file" name="picture" v-model="picture" required rules="image" class="file-input" />
                <ErrorMessage name="picture" />
                <label for="images">Images :</label>
                <Field type="file" name="images[]" v-model="images" required rules="image" class="file-input" multiple
                    @change="handleFiles" />
                <ErrorMessage name="images" />
                <label for="description">Description :</label>
                <Editor name="description" editorStyle="height: 200px" required v-model="description"/>
                <!-- <Field type="text" as="textarea" name="description" v-model="description" required class="textarea" /> -->
                <ErrorMessage name="description" />
                <label for="shortDescription">Description courte :</label>
                <Editor name="shortDescription" editorStyle="height: 100px" required v-model="shortDescription"/>
                <!-- <Field as="textarea" type="text" name="shortDescription" v-model="shortDescription" required
                    class="textarea" /> -->
                <ErrorMessage name="shortDescription" />
                <label for="link">Lien :</label>
                <Field type="text" name="link" v-model="link" required class="input" />
                <ErrorMessage name="link" />
                <label class="label" v-for="(tag, index) in tags" :key="index">
                    <Field name="tags" type="checkbox" class="checkbox" :value="tag.id" />
                    {{ tag.name }}
                </label>

                <button type="submit" class="btn btn-primary">Envoyer</button>
            </fieldset>
        </Form>
    </main>
</template>

<style scoped lang="scss">
.p-editor {
    width: 500px;
}
</style>
