<script setup>
import { defineProps, ref, inject, onMounted, watch } from 'vue';
import TheLoading from '../components/TheLoading.vue';
import { useLoading } from '../composables/useLoading';
import { useRouter } from 'vue-router';
import auth from '../auth';

const router = useRouter();
const $http = inject('$http');
const { loading, withLoading } = useLoading();
const user = auth.user;

const props = defineProps({
  id: String
});

const riddle = ref(null);
const progress = ref(null);
const error = ref('');
const disabled = ref(false);
const pointsAwarded = ref(0);

/**
 * Fetch the user's current progress for a given story.
 * @param {string} storyId - The ID of the story to fetch progress for.
 */
const fetchProgress = async (storyId) => {
  try {
    const response = await $http.get(`/api/v1/progress/${storyId}`);
    progress.value = response.data.data ?? null;
  } catch (err) {
    error.value = 'Erreur lors du chargement';
  }
};

/**
 * Send updated progress to backend.
 * Updates progress with current points, chapter, and riddle.
 */
const updateProgress = async () => {
  try {
    const payload = {
      story_id: Number(progress.value.story_id),
      chapter_id: Number(progress.value.chapter_id),
      riddle_id: Number(progress.value.riddle_id),
      points: Number(progress.value.points)
    };

    const response = await $http.post('/api/v1/progress', payload);
    progress.value = response.data.data;
  } catch (error) {
    error.value = 'Erreur lors du chargement';
  }
};

/**
 * Fetch the riddle data by ID, then fetch progress for its story.
 * Uses the loading composable to show loading indicator.
 */
const fetchRiddle = async () => {
  await withLoading(async () => {
    try {
      const response = await $http.get(`/api/v1/riddles/${props.id}`);
      riddle.value = response.data.data;
      await fetchProgress(riddle.value.story_id);
    } catch (err) {
      if (err.response && err.response.status === 404) {
        router.push('/error');
      } else {
        error.value = 'Erreur lors du chargement';
      }
    }
  });
};

/**
 * Handles user choice submission:
 * - Finds the chosen option by ID
 * - Updates points awarded and progress accordingly
 * - Sends updated progress to backend
 * - Navigates to the next riddle or story overview after delay
 * @param {number} choiceId - The ID of the selected choice.
 */
const handleChoiceSubmition = async (choiceId) => {
  try {
    disabled.value = true;
    const choice = riddle.value.choices.find(c => c.id === choiceId);
    pointsAwarded.value = choice.points_awarded;

    // Update progress object
    if (progress.value) {
      progress.value.points += pointsAwarded.value;
      progress.value.riddle_id = riddle.value.id;
      progress.value.chapter_id = riddle.value.chapter_id;
    } else {
      progress.value = {
        story_id: riddle.value.story_id,
        chapter_id: riddle.value.chapter_id,
        riddle_id: riddle.value.id,
        points: pointsAwarded.value
      };
    }

    await updateProgress();

    const nextRiddleId = choice.next_riddle_id;

    setTimeout(() => {
      if (nextRiddleId) {
        router.push(`/riddles/${nextRiddleId}`);
      } else {
        router.push(`/stories/${riddle.value.story_id}`);
      }
    }, 1000);

  } catch (err) {
    error.value = 'Erreur lors du chargement';
  }
};

onMounted(() => {
  fetchRiddle();
});

// Watch for changes on the riddle ID prop to reload riddle and reset states
watch(() => props.id, async (newId, oldId) => {
  if (newId !== oldId) {
    riddle.value = null;  // Remise à zéro correcte
    progress.value = null;
    error.value = '';
    disabled.value = false;
    pointsAwarded.value = 0;

    await fetchRiddle();
  }
});
</script>

<template>
  <div v-if="!loading && riddle" class="container">
    <div class="info">
      <h2>{{ riddle.title }}</h2>
      <h4 v-if="progress">
        <strong class="points" :class="{ awarded: pointsAwarded > 0 }">{{ progress.points }}</strong> points.
      </h4>
    </div>
    <p class="riddle-descr">{{ riddle.description }}</p>
    <ul class="choices">
      <button
        v-for="choice in riddle.choices"
        :key="choice.id"
        :disabled="disabled"
        @click="handleChoiceSubmition(choice.id)"
      >
        {{ choice.description }}
      </button>
    </ul>
  </div>
  <TheLoading v-if="loading" />
</template>


<style scoped>
.container {
  display: flex;
  flex-direction: column;
  gap: var(--spacing-xl)
}

.riddle-descr {
  text-align: center;
}

.info {
  width: 100%;
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: space-between;
}

strong {
  font-weight: var(--font-weight-txt);
  color: var(--color-accent-light);
}

.choices {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: var(--spacing-s);
  padding: 0;
}

button {
  background-color: var(--color-accent-light);
  color: var(--color-white);

  &:hover {
    background-color: var(--color-accent-dark);
    color: var(--color-white);
  }
}

.awarded {
  color: green;
}
</style>