<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

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

    <div class="min-h-screen flex bg-gray-50 font-[Open_Sans] text-[#4D4D4D]">

        <!-- Linker paneel (desktop) -->
        <div class="hidden lg:flex w-1/2 relative items-center justify-center p-16 text-white overflow-hidden
                    bg-gradient-to-br from-indigo-700 via-indigo-800 to-black">

            <!-- Light orbs -->
            <div class="absolute w-80 h-80 bg-indigo-500 opacity-20 rounded-full blur-3xl -top-16 -left-20 animate-pulse"></div>
            <div class="absolute w-96 h-96 bg-indigo-900 opacity-30 rounded-full blur-3xl bottom-0 right-0 animate-pulse"></div>

            <div class="relative max-w-md text-center space-y-6">
                <AuthenticationCardLogo
                    class="w-24 h-24 mx-auto mb-4 drop-shadow-[0_0_25px_rgba(255,255,255,0.25)] animate-fade-in"
                />
                <h1 class="text-5xl font-extrabold tracking-tight animate-fade-in delay-200">Geen zorgen!</h1>
                <p class="text-xl text-indigo-200 leading-relaxed animate-fade-in delay-400">
                    Voer je e-mailadres in en wij sturen je een link om je wachtwoord opnieuw in te stellen.
                </p>
                <p class="text-indigo-300 italic text-sm pt-4 animate-fade-in delay-600">
                    “Binnen enkele minuten kun je weer inloggen.”
                </p>
            </div>
        </div>

        <!-- Rechter paneel -->
        <div class="flex w-full lg:w-1/2 items-center justify-center p-8 lg:p-20">
            <div class="w-full max-w-lg bg-white shadow-2xl rounded-2xl p-12">

                <!-- Mobile logo -->
                <div class="flex justify-center mb-6 lg:hidden">
                    <AuthenticationCardLogo class="w-16 h-16 text-indigo-600 animate-fade-in" />
                </div>

                <h2 class="text-4xl font-bold mb-3 text-center lg:text-left animate-fade-in">Wachtwoord vergeten</h2>
                <p class="text-lg text-gray-500 mb-10 text-center lg:text-left animate-fade-in delay-200">
                    Vul hieronder je e-mailadres in om een link te ontvangen waarmee je een nieuw wachtwoord kunt instellen.
                </p>

                <div v-if="status" class="mb-4 font-medium text-sm text-green-600 text-center lg:text-left animate-fade-in delay-400">
                    {{ status }}
                </div>

                <form @submit.prevent="submit" class="space-y-7">
                    <!-- Email input -->
                    <div>
                        <InputLabel for="email" value="E-mailadres" class="text-lg font-semibold" />
                        <TextInput
                            id="email"
                            v-model="form.email"
                            type="email"
                            class="mt-1 block w-full rounded-lg border-gray-300 text-lg py-3 px-4
                                   focus:border-indigo-500 focus:ring-indigo-500 transition-shadow shadow-sm hover:shadow-md"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="you@example.com"
                        />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <!-- Submit button -->
                    <button
                        type="submit"
                        class="w-full py-4 mt-6 text-lg font-semibold rounded-lg shadow-lg transition-transform
                               transform hover:-translate-y-0.5
                               bg-[#FFD100] text-[#4D4D4D] hover:bg-yellow-400"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Verstuur wachtwoord reset-link
                    </button>
                </form>

                <p class="text-center text-gray-500 text-base mt-8">
                    Weet je je wachtwoord weer?
                    <a href="/login" class="text-indigo-600 hover:text-indigo-800 font-medium transition-colors">Inloggen</a>
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
