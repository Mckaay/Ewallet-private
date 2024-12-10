<script setup>
import Button from "@/components/buttons/Button.vue";
import {ref} from "vue";
import Field from "@/components/forms/Field.vue";
import InputWithIcon from "@/components/forms/InputWithIcon.vue";
import Input from "@/components/forms/Input.vue";
import InputWithPrefix from "@/components/forms/InputWithPrefix.vue";
import PaginationButton from "@/components/buttons/PaginationButton.vue";
import PaginationButtonNumeric from "@/components/buttons/PaginationButtonNumeric.vue";


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
    <PaginationButton
      class="next"
      text="Next"
    />
    <PaginationButton
      class="previous"
      text="Prev"
    />
    <PaginationButtonNumeric
      text="1"
      :active="true"
    />
  </main>
</template>

<style scoped>

</style>
