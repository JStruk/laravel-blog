<template>
    <div class="flex w-full justify-center">
        <div class="md:w-3/5 w-full px-4 md:px-0">
            <div class="pt-4" v-for="post in blogPosts">
                <Link :href="`/blog-posts/${post.id}`" method="get">
                    <BlogPosts :blogPost="post" @click="goToBlogPost(post)"/>
                </Link>
            </div>
        </div>
    </div>
</template>
<script setup>
import {Link} from "@inertiajs/inertia-vue3"

import BlogPosts from '../Components/BlogPosts.vue';

const props = defineProps({
    blogPosts: {
        type: Array,
        required: true
    }
});

function goToBlogPost(post) {

}
</script>
