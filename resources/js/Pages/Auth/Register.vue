<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    username: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Registreren" />

    <div class="min-h-screen flex bg-gray-50">
        <!-- Linkerzijde (branding / afbeelding) -->
        <div class="hidden lg:flex w-1/2 bg-gradient-to-br from-indigo-600 to-indigo-800 items-center justify-center text-white p-12">
            <div class="max-w-md text-center">
                <AuthenticationCardLogo class="w-20 h-20 mx-auto mb-6" />
                <h1 class="text-5xl font-bold mb-4">Maak een account aan</h1>
                <p class="text-lg text-indigo-100">
                    Registreer om toegang te krijgen tot je persoonlijke dashboard.
                </p>
            </div>
        </div>

        <!-- Rechterzijde (formulier) -->
        <div class="flex w-full lg:w-1/2 items-center justify-center p-8 lg:p-20">
            <div class="w-full max-w-lg bg-white shadow-2xl rounded-2xl p-12">
                <div class="flex justify-center mb-6 lg:hidden">
                    <AuthenticationCardLogo class="w-16 h-16 text-indigo-600" />
                </div>

                <h2 class="text-4xl font-bold text-gray-800 mb-3 text-center lg:text-left">Registreren</h2>
                <p class="text-gray-500 mb-10 text-center lg:text-left text-lg">
                    Vul je gegevens hieronder in
                </p>

                <form @submit.prevent="submit" class="space-y-7">
                    <div>
                        <InputLabel for="username" value="Gebruikersnaam" class="text-lg font-medium" />
                        <TextInput
                            id="username"
                            v-model="form.username"
                            type="text"
                            class="mt-1 block w-full rounded-lg border-gray-300 text-lg py-3 px-4 focus:border-indigo-500 focus:ring-indigo-500"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="Jouw gebruikersnaam"
                        />
                        <InputError class="mt-2" :message="form.errors.username" />
                    </div>

                    <div>
                        <InputLabel for="email" value="E-mailadres" class="text-lg font-medium" />
                        <TextInput
                            id="email"
                            v-model="form.email"
                            type="email"
                            class="mt-1 block w-full rounded-lg border-gray-300 text-lg py-3 px-4 focus:border-indigo-500 focus:ring-indigo-500"
                            required
                            autocomplete="email"
                            placeholder="you@example.com"
                        />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div>
                        <InputLabel for="password" value="Wachtwoord" class="text-lg font-medium" />
                        <TextInput
                            id="password"
                            v-model="form.password"
                            type="password"
                            class="mt-1 block w-full rounded-lg border-gray-300 text-lg py-3 px-4 focus:border-indigo-500 focus:ring-indigo-500"
                            required
                            autocomplete="new-password"
                            placeholder="••••••••"
                        />
                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <div>
                        <InputLabel for="password_confirmation" value="Bevestig wachtwoord" class="text-lg font-medium" />
                        <TextInput
                            id="password_confirmation"
                            v-model="form.password_confirmation"
                            type="password"
                            class="mt-1 block w-full rounded-lg border-gray-300 text-lg py-3 px-4 focus:border-indigo-500 focus:ring-indigo-500"
                            required
                            autocomplete="new-password"
                            placeholder="••••••••"
                        />
                        <InputError class="mt-2" :message="form.errors.password_confirmation" />
                    </div>

                    <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="mt-4">
                        <InputLabel for="terms">
                            <div class="flex items-center">
                                <Checkbox id="terms" v-model:checked="form.terms" name="terms" required />
                                <div class="ms-2 text-base">
                                    Ik ga akkoord met de
                                    <a target="_blank" :href="route('terms.show')" class="underline text-indigo-600 hover:text-indigo-800">gebruikersvoorwaarden</a>
                                    en het
                                    <a target="_blank" :href="route('policy.show')" class="underline text-indigo-600 hover:text-indigo-800">privacybeleid</a>.
                                </div>
                            </div>
                            <InputError class="mt-2" :message="form.errors.terms" />
                        </InputLabel>
                    </div>

                    <PrimaryButton
                        class="w-full py-4 mt-6 text-lg bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-lg transition-transform transform hover:-translate-y-0.5"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Registreren
                    </PrimaryButton>
                </form>

                <p class="text-center text-gray-500 text-base mt-8">
                    Al een account?
                    <Link href="/login" class="text-indigo-600 hover:text-indigo-800 font-medium">Inloggen</Link>
                </p>
            </div>
        </div>
    </div>
</template>
