<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import TheHeader from "@/Layouts/TheHeader.vue";
import NavLink from "@/Components/NavLink.vue";
</script>

<template>
    <AppLayout title="Project">
        <TheHeader></TheHeader>

        <div class="p-8 max-w-7xl mx-auto font-sans text-[#4d4d4d]">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold">Projectlijst</h1>
                <NavLink :href="route('project.store')"
                    class="flex items-center gap-2 bg-[#ffd100] text-[#4d4d4d] font-semibold px-5 py-2 rounded-lg shadow hover:brightness-90 transition"
                    :active="$page.url === './Management/Project/toevoegen_project.vue'">
                    <span class="text-xl font-bold">+</span> Project toevoegen
                </NavLink>
            </div>
        </div>

    </AppLayout>
</template>

<!-- Custom CSS -->
<style scoped></style>
