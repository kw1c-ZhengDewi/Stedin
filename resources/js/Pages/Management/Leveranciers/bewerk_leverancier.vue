<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import TheHeader from "@/Layouts/TheHeader.vue";
import { useForm, router } from "@inertiajs/vue3";

const props = defineProps({
    supplier: Object,
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
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">E-mail</label>
                    <input v-model="form.email" type="email" class="border rounded w-full p-2" />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Landcode</label>
                    <input v-model="form.phone_country_code" type="text" class="border rounded w-full p-2" />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Telefoonnummer</label>
                    <input v-model="form.phone_number" type="text" class="border rounded w-full p-2" />
                </div>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Opslaan
                </button>
            </form>
        </div>
    </AppLayout>
</template>
