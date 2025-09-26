<template>
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Posts</h1>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4" @click="reloadPosts">Reload Posts</button>

        <!-- start card -->
        <div class="bg-white shadow-sm rounded-lg p-4 mt-6 mb-6">
            <p class="text-gray-700 mb-2">User: {{ $page.props.auth.user.name }}</p>
            <p class="text-gray-700 mb-4">Total Posts: {{ $page.props?.stats?.total }}</p>
        </div>
        <!-- end card -->

        <ul class="space-y-2" v-if="$page.props.posts">
            <li v-for="post in $page.props.posts" :key="post.id" class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition">{{ post.title }}</li>
        </ul>

        <ul class="space-y-2" v-else>
            <li class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition">No Posts Found</li>
        </ul>

    </div>
</template>

<script setup>
import { router } from '@inertiajs/vue3';

const reloadPosts = () => {
    router.reload( { only: ['posts', 'stats'] } );
};
</script>

<style>

</style>
