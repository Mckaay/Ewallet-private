<script setup>
import {inject} from "vue";

const props = defineProps({
  modelValue: [String, Number],
  prefix: {
    type: String,
    default: "$",
  }
})

const emit = defineEmits(['update:modelValue'])
const field = inject('field')
</script>

<template>
  <div class="input-prefix-container">
    <span class="prefix">{{ prefix }}</span>
    <input type="text"
           :id="field.id"
           :value="props.modelValue"
           @input="$event => emit('update:modelValue', $event.target.value)"
           class="input"
    >
  </div>
</template>

<style scoped>
.input-prefix-container {
  display: flex;
  align-items: center;
  color: var(--clr-beige-500);
  font-size: var(--fs-87);
  position: relative;

  & .input {
    padding: var(--spacing-75) var(--spacing-75) var(--spacing-75) var(--spacing-250);
  }

  & span {
    display: block;
    position: absolute;
    left: var(--spacing-125);
  }
}

.input-prefix-container:hover {
  color: var(--clr-grey-900);
}
</style>
