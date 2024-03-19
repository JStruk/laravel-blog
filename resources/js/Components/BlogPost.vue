<script setup>
const props = defineProps({
    blogPost: {
        type: Object,
        required: true
    }
})
</script>

<template>
    <div class="card bg-base-300 shadow-xl hover:scale-105">
        <div class="card-body">
            <div class="flex justify-between">
                <div>
                    <h2 class="text-2xl card-title">{{ blogPost.title }}</h2>
                </div>
                <div class="text-right">
                    <p class="pb-2">{{ blogPost.author }}</p>
                    <p>-</p>
                    <p class="pb-2">{{blogPost.category}}</p>
                    <p>-</p>
                    <p class="opacity-75">
                        {{ blogPost.created_diff_for_humans }}
                    </p>
                </div>
            </div>
            <p class="italic">{{ blogPost.subtitle }}</p>
            <hr class="h-px my-8 bg-gray-300 border-0 dark:bg-gray-400">
            <p class="pt-4 truncate max-h-72" v-html="blogPost.contents"></p>
        </div>
    </div>
</template>

<style scoped>

</style>
