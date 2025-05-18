<script setup>
import { defineProps, onMounted, ref, inject, computed } from 'vue'
import { useRouter } from 'vue-router'

const $http = inject('$http')

const router = useRouter()

// Props passed from the parent component
// @prop {Object} chapter - The chapter data
// @prop {Number} storyId - ID of the story the chapter belongs to
// @prop {Object|null} progress - The user's saved progress (if any)
// @prop {Boolean} isFirst - Indicates if this is the first chapter of the story
const props = defineProps({
  chapter: Object,
  storyId: Number,
  progress: Object,
  isFirst: Boolean
})

const riddles = ref([])
const disabled = ref(false)
const error = ref('')

/**
 * Fetches riddles for the given chapter.
 * @param {Number} chapterId - The ID of the chapter to fetch riddles for.
 * @returns {Promise<void>}
 */
const fetchRiddles = async (chapterId) => {
  try {
    const response = await $http.get(`/api/v1/chapters/${chapterId}`)
    riddles.value = response.data.data.riddles
  } catch (err) {
    error.value = 'Erreur lors du chargement des énigmes'
  }
}

/**
 * Handles the action when the user clicks "Start" or "Continue".
 * Fetches riddles and navigates to the correct riddle.
 * @param {Number} chapterId - The ID of the selected chapter.
 * @returns {Promise<void>}
 */
const handleClick = async (chapterId) => {
  disabled.value = true
  try {
    await fetchRiddles(chapterId)

    if (riddles.value.length) {
      const matchingRiddle = props.progress
        ? riddles.value.find(r => r.id === props.progress.riddle_id)
        : null

      const targetRiddle = matchingRiddle ? matchingRiddle.id : riddles.value[0].id

      router.push(`/riddles/${targetRiddle}`)
    } else {
      error.value = "Erreur : aucune énigme trouvée"
    }
  } catch (err) {
    error.value = "Erreur lors du chargement"
  } finally {
    disabled.value = false
  }
}

/**
 * Determines if the user can continue the current chapter.
 * @type {ComputedRef<Boolean>}
 */
const canContinue = computed(() =>
  props.progress && props.progress.chapter_id === props.chapter.id
)

/**
 * Determines if the user can start this chapter.
 * Case 1: No progress => only if it's the first chapter.
 * Case 2: Existing progress => must have enough points and be at the correct chapter.
 * @type {ComputedRef<Boolean>}
 */
const canStart = computed(() => {
  if (!props.progress) {
    return props.isFirst
  }

  return (
    props.progress.chapter_id < props.chapter.id &&
    props.progress.points >= props.chapter.points_needed
  )
})

/**
 * Determines if the chapter has already been completed.
 * @type {ComputedRef<Boolean>}
 */
const isCompleted = computed(() =>
  props.progress && Number(props.progress.chapter_id) > Number(props.chapter.id)
)

/**
 * Determines if the chapter is locked.
 * Case 1: No progress => all but the first chapter are locked.
 * Case 2: Not enough points to unlock.
 * @type {ComputedRef<Boolean>}
 */
const isLocked = computed(() => {
  if (!props.progress) {
    return !props.isFirst
  }

  return props.progress.points < props.chapter.points_needed
})
</script>

<template>
  <div
    :class="['chapter-card', !isLocked ? 'unlocked' : 'locked']"
    :id="`chapt-${chapter.id}`"
  >
    <h4>{{ chapter.title }}</h4>
    <p class="chapt-descr">{{ chapter.description }}</p>
    <p v-if="isCompleted" class="completed-msg">Chapitre terminé</p>
    <button
      v-if="canContinue"
      :disabled="disabled"
      @click="handleClick(chapter.id)"
    >
      Continuer
    </button>
    <button
      v-else-if="canStart"
      :disabled="disabled"
      @click="handleClick(chapter.id)"
    >
      Commencer
    </button>
    <p v-if="isLocked" class="points-msg">
      Débloqué avec {{ chapter.points_needed }} points
    </p>
  </div>
</template>

<style scoped>
.chapter-card {
  background-color: var(--color-accent-light);
  padding: var(--spacing-l);
  display: flex;
  flex-direction: column;
  gap: var(--spacing-m);
  align-items: center;
  justify-content: center;
  border-radius: var(--radius-m);
}

.chapter-card h4,
.chapter-card p {
  color: var(--color-white);
  text-align: center;
}

.locked {
  background-color: #f0f0f0;
}

.locked h4,
.locked .chapt-descr {
  color: var(--color-accent);
}

.locked .points-msg {
  font-weight: var(--font-weight-bold);
  color: var(--color-accent-light);
}

button {
  background-color: var(--color-white);
  color: var(--color-accent);
}

button:hover {
  background-color: var(--color-accent-dark);
  color: var(--color-white);
}
</style>
