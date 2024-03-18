<template>
    <div class="flex flex-col w-full items-center pt-4 space-y-12">
        <div v-for="post in blogPosts" class="w-full md:w-3/4">
            <Link :href="`/blog-posts/${post.id}`" method="get">
                <BlogPost :blog-post="post"/>
            </Link>
        </div>
    </div>
</template>
<script setup>
import {Link} from '@inertiajs/inertia-vue3';
import BlogPost from "../Components/BlogPost.vue";

const props = defineProps({
    blogPosts: {
        type: Array,
        required: true
    }
});
</script>
