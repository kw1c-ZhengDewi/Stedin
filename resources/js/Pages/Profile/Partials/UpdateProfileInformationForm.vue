<script setup>
import { ref, computed } from 'vue';
import { Link, router, useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps({
    user: {
        type: Object,
        required: true,
    },
});

/* Inertia form */
const form = useForm({
    _method: 'PUT',
    name: props.user.name,
    email: props.user.email,
    photo: null,
});

/* State */
const verificationLinkSent = ref(false);
const photoPreview = ref(null);
const photoInput = ref(null);

/* Computed */
const hasPhoto = computed(() => !!props.user.profile_photo_path);

/* Routes (gegroepeerd maakt het overzichtelijker) */
const routes = {
    updateProfile: route('user-profile-information.update'),
    deletePhoto: route('current-user-photo.destroy'),
    resendVerification: route('verification.send')
};

/* Photo selection */
const selectNewPhoto = () => photoInput.value?.click();

/* Modern, betere performance: URL.createObjectURL */
const updatePhotoPreview = () => {
    const photo = photoInput.value?.files?.[0];
    if (!photo) return;

    photoPreview.value = URL.createObjectURL(photo);
};

/* Reset preview + file input */
const clearPhotoFileInput = () => {
    if (photoPreview.value) {
        URL.revokeObjectURL(photoPreview.value);
    }
    photoPreview.value = null;

    if (photoInput.value?.value) {
        photoInput.value.value = null;
    }
};

/* Save profile */
const updateProfileInformation = () => {
    form.photo = photoInput.value?.files?.[0] ?? null;

    form.post(routes.updateProfile, {
        preserveScroll: true,
        onSuccess: clearPhotoFileInput,
    });
};

/* Delete photo */
const deletePhoto = () => {
    router.delete(routes.deletePhoto, {
        preserveScroll: true,
        onSuccess: clearPhotoFileInput,
    });
};

/* Resend verification */
const sendEmailVerification = () => {
    verificationLinkSent.value = true;
};
</script>


<template>
    <FormSection @submitted="updateProfileInformation">
        <template #title>Profile Information</template>

        <template #description>
            Update your account's profile information and email address.
        </template>

        <template #form>
            <!-- Profile Photo -->
            <div
                v-if="$page.props.jetstream.managesProfilePhotos"
                class="col-span-6 sm:col-span-4"
            >
                <input
                    id="photo"
                    ref="photoInput"
                    type="file"
                    class="hidden"
                    @change="updatePhotoPreview"
                />

                <InputLabel for="photo" value="Photo" />

                <!-- Current profile photo -->
                <div v-if="!photoPreview" class="mt-2">
                    <img
                        :src="user.profile_photo_url"
                        :alt="user.name"
                        class="rounded-full size-20 object-cover"
                    >
                </div>

                <!-- New preview -->
                <div v-else class="mt-2">
                    <div
                        class="rounded-full size-20 bg-cover bg-center"
                        :style="{ backgroundImage: `url(${photoPreview})` }"
                    />
                </div>

                <!-- Buttons -->
                <div class="mt-2 flex gap-2">
                    <SecondaryButton type="button" @click.prevent="selectNewPhoto">
                        Select a new photo
                    </SecondaryButton>

                    <SecondaryButton
                        v-if="hasPhoto"
                        type="button"
                        @click.prevent="deletePhoto"
                    >
                        Remove photo
                    </SecondaryButton>
                </div>

                <InputError :message="form.errors.photo" class="mt-2" />
            </div>

            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="name" value="Name" />
                <TextInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autocomplete="name"
                />
                <InputError :message="form.errors.name" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    autocomplete="username"
                />
                <InputError :message="form.errors.email" class="mt-2" />

                <!-- Email verification -->
                <div v-if="$page.props.jetstream.hasEmailVerification && !user.email_verified_at">
                    <p class="text-sm mt-2">
                        Your email address is unverified.

                        <Link
                            :href="routes.resendVerification"
                            method="post"
                            as="button"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            @click.prevent="sendEmailVerification"
                        >
                            Click here to re-send the verification email.
                        </Link>
                    </p>

                    <div
                        v-if="verificationLinkSent"
                        class="mt-2 font-medium text-sm text-green-600"
                    >
                        A new verification link has been sent to your email address.
                    </div>
                </div>
            </div>
        </template>

        <template #actions>
            <ActionMessage :on="form.recentlySuccessful" class="me-3">
                Saved.
            </ActionMessage>

            <PrimaryButton
                :disabled="form.processing"
                :class="{ 'opacity-25': form.processing }"
            >
                Save
            </PrimaryButton>
        </template>
    </FormSection>
</template>
