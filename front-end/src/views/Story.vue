<script setup>
import { defineProps, onMounted, ref, inject } from 'vue'
import TheLoading from '../components/TheLoading.vue';
import { useLoading } from '../composables/useLoading';
import { useRouter } from 'vue-router';
import auth from '../auth';
import BaseChapterCard from '../components/BaseChapterCard.vue';

const router = useRouter()
const $http = inject('$http')
const { loading, withLoading } = useLoading()
const user = auth.user

const story = ref (null)
const chapters = ref([])
const progress = ref(null)
const error = ref('')

const props = defineProps({
  id: [Number, String]
})

/**
 * Récupère la liste des chapitres pour une histoire donnée
 * @param {string|number} storyId - L'identifiant de l'histoire
 */
const fetchChapters = async (storyId) => {
  try {
    const response = await $http.get(`/api/v1/stories/${storyId}/chapters`)
    chapters.value = response.data.data
  } catch (err) {
    error.value = 'Erreur lors du chargement'
  }
}

/**
 * Récupère la progression de l'utilisateur sur une histoire
 * @param {string|number} storyId - L'identifiant de l'histoire
 */
const fetchProgress = async (storyId) => {
  try {
    const response = await $http.get(`/api/v1/progress/${storyId}`)
    progress.value = response.data.data
  } catch (err) {
    error.value = 'Erreur lors du chargement'
  }
}

/**
 * Récupère les détails d'une histoire, ses chapitres, et la progression de l'utilisateur
 * Utilise la fonction withLoading pour gérer l'affichage du spinner
 */
const fetchStory = async () => {
  await withLoading(async () => {
    try {
      const response = await $http.get(`/api/v1/stories/${props.id}`)
      story.value = response.data.data
      await fetchChapters(story.value.id)
      await fetchProgress(story.value.id)
    } catch (err) {
      if (err.response && err.response.status === 404) {
        router.push('/error')
      } else {
        error.value = 'Erreur lors du chargement'
      }
    }
  })
}

/**
 * Réinitialise la progression de l'utilisateur sur l'histoire
 * Supprime la progression côté backend et recharge les données
 */
const resetProgress = async () => {
  await withLoading(async () => {
    try {
      const response = await $http.delete(`/api/v1/progress/${story.value.id}`)
      progress.value = response.data.data
      fetchStory()
    } catch (err) {
      error.value = "Erreur lors du chargement"
    }
  })
}

onMounted(() => {
  fetchStory()
})

</script>

<template>
  <div v-if="!loading && story" class="container">
    <div class="info">
      <h2 v-if="story">{{ story.title }}</h2>
      <h4 v-if="progress">Bienvenue {{ user.name }} ! Tu as <strong>{{ progress.points }}</strong> points.</h4>
    </div>
    <p>{{ story.description }}</p>
      <ul v-if="chapters.length" class="chapters-grid">
        <BaseChapterCard
          v-for="(chapter, index) in chapters"
          :key="chapter.id"
          :chapter="chapter"
          :storyId="story.id"
          :progress="progress"
          :isFirst="index === 0"
        />
      </ul>
      <button v-if="progress" @click="resetProgress">Recommencer l'histoire</button>
  </div>
  <TheLoading v-if="loading"/>
</template>

<style scoped>
.chapters-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--spacing-l);
  width: 100%;
  padding: 0;
}

.container {
  display: flex;
  flex-direction: column;
  gap: var(--spacing-xl);
}

.info {
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: space-between;
}

strong {
  font-weight: var(--font-weight-txt);
  color: var(--color-accent-light);
}

button {
  background-color: var(--color-accent-light);
  color: var(--color-white);

  &:hover {
    background-color: var(--color-accent-dark);
  }
}

@media (max-width: 1024px) {
  .chapters-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 640px) {
  .chapters-grid {
    grid-template-columns: 1fr;
  }
}
</style>