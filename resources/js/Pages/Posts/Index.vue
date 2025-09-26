<template>
    <div class="max-w-4xl mx-auto p-8">
        <div class="flex flex-col md-flex-row md-justify-between md-items-center mb-6">
            <h1 class="text-4xl font-bold text-gray-900 mb-4 md:mb-0">Posts</h1>
            <div class="bg-gray-100 text-gray-600 px-4 py-2 rounded-full text-sm">
                {{ posts.length }} Post {{ posts.length != 1 ? 's' : '' }} loaded of {{ $page.props.pagination.total }} total
            </div>
        </div>

        <div class="space-y-4 mb-8">
            <div v-for="post in posts" :key="post.id" class="bg-white border border-gray-200 p-6 rounded-xl transition hover:bg-gray-100">
                <div class="space-y-2">
                    <h3 class=" text-xl font-semibold text-gray-900 loading-snug">{{ post.title }}</h3>
                    <div class="text-sm text-gray-500 font-medium">Post #{{ post.id }}</div>
                </div>
            </div>
        </div>

        <div class="flex justify-center p-4">
            <button v-if="hasMore" @click="loadMore" class="bg-gradient-to-r from-blue-500 to-blue-700 text-white py-2 px-4 rounded">Load More Posts</button>
            <div v-else class="text-center p-4 text-gray-500 font-medium bg-gray-100" >
                <span> You've reached the end</span>
            </div>
        </div>

    </div>
</template>

<script setup>
import { router, usePage } from '@inertiajs/vue3'
import { computed} from "vue";

const posts = computed(() => usePage().props.posts);
const hasMore = computed(() => usePage().props.pagination.hasMorePages);
const currentPage = computed(() => parseInt(usePage().props.pagination.currentPage));

const loadMore = () => {
    router.reload({
        data: { page: currentPage.value + 1 },
        only: ['posts', 'pagination'],
        preserveState: true,
    });
};
</script>

<style>

</style>
