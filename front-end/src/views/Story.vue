<script setup>
import { defineProps, onMounted } from 'vue'
import TheLoading from '../components/TheLoading.vue';
import { useLoading } from '../composables/useLoading';

const { loading, withLoading } = useLoading()

const props = defineProps({
  id: String
})
</script>

<template>
  <div v-if="!loading "class="container">
    <h2>Histoire {{ id }}</h2>
  </div>
  <TheLoading v-if="loading"/>
</template>

<style scoped>

</style>