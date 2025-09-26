<template>
    <!-- sample 2: UseForm Helper Register Form -->
    <div class="min-h-screen flex flex-col items-center justify-center bg-gray-100">
        <h1 class="text-4xl font-bold mb-4">Register</h1>
        <form @submit.prevent="submit">
            <div class="mb-4">
                <label class="block mb-2" for="name">Name</label>
                <input v-model="form.name" class="border py-2 px-3" id="name" type="text" placeholder="Your Name" />
                <!-- <div v-if="form.errors.name" class="text-red-400 font-bold">{{ form.errors.name }}</div> -->
                <div v-if="errors.name" class="text-red-400 font-bold">{{ errors.name }}</div>
            </div>
            <div class="mb-4">
                <label class="block mb-2" for="email">Email</label>
                <input v-model="form.email" class="border py-2 px-3" id="email" type="email"
                    placeholder="email@example.com" />
                <div v-if="errors.email" class="text-red-400 font-bold">{{ errors.email }}</div>
            </div>
            <div class="mb-6">
                <label class="block mb-2" for="password">Password</label>
                <input v-model="form.password" class="border py-2 px-3" id="password" type="password"
                    placeholder="**************" />
                <div v-if="errors.password" class="text-red-400 font-bold">{{ errors.password }}</div>
            </div>
            <div class="mb-6">
                <label class="block mb-2" for="password_confirmation">Confirm Password</label>
                <input v-model="form.password_confirmation" class="border py-2 px-3" id="password_confirmation"
                    type="password" placeholder="**************" />
            </div>
            <div class="flex items-center justify-between">
                <button :disabled="form.processing" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 disabled:bg-blue-200" type="submit">
                    {{ form.processing ? 'Creating....' : 'Register....' }}
                </button>
            </div>
        </form>
        <p v-if="form.wasSuccessful" class="mt-4 text-md text-green-400">User Register Successfully!</p>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
import { computed } from 'vue';
const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});
const errors = computed(() => form.errors);
const submit = () => {
    form.post('/register', {
        preserveScroll: true,
        onError: () => form.reset('password', 'password_confirmation'),
        onSuccess: () => form.reset(),
    })
};
</script>

<style></style>
