<script setup>
import Menu from "@/components/menu/Menu.vue";
import Modal from "@/components/modals/Modal.vue";
import Button from "@/components/buttons/Button.vue";
import { ref } from "vue";
import Field from "@/components/forms/Field.vue";
import InputWithIcon from "@/components/forms/InputWithIcon.vue";

const modal = ref(null);

const openModal = () => {
  modal.value.openModal();
}
</script>

<template>
  <Menu/>

  <Button @click="openModal" class="button-primary" text="Open Modal"/>
  <main>
    <Modal
        ref="modal"
        modalHeader="Add New Transaction"
        modalDescription="Create a pot to set savings targets..."
    >
      <form>
        <Field id="search">
          <InputWithIcon
              v-model="searchQuery"
              type="text"
              placeholder="Search transaction"
          />
        </Field>
      </form>
    </Modal>
  </main>
</template>


<style>
</style>
