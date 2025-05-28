<script setup>
import NavAdmin from '@/components/admin/NavAdmin.vue';
import { API_URL } from '@/config';
import { Form, Field, ErrorMessage } from 'vee-validate';

import { ref } from 'vue';
import * as yup from 'yup';
import router from '@/router';

import { useCookies } from 'vue3-cookies';
const { cookies } = useCookies();

const title = ref("");
const picture = ref("");
const description = ref("");
const shortDescription = ref("");
const link = ref("");
const tags = ref([]);


const schema = yup.object({
    title: yup.string(),
    picture: yup.mixed(),
    description: yup.string(),
    shortDescription: yup.string(),
    link: yup.string(),
    tagsSelected: yup.array().of(yup.number())
})

const getTags = async () => {
    try {
        const response = await fetch(API_URL + '/tags');
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
    formData.append('tags', JSON.stringify(el.tags));

    try {
        const response = await fetch(API_URL + '/project/create', {
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
</script>

<template>
    <h1 class="text-center mt-8">Projet</h1>
    <main>
        <Form @submit="createProjet($event)" :validation-schema="schema">
            <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
                <legend class="fieldset-legend">Créer un projet</legend>
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

<style scoped lang="scss"></style>
