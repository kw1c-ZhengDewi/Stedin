<<<<<<< HEAD

=======
>>>>>>> 9ece8f63b4c87e5eb4de47f5d572abc14ad101bb
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import NavLink from '@/Components/NavLink.vue';
import TheHeader from '@/Layouts/TheHeader.vue';
</script>

<template>
<<<<<<< HEAD
<app-layout>
  <the-header>
</the-header>
</app-layout>
</template>
=======

<!-- Header -->
<the-header>
</the-header>

<NavLink :href="route('index')" :active="$page.url === '/'">
  Index
</NavLink>

<!-- Pagina's Na het inloggen  -->

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
>>>>>>> 9ece8f63b4c87e5eb4de47f5d572abc14ad101bb

