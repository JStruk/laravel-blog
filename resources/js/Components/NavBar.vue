<template>
    <div class="navbar bg-base-100 border border-base-300">
        <div class="navbar-start">
            <a href="https://jstruk.dev" target="_blank" class="btn btn-ghost">Homepage</a>
            <Link href="/" class="btn btn-ghost">Blog Posts</Link>
            <Link href="https://jstruk.dev/projects" class="btn btn-ghost">Portfolio</Link>
        </div>
        <div class="navbar-center">
            <Link href="/" class="btn btn-ghost text-xl">Justin Struk Blog</Link>
        </div>
        <div class="navbar-end">
            <div class="flex-none">
                <ul class="menu menu-horizontal px-1 mr-6">
                    <li>
                        <details id="theme-details">
                            <summary>
                                Theme
                            </summary>
                            <ul class="p-2 bg-base-100 rounded-t-none">
                                <li v-for="theme in themes">
                                    <a @click="onThemeChange(theme.value)">{{ theme.label }}</a>
                                </li>
                            </ul>
                        </details>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import {onMounted, ref} from 'vue'
import {themeChange} from 'theme-change'
import themes from '../../fixtures/themes.json'

onMounted(() => {
    themeChange(false)
});

function onThemeChange(theme){
    document.documentElement.setAttribute('data-theme', theme);
    document.getElementById('theme-details').removeAttribute('open');

    localStorage.setItem('theme', theme);
}
</script>
