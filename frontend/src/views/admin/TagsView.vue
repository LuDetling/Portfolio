<script setup>
// import { useCookies } from "vue3-cookies";
// const { cookies } = useCookies();

// import { jwtDecode } from "jwt-decode";

// const token = cookies.get('token');
// const decoded = jwtDecode(token);

</script>

<template>
    <main>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <!-- <th>Email</th>
                    <th>Rôle</th> -->
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>0</td>
                    <td>Symfony</td>
                </tr>
                <!-- <tr v-for="user in decoded" :key="user.id">
                    <td>{{ user.last_name }}</td>
                    <td>{{ user.first_name }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ user.role }}</td>
                </tr> -->
            </tbody>
        </table>
    </main>
</template>

<style scoped lang="scss">
</style>
