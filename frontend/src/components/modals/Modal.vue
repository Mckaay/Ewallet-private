<script setup>
import { ref, defineExpose } from 'vue'
import Close from "@/components/icons/Close.vue"

const props = defineProps({
  buttonText: String,
  modalHeader: String,
  modalDescription: String,
});

// Reference to the actual <dialog> element
const dialog = ref(null);

const openModal = () => {
  dialog.value.showModal();
}

function close() {
  dialog.value?.close();
}

defineExpose({
  openModal,
  close
});
</script>

<template>
  <dialog ref="dialog">
    <div class="modal-content-wrapper">
      <header>
        <h1>{{ modalHeader }}</h1>
        <Close @click="close" class="close-button"/>
      </header>
      <p v-if="modalDescription" class="modal-description">
        {{ modalDescription }}
      </p>
      <slot></slot>
    </div>
  </dialog>
</template>


<style scoped>
dialog {
  margin: auto;
  border: 0;
  border-radius: var(--spacing-75);
  padding: var(--spacing-200) var(--spacing-200);
  width: 80%;
  max-width: 560px;

  & .modal-content-wrapper {
    display: flex;
    flex-direction: column;
    gap: var(--spacing-125);
  }

  header {
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  & .close-button:hover {
    cursor: pointer;
  }

  & h1 {
    color: var(--clr-grey-900);
    font-size: var(--fs-110);

    @media screen and (min-width: 560px) {
      font-size: var(--fs-h1);
    }
  }

  & .modal-description {
    font-size: var(--fs-87);
    line-height: 1.5;
    color: var(--clr-grey-500);
  }
}
</style>