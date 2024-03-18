<script setup>
const props = defineProps({
    blogPost: {
        type: Object,
        required: true
    }
})
</script>

<template>
    <div class="card bg-base-200 shadow-xl">
        <div class="card-body">
            <div class="flex justify-between">
                <div>
                    <h2 class="card-title">{{ blogPost.title }}</h2>
                </div>
                <div>
                    <p class="">{{ blogPost.author }}</p>
                </div>
            </div>
            <p class="italic">{{ blogPost.subtitle }}</p>
            <p class="text-gray-700">
                {{ blogPost.created_diff_for_humans }}
            </p>
            <hr class="h-px my-8 bg-gray-300 border-0 dark:bg-gray-400">
            <p class="pt-4 truncate max-h-72" v-html="blogPost.contents"></p>
        </div>
    </div>
</template>

<style scoped>

</style>
