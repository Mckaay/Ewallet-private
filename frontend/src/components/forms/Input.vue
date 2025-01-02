<script setup>
import {inject} from "vue";

const props = defineProps({
  modelValue: [String, Number],
})

const emit = defineEmits(['update:modelValue'])
const field = inject('field')
</script>

<template>
  <input type="text"
         :id="field.id"
         :value="props.modelValue"
         @input="$event => emit('update:modelValue', $event.target.value)"
         class="input"
  >
</template>


<style>
.input {
  font-size: var(--fs-87);
  color: var(--clr-grey-900);
  padding: var(--spacing-75) var(--spacing-125);
  width: 100%;
  border-radius: var(--spacing-50);
  border: 1px solid var(--clr-beige-500);
}

.input:hover {
  border: 1px solid var(--clr-grey-500);
}

.input:focus {
  color: var(--clr-grey-900);
  outline: none;
  border: 1px solid var(--clr-grey-900);
}

.input::placeholder {
  color: var(--clr-beige-500);
}

.input:hover::placeholder {
  color: var(--clr-grey-900);
}
</style>
