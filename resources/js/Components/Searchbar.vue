<script setup>
import { ref, watch } from 'vue';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
    routeName: {
        type: String,
        required: true,
    },
});

const search = ref('');
const sort = ref(null);
const searchRef = ref(null);

// Native debounce
function debounce(fn, delay = 2000) {
    let timeout;
    return (...args) => {
        clearTimeout(timeout);
        timeout = setTimeout(() => fn(...args), delay);
    };
}

const searchMethod = debounce(() => {
    Inertia.get(
        route(props.routeName),
        { search: search.value, sort: sort.value },
        { preserveState: false }
    );
}, 2000);

watch(search, (newValue) => {
    if (newValue) {
        searchMethod();
    } else {
        Inertia.get(route(props.routeName));
    }
});
</script>

<template>
    <div class="w-1/2 bg-white px-4 dark:bg-gray-800">
        <label for="search" class="hidden">Search</label>
        <input id="search" ref="searchRef" v-model="search"
            class="h-10 w-full cursor-pointer rounded-full border border-gray-500 bg-gray-100 px-4 pb-0 pt-px text-gray-700 outline-none transition focus:border-purple-400"
            :class="{ 'transition-border': search }" autocomplete="off" name="search" placeholder="Search" type="search"
            @keyup.esc="search = ''" />
    </div>
</template>
