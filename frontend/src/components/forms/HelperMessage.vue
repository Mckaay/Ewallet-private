<template>
  <p class="helper-message">
    <slot/>
  </p>
</template>

<script setup>

</script>

<style scoped>
.helper-message {
  font-size: var(--fs-80);
  font-weight: var(--fw-400);
  color: var(--clr-grey-500);
  align-self: flex-end;
}
</style>
