<script setup>
import NavLink from "@/Components/NavLink.vue";
import SearchBar from "@/Layouts/SearchBar.vue";
</script>

<template>
    <header class="bg-gray-100 border-b border-gray-300 py-3 text-center">
        <nav class="flex justify-center space-x-6">
            <NavLink :href="route('project.index')" :active="$page.url === '/project'">Projecten
            </NavLink>

            <NavLink :href="route('product.index')" :active="$page.url === '/product'">Producten
            </NavLink>

            <NavLink :href="route('gebruikers.index')" :active="$page.url === '/gebruikers'">Gebruikers
            </NavLink>

            <NavLink :href="route('leveranciers.index')" :active="$page.url === '/leveranciers'">Leveranciers
            </NavLink>

            <NavLink :href="route('winkelwagen.index')" :active="$page.url === '/winkelwagen'">Winkelwagen
            </NavLink>
        </nav>
    </header>
</template>

<style scoped>
header {
    transition: all 0.3s ease;
}

nav a:hover {
    color: #007bff;
}
</style>
