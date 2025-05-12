<template>
  <div>
    <h2>Histoires récupérées depuis l'API</h2>
    <ul>
      <li v-for="riddle in riddles" :key="riddle.id">
        {{ riddle.title }}
      </li>
    </ul>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const riddles = ref([])

onMounted(async () => {
  try {
    axios.defaults.withCredentials = true
    axios.defaults.baseURL = 'http://localhost:8000'

    await axios.get('/sanctum/csrf-cookie') // init CSRF si besoin
    const res = await axios.get('/api/v1/riddles/2')
    riddles.value = res.data
  } catch (err) {
    console.error('Erreur lors de la récupération des histoires :', err)
  }
})
</script>
