<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Log in" />

    <div class="min-h-screen flex bg-gray-50">
        <!-- Left side (branding / image) -->
        <div class="hidden lg:flex w-1/2 bg-gradient-to-br from-indigo-600 to-indigo-800 items-center justify-center text-white p-12">
            <div class="max-w-md text-center">
                <AuthenticationCardLogo class="w-20 h-20 mx-auto mb-6" />
                <h1 class="text-5xl font-bold mb-4">Welkom terug!</h1>
                <p class="text-lg text-indigo-100">
                    Log in om toegang te krijgen tot je dashboard.
                </p>
            </div>
        </div>

        <!-- Right side (form) -->
        <div class="flex w-full lg:w-1/2 items-center justify-center p-8 lg:p-20">
            <div class="w-full max-w-lg bg-white shadow-2xl rounded-2xl p-12">
                <div class="flex justify-center mb-6 lg:hidden">
                    <AuthenticationCardLogo class="w-16 h-16 text-indigo-600" />
                </div>

                <h2 class="text-4xl font-bold text-gray-800 mb-3 text-center lg:text-left">Inloggen</h2>
                <p class="text-gray-500 mb-10 text-center lg:text-left text-lg">Voer alstublieft uw gegevens in</p>

                <div v-if="status" class="mb-4 font-medium text-sm text-green-600 text-center lg:text-left">
                    {{ status }}
                </div>

                <form @submit.prevent="submit" class="space-y-7">
                    <div>
                        <InputLabel for="email" value="Email" class="text-lg font-medium" />
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

                    <div>
                        <InputLabel for="password" value="Wachtwoord" class="text-lg font-medium" />
                        <TextInput
                            id="password"
                            v-model="form.password"
                            type="password"
                            class="mt-1 block w-full rounded-lg border-gray-300 text-lg py-3 px-4 focus:border-indigo-500 focus:ring-indigo-500"
                            required
                            autocomplete="current-password"
                            placeholder="••••••••"
                        />
                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <div class="flex items-center justify-between mt-3">
                        <label class="flex items-center">
                            <Checkbox v-model:checked="form.remember" name="remember" />
                            <span class="ms-2 text-base text-gray-600">Onthoud mij</span>
                        </label>

                        <Link
                            v-if="canResetPassword"
                            :href="route('password.request')"
                            class="text-base text-indigo-600 hover:text-indigo-800 transition"
                        >
                            Wachtwoord vergeten?
                        </Link>
                    </div>

                    <PrimaryButton
                        class="w-full py-4 mt-6 text-lg bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-lg transition-transform transform hover:-translate-y-0.5"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Inloggen
                    </PrimaryButton>
                </form>

                <p class="text-center text-gray-500 text-base mt-8">
                    Nog geen account?
                    <Link href="/register" class="text-indigo-600 hover:text-indigo-800 font-medium">Registreer</Link>
                </p>
            </div>
        </div>
    </div>
</template>
