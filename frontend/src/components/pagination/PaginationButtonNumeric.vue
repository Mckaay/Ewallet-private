<script setup>
const props = defineProps({
  'page': [Number, String],
  'active': Boolean,
});
</script>

<template>
  <button type="button" :class="{ 'active': active }" class="pagination-button-numeric">{{ page }}</button>
</template>

<style scoped>
.pagination-button-numeric {
  display: none;
  justify-content: center;
  align-items: center;
  font-size: var(--fs-87);
  color: var(--clr-grey-900);
  border: 1px solid var(--clr-beige-500);
  background-color: var(--clr-white);
  border-radius: var(--spacing-50);
  height: var(--pagination-buttons-size);
  width: var(--pagination-buttons-size);

  @media screen and (min-width: 768px) {
    display: flex;
  }

  &:hover {
    background-color: var(--clr-beige-500);
    color: var(--clr-white);
    cursor: pointer;
  }
}

.pagination-button-numeric.active {
  display: flex;
  background-color: var(--clr-grey-900);
  color: var(--clr-white);
  border: 0;

  &:hover {
    cursor: not-allowed;
  }
}
</style>
