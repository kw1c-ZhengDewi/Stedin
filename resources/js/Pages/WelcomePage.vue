<script setup>
import NavLink from "@/Components/NavLink.vue";
import { ref } from 'vue';

const mobileMenuOpen = ref(false);
</script>

<template>
  <header class="bg-gray-100 border-b border-gray-300 py-3 flex items-center justify-between px-6">
    <!-- Logo met beperkte hoogte -->
    <img
      src="https://upload.wikimedia.org/wikipedia/commons/0/0c/Stedin_RGB_klein_WT.jpg"
      alt="Logo"
      class="h-12 object-contain"
    />

    <nav class="flex space-x-4 items-center">
      <NavLink
  :href="route('login')"
  :active="$page.url === '/login'"
  class="big-button"
>
  Inloggen
</NavLink>

<NavLink
  :href="route('register')"
  :active="$page.url === '/register'"
  class="big-button"
>
  Registreren
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

<style>
/* Body achtergrond en overlay behouden */
body {
  background-image: url('https://www.stedin.net/-/media/project/online/video/stills/afl-1-stedin-de-gele-jas---stroomstoring.jpg?rev=a436884dfc854356b16bd666606fd718');
  min-height: 100vh;
  margin: 0;
  font-family: sans-serif;
  position: relative;
  background-size: cover;
  background-position: center;
}
.big-button {
  padding: 16px 32px;  /* grotere knop door meer padding */
  font-size: 20px;     /* groter lettertype */
}



</style>
