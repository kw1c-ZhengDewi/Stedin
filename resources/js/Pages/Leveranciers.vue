<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import TheHeader from "@/Layouts/TheHeader.vue";
import NavLink from "@/Components/NavLink.vue";
import { router } from '@inertiajs/vue3';

// Props from Laravel controller
const props = defineProps({
    leveranciers: {
        type: Array,
        default: () => [],
    },
});

const editSupplier = (id) => {
    router.visit(route('leveranciers.edit', id));
};

const deleteSupplier = (id) => {
    if (confirm('Weet u zeker dat u deze leverancier wilt verwijderen?')) {
        router.delete(route('leveranciers.destroy', id), {
            onSuccess: () => alert('Leverancier succesvol verwijderd!'),
            onError: (errors) => {
                console.error(errors);
                alert('Er is iets fout gegaan!');
            },
        });
    }
};
</script>

<template>
<AppLayout title="Leveranciers">
    <TheHeader />

    <div class="p-8 max-w-7xl mx-auto font-sans text-[#4d4d4d]">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Leverancierslijst</h1>
            <NavLink
                :href="route('leveranciers.store')"
                class="flex items-center gap-2 bg-[#ffd100] text-[#4d4d4d] font-semibold px-5 py-2 rounded-lg shadow hover:brightness-90 transition"
                :active="$page.url === './Management/Leveranciers/leveranciers.vue'">
                <span class="text-xl font-bold">+</span> Leverancier toevoegen
            </NavLink>
        </div>

            <!-- Search bar -->
            <Searchbar routeName="search.suppliers" />
            <!-- The rest of your page content -->
            <div>
                <!-- Leverancier lijst vanaf zoekba -->
                <ul>
                    <li v-for="leverancier in leveranciers" :key="leverancier.id">{{ leverancier.name }}</li>
                </ul>
            </div>
        </div>

            <table class="min-w-full border border-gray-300 rounded">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2 border">Naam</th>
                        <th class="p-2 border">Email</th>
                        <th class="p-2 border">Omschrijving</th>
                        <th class="p-2 border">Telefoonnummer</th>
                        <th class="p-2 border">Acties</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="leverancier in props.leveranciers" :key="leverancier.id" class="hover:bg-gray-50">
                        <td class="p-2 border">{{ leverancier.name }}</td>
                        <td class="p-2 border">{{ leverancier.email }}</td>
                        <td class="p-2 border">{{ leverancier.supplier_description }}</td>
                        <td class="p-2 border">{{ leverancier.phone_country_code }} {{ leverancier.phone_number }}</td>
                        <!-- Bewerken of Verwijderen -->
                        <td class="p-2 border justify-center flex gap-5">

                            <!-- Edit Action  -->
                            <button class="ActionBTN" @click="editSupplier(leverancier.id)">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="currentColor">
                                    <path
                                        d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
                                </svg>
                            </button>

                            <!-- Delete Action  -->
                            <button class="ActionBTN" @click="deleteSupplier(leverancier.id)">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="currentColor">
                                    <path
                                        d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AppLayout>
</template>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap');

.font-sans {
    font-family: 'Open Sans', sans-serif;
}

/* Hover effect voor iconen */
button svg {
    transition: transform 0.2s;
}
button:hover svg {
    transform: scale(1.1);
}
</style>
