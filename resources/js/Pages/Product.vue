<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import TheHeader from "@/Layouts/TheHeader.vue";


// Props from Laravel controller
const props = defineProps({
    projecten: {
        type: Array,
        default: () => [],
    },
});
</script>

<template>
    <AppLayout title="Product">
        <TheHeader></TheHeader>
    </AppLayout>
</template>

<!-- Custom CSS -->
<style scoped></style>
