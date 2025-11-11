<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import TheHeader from "@/Layouts/TheHeader.vue";
import { useForm } from "@inertiajs/vue3";
import NavLink from "@/Components/NavLink.vue";

// Props from Laravel controller
const props = defineProps({
    leveranciers: {
        type: Array,
        default: () => [],
    },
});

const form = useForm({
    name: localStorage.getItem('name') || "",
    email: localStorage.getItem('email') || "",
    phone_country_code: localStorage.getItem('phone_country_code') || "",
    phone_number: localStorage.getItem('phone_number') || "",
});


</script>

<template>
    <AppLayout title="Leveranciers">
        <TheHeader></TheHeader>

        <!-- Link naar leverancier management -->
        <NavLink :href="route('leveranciers.store')"
            class="custom-plus-link flex items-center gap-2 px-4 py-2 rounded text-black transition-colors"
            :active="$page.url === './Management/Leveranciers/leveranciers.vue'">Leverancier toevoegen
        </NavLink>

        <!-- Database Leveranciers: Display -->
        <div class="m-10">
            <h1 class="text-2xl font-bold mb-4">Leverancierslijst</h1>

            <table class="min-w-full border border-gray-300 rounded">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2 border">Naam</th>
                        <th class="p-2 border">Email</th>
                        <th class="p-2 border">Landcode</th>
                        <th class="p-2 border">Telefoon</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="leverancier in props.leveranciers" :key="leverancier.id" class="hover:bg-gray-50">
                        <td class="p-2 border">{{ leverancier.name }}</td>
                        <td class="p-2 border">{{ leverancier.email }}</td>
                        <td class="p-2 border">{{ leverancier.phone_country_code }}</td>
                        <td class="p-2 border">{{ leverancier.phone_number }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AppLayout>
</template>

<!-- Custom CSS -->
<style scoped>
.custom-plus-link::before {
    content: "+";
    font-size: 1.3rem;
    font-weight: bold;
    color: #000000;
    margin-right: 0.1rem;
}
</style>
