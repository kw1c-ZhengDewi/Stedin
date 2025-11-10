<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import NavLink from '@/Components/NavLink.vue';
</script>

<template>
<AppLayout>
 <NavLink :href="route('home')" :active="$page.url === './Home.vue'">
        Home
        </NavLink>

        <NavLink :href="route('project')" :active="$page.url === '/project'">
        Projecten
        </NavLink>

        <NavLink :href="route('product')" :active="$page.url === '/product'">
        Producten
        </NavLink>

        <NavLink :href="route('gebruikers')" :active="$page.url === '/gebruikers'">
        Gebruikers
        </NavLink>

        <NavLink :href="route('leveranciers')" :active="$page.url === '/leveranciers'">
        Leveranciers
        </NavLink>
</AppLayout>
</template>
