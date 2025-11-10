<script setup>
import NavLink from "@/Components/NavLink.vue";
import { ref } from "vue";
const mobileMenuOpen = ref(false);
</script>

<template>
    <header class="bg-gray-100 border-b border-gray-300 py-3 text-center">
        <nav class="flex justify-center space-x-6">
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

            <NavLink
                :href="route('winkelwagen')"
                :active="$page.url === '/winkelwagen'"
                >Winkelwagen
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
