<script setup>
import NavAdmin from "@/components/admin/NavAdmin.vue";
import ProjetsTable from "@/components/admin/ProjetsTable.vue";
import TagsList from "@/components/admin/TagsList.vue";
</script>

<template>
    <main class="flex gap-12 p-4">
        <div class="w-4/5">
            <ProjetsTable/>
        </div>
        <div class="w-1/5 p-4">
            <TagsList/>
        </div>
    </main>
</template>

<style scoped lang="scss"></style>
