<template>
    <div v-if="message" :class="[
        'rounded-md p-3 mb-3 text-sm',
        type === 'success' && 'bg-green-500 text-white',
        type === 'error' && 'bg-red-500 text-white',
        type === 'info' && 'bg-blue-500 text-white',
        type === 'warning' && 'bg-yellow-500 text-white',
        ]">
        {{ message }}
    </div>
</template>

<script setup>
defineProps({
    type: {
        type: String,
        default: 'info',
    },
    message: {
        type: String,
        required: true,
    },
});
</script>

<style>

</style>
