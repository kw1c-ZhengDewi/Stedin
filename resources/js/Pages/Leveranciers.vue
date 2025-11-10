<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import TheHeader from "@/Layouts/TheHeader.vue";
import { useForm } from "@inertiajs/vue3";
import NavLink from "@/Components/NavLink.vue";

// Form gegevens
const form = useForm({
    name: "",
    email: "",
    phone_country_code: "",
    phone_number: "",
});
</script>

<template>
    <AppLayout title="Leveranciers">
        <TheHeader></TheHeader>

        <!-- Link naar leverancier management -->
        <NavLink
            :href="route('leveranciers.store')"
            class="custom-plus-link flex items-center gap-2 px-4 py-2 rounded text-black transition-colors"
            :active="$page.url === './Management/Leveranciers/leveranciers.vue'"
            >Leverancier toevoegen
        </NavLink>

        <!-- Database Leveranciers: Display -->
    </AppLayout>
</template>

<!-- Custom CSS -->
<style scoped>
.custom-plus-link::before {
    content: "+";
    font-size: 1.3rem; /* adjust size */
    font-weight: bold;
    color: #000000; /* your color */
    margin-right: 0.1rem; /* space between + and text */
}
</style>
