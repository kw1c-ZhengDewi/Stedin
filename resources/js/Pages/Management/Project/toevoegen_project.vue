<script setup>
import { ref, watch } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import TheHeader from "@/Layouts/TheHeader.vue";
import FormSection from "@/Components/FormSection.vue";
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

// Formulier versturen
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
    <AppLayout title="Project">
        <TheHeader></TheHeader>

        <!-- Form Wrapper -->
        <FormSection @submitted="submitProject" class="m-10">
            <template #title>Nieuw Project toevoegen</template>

            <template #form>
                <input type="text" placeholder="ProjectNummer" v-model="form.project_nr" class="col-span-6" />
                <p v-if="form.errors.project_nr" class="text-red-500 text-sm mt-1 whitespace-nowrap">
                    {{ form.errors.project_nr }}
                </p>

                <input type="text" placeholder="ProjectNaam" v-model="form.project_name" class="col-span-6" />
                <p v-if="form.errors.project_name" class="text-red-500 text-sm mt-1 whitespace-nowrap">
                    {{ form.errors.project_name }}
                </p>

                <input type="text" placeholder="Beschrijvingen" v-model="form.order_note" class="col-span-6" />
                <p v-if="form.errors.order_note" class="text-red-500 text-sm mt-1 whitespace-nowrap">
                    {{ form.errors.order_note }}
                </p>

                <input type="text" placeholder="Kosten" v-model="form.cost_center" class="col-span-6" />
                <p v-if="form.errors.cost_center" class="text-red-500 text-sm mt-1 whitespace-nowrap">
                    {{ form.errors.cost_center }}
                </p>

                <input type="text" placeholder="Straatnummer" v-model="form.delivery_street" class="col-span-6" />
                <p v-if="form.errors.delivery_street" class="text-red-500 text-sm mt-1 whitespace-nowrap">
                    {{ form.errors.delivery_street }}
                </p>

                <input type="text" placeholder="Woonplaats" v-model="form.city" class="col-span-6" />
                <p v-if="form.errors.city" class="text-red-500 text-sm mt-1 whitespace-nowrap">
                    {{ form.errors.city }}
                </p>

                <input type="text" placeholder="Staat/Provincie" v-model="form.state_province" class="col-span-6" />
                <p v-if="form.errors.state_province" class="text-red-500 text-sm mt-1 whitespace-nowrap">
                    {{ form.errors.state_province }}
                </p>

                <input type="text" placeholder="Land" v-model="form.country" class="col-span-6" />
                <p v-if="form.errors.country" class="text-red-500 text-sm mt-1 whitespace-nowrap">
                    {{ form.errors.country }}
                </p>

                <input type="date" placeholder="Datum" v-model="form.delivery_date" class="col-span-6" />
                <p v-if="form.errors.delivery_date" class="text-red-500 text-sm mt-1 whitespace-nowrap">
                    {{ form.errors.delivery_date }}
                </p>
            </template>

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
