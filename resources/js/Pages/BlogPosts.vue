<template>
    <div class="flex w-full justify-center">
        <div class="w-1/2">
            <div class="pt-4" v-for="post in blogPosts">
                <BlogPostsComponent :blogPost="post" />
            </div>
        </div>
    </div>
</template>
<script setup>
import BlogPostsComponent from './Components/BlogPostsComponent.vue';
const props = defineProps({
    blogPosts: {
        type: Array,
        required: true
    }
});
console.log(props.blogPosts);
</script>