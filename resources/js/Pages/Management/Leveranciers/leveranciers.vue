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
        <TheHeader />

        <div class="m-10">
            <FormSection @submitted="submitLeverancier">
                
                <!-- Titel -->
                <template #title>Nieuw Leverancier Toevoegen</template>

                <!-- Beschrijving -->
                <template #description>
                    Vul hieronder de gegevens van de leverancier in.
                </template>

                <!-- FORM -->
                <template #form>
                    <!-- Naam -->
                    <div class="col-span-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Naam</label>
                        <input
                            type="text"
                            v-model="form.name"
                            class="w-full border rounded-lg p-3 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Leverancier naam"
                        />
                        <p v-if="form.errors.name" class="text-red-500 text-sm mt-1">
                            {{ form.errors.name }}
                        </p>
                    </div>

                    <!-- Email -->
                    <div class="col-span-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
                        <input
                            type="email"
                            v-model="form.email"
                            class="w-full border rounded-lg p-3 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="leverancier@email.com"
                        />
                        <p v-if="form.errors.email" class="text-red-500 text-sm mt-1">
                            {{ form.errors.email }}
                        </p>
                    </div>

                    <!-- Telefoonnummer -->
                    <div class="col-span-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Telefoonnummer</label>

                        <div class="grid grid-cols-4 gap-3">
                            <!-- Landcode + landnaam -->
                            <select
                                v-model="selectedCountry"
                                class="col-span-1 border rounded-lg p-3 shadow-sm bg-white focus:ring-indigo-500 focus:border-indigo-500"
                            >
                                <option disabled value="">Selecteer land</option>
                                <option
                                    v-for="(data, country) in countryData"
                                    :key="country"
                                    :value="country"
                                >
                                    {{ country }} ({{ data.code }})
                                </option>
                            </select>

                            <!-- Telefoonnummer -->
                            <input
                                type="text"
                                v-model="form.phone_number"
                                :maxlength="countryData[selectedCountry].maxLength"
                                class="col-span-3 border rounded-lg p-3 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                placeholder="Telefoonnummer"
                            />
                        </div>

                        <p v-if="form.errors.phone_number" class="text-red-500 text-sm mt-1">
                            {{ form.errors.phone_number }}
                        </p>
                    </div>
                </template>

                <!-- Actieknoppen -->
                <template #actions>
                    <button
                        type="submit"
                        class="bg-indigo-600 text-white px-5 py-3 rounded-lg shadow hover:bg-indigo-700 transition"
                        :disabled="form.processing"
                    >
                        Toevoegen
                    </button>
                </template>
            </FormSection>
        </div>
    </AppLayout>
</template>

<style scoped>
button:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}
</style>
