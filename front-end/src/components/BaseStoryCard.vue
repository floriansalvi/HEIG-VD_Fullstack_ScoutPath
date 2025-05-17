<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    story: Object
})
</script>

<template>
    <router-link :to="`/stories/${story.id}`" class="story-card">
        <h4>{{ story.title }}</h4>
    </router-link>
</template>

<style scoped>
.story-card {
    background-color: var(--color-accent-light);
    padding: var(--spacing-l);
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: var(--radius-m);
    transition: ease-in-out 200ms;

    &:hover {
        background-color: var(--color-accent);
    }

    h4 {
        color: var(--color-white);
    }
}

</style>