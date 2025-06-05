<script setup>
import router from '@/router';
import { ref } from 'vue';
import { useAuthStore } from '@/stores/auth';
import { useCookies } from "vue3-cookies";
import { API_URL } from '@/config';
const { cookies } = useCookies();

let username = ref('');
let password = ref('');
const auth = useAuthStore();

const handleSubmit = async () => {
    try {
        const response = await fetch(API_URL + '/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                username: username.value,
                password: password.value
            })
        });
        if (!response.ok) throw new Error('Connexion échouée');
        let data = await response.json();
        cookies.set('token', data.token, 60 * 60);
        auth.login()
        router.push({ name: 'admin' });
    } catch (error) {
        console.log(error);
    }
}
if (auth.user) {
    router.push({ name: 'home' });
}

</script>

<template>
    <main>
        <section>
            <form @submit.prevent="handleSubmit()" class="w-fit mx-auto">
                <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
                    <legend class="fieldset-legend">Login</legend>
                    <label for="username">Username :</label>
                    <input type="text" id="username" v-model="username" required class="input mb-4"/>
                    <label for="password">Mot de passe :</label>
                    <input type="password" id="password" v-model="password" required class="input mb-4"/>
                    <button type="submit" class="btn btn-primary mt-4">Se connecter</button>
                </fieldset>
            </form>
        </section>
    </main>
</template>

<style scoped lang="scss">
</style>
