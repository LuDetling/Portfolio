<template>
    <nav aria-label="Breadcrumb" class="text-sm text-gray-600">
        <ol class="flex space-x-1">
            <li>
                <RouterLink to="/" class="bread-link hover:underline">Accueil</RouterLink>
                <span class="mx-2">/</span>
            </li>
            <li v-for="(crumb, index) in breadcrumbs" :key="index">
                <div v-if="index !== breadcrumbs.length - 1">
                    <RouterLink :to="crumb.path" class="bread-link hover:underline">
                        {{ crumb.label }}
                    </RouterLink>
                </div>
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
.bread-link {
    color: #d4d4d4;
}
</style>
