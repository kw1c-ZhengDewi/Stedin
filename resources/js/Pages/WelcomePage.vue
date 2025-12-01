<script setup>
import WelcomeHeader from '@/Layouts/WelcomeHeader.vue';
import WelcomeFooter from '@/Layouts/WelcomeFooter.vue';
import { ref } from "vue";

const mobileMenuOpen = ref(false);
</script>

<template>
  <div class="min-h-screen flex flex-col">
    <!-- Header -->
    <WelcomeHeader />

    <!-- Main content (optioneel) -->
    <main class="flex-grow">
      <!-- Jouw pagina-inhoud komt hier -->
    </main>

    <!-- Footer -->
    <WelcomeFooter />
  </div>
</template>
