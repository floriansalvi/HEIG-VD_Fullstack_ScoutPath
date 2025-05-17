<template>
  <div class="container">
    <svg class="spinner" viewBox="0 0 96 96">
      <circle
        class="path"
        cx="48"
        cy="48"
        r="42"
        fill="none"
        stroke-width="12"
      />
    </svg>
  </div>
</template>

<style scoped>
.container {
    display: flex;
    justify-content: center;
    align-items: center;
}

.spinner {
  animation: rotate 1s linear infinite;
  width: 6rem;
  height: 6rem;
}

.path {
  stroke: var(--color-accent-light);
  stroke-linecap: round;
  stroke-dasharray: 220, 220;
  stroke-dashoffset: 0;
}

@keyframes rotate {
  100% {
    transform: rotate(360deg);
  }
}
</style>