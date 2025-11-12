<script setup>
import NavLink from "@/Components/NavLink.vue";
import { ref } from 'vue';
const mobileMenuOpen = ref(false);
</script>

<template>
    <header class="bg-gray-100 border-b border-gray-300 py-3 text-center">
        <nav class="flex justify-center space-x-6">
            
          <NavLink
        :href="route('login')"
        :active="$page.url === '/login'"
        
      >
        Inloggen
      </NavLink>

      <NavLink
        :href="route('register')"
        :active="$page.url === '/register'"
        
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