<script setup>
import { ref } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import TheHeader from "@/Layouts/TheHeader.vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    project_nr: '',
    project_name: '',
    order_note: '',
    cost_center: '',
    delivery_street: '',
    city: '',
    state_province: '',
    country: '',
    delivery_date: '',
});

function submitProject() {
    form.post(route("project.store"), {
        onSuccess: () => {
            alert("Nieuwe Project aangemaakt!");
            form.reset();
        },
        onError: (errors) => {
            console.log("Form errors:", errors);
        },
    });
}
</script>

<template>
<AppLayout title="Nieuw Project">
    <TheHeader />

    <div class="max-w-xl mx-auto mt-12">
        <div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-100">
            <h1 class="text-3xl font-bold text-gray-800 mb-8">Nieuw Project toevoegen</h1>
            <p class="text-gray-600 mb-6">Vul hier de gegevens van het project in.</p>

            <form @submit.prevent="submitProject" class="space-y-6">
                <!-- Project Nummer -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Project Nummer</label>
                    <input type="text" v-model="form.project_nr"
                        class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-[#ffd100] focus:border-[#ffd100]" />
                    <p v-if="form.errors.project_nr" class="text-red-500 text-sm mt-1">{{ form.errors.project_nr }}</p>
                </div>

                <!-- Project Naam -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Project Naam</label>
                    <input type="text" v-model="form.project_name"
                        class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-[#ffd100] focus:border-[#ffd100]" />
                    <p v-if="form.errors.project_name" class="text-red-500 text-sm mt-1">{{ form.errors.project_name }}</p>
                </div>

                <!-- Omschrijving -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Omschrijving</label>
                    <input type="text" v-model="form.order_note"
                        class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-[#ffd100] focus:border-[#ffd100]" />
                    <p v-if="form.errors.order_note" class="text-red-500 text-sm mt-1">{{ form.errors.order_note }}</p>
                </div>

                <!-- Kosten -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kosten</label>
                    <input type="text" v-model="form.cost_center"
                        class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-[#ffd100] focus:border-[#ffd100]" />
                    <p v-if="form.errors.cost_center" class="text-red-500 text-sm mt-1">{{ form.errors.cost_center }}</p>
                </div>

                <!-- Leveringsadres -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Straat</label>
                    <input type="text" v-model="form.delivery_street"
                        class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-[#ffd100] focus:border-[#ffd100]" />
                    <p v-if="form.errors.delivery_street" class="text-red-500 text-sm mt-1">{{ form.errors.delivery_street }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Woonplaats</label>
                    <input type="text" v-model="form.city"
                        class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-[#ffd100] focus:border-[#ffd100]" />
                    <p v-if="form.errors.city" class="text-red-500 text-sm mt-1">{{ form.errors.city }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Staat/Provincie</label>
                    <input type="text" v-model="form.state_province"
                        class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-[#ffd100] focus:border-[#ffd100]" />
                    <p v-if="form.errors.state_province" class="text-red-500 text-sm mt-1">{{ form.errors.state_province }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Land</label>
                    <input type="text" v-model="form.country"
                        class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-[#ffd100] focus:border-[#ffd100]" />
                    <p v-if="form.errors.country" class="text-red-500 text-sm mt-1">{{ form.errors.country }}</p>
                </div>

                <!-- Leveringsdatum -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Leveringsdatum</label>
                    <input type="date" v-model="form.delivery_date"
                        class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-[#ffd100] focus:border-[#ffd100]" />
                    <p v-if="form.errors.delivery_date" class="text-red-500 text-sm mt-1">{{ form.errors.delivery_date }}</p>
                </div>

                <!-- Submit knop -->
                <button type="submit" :disabled="form.processing"
                    class="w-full bg-[#ffd100] text-[#4d4d4d] py-3 rounded-lg text-lg font-semibold shadow-md hover:brightness-90 transition disabled:opacity-50">
                    Toevoegen
                </button>
            </form>
        </div>
    </div>
</AppLayout>
</template>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap');

.font-sans {
    font-family: 'Open Sans', sans-serif;
}
</style>
