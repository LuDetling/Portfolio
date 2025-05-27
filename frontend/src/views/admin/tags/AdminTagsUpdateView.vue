<script setup>
import NavAdmin from '@/components/admin/NavAdmin.vue';
import { API_URL } from '@/config';
import { Form, Field, ErrorMessage } from 'vee-validate';
import { ref } from 'vue';
import * as yup from 'yup';
import { useRoute } from 'vue-router'
const route = useRoute()
import router from '@/router';

import { useCookies } from 'vue3-cookies';
const { cookies } = useCookies();

const name = ref("");

const schema = yup.object({
    name: yup.string()
})

const tag = ref({});


const fetchTag = async () => {
    try {
        const response = await fetch('https://127.0.0.1:8000/api/tags/' + route.params.tagId);
        if (!response.ok) throw new Error('Pas de projet trouvé')
        tag.value = await response.json();
        console.log(tag.value);
        name.value = tag.value.name;

    } catch (error) {
        console.log(error);
    }
}

fetchTag();

const updateTag = async (el) => {
    try {
        const response = await fetch(API_URL + '/tags/' + route.params.tagId, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + cookies.get('token')
            },
            body: JSON.stringify(el)
        });

        const data = await response.json();
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        router.push('/admin');
        return data;
    } catch (error) {
        console.log(error)
    }
}

</script>

<template>
    <h1 class="text-center mt-12">Modifier un Tag</h1>
    <main>
        <Form @submit="updateTag($event)" :validation-schema="schema">
            <fieldset class="fieldset bg-base-200 border-base-300 rounded-box border p-4">
                <legend class="fieldset-legend">Modifier un tag</legend>
                <label for="name">Nom :</label>
                <Field type="name" name="name" v-model="name" required class="input" />
                <ErrorMessage name="name" />
                <button type="submit" class="btn btn-primary">Modifier</button>
            </fieldset>
        </Form>
    </main>
</template>

<style scoped lang="scss"></style>
