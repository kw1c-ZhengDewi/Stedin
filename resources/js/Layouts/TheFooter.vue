<template>
  <footer class="bg-gray-800 text-gray-200 py-8">
    <div class="container mx-auto px-4">
      <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
        <!-- Logo / naam -->
        <div class="text-lg font-bold text-indigo-400">
          MijnApp
        </div>

        <!-- Navigatie links -->
        <div class="flex space-x-4">
          <a href="/" class="hover:text-white transition">Home</a>
          <a href="/project" class="hover:text-white transition">Projecten</a>
          <a href="/product" class="hover:text-white transition">Producten</a>
          <a href="/gebruikers" class="hover:text-white transition">Gebruikers</a>
          <a href="/leveranciers" class="hover:text-white transition">Leveranciers</a>
        </div>

        <!-- Copyright -->
        <div class="text-sm text-gray-400">
          &copy; {{ new Date().getFullYear() }} MijnApp. Alle rechten voorbehouden.
        </div>
      </div>
    </div>
  </footer>
</template>

<script setup>
</script>

<style scoped>
footer a {
  transition: color 0.3s ease;
}
</style>
