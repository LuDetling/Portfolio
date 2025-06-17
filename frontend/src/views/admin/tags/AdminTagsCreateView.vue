<script setup>
import NavAdmin from '@/components/admin/NavAdmin.vue';
import { VITE_API_URL } from '@/config';
import { Form, Field, ErrorMessage } from 'vee-validate';
import { ref } from 'vue';
import * as yup from 'yup';

import { useCookies } from 'vue3-cookies';
const { cookies } = useCookies();

const name = ref("");

const schema = yup.object({
    name: yup.string()
})

const createTag = async (el) => {
    try {
        const response = await fetch(VITE_API_URL + '/tags/create', {
            method: 'POST',
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
        name.value = "";

    } catch (error) {
        console.log(error)
    }
}

</script>

<template>
    
    <main>
        <router-link to="/admin">admin</router-link>
        <h1 class="text-center mt-12">Ajouter un Tag</h1>
        <Form @submit="createTag($event)" :validation-schema="schema" class="w-fit mx-auto mt-8">
            <fieldset class="fieldset bg-base-200 border-base-300 rounded-box border p-4">
                <legend class="fieldset-legend">Ajouter un tag</legend>
                <label for="name">Nom :</label>
                <Field type="name" name="name" v-model="name" required class="input" />
                <ErrorMessage name="name" />
                <button type="submit" class="btn btn-primary mt-4">Ajouter</button>
            </fieldset>
        </Form>
    </main>
</template>

<style scoped lang="scss"></style>
