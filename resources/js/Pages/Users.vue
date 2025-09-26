<template>
    <div class="min-h-screen flex flex-col items-center justify-center hg-gray-100">
        <h1 class="text-4xl font-bold mb-4">User Profiler</h1>
        <p class="text-lg text-gray-700">Welcome, {{ username }}</p>
    </div>
</template>

<script setup>
defineProps({
    username: String,
})
</script>

<style></style>
