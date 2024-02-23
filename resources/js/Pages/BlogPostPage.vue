<template>
    <div class="mx-4 md:mx-auto md:w-3/4 bg-white rounded-lg shadow-md overflow-hidden my-12">
        <!-- Header Section -->

        <div class="bg-gray-200 p-4 flex items-center">
            <img
                src="https://media.istockphoto.com/id/1495088043/vector/user-profile-icon-avatar-or-person-icon-profile-picture-portrait-symbol-default-portrait.jpg?s=612x612&w=0&k=20&c=dhV2p1JwmloBTOaGAtaA3AW1KSnjsdMt7-U_3EZElZ0="
                alt="Author" class="h-12 w-12 rounded-full mr-4">
            <div>
                <h2 class="text-lg font-semibold">{{ blogPost.author }}</h2>
                <p class="text-sm text-gray-600">{{ createdAtHuman }}</p>
            </div>
        </div>

        <!-- Divider -->
        <div class="border-b border-gray-300"></div>

        <!-- Blog Content -->
        <div class="p-4">
            <h1 class="text-2xl md:text-5xl font-bold mb-2">{{ blogPost.title }}</h1>
            <h2 class="text-xl md:text-2xl font-semibold text-gray-700 mb-4">{{ blogPost.subtitle }}</h2>
            <p class="text-gray-800" v-html="blogPost.contents" />
        </div>

    </div>
</template>

<script setup>

const props = defineProps({
    blogPost: {
        type: Object,
        required: true
    },
    createdAtHuman: {
        type: String,
        required: true
    }
})
</script>
