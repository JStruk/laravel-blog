<template>
    <div class="mx-4 md:mx-auto md:w-3/4 rounded-lg shadow-md overflow-hidden my-12">
        <!-- Header Section -->

        <div class="card p-4 bg-base-300 flex flex-row items-center">
            <img
                src="https://media.istockphoto.com/id/1495088043/vector/user-profile-icon-avatar-or-person-icon-profile-picture-portrait-symbol-default-portrait.jpg?s=612x612&w=0&k=20&c=dhV2p1JwmloBTOaGAtaA3AW1KSnjsdMt7-U_3EZElZ0="
                alt="Author" class="h-12 w-12 rounded-full mr-4">
            <div>
                <h2 class="text-lg font-semibold">{{ blogPost.author }}</h2>
                <p class="text-sm">{{ createdAtHuman }}</p>
            </div>
        </div>

        <!-- Divider -->
        <div class="border-b"></div>

        <!-- Blog Content -->
        <div class="p-4 card-body">
            <h1 class="text-2xl md:text-5xl mb-2 mt-4">{{ blogPost.title }}</h1>
            <h2 class="text-xl md:text-2xl italic mb-4">{{ blogPost.subtitle }}</h2>
            <hr class="h-px my-8 bg-gray-300 border-0 dark:bg-gray-400">
            <p class="" v-html="blogPost.contents" />
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
