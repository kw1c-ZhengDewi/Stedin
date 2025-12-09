<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import TheHeader from "@/Layouts/TheHeader.vue";
import NavLink from "@/Components/NavLink.vue";
import { router } from '@inertiajs/vue3'

// Props from Laravel controller
const props = defineProps({
    projecten: {
        type: Array,
        default: () => [],
    },
});


const editProject = (id) => {
    router.visit(route('project.edit', id));
};

const deleteProject = (id) => {
    if (confirm('Weet u zeker dat u deze project wilt verwijderen?')) {
        router.delete(route('project.destroy', id), {
            onSuccess: () => alert('Project succesvol verwijderd!'),
            onError: (errors) => {
                console.error(errors);
                alert('Er is iets fout gegaan!');
            },
        });
    }
};
</script>

<template>
    <AppLayout title="Project">
        <TheHeader></TheHeader>

        <div class="p-8 max-w-7xl mx-auto font-sans text-[#4d4d4d]">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold">Projectlijst</h1>
                <NavLink :href="route('project.create')"
                    class="flex items-center gap-2 bg-[#ffd100] text-[#4d4d4d] font-semibold px-5 py-2 rounded-lg shadow hover:brightness-90 transition"
                    :active="route().current('project.create')">
                    <span class="text-xl font-bold">+</span> Project toevoegen
                </NavLink>
            </div>
        </div>

        <table class="min-w-full border border-gray-300 rounded">
            <thead class="bg-gray-100"></thead>
            <div class="overflow-x-auto bg-white shadow rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-[#ffd100]">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-[#4d4d4d]">Projectnummer</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-[#4d4d4d]">Projectnaam</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-[#4d4d4d]">Kosten</th>
                            <th class="px-6 py-3 text-center text-sm font-semibold text-[#4d4d4d]">Omschrijving</th>
                            <th class="px-6 py-3 text-center text-sm font-semibold text-[#4d4d4d]">Straatnummer</th>
                            <th class="px-6 py-3 text-center text-sm font-semibold text-[#4d4d4d]">Woonplaats</th>
                            <th class="px-6 py-3 text-center text-sm font-semibold text-[#4d4d4d]">Pronvincie/Staat</th>
                            <th class="px-6 py-3 text-center text-sm font-semibold text-[#4d4d4d]">Land</th>
                            <th class="px-6 py-3 text-center text-sm font-semibold text-[#4d4d4d]">Bezorgdatum</th>
                            <th class="px-6 py-3 text-center text-sm font-semibold text-[#4d4d4d]">Acties</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr v-for="project in props.projecten" :key="project.id" class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">{{ project.project_nr }}</td>
                            <td class="px-6 py-4">{{ project.project_name }}</td>
                            <td class="px-6 py-4">{{ project.cost_center }}</td>
                            <td class="px-6 py-4">{{ project.order_note }}</td>
                            <td class="px-6 py-4">{{ project.delivery_street }}</td>
                            <td class="px-6 py-4">{{ project.city }}</td>
                            <td class="px-6 py-4">{{ project.state_province }}</td>
                            <td class="px-6 py-4">{{ project.country }}</td>
                            <td class="px-6 py-4">{{ project.delivery_date }}</td>
                            <td class="px-6 py-4 flex justify-center gap-3">
                                <!-- Edit -->
                                <button @click="editProject(project.id)"
                                    class="w-10 h-10 flex items-center justify-center rounded-full bg-[#ffd100] hover:brightness-90 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960"
                                        width="20px" fill="#4d4d4d">
                                        <path
                                            d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
                                    </svg>
                                </button>

                                <!-- Delete -->
                                <button @click="deleteProject(project.id)"
                                    class="w-10 h-10 flex items-center justify-center rounded-full bg-red-500 hover:bg-red-600 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960"
                                        width="20px" fill="white">
                                        <path
                                            d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <tr v-if="props.projecten.length === 0">
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">Geen projecten gevonden.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </table>
    </AppLayout>
</template>

<!-- Custom CSS -->
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
