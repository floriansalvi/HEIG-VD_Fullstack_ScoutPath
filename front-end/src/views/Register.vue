<script setup>
import { ref } from 'vue';

const name = ref('')
const email = ref('')
const password = ('')
const passwordConfirmation = ref('')
const error = ref('')
const registering = ref(false)

const register = async () => {
    registering.value = true;
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
    } finally {
        registering.value = false
    }
}
</script>

<template>
  <div class="container">
    <form @submit.prevent="register">
        <h2>Inscription</h2>
        <input v-model="name" type="text" placeholder="Prénom et nom" required>
        <input v-model="email" type="email" placeholder="Email" required>
        <input v-model="password" type="password" placeholder="Mot de passe" required>
        <input v-model="passwordConfirmation" type="password" placeholder="Confirmation" required>
        <button type="submit" :disabled="registering">S'inscrire</button>
        <p v-if="error" class="error">{{ error }}</p>
        <p class="txt-small">Déjà inscrit.e ? <router-link to="/login">Se connecter</router-link></p>
    </form> 
  </div>
</template>

<style scoped>
.container {
    display: flex;
    align-items: center;
    justify-content: center;
}

.txt-small, a {
    color: var(--color-white);
}

a {
    text-decoration: underline;
}
</style>