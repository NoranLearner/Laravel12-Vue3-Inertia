<template>
    <!-- sample 3: New Register Form -->
    <div class="min-h-screen flex flex-col items-center justify-center bg-gray-100">
        <h1 class="text-4xl font-bold mb-4">Register</h1>
        <Form action="/register" method="POST" #default="{ errors, processing, wasSuccessful, resetAndClearErrors }"
            :reset-on-success="true" :reset-on-error="['password', 'password_confirmation']" @start="handleStart"
            @success="handleSuccess" @error="handleError">
            <div class="mb-4">
                <label class="block mb-2" for="name">Name</label>
                <input class="border py-2 px-3" type="text" name="name" placeholder="Your Name" />
                <div v-if="errors.name" class="text-red-400 font-bold">{{ errors.name }}</div>
            </div>
            <div class="mb-4">
                <label class="block mb-2" for="email">Email</label>
                <input class="border py-2 px-3" type="email" name="email" placeholder="email@example.com" />
                <div v-if="errors.email" class="text-red-400 font-bold">{{ errors.email }}</div>
            </div>
            <div class="mb-6">
                <label class="block mb-2" for="password">Password</label>
                <input class="border py-2 px-3" type="password" name="password" placeholder="**************" />
                <div v-if="errors.password" class="text-red-400 font-bold">{{ errors.password }}</div>
            </div>
            <div class="mb-6">
                <label class="block mb-2" for="password_confirmation">Confirm Password</label>
                <input class="border py-2 px-3" type="password" name="password_confirmation"
                    placeholder="**************" />
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 disabled:bg-blue-200" type="submit"
                    :disabled="processing">
                    {{ processing ? 'Creating....' : 'Register....' }}
                </button>
            </div>
            <br />
            <div v-if="wasSuccessful" class="mt-4 text-md text-green-400">User created successfully!</div>
            <br />
            <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4" type="button"
                @click="resetAndClearErrors">Reset</button>
        </Form>
    </div>
</template>

<script setup>
import { Form } from '@inertiajs/vue3';

const handleSuccess = () => {
    console.log('success');
    alert('success');
};

const handleError = () => {
    console.log('error');
    alert('error');
};

const handleStart = () => {
    console.log('start');
    alert('start');
};

</script>

<style></style>
