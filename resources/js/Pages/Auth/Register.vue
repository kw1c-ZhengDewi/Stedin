<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { ref, computed, watch } from 'vue';

const form = useForm({
    username: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const showPassword = ref(false);
const showPasswordConfirm = ref(false);

// Wachtwoordsterkte berekening
const passwordStrength = computed(() => {
    const pwd = form.password;
    if (!pwd) return { score: 0, label: '', color: '' };
    let score = 0;
    if (pwd.length >= 8) score++;
    if (/[A-Z]/.test(pwd)) score++;
    if (/[0-9]/.test(pwd)) score++;
    if (/[^A-Za-z0-9]/.test(pwd)) score++;
    let label = '';
    let color = '';
    switch (score) {
        case 0:
        case 1:
            label = 'Zwak';
            color = 'bg-red-500';
            break;
        case 2:
            label = 'Matig';
            color = 'bg-yellow-400';
            break;
        case 3:
            label = 'Sterk';
            color = 'bg-green-400';
            break;
        case 4:
            label = 'Heel Sterk';
            color = 'bg-green-600';
            break;
    }
    return { score, label, color };
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Registreren" />

    <div class="min-h-screen flex bg-gray-50 font-[Open_Sans] text-[#4D4D4D]">

        <!-- Linker paneel -->
        <div
            class="relative hidden lg:flex w-1/2 items-center justify-center p-16 text-white overflow-hidden
                   bg-gradient-to-br from-indigo-700 via-indigo-800 to-black"
        >
            <div class="absolute w-80 h-80 bg-indigo-500 opacity-20 rounded-full blur-3xl -top-16 -left-20 animate-pulse"></div>
            <div class="absolute w-96 h-96 bg-indigo-900 opacity-30 rounded-full blur-3xl bottom-0 right-0 animate-pulse"></div>

            <div class="relative max-w-md text-center space-y-6">
                <AuthenticationCardLogo
                    class="w-24 h-24 mx-auto mb-4 drop-shadow-[0_0_25px_rgba(255,255,255,0.25)] animate-fade-in"
                />

                <h1 class="text-5xl font-extrabold tracking-tight animate-fade-in delay-200">Maak een account</h1>

                <p class="text-xl text-indigo-200 leading-relaxed animate-fade-in delay-400">
                    Registreer om toegang te krijgen tot je persoonlijke dashboard.
                </p>

                
            </div>
        </div>

        <!-- Rechter paneel -->
        <div class="flex w-full lg:w-1/2 items-center justify-center p-8 lg:p-20">
            <div class="w-full max-w-lg bg-gradient-to-br from-white via-gray-50 to-white shadow-2xl rounded-2xl p-12">

                <!-- Mobile logo -->
                <div class="flex justify-center mb-6 lg:hidden">
                    <AuthenticationCardLogo class="w-16 h-16 text-indigo-600 animate-fade-in" />
                </div>

                <h2 class="text-4xl font-bold mb-3 text-center lg:text-left animate-fade-in">Registreren</h2>
                <p class="text-lg text-gray-500 mb-10 text-center lg:text-left animate-fade-in delay-200">
                    Vul je gegevens hieronder in
                </p>

                <form @submit.prevent="submit" class="space-y-7">

                    <!-- Gebruikersnaam -->
                    <div>
                        <InputLabel for="username" value="Gebruikersnaam" class="text-lg font-semibold" />
                        <div class="relative">
                            <span class="absolute left-3 top-3 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M5.121 17.804A8.966 8.966 0 0112 15c2.205 0 4.21.895 5.879 2.343M12 12a4 4 0 100-8 4 4 0 000 8z" />
                                </svg>
                            </span>
                            <TextInput
                                id="username"
                                v-model="form.username"
                                type="text"
                                class="mt-1 block w-full rounded-lg border-gray-300 text-lg py-3 px-10
                                       focus:border-indigo-500 focus:ring-indigo-500 transition-shadow shadow-sm hover:shadow-md"
                                placeholder="Jouw gebruikersnaam"
                                required
                            />
                        </div>
                        <InputError class="mt-2" :message="form.errors.username" />
                    </div>

                    <!-- Email -->
                    <div>
                        <InputLabel for="email" value="E-mailadres" class="text-lg font-semibold" />
                        <TextInput
                            id="email"
                            v-model="form.email"
                            type="email"
                            class="mt-1 block w-full rounded-lg border-gray-300 text-lg py-3 px-4
                                   focus:border-indigo-500 focus:ring-indigo-500 transition-shadow shadow-sm hover:shadow-md"
                            placeholder="you@example.com"
                            required
                        />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <!-- Wachtwoord -->
                    <div>
                        <InputLabel for="password" value="Wachtwoord" class="text-lg font-semibold" />
                        <div class="relative">
                            <TextInput
                                id="password"
                                v-model="form.password"
                                :type="showPassword ? 'text' : 'password'"
                                class="mt-1 block w-full rounded-lg border-gray-300 text-lg py-3 px-4 pr-12
                                       focus:border-indigo-500 focus:ring-indigo-500 transition-shadow shadow-sm hover:shadow-md"
                                required
                            />

                            <!-- Oogje -->
                            <button
                                type="button"
                                @click="showPassword = !showPassword"
                                class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-500 hover:text-gray-700 transition-transform hover:scale-110"
                            >
                                <svg v-if="!showPassword" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>

                                <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.956 9.956 0 013.308-4.712m3.39-1.838A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.969 9.969 0 01-4.126 5.031M3 3l18 18" />
                                </svg>
                            </button>
                        </div>
                        <!-- Wachtwoord sterkte -->
                        <div v-if="form.password" class="mt-2">
                            <div class="h-2 w-full rounded bg-gray-200 overflow-hidden">
                                <div class="h-2" :class="[passwordStrength.color]" :style="{ width: (passwordStrength.score*25)+'%' }"></div>
                            </div>
                            <p class="text-sm mt-1 font-medium text-gray-700">Sterkte: {{ passwordStrength.label }}</p>
                        </div>
                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <!-- Bevestig wachtwoord -->
                    <div>
                        <InputLabel for="password_confirmation" value="Bevestig wachtwoord" class="text-lg font-semibold" />
                        <div class="relative">
                            <TextInput
                                id="password_confirmation"
                                v-model="form.password_confirmation"
                                :type="showPasswordConfirm ? 'text' : 'password'"
                                class="mt-1 block w-full rounded-lg border-gray-300 text-lg py-3 px-4 pr-12
                                       focus:border-indigo-500 focus:ring-indigo-500 transition-shadow shadow-sm hover:shadow-md"
                                required
                            />

                            <!-- Oogje -->
                            <button
                                type="button"
                                @click="showPasswordConfirm = !showPasswordConfirm"
                                class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-500 hover:text-gray-700 transition-transform hover:scale-110"
                            >
                                <svg v-if="!showPasswordConfirm" xmlns="http://www.w3.org/2000/svg"
                                     class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>

                                <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.956 9.956 0 013.308-4.712m3.39-1.838A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.969 9.969 0 01-4.126 5.031M3 3l18 18" />
                                </svg>
                            </button>
                        </div>
                        <InputError class="mt-2" :message="form.errors.password_confirmation" />
                    </div>

                    <!-- Voorwaarden -->
                    <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature">
                        <div class="flex items-start space-x-2 mt-4">
                            <Checkbox id="terms" v-model:checked="form.terms" />
                            <label for="terms" class="text-base">
                                Ik ga akkoord met de
                                <a :href="route('terms.show')" target="_blank"
                                   class="text-indigo-600 hover:text-indigo-800 underline transition-colors">gebruikersvoorwaarden</a>
                                en het
                                <a :href="route('policy.show')" target="_blank"
                                   class="text-indigo-600 hover:text-indigo-800 underline transition-colors">privacybeleid</a>.
                            </label>
                        </div>
                        <InputError class="mt-2" :message="form.errors.terms" />
                    </div>

                    <!-- Registreren knop -->
                    <button
                        type="submit"
                        class="w-full py-4 mt-6 text-lg font-semibold rounded-lg shadow-lg transition-transform
                               transform hover:-translate-y-0.5
                               bg-gradient-to-r from-[#FFD100] to-[#FFDD55] text-[#4D4D4D] hover:brightness-105"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Registreren
                    </button>
                </form>

                <p class="text-center text-gray-500 text-base mt-8">
                    Al een account?
                    <Link href="/login" class="text-indigo-600 hover:text-indigo-800 font-medium transition-colors">Inloggen</Link>
                </p>
            </div>
        </div>
    </div>
</template>

<style scoped>
@keyframes fade-in {
  from { opacity: 0; transform: translateY(10px); }
  to { opacity: 1; transform: translateY(0); }
}
.animate-fade-in { animation: fade-in 0.5s ease forwards; }
.animate-fade-in.delay-200 { animation-delay: 0.2s; }
.animate-fade-in.delay-400 { animation-delay: 0.4s; }
.animate-fade-in.delay-600 { animation-delay: 0.6s; }

@keyframes pulse {
  0%, 100% { opacity: 0.2; }
  50% { opacity: 0.35; }
}
.animate-pulse { animation: pulse 3s infinite; }
</style>
