<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { ref } from 'vue';

const form = useForm({
    username: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const showPassword = ref(false);
const showPasswordConfirm = ref(false);

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Registreren" />

    <div class="min-h-screen flex bg-gray-50">
        <!-- Linkerzijde -->
        <div
            class="hidden lg:flex w-1/2 bg-gradient-to-br from-indigo-600 to-indigo-800 items-center justify-center text-white p-12"
        >
            <div class="max-w-md text-center">
                <AuthenticationCardLogo class="w-20 h-20 mx-auto mb-6" />
                <h1 class="text-5xl font-bold mb-4">Maak een account aan</h1>
                <p class="text-lg text-indigo-100">
                    Registreer om toegang te krijgen tot je persoonlijke dashboard.
                </p>
            </div>
        </div>

        <!-- Rechterzijde -->
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

                    <!-- Wachtwoord met oogje -->
                    <div>
                        <InputLabel for="password" value="Wachtwoord" class="text-lg font-medium" />
                        <div class="relative">
                            <TextInput
                                id="password"
                                v-model="form.password"
                                :type="showPassword ? 'text' : 'password'"
                                class="mt-1 block w-full rounded-lg border-gray-300 text-lg py-3 px-4 pr-12 focus:border-indigo-500 focus:ring-indigo-500"
                                required
                                autocomplete="new-password"
                                
                            />
                            <button
                                type="button"
                                @click="showPassword = !showPassword"
                                class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-500 hover:text-gray-700 focus:outline-none"
                            >
                                <svg
                                    v-if="!showPassword"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                    />
                                </svg>
                                <svg
                                    v-else
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.956 9.956 0 013.308-4.712m3.39-1.838A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.969 9.969 0 01-4.126 5.031M3 3l18 18"
                                    />
                                </svg>
                            </button>
                        </div>
                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>

                    
                    <div>
                        <InputLabel for="password_confirmation" value="Bevestig wachtwoord" class="text-lg font-medium" />
                        <div class="relative">
                            <TextInput
                                id="password_confirmation"
                                v-model="form.password_confirmation"
                                :type="showPasswordConfirm ? 'text' : 'password'"
                                class="mt-1 block w-full rounded-lg border-gray-300 text-lg py-3 px-4 pr-12 focus:border-indigo-500 focus:ring-indigo-500"
                                required
                                autocomplete="new-password"
                                
                            />
                            <button
                                type="button"
                                @click="showPasswordConfirm = !showPasswordConfirm"
                                class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-500 hover:text-gray-700 focus:outline-none"
                            >
                                <svg
                                    v-if="!showPasswordConfirm"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                    />
                                </svg>
                                <svg
                                    v-else
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.956 9.956 0 013.308-4.712m3.39-1.838A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.969 9.969 0 01-4.126 5.031M3 3l18 18"
                                    />
                                </svg>
                            </button>
                        </div>
                        <InputError class="mt-2" :message="form.errors.password_confirmation" />
                    </div>

                    <!-- Voorwaarden -->
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
