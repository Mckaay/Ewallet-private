<script setup>
import {v4 as uuid} from 'uuid';
import Label from "@/components/forms/Label.vue";
import HelperMessage from "@/components/forms/HelperMessage.vue";
import {computed, provide} from "vue";
import ErrorMessage from "@/components/forms/ErrorMessage.vue";

const props = defineProps({
  id: {
    type: String,
    default: () => `field-${uuid()}`
  },
  label: String,
  error: String,
  helper: String,
})

provide('field', computed(() => {
  return {
    ...props,
  }
}));
</script>

<template>
  <div class="field-wrapper">
    <Label v-if="label"
      :for="props.id"
    >
      {{ label }}
    </Label>
    <slot/>
    <ErrorMessage v-if="props.error">{{ error }}</ErrorMessage>
    <HelperMessage v-if="props.helper">{{ helper }}</HelperMessage>
  </div>
</template>

<style scoped>
.field-wrapper {
  display: flex;
  flex-direction: column;
  gap: var(--spacing-25);
}

</style>
