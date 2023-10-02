<template>
    <div class="flex flex-col w-full justify-center">
        <div class="pt-4" v-for="post in blogPosts">
            <BlogPostsComponent :blogPost="post" />
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