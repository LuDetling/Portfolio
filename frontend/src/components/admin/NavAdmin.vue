<template>
    <nav>
        <router-link to="/admin/tags">Tags</router-link>
        <router-link to="/admin/projets">Projets</router-link>
        <router-link :to="path" v-if="name && path">{{ name }}</router-link>
    </nav>
</template>
<script setup>
const props = defineProps({
    name: {
        type: String,
    },
    path: {
        type: String,
    }
})
</script>
<style scoped lang="scss">
nav {
    margin: 3rem auto;
    border-radius: 40px;
    overflow: hidden;
}
</style>