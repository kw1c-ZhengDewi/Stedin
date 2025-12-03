<script setup>
</script>

<template>
  <footer
    class="w-full border-t border-gray-300 py-6 px-6 text-center mt-auto"
    style="background-color: white;"
  >
    <div class="text-[#4d4d4d] font-open-sans">
      <p class="text-base">
        © {{ new Date().getFullYear() }} Stedin Portal — Alle rechten voorbehouden.
      </p>

      <div class="flex justify-center space-x-6 mt-3 text-lg">
        <a href="#" class="hover:underline">Privacy</a>
        <a href="#" class="hover:underline">Voorwaarden</a>
        <a href="#" class="hover:underline">Contact</a>
      </div>
    </div>
  </footer>
</template>

<style scoped>
footer a {
  transition: opacity 0.2s ease;
}

footer a:hover {
  opacity: 0.6;
}
</style>
