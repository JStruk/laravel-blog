<script setup>
const props = defineProps({
    blogPost: {
        type: Object,
        required: true
    }
})
</script>

<template>
    <div class="flex w-full justify-center">
        <div class="border border-black p-4">
            <div class="flex mx-auto space-x-4">
                <div>
                    {{ blogPost.title }}
                </div>
                <div>
                    {{ blogPost.created_at }}
                </div>
            </div>
            <hr class="h-1 mx-auto my-4 bg-gray-100 border-0 rounded md:my-10 dark:bg-gray-400">
            <div class="pt-4">
                {{ blogPost.contents }}
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>