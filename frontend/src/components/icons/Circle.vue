<script setup>
const props = defineProps({
  color: {
    type: String,
    default: '#000'
  }
});
</script>

<template>
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
    <circle cx="8" cy="8" r="8" :fill="props.color"/>
  </svg>
</template>