<template>
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">{{ $page.props.title }}</h1>
        <h3>Welcome, {{ $page.props.auth.user.name }}</h3>
    </div>

    <!-- Deferred Posts -->
    <section>
        <div class="max-w-4xl mx-auto p-6">
            <h2 class="text-3xl font-bold mb-6">Posts</h2>
            <ul class="space-y-2" v-if="$page.props.posts">
                <li v-for="post in $page.props.posts" :key="post.id"
                    class="bg-violet-600 text-white p-4 rounded-lg shadow-sm hover:bg-violet-900 transition">
                    {{ post.title }}
                    <strong>{{ post.published ? 'Yes' : 'No' }}</strong>
                </li>
            </ul>

            <p v-else> Loading Posts...</p>
        </div>
    </section>

    <!-- Deferred Todos -->
    <section>
        <div class="max-w-4xl mx-auto p-6">
            <h2 class="text-3xl font-bold mb-6">Todos</h2>
            <ul class="space-y-2" v-if="$page.props.todos">
                <li v-for="todo in $page.props.todos" :key="todo.id"
                    class="bg-green-600 text-white p-4 rounded-lg shadow-sm hover:bg-green-900 transition">
                    {{ todo.title }}
                    <strong>{{ todo.completed ? 'Yes' : 'No' }}</strong>
                </li>
            </ul>

            <p v-else> Loading Todos...</p>
        </div>
    </section>
</template>

<script setup></script>

<style></style>
