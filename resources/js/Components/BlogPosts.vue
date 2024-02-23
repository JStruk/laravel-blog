<script setup>
const props = defineProps({
    blogPost: {
        type: Object,
        required: true
    }
})
</script>

<template>
    <div class="flex-grow w-full justify-center">
        <div class="border border-black rounded shadow-md p-4 cursor-pointer hover:bg-gray-100">
            <div class="flex mx-auto space-t-4 justify-between">
                <h2 class="text-2xl tracking-wide">
                    {{ blogPost.title }}
                </h2>
                <span class="text-gray-700">
                    {{ blogPost.created_diff_for_humans }}
                </span>
                <p> Author </p>
            </div>
            <hr class="mx-auto my-y border-1 border-gray-400 md:my-3 dark:bg-gray-700">
            <p class="pt-4 truncate max-h-72" v-html="blogPost.contents"></p>
        </div>
    </div>
</template>

<style scoped>

</style>
