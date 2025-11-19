<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { ref } from 'vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const showPassword = ref(false);

const submit = () => {
    form.post(route('login'), {
        data: {
            ...form,
            remember: form.remember ? 'on' : ''
        },
        onFinish: () => form.reset('password')
    });
};
</script>

<template>
    <Head title="Log in" />

    <div class="min-h-screen flex font-sans bg-gray-50"
        style="font-family: 'Open Sans', sans-serif; color: #4d4d4d;"
    >

        <!-- LEFT PANEL -->
        <div class="relative hidden lg:flex w-1/2 
                    items-center justify-center 
                    text-white p-16 overflow-hidden
                    bg-gradient-to-br from-indigo-700 via-indigo-800 to-black">

            <!-- Soft blurred circles -->
            <div class="absolute w-80 h-80 bg-indigo-500 opacity-20 rounded-full blur-3xl -top-16 -left-20"></div>
            <div class="absolute w-96 h-96 bg-indigo-900 opacity-30 rounded-full blur-3xl bottom-0 right-0"></div>

            <div class="relative max-w-md text-center space-y-6">
                <AuthenticationCardLogo
                    class="w-24 h-24 mx-auto drop-shadow-[0_0_25px_rgba(255,255,255,0.25)]"
                />

                <h1 class="text-5xl font-extrabold tracking-tight">
                    Welkom terug!
                </h1>

                <p class="text-xl text-indigo-200 leading-relaxed">
                    Log in om toegang te krijgen tot je dashboard.
                </p>

                
            </div>
        </div>

        <!-- RIGHT PANEL -->
        <div class="flex w-full lg:w-1/2 items-center justify-center p-8 lg:p-20">
            <div class="w-full max-w-lg bg-white shadow-2xl rounded-3xl p-12 border border-gray-100">
                <div class="flex justify-center mb-6 lg:hidden">
                    <AuthenticationCardLogo class="w-16 h-16" />
                </div>

                <h2 class="text-4xl font-bold mb-2 text-center lg:text-left">Inloggen</h2>
                <p class="mb-10 text-center lg:text-left text-lg opacity-80">
                    Voer alstublieft uw gegevens in.
                </p>

                <div v-if="status"
                     class="mb-4 font-medium text-sm text-green-600 text-center lg:text-left">
                    {{ status }}
                </div>

                <form @submit.prevent="submit" class="space-y-8">
                    
                    <!-- EMAIL -->
                    <div>
                        <InputLabel for="email" value="Email" class="text-lg font-semibold" />
                        <TextInput
                            id="email"
                            v-model="form.email"
                            type="email"
                            class="mt-2 block w-full rounded-xl border-gray-300 text-lg py-3 px-4
                                   focus:border-yellow-400 focus:ring-yellow-400 transition-all duration-200"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="you@example.com"
                        />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <!-- WACHTWOORD -->
                    <div>
                        <InputLabel for="password" value="Wachtwoord" class="text-lg font-semibold" />

                        <div class="relative">
                            <TextInput
                                id="password"
                                v-model="form.password"
                                :type="showPassword ? 'text' : 'password'"
                                class="mt-2 block w-full rounded-xl border-gray-300 text-lg py-3 px-4 pr-12
                                       focus:border-yellow-400 focus:ring-yellow-400 transition-all duration-200"
                                required
                                autocomplete="current-password"
                            />

                            <!-- Oog -->
                            <button
                                type="button"
                                @click="showPassword = !showPassword"
                                class="absolute inset-y-0 right-0 px-3 flex items-center 
                                       text-gray-500 hover:text-gray-700 transition-colors duration-200"
                                :aria-label="showPassword ? 'Verberg wachtwoord' : 'Toon wachtwoord'"
                            >
                                <!-- Wachtwoord verbergen -->
                                <svg v-if="!showPassword" xmlns="http://www.w3.org/2000/svg"
                                     class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M2.458 12C3.732 7.943 7.523 5 12 5
                                             c4.478 0 8.268 2.943 9.542 7
                                             -1.274 4.057-5.064 7-9.542 7
                                             -4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>

                                <!-- Wachtwoord zichtbaar -->
                                <svg v-else xmlns="http://www.w3.org/2000/svg"
                                     class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M13.875 18.825A10.05 10.05 0 0112 19
                                             c-4.478 0-8.268-2.943-9.542-7
                                             a9.956 9.956 0 013.308-4.712m3.39-1.838
                                             A9.953 9.953 0 0112 5
                                             c4.478 0 8.268 2.943 9.542 7
                                             a9.969 9.969 0 01-4.126 5.031M3 3l18 18"/>
                                </svg>
                            </button>
                        </div>

                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <!-- REMEMBER + FORGOT -->
                    <div class="flex items-center justify-between mt-3">
                        <label class="flex items-center gap-2">
                            <Checkbox v-model:checked="form.remember" name="remember" />
                            <span class="text-base">Onthoud mij</span>
                        </label>

                        <Link v-if="canResetPassword"
                            :href="route('password.request')"
                            class="text-base font-semibold"
                            style="color: #FFD100;"
                        >
                            Wachtwoord vergeten?
                        </Link>
                    </div>

                    <!-- SUBMIT BUTTON -->
                    <PrimaryButton
                        class="w-full py-4 mt-4 text-lg font-bold rounded-xl shadow-lg
                               transition-all duration-200 transform"
                        style="background-color: #FFD100; color: #4D4D4D;
                               font-family: 'Open Sans', sans-serif;"
                        :class="{
                            'opacity-25 cursor-not-allowed': form.processing,
                            'hover:scale-[1.02] hover:shadow-xl': !form.processing
                        }"
                        :disabled="form.processing"
                    >
                        Inloggen
                    </PrimaryButton>
                </form>

                <p class="text-center text-base mt-8">
                    Nog geen account?
                    <Link href="/register" class="font-semibold"
                        style="color: #FFD100;">
                        Registreer
                    </Link>
                </p>
            </div>
        </div>
    </div>
</template>
