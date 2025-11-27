<template>
    <div class="max-w-5xl mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Zoekresultaten voor "{{ query }}"</h1>

        <div v-if="results.length === 0">
            Geen resultaten gevonden.
        </div>

        <ul v-else class="space-y-2">
            <li v-for="item in results" :key="item.id" class="border p-2 rounded">
                {{ item.name }}
            </li>
        </ul>
    </div>
</template>

<script setup>
defineProps({
    query: String,
    results: Array
});
</script>
