<template>
    <nav aria-label="Breadcrumb" class="text-sm text-gray-600">
        <ol class="flex space-x-1">
            <li>
                <RouterLink to="/" class="text-blue-500 hover:underline">Accueil</RouterLink>
                <span class="mx-2">/</span>
            </li>
            <li v-for="(crumb, index) in breadcrumbs" :key="index">
                <template v-if="index !== breadcrumbs.length - 1">
                    <RouterLink :to="crumb.path" class="text-blue-500 hover:underline">
                        {{ crumb.label }}
                    </RouterLink>
                    <span class="mx-2">/</span>
                </template>
                <template v-else>
                    <span class="text-gray-500">{{ crumb.label }}</span>
                </template>
            </li>
        </ol>
    </nav>
</template>

<script setup>
import { computed } from 'vue'
import { useRoute } from 'vue-router'

// Fonction utilitaire pour transformer un segment en label lisible
const formatSegment = (segment) =>
    segment.replace(/-/g, ' ').replace(/\b\w/g, l => l.toUpperCase())

const route = useRoute()

const breadcrumbs = computed(() => {
    const pathArray = route.path.split('/').filter(Boolean)
    const crumbs = []

    for (let i = 0; i < pathArray.length; i++) {
        const path = '/' + pathArray.slice(0, i + 1).join('/')
        crumbs.push({
            label: formatSegment(pathArray[i]),
            path,
        })
    }

    return crumbs
})
</script>

<style scoped lang="scss">
nav {
    margin-bottom: 1rem;
}
</style>
