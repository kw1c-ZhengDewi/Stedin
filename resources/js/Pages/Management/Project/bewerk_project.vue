<script setup>
import { ref, watch } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import TheHeader from "@/Layouts/TheHeader.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    project: Object,
});

const form = useForm({
    project_nr: props.project.project_nr,
    project_name: props.project.project_name,
    cost_center: props.project.cost_center,
    order_note: props.project.order_note,
    delivery_street: props.project.delivery_street,
    city: props.project.city,
    state_province: props.project.state_province,
    country: props.project.country,
    delivery_date: props.project.delivery_date,
});

const submit = () => {
    form.put(`/project/${props.project.id}`, {
        onSuccess: () => alert("Project succesvol bijgewerkt!"),
    });
};
</script>

<template>
    <AppLayout title="Project Bewerken">
        <TheHeader />

        <div class="max-w-xl mx-auto mt-12">
            <div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-100">
                <h1 class="text-3xl font-bold text-gray-800 mb-8">Project Bewerken</h1>

                <form @submit.prevent="submit" class="space-y-6">

                    <!-- Projectnummer -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Projectnummer</label>
                        <input v-model="form.project_nr" type="text"
                            class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                        <p v-if="form.errors.project_nr" class="text-red-500 text-sm mt-1">
                            {{ form.errors.project_nr }}
                        </p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Projectnaam</label>
                        <input v-model="form.project_name" type="text"
                            class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                        <p v-if="form.errors.project_name" class="text-red-500 text-sm mt-1">
                            {{ form.errors.project_name }}
                        </p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kosten</label>
                        <input v-model="form.cost_center" type="text"
                            class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                        <p v-if="form.errors.cost_center" class="text-red-500 text-sm mt-1">
                            {{ form.errors.cost_center }}
                        </p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Omschrijving</label>
                        <input v-model="form.order_note" type="text"
                            class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                        <p v-if="form.errors.order_note" class="text-red-500 text-sm mt-1">
                            {{ form.errors.order_note }}
                        </p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Straatnummer</label>
                        <input v-model="form.delivery_street" type="text"
                            class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                        <p v-if="form.errors.delivery_street" class="text-red-500 text-sm mt-1">
                            {{ form.errors.delivery_street }}
                        </p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Woonplaats</label>
                        <input v-model="form.city" type="text"
                            class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                        <p v-if="form.errors.city" class="text-red-500 text-sm mt-1">
                            {{ form.errors.city }}
                        </p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Pronvincie/Staat</label>
                        <input v-model="form.state_province" type="text"
                            class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                        <p v-if="form.errors.state_province" class="text-red-500 text-sm mt-1">
                            {{ form.errors.state_province }}
                        </p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Land</label>
                        <input v-model="form.country" type="text"
                            class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                        <p v-if="form.errors.country" class="text-red-500 text-sm mt-1">
                            {{ form.errors.country }}
                        </p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Land</label>
                        <input v-model="form.delivery_date" type="text"
                            class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                        <p v-if="form.errors.delivery_date" class="text-red-500 text-sm mt-1">
                            {{ form.errors.delivery_date }}
                        </p>
                    </div>

                    <!-- SAVE BUTTON -->
                    <button type="submit" :disabled="form.processing"
                        class="w-full bg-indigo-600 text-white py-3 rounded-lg text-lg font-semibold shadow-md hover:bg-indigo-700 transition disabled:opacity-50">
                        Opslaan
                    </button>
                </form>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped></style>
