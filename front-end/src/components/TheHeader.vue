<script setup>
import auth from '../auth';
import { onMounted, ref, computed } from 'vue';
import router from '../router';

const isAuthenticated = computed(() => !!auth.user.value)
const loggingOut = ref(false)

const logout = async () => {
    loggingOut.value = true
    await auth.logout();
    router.push('/login')
    loggingOut.value = false
}

onMounted(async () => {
    await auth.fetchUser()
})

</script>

<template>
  <nav>
    <div class="container">
        <router-link id="link" to="/"><h1>ScoutPath ⛺️</h1></router-link>
        <div class="nav-link">
            <router-link v-if="!isAuthenticated" id="link" to="/login">Connexion</router-link>
            <router-link v-if="!isAuthenticated" id="link" to="/signup">Créer un compte</router-link>
        </div>
        <button v-if="isAuthenticated" @click="logout" :disabled="loggingOut">Déconnexion</button>
    </div>
  </nav>
</template>

<style scoped>
nav {
    top: 0;
    width: 100%;
    height: 5rem;
    background-color: var(--color-accent);
    display: flex;
    flex-direction: row-reverse;
    align-items: center;

    .container {
        height: fit-content;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }

    .nav-link {
        display: flex;
        flex-direction: row;
        gap: var(--spacing-s);
    }

    a {
        color: var(--color-white);

        &:hover {
            color: var(--color-accent-light);
        }
    }

    h1 {
        color: var(--color-white);
        height: inherit;
    }

    button {
        background-color: var(--color-white);
        color: var(--color-accent);

        &:hover {
            background-color: var(--color-accent-light);
            color: var(--color-white);
        }
    }
}

@media (max-width: 640px) {
    nav {
        height: 7rem;

        button {
            height: 3rem;
        }
    }
}

div {
    height: inherit;
}

</style>