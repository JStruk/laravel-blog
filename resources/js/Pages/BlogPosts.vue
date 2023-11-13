<template>
    <div class="flex w-full justify-center">
        <div class="w-1/2">
            <div class="pt-4" v-for="post in blogPosts">
                <BlogPosts :blogPost="post" />
            </div>
        </div>
    </div>
</template>
<script setup>
import BlogPosts from '../Components/BlogPosts.vue';
const props = defineProps({
    blogPosts: {
        type: Array,
        required: true
    }
});
</script>