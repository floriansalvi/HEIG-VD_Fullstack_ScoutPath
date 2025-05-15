<script setup>
import { ref } from 'vue';
import router from '../router';
import axiosClient from '../axios';

const email = ref('')
const password = ref('')
const error = ref('')

const login = async () => {
    try {
        await axiosClient.get('/sanctum/csrf-cookie');
        await axiosClient.post('/login', {
            email: email.value,
            password: password.value
        });
        router.push('/')
    } catch (err) {
        if(err.response?.status === 422){
            error.value = 'Email ou mot de passe incorrect.'
        } else {
            error.value = 'Erreur de connexion.'
        }
    }
}

</script>

<template>
  <div>
    <form @submit.prevent="login">
        <h2>Connexion</h2>
        <input v-model="email" type="email" placeholder="Email" required>
        <input v-model="password" type="password" placeholder="Mot de passe" required>
        <button type="submit">Se connecter</button>
        <p v-if="error">{{ error }}</p>
    </form> 
  </div>
</template>

<style scoped>

</style>