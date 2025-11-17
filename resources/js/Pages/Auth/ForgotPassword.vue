<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <Head title="Wachtwoord vergeten" />

    <div class="min-h-screen flex bg-gray-50">
        <!-- Linkerkant branding (alleen desktop) -->
        <div class="hidden lg:flex w-1/2 bg-gradient-to-br from-amber-300 via-amber-200 to-amber-400 items-center justify-center text-amber-900 p-12">
            <div class="max-w-md text-center">
                <AuthenticationCardLogo class="w-20 h-20 mx-auto mb-6" />
                <h1 class="text-5xl font-bold mb-4">Geen zorgen!</h1>
                <p class="text-lg text-amber-900/80">
                    Voer je e-mailadres in en wij sturen je een link om je wachtwoord opnieuw in te stellen.
                </p>
            </div>
        </div>

        <!-- Rechterkant formulier -->
        <div class="flex w-full lg:w-1/2 items-center justify-center p-8 lg:p-20">
            <div class="w-full max-w-lg bg-white shadow-2xl rounded-2xl p-12">
                <div class="flex justify-center mb-6 lg:hidden">
                    <AuthenticationCardLogo class="w-16 h-16 text-indigo-600" />
                </div>

                <h2 class="text-4xl font-bold text-gray-800 mb-3 text-center lg:text-left">Wachtwoord vergeten</h2>
                <p class="text-gray-500 mb-10 text-center lg:text-left text-lg">
                    Vul hieronder je e-mailadres in om een link te ontvangen waarmee je een nieuw wachtwoord kunt instellen.
                </p>

                <div v-if="status" class="mb-4 font-medium text-sm text-green-600 text-center lg:text-left">
                    {{ status }}
                </div>

                <form @submit.prevent="submit" class="space-y-7">
                    <div>
                        <InputLabel for="email" value="E-mailadres" class="text-lg font-medium" />
                        <TextInput
                            id="email"
                            v-model="form.email"
                            type="email"
                            class="mt-1 block w-full rounded-lg border-gray-300 text-lg py-3 px-4 focus:border-indigo-500 focus:ring-indigo-500"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="you@example.com"
                        />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <PrimaryButton
                        class="w-full py-4 mt-6 text-lg bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-lg transition-transform transform hover:-translate-y-0.5"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Verstuur wachtwoord reset-link
                    </PrimaryButton>
                </form>

                <p class="text-center text-gray-500 text-base mt-8">
                    weet je je wachtwoord weer?
                    <a href="/login" class="text-indigo-600 hover:text-indigo-800 font-medium">Inloggen</a>
                </p>
            </div>
        </div>
    </div>
</template>
