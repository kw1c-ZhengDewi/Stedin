<script setup>
import NavLink from "@/Components/NavLink.vue";
import { ref } from "vue";

const mobileMenuOpen = ref(false);
</script>

<template>
<<<<<<< HEAD
  <div class="min-h-screen flex flex-col font-open-sans">

    <!-- HEADER -->
    <header class="relative bg-gray-100 border-b border-gray-300 py-4 px-6 flex justify-end items-center z-50">

      <!-- Desktop Menu (rechts) -->
      <nav class="hidden md:flex space-x-4 items-center">
        <NavLink
          :href="route('login')"
          :active="$page.url === '/login'"
          class="big-button"
=======
  <!-- Header -->
  <header class="relative bg-gradient-to-r from-amber-50 via-white to-amber-50 border-b-2 border-amber-200 py-4 px-6 flex items-center justify-between z-50 shadow-lg backdrop-blur-sm">
  
    <!-- Logo of app name -->
    <div class="text-xl font-bold">
      MijnApp
    </div>

    <!-- Desktop Menu -->
    <nav class="hidden md:flex space-x-4 items-center ml-auto">
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
      class="md:hidden p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 ml-auto"
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
        class="absolute top-full right-0 w-full bg-gradient-to-b from-amber-50 to-white border-t-2 border-amber-200 md:hidden flex flex-col items-end space-y-3 py-6 pr-6 shadow-2xl z-40 backdrop-blur-sm"
      >
        <NavLink
          :href="route('login')"
          :active="$page.url === '/login'"
          class="big-button w-3/4 text-right"
>>>>>>> c927c2876d57c96e72c0373e2b54509380aa4e33
        >
          Inloggen
        </NavLink>

        <NavLink
          :href="route('register')"
          :active="$page.url === '/register'"
<<<<<<< HEAD
          class="big-button"
=======
          class="big-button w-3/4 text-right"
>>>>>>> c927c2876d57c96e72c0373e2b54509380aa4e33
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

    <!-- WELKOM BERICHT (CENTRAAL) -->
    <main class="flex-grow flex items-center justify-center px-6" style="background-color: #ffd100;">
      <div class="bg-white shadow-2xl rounded-3xl p-16 max-w-lg w-full text-center">
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
<<<<<<< HEAD
    </main>

  </div>
=======
    </transition>
  </header>

  <!-- Welkomstsectie -->
  <main class="flex flex-col items-center justify-center text-center mt-32 px-4">
    <div class="welcome-box backdrop-blur-md bg-white/40 shadow-xl border border-white/30 rounded-2xl p-10 max-w-2xl animate-fade-in">
      <h1 class="text-5xl md:text-6xl font-extrabold text-amber-700 mb-4 drop-shadow-lg">
        Welkom bij Stedin
      </h1>
      <p class="text-xl md:text-2xl text-gray-700">
        <a 
          :href="route('login')" 
          class="font-bold text-amber-700 no-underline hover:no-underline"
        >
          Log in
        </a> 
        of 
        <a 
          :href="route('register')" 
          class="font-bold text-amber-700 no-underline hover:no-underline"
        >
          maak een account
        </a> 
        om door te gaan naar de site.
      </p>
    </div>
  </main>
>>>>>>> c927c2876d57c96e72c0373e2b54509380aa4e33
</template>

<style scoped>
header {
  transition: all 0.3s ease;
  position: relative;
}

<<<<<<< HEAD
/* Fade animatie */
=======
/* Subtiele glans animatie */
header::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
  animation: shine 3s infinite;
}

@keyframes shine {
  0% { left: -100%; }
  50%, 100% { left: 100%; }
}

/* Fade animatie voor mobiel menu */
>>>>>>> c927c2876d57c96e72c0373e2b54509380aa4e33
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s ease;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

/* Welkomst animatie */
@keyframes fade-in {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}

.animate-fade-in {
  animation: fade-in 1.2s ease forwards;
}
</style>

<style>
/* Algemene styling */
body {
<<<<<<< HEAD
  margin: 0;
  font-family: 'Open Sans', sans-serif;
=======
  background: linear-gradient(135deg, #ffd700 0%, #ffde00 50%, #ffa500 100%);
  min-height: 100vh;
  margin: 0;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  position: relative;
  overflow-x: hidden;
}

body::before {
  content: '';
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-image: 
    radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
    radial-gradient(circle at 80% 80%, rgba(255, 165, 0, 0.15) 0%, transparent 50%);
  pointer-events: none;
  z-index: 0;
}

body::after {
  content: '';
  position: fixed;
  top: -50%;
  left: -50%;
  width: 200%;
  height: 200%;
  background-image: repeating-linear-gradient(
    45deg,
    transparent,
    transparent 60px,
    rgba(255, 255, 255, 0.03) 60px,
    rgba(255, 255, 255, 0.03) 120px
  );
  pointer-events: none;
  z-index: 0;
>>>>>>> c927c2876d57c96e72c0373e2b54509380aa4e33
}

.big-button {
  padding: 16px 32px;
  font-size: 20px;
}
</style>
