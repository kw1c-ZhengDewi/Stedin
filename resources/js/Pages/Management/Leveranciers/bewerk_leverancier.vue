<script setup>
import { ref, watch } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import TheHeader from "@/Layouts/TheHeader.vue";
import { useForm, router } from "@inertiajs/vue3";

// All the available phone numbers
const countryData = {
    "Netherlands": { code: "+31", maxLength: 9 },
    "Belgium": { code: "+32", maxLength: 9 },
    "Germany": { code: "+49", maxLength: 11 },
    "France": { code: "+33", maxLength: 9 },
    "United Kingdom": { code: "+44", maxLength: 10 },
    "Spain": { code: "+34", maxLength: 9 },
    "Italy": { code: "+39", maxLength: 10 },
    "China": { code: "+86", maxLength: 11 },
};

// All the properties
const props = defineProps({
    supplier: Object,
});

// Set selectedCountry based on the supplier's current code
const selectedCountry = ref(
    Object.keys(countryData).find(
        (country) => countryData[country].code === props.supplier.phone_country_code
    ) || "Netherlands"
);

// Changes the limit digits based on the country code
watch(selectedCountry, (newCountry) => {
    form.phone_country_code = countryData[newCountry].code;
    form.phone_number = ""; // optional: clear phone number if you want
});

const form = useForm({
    name: props.supplier.name,
    email: props.supplier.email,
    phone_country_code: props.supplier.phone_country_code,
    phone_number: props.supplier.phone_number,
});

const submit = () => {
    form.put(`/leveranciers/${props.supplier.id}`, {
        onSuccess: () => alert('Leverancier succesvol bijgewerkt!'),
        onError: (errors) => console.error(errors),
    });
};
</script>

<template>
    <AppLayout title="Leverancier Bewerken">
        <TheHeader />

        <div class="m-10 max-w-md mx-auto">
            <h1 class="text-2xl font-bold mb-6">Leverancier Bewerken</h1>

            <form @submit.prevent="submit" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Naam</label>
                    <input v-model="form.name" type="text" class="border rounded w-full p-2" />
                    <p v-if="form.errors.name" class="text-red-500 text-sm mt-1 whitespace-nowrap">
                        {{ form.errors.name }}
                    </p>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">E-mail</label>
                    <input v-model="form.email" type="email" class="border rounded w-full p-2" />
                    <p v-if="form.errors.email" class="text-red-500 text-sm mt-1 whitespace-nowrap">
                        {{ form.errors.email }}
                    </p>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Landcode</label>
                    <select v-model="selectedCountry" class="col-span-6 border rounded w-full p-2">
                        <option disabled value="">Selecteer landcode</option>
                        <option v-for="(data, country) in countryData" :key="country" :value="country">
                            {{ country }} ({{ data.code }})
                        </option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Telefoonnummer</label>
                    <input v-model="form.phone_number" type="text" class="border rounded w-full p-2"
                        :maxlength="countryData[selectedCountry].maxLength" />
                    {{ form.errors.phone_number }}
                </div>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Opslaan
                </button>
            </form>
        </div>
    </AppLayout>
</template>


<!-- Custom CSS -->
<style scoped></style>
