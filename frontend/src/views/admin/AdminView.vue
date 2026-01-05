<script setup>
import NavAdmin from "@/components/admin/NavAdmin.vue";
import ProjetsTable from "@/components/admin/ProjetsTable.vue";
import TagsList from "@/components/admin/TagsList.vue";
</script>

<template>
    <main class="flex gap-12 p-4 flex-wrap lg:flex-nowrap">
        <section class="lg:w-1/5 tags lg:order-1">
            <TagsList />
        </section>
        <section class="lg:w-4/5">
            <ProjetsTable />
        </section>
    </main>
</template>

<style scoped lang="scss">
main {
    padding-top: 120px;

    section {
        padding: 0;
        &.tags {
            padding-left: 2rem;
        }
    }
}
</style>
