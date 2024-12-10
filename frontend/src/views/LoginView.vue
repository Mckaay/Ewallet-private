<script setup>
import Button from "@/components/buttons/Button.vue";
import {ref} from "vue";
import Field from "@/components/forms/Field.vue";
import InputWithIcon from "@/components/forms/InputWithIcon.vue";
import Input from "@/components/forms/Input.vue";
import InputWithPrefix from "@/components/forms/InputWithPrefix.vue";


const form = ref({
  name: "",
})
</script>

<template>
  <main>
    <Button class="button-primary" text="Placeholder"/>
    <Button class="button-secondary" text="Placeholder"/>
    <Button class="button-tertiary" text="Placeholder"/>
    <Button class="button-destroy" text="Placeholder"/>
    <br>
    <Field
      id="name"
      label="Name"
      error="Test error"
      helper="Helper text"
    >
      <Input
        v-model="form.name"
        placeholder="John Doe"
      />
    </Field>

    <Field
      id="name"
      label="Name"
      error="Test error"
      helper="Helper text"
      class="with-icon"
    >
      <InputWithIcon
        v-model="form.name"
        placeholder="John Doe"
      />
    </Field>
    <Field
      id="name"
      label="Name"
      error="Test error"
      helper="Helper text"
      class="with-icon"
    >
      <InputWithPrefix
        v-model="form.name"
        placeholder="John Doe"
      />
    </Field>
  </main>
</template>

<style scoped>

</style>
