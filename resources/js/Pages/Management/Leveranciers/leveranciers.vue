<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import TheHeader from "@/Layouts/TheHeader.vue";
import FormSection from "@/Components/FormSection.vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    name: "",
    email: "",
    phone_country_code: "",
    phone_number: ""
});

function submitLeverancier() {
    // Inertia automatically handles validation errors and CSRF
    form.post(route("leveranciers.store"), {
        onSuccess: () => {
            alert("Nieuw leverancier aangemaakt!");
            form.reset();
        },
        onError: (errors) => {
            alert("Er is een foutmelding");
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

                <input type="email" placeholder="Email" v-model="form.email" class="col-span-6" />

                <select v-model="form.phone_country_code" class="col-span-6 border rounded p-2">
                    <option disabled value="">Selecteer landcode</option>
                    <option value="+31">Nederland (+31)</option>
                    <option value="+32">België (+32)</option>
                    <option value="+49">Duitsland (+49)</option>
                    <option value="+33">Frankrijk (+33)</option>
                    <option value="+44">Verenigd Koninkrijk (+44)</option>
                    <option value="+34">Spanje (+34)</option>
                    <option value="+39">Italië (+39)</option>
                    <option value="+1">Verenigde Staten (+1)</option>
                    <option value="+86">China (+86)</option>
                </select>

                <input type="text" placeholder="Telefoonnummer" v-model="form.phone_number" class="col-span-6" />
            </template>

            <!-- Submit -->
            <template #actions>
                <button type="submit" class="btn btn-primary">Toevoegen</button>
            </template>
        </FormSection>
    </AppLayout>
</template>

<!-- Custom CSS -->
<style scoped>
button:hover {
    color: #007bff;
}

h1 {
    font-size: 32px;
    white-space: nowrap;
    font-weight: bold;
}
</style>
