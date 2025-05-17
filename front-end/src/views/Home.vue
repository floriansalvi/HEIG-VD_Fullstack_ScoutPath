<script setup>
import { ref, onMounted, inject } from 'vue';
import BaseStoryCard from '../components/BaseStoryCard.vue';

import { useLoading } from '../composables/useLoading';
import TheLoading from '../components/TheLoading.vue';

const { loading, withLoading } = useLoading()

const $http = inject('$http')

const stories = ref([])
const error = ref(null)



const fetchStories = async () => {
  await withLoading(async () => {
    try {
      const response = await $http.get('/api/v1/stories')
      stories.value = response.data.data
    } catch (err) {
      error.value = 'Erreur lors du chargement'
    }
  })
}

onMounted(() => {
  fetchStories()
})
</script>

<template>
  <div v-if="!loading && !error" class="container">
    <h2>Histoires</h2>
    <div class="stories-grid">
      <BaseStoryCard v-for="story in stories" :key="story.id" :story="story"/>
    </div>
    <div v-if="error">{{ error }}</div>
  </div>
  <TheLoading v-if="loading"/>
</template>

<style scoped>
.stories-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--spacing-l)
}

.container {
  display: flex;
  flex-direction: column;
  gap: var(--spacing-xl);
}

</style>