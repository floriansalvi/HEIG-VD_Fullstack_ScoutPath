<script setup>
import { ref } from 'vue';

const name = ref('')
const email = ref('')
const password = ('')
const passwordConfirmation = ref('')
const error = ref('')

const register = async () => {
    try {
        await this.$http.get('/sanctum/csrf-cookie');
        await this.$http.post('/register', {
            name: name.value,
            email: email.value,
            password: password.value,
            password_confirmation: passwordConfirmation.value
        })

        router.push('/')
    } catch (err) {
        if(err.response?.status === 422) {
            error.value = 'Erreur de validation'
        } else {
            error.value = 'Une erreur est survenue.'
        }
    }
}
</script>

<template>
  <div>
    <form @submit.prevent="register">
        <h2>Inscription</h2>
        <input v-model="name" type="text" placeholder="Prénom et nom" required>
        <input v-model="email" type="email" placeholder="Email" required>
        <input v-model="password" type="password" placeholder="Mot de passe" required>
        <input v-model="passwordConfirmation" type="password" placeholder="Confirmation" required>
        <button type="submit">S'inscrire</button>
        <p v-if="error">{{ error }}</p>
    </form> 
  </div>
</template>

<style scoped>

</style>