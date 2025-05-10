<!-- src/components/RegisterForm.vue -->
<template>
    <form @submit.prevent="register">
      <div>
        <input v-model="name" type="text" placeholder="Nom" required />
      </div>
      <div>
        <input v-model="email" type="email" placeholder="Email" required />
      </div>
      <div>
        <input v-model="password" type="password" placeholder="Mot de passe" required />
      </div>
      <div>
        <input v-model="passwordConfirmation" type="password" placeholder="Confirmer le mot de passe" required />
      </div>
      <button type="submit">S'inscrire</button>
  
      <div v-if="errors.length" style="color: red;">
        <p v-for="(error, index) in errors" :key="index">{{ error }}</p>
      </div>
  
      <div v-if="user">
        <p>Bienvenue, {{ user.name }} !</p>
      </div>
    </form>
  </template>
  
  <script setup>
  import { ref } from 'vue'
  import api from '/src/axios.js'
  
  const name = ref('')
  const email = ref('')
  const password = ref('')
  const passwordConfirmation = ref('')
  const user = ref(null)
  const errors = ref([])
  
  const register = async () => {
    errors.value = []
  
    try {
      // Étape 1 : Obtenir le cookie CSRF
      await api.get('/sanctum/csrf-cookie')
  
      // Étape 2 : Envoyer la requête d'inscription
      await api.post('/api/register', {
        name: name.value,
        email: email.value,
        password: password.value,
        password_confirmation: passwordConfirmation.value
      })
  
      // Étape 3 : Récupérer l'utilisateur connecté
      const res = await api.get('/api/user')
      user.value = res.data
  
    } catch (error) {
      if (error.response && error.response.status === 422) {
        const errorData = error.response.data.errors
        for (const field in errorData) {
          errors.value.push(...errorData[field])
        }
      } else {
        console.error('Erreur inconnue :', error)
      }
    }
  }
  </script>
  