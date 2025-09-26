<template>
    <div class="min-h-screen bg-gray-100">
        <nav class="bg-indigo-400 shadow mb-8">
            <div class="container mx-auto px-4">
                <div class="flex justify-between">
                    <div class="flex space-x-4">
                        <Link href="/" class="py-5 px-3 text-white hover:text-gray-700"
                            active-class="font-bold border-b-2 border-blue-500" exact>Home</Link>
                        <Link href="/about" class="py-5 px-3 text-white hover:text-gray-700"
                            active-class="font-bold border-b-2 border-blue-500">About</Link>
                        <Link href="/profile" class="py-5 px-3 text-white hover:text-gray-700"
                            active-class="font-bold border-b-2 border-blue-500">UserProfile</Link>
                    </div>
                    <div class="flex">
                        <span class="py-5 px-3 text-white font-bold">Welcome, {{ user?.name }}</span>
                        <Link v-if="!user" href="/register" class="py-5 px-3 text-white hover:text-gray-700">Register</Link>
                        <Link v-if="!user" href="/login" class="py-5 px-3 text-white hover:text-gray-700">Login</Link>

                    </div>
                </div>
            </div>
        </nav>
        <main class="container mx-auto px-4">
            <slot />
        </main>
    </div>
</template>

<script setup>

import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const user = computed(() => usePage().props.auth.user);

</script>

<style></style>
