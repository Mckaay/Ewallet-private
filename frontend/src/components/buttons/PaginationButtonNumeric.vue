<script setup>
const props = defineProps({
  'text': String,
  'active': Boolean,
});
</script>

<template>
  <button type="button" :class="{ 'active': active }" class="pagination-button-numeric">{{ text }}</button>
</template>

<style scoped>
.pagination-button-numeric {
  display: flex;
  align-items: center;
  font-size: var(--fs-87);
  color: var(--clr-grey-900);
  border: 1px solid var(--clr-beige-500);
  background-color: var(--clr-white);
  border-radius: var(--spacing-50);
  padding: var(--spacing-100);
  height: var(--pagination-buttons-height);

  &:hover {
    background-color: var(--clr-beige-500);
    color: var(--clr-white);
    cursor: pointer;
  }
}

.pagination-button-numeric.active {
  background-color: var(--clr-grey-900);
  color: var(--clr-white);

  &:hover {
    cursor: not-allowed;
  }
}

</style>
