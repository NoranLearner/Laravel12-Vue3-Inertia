<template>
    <!-- sample 1: old register form -->
    <div class="min-h-screen flex flex-col items-center justify-center bg-gray-100">
        <h1 class="text-4xl font-bold mb-4">Register</h1>
        <form @submit.prevent="submit">
            <div class="mb-4">
                <label class="block mb-2" for="name">Name</label>
                <input v-model="form.name" class="border py-2 px-3" id="name" type="text" placeholder="Your Name" />
                <!-- <div v-if="usePage().props.errors.name" class="text-red-400 font-bold">{{usePage().props.errors.name}}</div> -->
                <div v-if="errors.name" class="text-red-400 font-bold">{{ errors.name }}</div>
            </div>
            <div class="mb-4">
                <label class="block mb-2" for="email">Email</label>
                <input v-model="form.email" class="border py-2 px-3" id="email" type="email"
                    placeholder="email@example.com" />
                <!-- <div v-if="usePage().props.errors.email" class="text-red-400 font-bold">{{usePage().props.errors.email}}</div> -->
                <div v-if="errors.email" class="text-red-400 font-bold">{{ errors.email }}</div>
            </div>
            <div class="mb-6">
                <label class="block mb-2" for="password">Password</label>
                <input v-model="form.password" class="border py-2 px-3" id="password" type="password"
                    placeholder="**************" />
                <!-- <div v-if="usePage().props.errors.password" class="text-red-400 font-bold">{{usePage().props.errors.password}}</div> -->
                <div v-if="errors.password" class="text-red-400 font-bold">{{ errors.password }}</div>
            </div>
            <div class="mb-6">
                <label class="block mb-2" for="password_confirmation">Confirm Password</label>
                <input v-model="form.password_confirmation" class="border py-2 px-3" id="password_confirmation"
                    type="password" placeholder="**************" />
                <!-- <div v-if="errors.password_confirmation" class="text-red-400 font-bold">{{ errors.password_confirmation }}</div> -->
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-400 hover:bg-blue-700 text-white py-2 px-4" type="submit">
                    Register
                </button>
            </div>
        </form>
    </div>
</template>

<script setup>
import { reactive } from 'vue';
import { router, usePage } from '@inertiajs/vue3';

defineProps({ errors: Object })

const form = reactive({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    // console.log('form');
    router.post('/register', form);
};
</script>

<style></style>
