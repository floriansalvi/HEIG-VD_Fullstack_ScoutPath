<script setup>
import { ref } from 'vue';
import router from '../router';
import auth from '../auth';

const email = ref('')
const password = ref('')
const error = ref('')
const loggingIn = ref(false)

/**
 * Attempts to login the user using credentials.
 * On success, redirects to home page.
 * On failure, sets an appropriate error message.
 * @returns {Promise<void>}
 */
const login = async () => {
    loggingIn.value = true
    try {
        await auth.login(email.value, password.value)
        router.push('/')
    } catch (err) {
        if(err.response?.status === 422){
            error.value = 'Email ou mot de passe incorrect.'
        } else {
            error.value = 'Erreur de connexion.'
        }
    } finally {
        loggingIn.value = false
    }
}

</script>

<template>
  <div class="container">
    <form @submit.prevent="login">
        <h2>Connexion</h2>
        <input v-model="email" type="email" placeholder="Email" required>
        <input v-model="password" type="password" placeholder="Mot de passe" required>
        <button type="submit" :disabled="loggingIn">Se connecter</button>
        <p v-if="error" class="error">{{ error }}</p>
        <p class="txt-small">Pas encore de compte ? <router-link to="/signup">S'inscrire</router-link></p>
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