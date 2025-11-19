<script setup>
import NavLink from "@/Components/NavLink.vue";
import { ref } from "vue";

const mobileMenuOpen = ref(false);
</script>

<template>
  <div class="min-h-screen flex flex-col font-open-sans">

    <!-- HEADER (nu weer wit) -->
    <header
      class="sticky top-0 border-b border-gray-300 py-4 px-6 flex justify-end items-center z-50"
      style="background-color: white;"
    >

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
        class="md:hidden p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#4d4d4d]"
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
            @click="mobileMenuOpen = false"
          >
            Inloggen
          </NavLink>

          <NavLink
            :href="route('register')"
            :active="$page.url === '/register'"
            class="big-button w-3/4 text-center"
            @click="mobileMenuOpen = false"
          >
            Registreren
          </NavLink>
        </div>
      </transition>
    </header>

    <!-- WELCOME AREA -->
    <main
      class="flex-grow flex items-center justify-center px-6"
      style="background-color: #ffd100;"
    >
      <div class="bg-white shadow-2xl rounded-3xl p-16 max-w-lg w-full text-center animate-fade-in">
        <h1 class="text-5xl font-extrabold mb-6" style="color: #4d4d4d;">
          Welkom bij het Stedin Portal
        </h1>

        <p class="text-lg mb-8" style="color: #4d4d4d;">
          Fijn dat je er bent! Log in of registreer om toegang te krijgen tot je account.
        </p>

        <div class="flex justify-center gap-4">
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
        </div>
      </div>
    </main>

  </div>
</template>

<style scoped>
/* Fade animation */
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s ease;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

/* Welcome card animation */
@keyframes fade-in {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}
.animate-fade-in {
  animation: fade-in 1.2s ease forwards;
}
</style>

<style>
body {
  margin: 0;
  font-family: 'Open Sans', sans-serif;
}

.big-button {
  padding: 16px 32px;
  font-size: 20px;
}
</style>
