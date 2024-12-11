<script setup>
import ArrowFatLinesLeftIcon from "@/components/icons/ArrowFatLinesLeftIcon.vue";

const props = defineProps({
  'text': String,
})
</script>

<template>
  <div class="wrapper">
    <ArrowFatLinesLeftIcon/>
    <button class="button toggle-button" type="button">{{ text }}</button>
  </div>
</template>

<style scoped>
.wrapper {
  display: none;
  padding: var(--spacing-100) var(--spacing-200);
  gap: var(--spacing-100);
  align-items: center;
  color: var(--clr-grey-300);

  & .button {
    background: inherit;
    font-weight: var(--fw-700);
    color: inherit;
    border: 0;
    padding: 0;
  }

  @media screen and (min-width: 1280px) {
    display: flex;
  }
}

.wrapper:hover {
  cursor: pointer;
  color: var(--clr-white);

  & svg > * {
    fill: var(--clr-white);
  }
}

.wrapper > *:hover {
  cursor: pointer;
  color: var(--clr-white);
}
</style>