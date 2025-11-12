<script setup>
import NavLink from "@/Components/NavLink.vue";
import { ref } from "vue";

const mobileMenuOpen = ref(false);
</script>

<template>
  <header class="relative bg-gray-100 border-b border-gray-300 py-3 px-6 flex items-center justify-between z-50">
  

    <!-- Desktop Menu -->
    <nav class="hidden md:flex space-x-4 items-center">
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

    <!-- Mobile Menu Button -->
    <button
      class="md:hidden p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
      @click="mobileMenuOpen = !mobileMenuOpen"
    >
      <svg
        v-if="!mobileMenuOpen"
        xmlns="http://www.w3.org/2000/svg"
        class="h-6 w-6"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
      >
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M4 6h16M4 12h16M4 18h16" />
      </svg>
      <svg
        v-else
        xmlns="http://www.w3.org/2000/svg"
        class="h-6 w-6"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
      >
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>

    <!-- Mobile Menu -->
    <transition name="fade">
      <div
        v-if="mobileMenuOpen"
        class="absolute top-full left-0 w-full bg-gray-100 border-t border-gray-300 md:hidden flex flex-col items-center space-y-3 py-4 shadow-lg z-40"
      >
        <NavLink
          :href="route('login')"
          :active="$page.url === '/login'"
          class="big-button w-3/4 text-center"
        >
          Inloggen
        </NavLink>
        <NavLink
          :href="route('register')"
          :active="$page.url === '/register'"
          class="big-button w-3/4 text-center"
        >
          Registreren
        </NavLink>
      </div>
    </transition>
  </header>
</template>

<style scoped>
header {
  transition: all 0.3s ease;
}

nav a:hover {
  color: #007bff;
}

/* Simpele fade animatie */
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s ease;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>

<style>
body {
  background-color: #ffde00; /* Stedin-geel */
  min-height: 100vh;
  margin: 0;
  font-family: sans-serif;
  position: relative;
}

.big-button {
  padding: 16px 32px;
  font-size: 20px;
}
</style>
