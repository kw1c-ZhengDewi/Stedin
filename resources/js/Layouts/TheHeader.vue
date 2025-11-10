<script setup>
import NavLink from "@/Components/NavLink.vue";
</script>

<template>
    <header class="bg-gray-100 border-b border-gray-300 py-3 text-center">
        <nav class="flex justify-center space-x-6">
            <!-- Navigatie, komt later in de header -->
            <!-- Navigation -->
            <NavLink
                :href="route('dashboard')"
                :active="$page.url === '/dashboard'"
                >Dashboard
            </NavLink>

            <NavLink :href="route('project')" :active="$page.url === '/project'"
                >Projecten
            </NavLink>

            <NavLink :href="route('product')" :active="$page.url === '/product'"
                >Producten
            </NavLink>

            <NavLink
                :href="route('gebruikers')"
                :active="$page.url === '/gebruikers'"
                >Gebruikers
            </NavLink>

            <NavLink
                :href="route('leveranciers')"
                :active="$page.url === '/leveranciers'"
                >Leveranciers
            </NavLink>
        </nav>
    </header>
</template>

<style scoped>
nav a:hover {
    color: #007bff;
}
</style>
