<template>
  <div class="container">
    <h1>Erreur 404</h1>
    <p>Cette page est introuvable…</p>
    <router-link to="/" class="link">Retourner à la page d'accueil</router-link>
  </div>
</template>

<style scoped>
.container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

p {
  margin-bottom: var(--spacing-m);
}

a {
  text-decoration: underline;
}
</style>