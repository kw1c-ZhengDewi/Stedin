<script setup>
<<<<<<< HEAD
import { ref } from 'vue';

const mobileMenuOpen = ref(false);
</script>

<template>
  <header class="bg-white shadow-md dark:bg-gray-900">
    <!-- Desktop navigation -->
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16 items-center">
        <!-- Logo -->
        <div class="flex items-center">
          <a href="/" class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">
            MijnApp
          </a>
        </div>

        <!-- Nav links (desktop) -->
        <nav class="hidden md:flex space-x-6 items-center">
          <slot />
        </nav>

        <!-- Mobile menu button -->
        <div class="md:hidden">
          <button
            @click="mobileMenuOpen = !mobileMenuOpen"
            class="text-gray-600 dark:text-gray-300 hover:text-indigo-600 focus:outline-none"
          >
            <svg
              v-if="!mobileMenuOpen"
              xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="2"
            >
              <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg
              v-else
              xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="2"
            >
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile navigation -->
    <div
      v-if="mobileMenuOpen"
      class="md:hidden border-t border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900"
    >
      <nav class="px-4 py-3 space-y-2 flex flex-col">
        <slot />
      </nav>
    </div>
  </header>
</template>

<style scoped>
header {
  transition: all 0.3s ease;
=======
import NavLink from '@/Components/NavLink.vue';
</script>

<template>
  <header class="bg-gray-100 border-b border-gray-300 py-3 text-center">
    <nav class="flex justify-center space-x-6">
        <!-- Navigatie, komt later in de header -->
        <NavLink :href="route('home')" :active="$page.url === '/'">
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
    </nav>
</header>

</template>

<style scoped>
nav a:hover {
  color: #007bff;
>>>>>>> 933badcebb6043965b091f0c7f3c370c41619bc4
}
</style>
