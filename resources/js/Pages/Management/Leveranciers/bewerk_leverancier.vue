<script setup>
import { ref, watch } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import TheHeader from "@/Layouts/TheHeader.vue";
import { useForm } from "@inertiajs/vue3";

const countryData = {
    Netherlands: { code: "+31", maxLength: 9 },
    Belgium: { code: "+32", maxLength: 9 },
    Germany: { code: "+49", maxLength: 11 },
    France: { code: "+33", maxLength: 9 },
    UK: { code: "+44", maxLength: 10 },
    Spain: { code: "+34", maxLength: 9 },
    Italy: { code: "+39", maxLength: 10 },
    China: { code: "+86", maxLength: 11 },
};

const props = defineProps({
    supplier: Object,
});

// Preselect correct country
const selectedCountry = ref(
    Object.keys(countryData).find(
        (country) => countryData[country].code === props.supplier.phone_country_code
    ) || "Netherlands"
);

const form = useForm({
    name: props.supplier.name,
    email: props.supplier.email,
    supplier_description: props.supplier.supplier_description,
    phone_country_code: props.supplier.phone_country_code,
    phone_number: props.supplier.phone_number,
});

watch(selectedCountry, (newCountry) => {
    form.phone_country_code = countryData[newCountry].code;
    form.phone_number = "";
});

const submit = () => {
    form.put(`/leveranciers/${props.supplier.id}`, {
        onSuccess: () => alert("Leverancier succesvol bijgewerkt!"),
    });
};
</script>

<template>
    <AppLayout title="Leverancier Bewerken">
        <TheHeader />

        <div class="max-w-xl mx-auto mt-12">
            <div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-100">
                <h1 class="text-3xl font-bold text-gray-800 mb-8">Leverancier Bewerken</h1>

                <form @submit.prevent="submit" class="space-y-6">

                    <!-- NAAM -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Naam</label>
                        <input v-model="form.name" type="text"
                            class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                        <p v-if="form.errors.name" class="text-red-500 text-sm mt-1">
                            {{ form.errors.name }}
                        </p>
                    </div>

                    <!-- EMAIL -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
                        <input v-model="form.email" type="email"
                            class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                        <p v-if="form.errors.email" class="text-red-500 text-sm mt-1">
                            {{ form.errors.email }}
                        </p>
                    </div>

                    <!-- OMSCHRIJVING -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Omschrijving</label>
                        <input v-model="form.supplier_description" type="text"
                            class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                        <p v-if="form.errors.supplier_description" class="text-red-500 text-sm mt-1">
                            {{ form.errors.supplier_description }}
                        </p>
                    </div>

                    <!-- LANDCODE -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Landcode</label>
                        <select v-model="selectedCountry"
                            class="w-full p-3 border rounded-lg shadow-sm bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                            <option disabled value="">Selecteer landcode</option>
                            <option v-for="(data, country) in countryData" :key="country" :value="country">
                                {{ country }} ({{ data.code }})
                            </option>
                        </select>
                    </div>

                    <!-- TELEFOONNUMMER -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Telefoonnummer</label>
                        <div class="flex gap-2">
                            <input type="text" :value="form.phone_country_code" disabled
                                class="w-28 p-3 border rounded-lg bg-gray-100 text-gray-600" />

                            <input v-model="form.phone_number" type="text"
                                :maxlength="countryData[selectedCountry].maxLength"
                                class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>

                        <p v-if="form.errors.phone_number" class="text-red-500 text-sm mt-1">
                            {{ form.errors.phone_number }}
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
