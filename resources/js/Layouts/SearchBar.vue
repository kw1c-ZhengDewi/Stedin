<script setup>
import { ref, computed } from "vue";

const searchQuery = ref("");

// Map zoektermen naar pagina routes
const searchMap = {
  'project': '/project',
  'producten': '/product',
  'gebruiker': '/gebruikers',
  'leverancier': '/lijst_leveranciers', // aangepast
  'winkelwagen': '/winkelwagen'
};

// Lijst van zoekwoorden voor auto-fill/dropdown
const searchKeys = Object.keys(searchMap);

// Gefilterde suggesties gebaseerd op input
const filteredSuggestions = computed(() => {
  const query = searchQuery.value.toLowerCase().trim();
  if (!query) return [];
  return searchKeys.filter(key => key.includes(query));
});

// Submit functie
const submitSearch = (query = searchQuery.value) => {
  const q = query.trim().toLowerCase();
  if (!q) return;

  for (const key in searchMap) {
    if (q.includes(key)) {
      // Ga naar de bijbehorende pagina
      window.location.href = searchMap[key];
      return;
    }
  }

  alert("Geen pagina gevonden voor je zoekterm.");
};

// Kies suggestie uit dropdown
const selectSuggestion = (suggestion) => {
  searchQuery.value = suggestion;
  submitSearch(suggestion);
};
</script>

<template>
  <div class="relative w-64">
    <form @submit.prevent="submitSearch" class="flex">
      <input
        v-model="searchQuery"
        type="text"
        placeholder="Zoeken..."
        class="border border-gray-300 rounded-l px-3 py-1 focus:outline-none w-full"
      />
      <button
        type="submit"
        class="bg-blue-600 text-white px-3 py-1 rounded-r hover:bg-blue-700"
      >
        Zoeken
      </button>
    </form>

    <!-- Dropdown -->
    <ul v-if="filteredSuggestions.length" class="absolute bg-white border border-gray-300 w-full mt-1 rounded shadow z-10">
      <li
        v-for="suggestion in filteredSuggestions"
        :key="suggestion"
        @click="selectSuggestion(suggestion)"
        class="px-3 py-1 cursor-pointer hover:bg-gray-200"
      >
        {{ suggestion }}
      </li>
    </ul>
  </div>
</template>

<style>
.z-10 { z-index: 10; }
</style>
