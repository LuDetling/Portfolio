<script setup>
import NavAdmin from '@/components/admin/NavAdmin.vue';
import { VITE_API_URL, VITE_IMAGE_URL } from '@/config';
import { Form, Field, ErrorMessage } from 'vee-validate';
import { useRoute } from 'vue-router';

import { ref } from 'vue';
import * as yup from 'yup';
import router from '@/router';

import Editor from 'primevue/editor';

import { useCookies } from 'vue3-cookies';
const { cookies } = useCookies();

const route = useRoute();

const title = ref("");
const picture = ref("");
const newPicture = ref("");
const description = ref("");
const shortDescription = ref("");
const link = ref("");
const tags = ref([]);
const tagsSelected = ref([]);
const images = ref([]);


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
        console.log(picture.value);

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
    formData.append('link', link.value || '');
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

const handleFiles = (e) => {
    images.value = Array.from(e.target.files);
}
const preview = ref(null)
let objectUrl = null
const changePicture = (e) => {
    const file = e.target.files[0]
    if (!file) return

    // Nettoyage de l’ancienne preview
    if (objectUrl) {
        URL.revokeObjectURL(objectUrl)
    }

    objectUrl = URL.createObjectURL(file)
    preview.value = objectUrl
}

const getImage = (image) => {
    return VITE_IMAGE_URL + '/projects/' + image;
}
</script>

<template>
    <main>
        <router-link to="/admin">admin</router-link>
        <h1 class="text-center mt-12">Projet</h1>
        <Form @submit="updateProjet($event)" :validation-schema="schema" class="mx-auto w-fit">
            <fieldset class="fieldset bg-base-200 border-base-300 rounded-box border p-4">
                <legend class="fieldset-legend">Modifier un projet</legend>
                <div>
                    <label for="title">Titre:</label>
                    <Field type="text" name="title" v-model="title" required class="input" />
                    <ErrorMessage name="title" />
                </div>
                <div>
                    <label for="picture">Image principale:</label>
                    <Field id="picture" type="file" name="picture" v-model="picture" required rules="image"
                        class="file-input" @change="changePicture" />
                    <img :src="getImage(picture)">
                    <img v-if="preview" :src="preview" alt="">
                    <ErrorMessage name="picture" />
                </div>
                <div>
                    <label for="images">Images:</label>
                    <Field id="images" type="file" name="images[]" v-model="images" required rules="image"
                        class="file-input" multiple @change="handleFiles" />
                    <ErrorMessage name="images[]" />
                </div>
                <div>
                    <label for="description">Description:</label>
                    <Editor name="description" editorStyle="height: 200px" required v-model="description" />
                    <ErrorMessage name="description" />
                </div>
                <div>
                    <label for="shortDescription">Description courte:</label>
                    <Editor name="shortDescription" editorStyle="height: 100px" required v-model="shortDescription" />
                    <ErrorMessage name="shortDescription" />
                </div>
                <div>
                    <label for="link">Lien:</label>
                    <Field type="text" name="link" v-model="link" class="input" />
                    <ErrorMessage name="link" />
                </div>
                <div>
                    <label class="label" v-for="(tag, index) in tags" :key="index">
                        <Field name="tags" type="checkbox" class="checkbox" :value="tag.id" v-model="tagsSelected" />
                        {{ tag.name }}
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">Modifier</button>
            </fieldset>
        </Form>
    </main>
</template>

<style scoped lang="scss">
.p-editor {
    width: 500px;
}

fieldset>div {
    margin-bottom: 1rem;
}

label {
    display: block;
    margin-bottom: 0.3rem;
}
</style>
