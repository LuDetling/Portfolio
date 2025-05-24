<script setup>
import NavAdmin from '@/components/admin/NavAdmin.vue';
import { API_URL } from '@/config';
import { Form, Field, ErrorMessage } from 'vee-validate';

import { ref } from 'vue';
import * as yup from 'yup';
import { useRoute } from 'vue-router'
const route = useRoute();

const title = ref("");
const picture = ref("");
const description = ref("");
const shortDescription = ref("");

const schema = yup.object({
    title: yup.string(),
    picture: yup.mixed(),
    description: yup.string(),
    shortDescription: yup.string()
})

const createProjet = async (el) => {
    const formData = new FormData();
    formData.append('title', title.value);
    formData.append('picture', picture.value);
    formData.append('description', description.value);
    formData.append('shortDescription', shortDescription.value);

    try {
        const response = await fetch(API_URL + '/project/create', {
            method: 'POST',
            body: formData            
        });

        const data = await response.json();
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        route.push('/admin/projets');
        console.log(data);
    } catch (error) {
        console.log(error)
    }
}
</script>

<template>
    <NavAdmin />
    <main>
        <Form @submit="createProjet($event)" :validation-schema="schema">
            <div class="title">
                <label for="title">Titre :</label>
                <Field type="text" name="title" v-model="title" required />
                <ErrorMessage name="title" />
            </div>
            <div class="picture">
                <label for="picture">Image :</label>
                <Field type="file" name="picture" v-model="picture" required rules="image"/>
                <ErrorMessage name="picture" />
            </div>
            <div class="description">
                <label for="description">Description :</label>
                <Field type="text" name="description" v-model="description" required />
                <ErrorMessage name="description" />
            </div>
            <div class="shortDescription">
                <label for="shortDescription">Description courte :</label>
                <Field type="text" name="shortDescription" v-model="shortDescription" required />
                <ErrorMessage name="shortDescription" />
            </div>
            <!-- <div class="title">
                <label for="title">Titre :</label>
                <Field type="title" name="title" v-model="title" required />
                <ErrorMessage name="title" />
            </div> -->
            <button type="submit" class="btn">Envoyer</button>
        </Form>
    </main>
</template>

<style scoped lang="scss"></style>
