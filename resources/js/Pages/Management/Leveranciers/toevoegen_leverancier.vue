<script setup>
import { ref, watch } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import TheHeader from "@/Layouts/TheHeader.vue";
import { useForm } from "@inertiajs/vue3";
import FormSection from "@/Components/FormSection.vue";

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

const selectedCountry = ref("Netherlands");

const form = useForm({
    name: "",
    email: "",
    supplier_description: "",
    phone_country_code: countryData["Netherlands"].code,
    phone_number: "",
});

watch(selectedCountry, (newCountry) => {
    form.phone_country_code = countryData[newCountry].code;
    form.phone_number = "";
});

function submitLeverancier() {
    form.post(route("leveranciers.store"), {
        onSuccess: () => {
            alert("Nieuwe leverancier aangemaakt!");
            form.reset();
            selectedCountry.value = "Netherlands";
        },
        onError: (errors) => {
            console.log("Form errors:", errors);
        },
    });
}
</script>

<template>
    <AppLayout title="Nieuwe Leverancier">
        <TheHeader></TheHeader>

        <FormSection @submitted="submitLeverancier" class="m-10">
            <template #title>Nieuw Leverancier toevoegen</template>

            <template #description>
                Vul hier de gegevens van de leverancier in.
            </template>

            <template #form>
                <!-- Naam -->
                <input type="text" placeholder="Naam" v-model="form.name" class="col-span-6" />
                <p v-if="form.errors.name" class="text-red-500 text-sm mt-1 whitespace-nowrap">
                    {{ form.errors.name }}
                </p>

                <!-- Email -->
                <input type="email" placeholder="Email" v-model="form.email" class="col-span-6" />
                <p v-if="form.errors.email" class="text-red-500 text-sm mt-1 whitespace-nowrap">
                    {{ form.errors.email }}
                </p>

                <!-- Omschrijving -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Omschrijving</label>
                    <input v-model="form.supplier_description" type="text"
                        class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-[#ffd100] focus:border-[#ffd100]" />
                </div>

                <!-- TELEFOONNUMMER -->
                <div>
                    <label class="block text-sm font-medium text-[#4d4d4d] mb-1">Telefoonnummer</label>
                    <div class="flex gap-2">
                        <input type="text" :value="form.phone_country_code" disabled
                            class="w-28 p-3 border rounded-lg bg-gray-100 text-gray-600" />

                        <input v-model="form.phone_number" type="text"
                            :maxlength="countryData[selectedCountry].maxLength"
                            class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-[#ffd100] focus:border-[#ffd100]" />
                    </div>
                    <p v-if="form.errors.phone_number" class="text-red-500 text-sm mt-1">
                        {{ form.errors.phone_number }}
                    </p>
                </div>

                <!-- SUBMIT -->
                <button type="submit" :disabled="form.processing"
                    class="w-full bg-[#ffd100] text-[#4d4d4d] py-3 rounded-lg text-lg font-semibold shadow-md hover:brightness-90 transition disabled:opacity-50">
                    Toevoegen
                </button>
            </template>
        </FormSection>
    </AppLayout>
</template>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap');

.font-sans {
    font-family: 'Open Sans', sans-serif;
}
</style>
