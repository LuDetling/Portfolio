<script setup>
import NavAdmin from '@/components/admin/NavAdmin.vue';
import { API_URL } from '@/config';
import { Form, Field, ErrorMessage } from 'vee-validate';
import { ref } from 'vue';
import * as yup from 'yup';

const name = ref("");

const schema = yup.object({
    name: yup.string()
})

const createTag = async (el) => {
    try {
        const response = await fetch(API_URL + '/tags/create', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
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
    <NavAdmin />
    <main>
        <Form @submit="createTag($event)" :validation-schema="schema">
            <div class="name">
                <label for="name">Nom :</label>
                <Field type="name" name="name" v-model="name" required />
                <ErrorMessage name="name" />
            </div>
            <button type="submit" class="btn">Envoyer</button>
        </Form>
    </main>
</template>

<style scoped lang="scss"></style>
