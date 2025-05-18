<script setup>
import { ref, inject } from 'vue';
import { useRouter } from 'vue-router';

// Inject Axios instance
const $http = inject('$http');

// Vue Router instance for navigation
const router = useRouter();

const name = ref('');
const email = ref('');
const password = ref('');
const passwordConfirmation = ref('');
const error = ref('');

// Ref to track registration in-progress state (disables submit button)
const registering = ref(false);

/**
 * Handles user registration.
 *  - Fetches CSRF cookie for Laravel Sanctum protection
 *  - Sends registration POST request with user input
 *  - Redirects to homepage on success
 *  - Catches and shows validation or generic errors
 * @returns {Promise<void>}
 */
const register = async () => {
  registering.value = true;
  error.value = '';
  try {
    await $http.get('/sanctum/csrf-cookie');
    await $http.post('/register', {
      name: name.value,
      email: email.value,
      password: password.value,
      password_confirmation: passwordConfirmation.value,
    });
    router.push('/');
  } catch (err) {
    if (err.response?.status === 422) {
      error.value = 'Erreur de validation';
    } else {
      error.value = 'Une erreur est survenue.';
    }
  } finally {
    registering.value = false;
  }
};
</script>

<template>
  <div class="container">
    <form @submit.prevent="register">
      <h2>Inscription</h2>
      <input v-model="name" type="text" placeholder="Prénom et nom" required />
      <input v-model="email" type="email" placeholder="Email" required />
      <input v-model="password" type="password" placeholder="Mot de passe" required />
      <input
        v-model="passwordConfirmation"
        type="password"
        placeholder="Confirmation"
        required
      />
      <button type="submit" :disabled="registering">S'inscrire</button>
      <p v-if="error" class="error">{{ error }}</p>
      <p class="txt-small">
        Déjà inscrit.e ? <router-link to="/login">Se connecter</router-link>
      </p>
    </form>
  </div>
</template>

<style scoped>
.container {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  gap: 1rem;
}

.txt-small,
a {
  color: var(--color-white);
}

a {
  text-decoration: underline;
}

.error {
  color: red;
  margin-top: 0.5rem;
}
</style>
