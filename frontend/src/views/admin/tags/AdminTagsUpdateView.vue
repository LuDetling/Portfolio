<script setup>
import NavAdmin from '@/components/admin/NavAdmin.vue';
import { API_URL } from '@/config';
import { Form, Field, ErrorMessage } from 'vee-validate';
import { ref } from 'vue';
import * as yup from 'yup';
import { useRoute } from 'vue-router'
const route = useRoute()

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
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(el)
        });

        const data = await response.json();
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
    } catch (error) {
        console.log(error)
    }
}

</script>

<template>
    <NavAdmin />
    <main>
        <Form @submit="updateTag($event)" :validation-schema="schema">
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
