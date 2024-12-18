<script setup>
import Button from "@/components/buttons/Button.vue";

const props = defineProps({
  'headerText': String,
  'buttonText': String,
})

</script>

<template>
  <header class="model-header">
    <h1>{{ headerText }}</h1>
    <Button class="button-primary" :text="buttonText"/>
  </header>
</template>

<style scoped>
.model-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
</style>