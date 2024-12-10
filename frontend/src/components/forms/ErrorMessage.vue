<template>
  <p class="error-message">
    <slot/>
  </p>
</template>

<script setup>

</script>

<style scoped>
.error-message {
  font-size: var(--fs-87);
  color: var(--clr-red);
  font-weight: var(--fw-700);
}
</style>
