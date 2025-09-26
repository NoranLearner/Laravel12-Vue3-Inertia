<template>
    <div class="min-h-screen flex flex-col items-center justify-center bg-grey-100">

        <h1 class="text-4xl font-bold mb-4">Welcome To Home Page</h1>

        <p class="text-lg text-gray-700">This is a simple vue component rendered with Inertia.js</p>

        <!-- user and avatar -->
        <div class="mt-4">
            <form @submit.prevent="submit" class="flex flex-col gab-4">
                <input type="text" v-model="form.name" class="border py-2 px-3" placeholder="Name" />
                <input type="file" @change="form.avatar = $event.target.files[0]" class="border py-2 px-3"/>
                <progress v-if="form.progress" :value="form.progress.percentage" max="100" class="mt-2">{{ form.progress.percentage }}%</progress>
                <button type="submit" class="bg-blue-500 hover:bg-blue-800 text-white py-2 px-4 disabled:bg-blue-200" :disabled="form.processing">Submit</button>
            </form>
        </div>

        <!-- avatar usage -->
        <div class="mt-4">
            <h3 class="text-xl font-bold mb-2" v-if="$page.props.auth.user.name">{{ $page.props.auth.user.name }}</h3>
            <img v-if="$page.props.auth.user.avatar" :src="`/storage/${$page.props.auth.user.avatar}`" alt="avatar" class="w-24 h-24 rounded-full mx-auto object-cover"/>
            <div v-else class="w-24 h-24 rounded-full bg-gray-200 mx-auto flex items-center justify-center">No Avatar</div>
        </div>

    </div>
</template>

<script setup>
import DashboardLayout from './DashboardLayout.vue';
import { router, useForm } from '@inertiajs/vue3';
defineProps({
    user: Object
});
defineOptions({
    layout: DashboardLayout
});

const form = useForm({
    name: '',
    avatar: null
});

// const submit = () => {
//     router.post('/update-avatar', {
//         _method: 'put',
//         name: form.name,
//         avatar: form.avatar
//     });
//     // form.post('/update-avatar', {
//     //     _method: 'put',
//     // });
// };

const submit = () => {
    form.post('/update-avatar', {
        forceFormData: true,  // مهم لو بترفعي فايل
        onSuccess: () => {
            console.log("Avatar updated successfully!");
        },
    });
};
</script>

<style></style>
