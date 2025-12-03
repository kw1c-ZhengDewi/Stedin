<script setup>
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
            alert("Nieuw project aangemaakt!");
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
            
            <!-- Title -->
            <h1 class="text-3xl font-bold text-[#4d4d4d] mb-8">Nieuw Project Toevoegen</h1>

            <form @submit.prevent="submitProject" class="space-y-6">

                <!-- Project nummer -->
                <div>
                    <label class="block text-sm font-medium text-[#4d4d4d] mb-1">Projectnummer</label>
                    <input v-model="form.project_nr" type="text"
                        class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 
                        focus:ring-[#ffd100] focus:border-[#ffd100]" />
                    <p v-if="form.errors.project_nr" class="text-red-500 text-sm mt-1">
                        {{ form.errors.project_nr }}
                    </p>
                </div>

                <!-- Project naam -->
                <div>
                    <label class="block text-sm font-medium text-[#4d4d4d] mb-1">Projectnaam</label>
                    <input v-model="form.project_name" type="text"
                        class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 
                        focus:ring-[#ffd100] focus:border-[#ffd100]" />
                    <p v-if="form.errors.project_name" class="text-red-500 text-sm mt-1">
                        {{ form.errors.project_name }}
                    </p>
                </div>

                <!-- Omschrijving -->
                <div>
                    <label class="block text-sm font-medium text-[#4d4d4d] mb-1">Omschrijving</label>
                    <input v-model="form.order_note" type="text"
                        class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 
                        focus:ring-[#ffd100] focus:border-[#ffd100]" />
                    <p v-if="form.errors.order_note" class="text-red-500 text-sm mt-1">
                        {{ form.errors.order_note }}
                    </p>
                </div>

                <!-- Kostenplaats -->
                <div>
                    <label class="block text-sm font-medium text-[#4d4d4d] mb-1">Kostenplaats</label>
                    <input v-model="form.cost_center" type="text"
                        class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 
                        focus:ring-[#ffd100] focus:border-[#ffd100]" />
                    <p v-if="form.errors.cost_center" class="text-red-500 text-sm mt-1">
                        {{ form.errors.cost_center }}
                    </p>
                </div>

                <!-- Straat -->
                <div>
                    <label class="block text-sm font-medium text-[#4d4d4d] mb-1">Straat + nummer</label>
                    <input v-model="form.delivery_street" type="text"
                        class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 
                        focus:ring-[#ffd100] focus:border-[#ffd100]" />
                    <p v-if="form.errors.delivery_street" class="text-red-500 text-sm mt-1">
                        {{ form.errors.delivery_street }}
                    </p>
                </div>

                <!-- Woonplaats -->
                <div>
                    <label class="block text-sm font-medium text-[#4d4d4d] mb-1">Woonplaats</label>
                    <input v-model="form.city" type="text"
                        class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 
                        focus:ring-[#ffd100] focus:border-[#ffd100]" />
                    <p v-if="form.errors.city" class="text-red-500 text-sm mt-1">
                        {{ form.errors.city }}
                    </p>
                </div>

                <!-- Staat / Provincie -->
                <div>
                    <label class="block text-sm font-medium text-[#4d4d4d] mb-1">Staat / Provincie</label>
                    <input v-model="form.state_province" type="text"
                        class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 
                        focus:ring-[#ffd100] focus:border-[#ffd100]" />
                    <p v-if="form.errors.state_province" class="text-red-500 text-sm mt-1">
                        {{ form.errors.state_province }}
                    </p>
                </div>

                <!-- Land -->
                <div>
                    <label class="block text-sm font-medium text-[#4d4d4d] mb-1">Land</label>
                    <input v-model="form.country" type="text"
                        class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 
                        focus:ring-[#ffd100] focus:border-[#ffd100]" />
                    <p v-if="form.errors.country" class="text-red-500 text-sm mt-1">
                        {{ form.errors.country }}
                    </p>
                </div>

                <!-- Leverdatum -->
                <div>
                    <label class="block text-sm font-medium text-[#4d4d4d] mb-1">Leverdatum</label>
                    <input v-model="form.delivery_date" type="date"
                        class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 
                        focus:ring-[#ffd100] focus:border-[#ffd100]" />
                    <p v-if="form.errors.delivery_date" class="text-red-500 text-sm mt-1">
                        {{ form.errors.delivery_date }}
                    </p>
                </div>

                <!-- Submit button -->
                <button type="submit"
                    class="w-full bg-[#ffd100] text-[#4d4d4d] py-3 rounded-lg text-lg font-semibold 
                    shadow-md hover:brightness-90 transition disabled:opacity-50"
                    :disabled="form.processing">
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
