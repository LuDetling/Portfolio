<script setup>
import { ref } from 'vue';

let username = ref('');
let password = ref('');


const handleSubmit = async () => {
    try {
        const response = await fetch('https://127.0.0.1:8000/api/login', {
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
        Cookies.set('token', data.token, { expires: 7 });
    } catch (error) {
        console.log(error);
    }
}

</script>

<template>
    <main>
        <section>
            <h1>Login</h1>
            <form @submit.prevent="handleSubmit()">
                <div>
                    <label for="username">Username:</label>
                    <input type="text" id="username" v-model="username" required />
                </div>
                <div>
                    <label for="password">Password:</label>
                    <input type="password" id="password" v-model="password" required />
                </div>
                <button type="submit">Se connecter</button>
            </form>
        </section>
    </main>
</template>

<style scoped lang="scss">
main {
    max-width: 90%;
    margin: 4rem auto;

    >section {
        padding: 120px 0;
    }
}
</style>
