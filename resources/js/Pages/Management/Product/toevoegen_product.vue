<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import TheHeader from "@/Layouts/TheHeader.vue";
import { useForm } from "@inertiajs/vue3";
import FormSection from "@/Components/FormSection.vue";

const props = defineProps({
    suppliers: {
        type: Array,
        default: () => [],
    },
});

const form = useForm({
    item_nr: "",
    item_name: "",
    supplier_id: "",
});


function submitProduct() {
    form.post(route("product.store"));
}
</script>

<template>
    <AppLayout title="Product">
        <TheHeader></TheHeader>

        <FormSection @submitted="submitProduct" class="m-10">
            <template #title>Nieuw Artikel toevoegen</template>

            <template #descript ion>
                Vul hier de gegevens van de artikel in.
            </template>

            <template #form>
                <!-- Artikelnummer -->
                <input type="text" placeholder="Artikelnummer" v-model="form.item_nr" class="col-span-6" />
                <p v-if="form.errors.item_nr" class="text-red-500 text-sm mt-1 whitespace-nowrap">
                    {{ form.errors.item_nr }}
                </p>

                <!-- Artikelnaam -->
                <input type="text" placeholder="Artikelnaam" v-model="form.item_name" class="col-span-6" />
                <p v-if="form.errors.item_name" class="text-red-500 text-sm mt-1 whitespace-nowrap">
                    {{ form.errors.item_name }}
                </p>

                <!-- Leverancier -->
                <select v-model="form.supplier_id" class="col-span-6 p-2 border rounded">
                    <option value="" disabled>Selecteer leverancier</option>
                    <option v-for="supplier in suppliers" :key="supplier.id" :value="supplier.id">
                        {{ supplier.name }}
                    </option>
                </select>
                <p v-if="form.errors.supplier_id" class="text-red-500 text-sm mt-1 whitespace-nowrap">
                    {{ form.errors.supplier_id }}
                </p>

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
