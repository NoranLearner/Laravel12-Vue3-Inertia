<template>
    <!-- sample 3: New Login Form -->
    <div class="min-h-screen flex flex-col items-center justify-center bg-gray-100">
        <h1 class="text-4xl font-bold mb-4">Login</h1>
        <Form action="/login" method="POST" #default="{ errors, processing, wasSuccessful }"
            :reset-on-error="['password']">

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

            <div class="flex items-center">
                <input type="checkbox" name="remember" id="remember" class="mr-2"/>
                <label class="ml-2 text-gray-700" for="remember" style="margin-left: 10px;">Remember Me</label>
            </div>

            <br />

            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 disabled:bg-blue-200" type="submit"
                    :disabled="processing">
                    {{ processing ? 'Creating....' : 'Login....' }}
                </button>
            </div>

            <br />

            <div v-if="wasSuccessful" class="mt-4 text-md text-green-400">User login successfully!</div>

        </Form>
    </div>
</template>

<script setup>
import { Form } from '@inertiajs/vue3';
</script>

<style></style>
