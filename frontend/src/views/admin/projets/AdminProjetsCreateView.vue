<script setup>
import NavAdmin from '@/components/admin/NavAdmin.vue';
import { VITE_API_URL } from '@/config';
import { Form, Field, ErrorMessage } from 'vee-validate';

import Editor from 'primevue/editor';
import draggable from 'vuedraggable';


import { ref } from 'vue';
import * as yup from 'yup';
import router from '@/router';

import { useCookies } from 'vue3-cookies';
const { cookies } = useCookies();

const title = ref("");
const picture = ref("");
const images = ref([]);
const imageFiles = ref([]);
const description = ref("");
const shortDescription = ref("");
const link = ref("");
const tags = ref([]);
const tagsSelected = ref([])


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
        formData.append('images[]', file.file);
    });
    tagsSelected.value = el.tags

    if (!Array.isArray(tagsSelected.value) && tagsSelected.value) {
        formData.append('tags', JSON.stringify([tagsSelected.value]))
    } else {
        formData.append('tags', JSON.stringify(tagsSelected.value))
    }
    console.log(formData.getAll('images[]'));

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

const handleFiles = (event) => {
    const imageFiles = Array.from(event.target.files);
    images.value = [];

    imageFiles.forEach(file => {
        // On crée un objet contenant le fichier ET une URL de prévisualisation
        images.value.push({
            id: crypto.randomUUID(), // ID unique pour Vue
            file: file,
            url: URL.createObjectURL(file)
        });
    });
    console.log(images.value);

};
const removeImage = (index) => {
    // Important : libérer la mémoire de l'URL créée
    URL.revokeObjectURL(images.value[index].url);
    images.value.splice(index, 1);
    imageFiles.value.splice(index, 1);
};
</script>

<template>
    <main>
        <router-link to="/admin">admin</router-link>
        <h1 class="text-center mt-8">Projet</h1>
        <Form @submit="createProjet($event)" :validation-schema="schema" class="mx-auto w-fit mt-8">
            <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
                <legend class="fieldset-legend">Créer un projet</legend>
                <div>
                    <label for="title">Titre:</label>
                    <Field type="text" name="title" v-model="title" required class="input" />
                    <ErrorMessage name="title" />
                </div>
                <div>
                    <label for="picture">Image principale:</label>
                    <Field type="file" name="picture" v-model="picture" required rules="image" class="file-input" />
                    <ErrorMessage name="picture" />
                </div>
                <div>
                    <label for="images">Images:</label>
                    <Field type="file" name="imageFiles[]" v-model="imageFiles" required rules="image"
                        class="file-input" multiple @change="handleFiles" />
                    <ErrorMessage name="imageFiles[]" />
                    <draggable v-model="images" item-key="id" class="preview-list flex gap-4 mt-4 flex-wrap"
                        ghost-class="ghost">
                        <template #item="{ element, index }">
                            <div class="image-card">
                                <img :src="element.url" />
                                <button @click="removeImage(index)">×</button>
                            </div>
                        </template>
                    </draggable>
                </div>
                <div>
                    <label for="description">Description:</label>
                    <Editor name="description" editorStyle="height: 200px" required v-model="description" />
                </div>
                <div>
                    <label for="shortDescription">Description courte:</label>
                    <Editor name="shortDescription" editorStyle="height: 100px" required v-model="shortDescription" />
                    <ErrorMessage name="shortDescription" />
                </div>
                <div>
                    <label for="link">Lien:</label>
                    <Field type="text" name="link" v-model="link" required class="input" />
                    <ErrorMessage name="link" />
                </div>
                <div>
                    <label class="label" v-for="(tag, index) in tags" :key="index">
                        <Field name="tags" type="checkbox" class="checkbox" :value="tag.id" />
                        {{ tag.name }}
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">Envoyer</button>
            </fieldset>
        </Form>
    </main>
</template>

<style scoped lang="scss">
.p-editor {
    width: 500px;
}

label {
    display: block;
    margin-top: 10px;
}

.preview-list {

    .image-card {
        position: relative;

        img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 10px;
        }

        button {
            position: absolute;
            top: 0;
            right: 0;
            color: rgb(255, 0, 0);
            background: rgba($color: white, $alpha: .8);
            border: none;
            cursor: pointer;
            font-size: 2rem;
            width: 1rem;
            height: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    }
}
</style>
