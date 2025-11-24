<script setup>
import { ref, watch } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import TheHeader from "@/Layouts/TheHeader.vue";
import FormSection from "@/Components/FormSection.vue";
import { useForm } from "@inertiajs/vue3";

// Alle beschikbare landen en codes
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

// Standaard geselecteerd land
const selectedCountry = ref("Netherlands");

const form = useForm({
    name: "",
    email: "",
    supplier_description: "",
    phone_country_code: countryData[selectedCountry.value].code,
    phone_number: ""
});

// Update telefoon landcode als het geselecteerde land verandert
watch(selectedCountry, (newCountry) => {
    form.phone_country_code = countryData[newCountry].code;
    form.phone_number = "";
});

// Formulier versturen
function submitLeverancier() {
    form.post(route("leveranciers.store"), {
        onSuccess: () => {
            alert("Nieuwe leverancier aangemaakt!");
            form.reset();
        },
        onError: (errors) => {
            console.log("Form errors:", errors);
        },
    });
}
</script>

<template>
    <AppLayout title="Leveranciers">
        <TheHeader></TheHeader>

        <!-- Form Wrapper -->
        <FormSection @submitted="submitLeverancier" class="m-10">
            <template #suppliers>Nieuw Leverancier toevoegen</template>
            <template #description>Vul hier de gegevens van de leverancier in.</template>

            <template #form>
                <input type="text" placeholder="Naam" v-model="form.name" class="col-span-6" />
                <p v-if="form.errors.name" class="text-red-500 text-sm mt-1 whitespace-nowrap">
                    {{ form.errors.name }}
                </p>

                <input type="email" placeholder="Email" v-model="form.email" class="col-span-6" />
                <p v-if="form.errors.email" class="text-red-500 text-sm mt-1 whitespace-nowrap">
                    {{ form.errors.email }}
                </p>

                <!-- Leverancier Omschrijving -->
                <input type="text" placeholder="Omschrijving" v-model="form.supplier_description" class="col-span-6" />

                <select v-model="selectedCountry" class="col-span-6 border rounded p-2">
                    <option disabled value="">Selecteer landcode</option>
                    <option v-for="(data, country) in countryData" :key="country" :value="country">
                        {{ country }} ({{ data.code }})
                    </option>
                </select>

                <input type="text" placeholder="Telefoonnummer" v-model="form.phone_number" class="col-span-6"
                    :maxlength="countryData[selectedCountry].maxLength" />
            </template>

            <!-- Submit -->
            <template #actions>
                <button type="submit" class="btn btn-primary">Toevoegen</button>
            </template>
        </FormSection>
    </AppLayout>
</template>

<style scoped>
button:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}
</style>
