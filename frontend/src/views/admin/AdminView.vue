<script setup>
import { useCookies } from "vue3-cookies";
const { cookies } = useCookies();

import { jwtDecode } from "jwt-decode";

const token = cookies.get('token');
const decoded = jwtDecode(token);

console.log(decoded);

</script>

<template>
    <main>

    </main>
</template>

<style scoped lang="scss">
</style>
