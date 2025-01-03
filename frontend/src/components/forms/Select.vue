<script setup>
import {ref, watch} from 'vue';

const props = defineProps({
  label: {
    type: String,
    default: ''
  },
  modelValue: {
    type: [String],
    default: null
  },
  options: {
    type: [Array],
    default: () => []
  },
  placeholder: {
    type: [String],
    default: null
  }
});

const emit = defineEmits(['update:modelValue']);
const selectedOption = ref(props.options[0] ?? null);

watch(selectedOption, (newVal) => {
  emit('update:modelValue', newVal.value);
});
</script>

<template>
  <div class="select-wrapper">
    <div v-if="label" class="label">{{ label }}</div>
    <v-select
        v-model="selectedOption"
        :searchable="false"
        :filterable="false"
        :options="options"
        :placeholder="placeholder"
    />
    <slot></slot>
  </div>
</template>

<style>
.select-wrapper {
  display: flex;
  gap: var(--spacing-50);
  align-items: center;
  font-size: var(--fs-87);
  color: var(--clr-grey-500);
  position: relative;

  & .label {
    display: none;
    color: var(--clr-grey-500);

    @media screen and (min-width: 768px) {
      display: block;
    }
  }

  & .vs__selected-options {
    position: relative;
  }

  @media screen and (min-width: 768px) {
    & .vs__selected-options::after {
      display: block;
      position: absolute;
      content: "";
      right: 20px;
      top: 29%;
      height: 16px;
      width: 16px;
      background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none"><path d="M13.3538 6.85375L8.35378 11.8538C8.30734 11.9002 8.2522 11.9371 8.1915 11.9623C8.1308 11.9874 8.06574 12.0004 8.00003 12.0004C7.93432 12.0004 7.86926 11.9874 7.80856 11.9623C7.74786 11.9371 7.69271 11.9002 7.64628 11.8538L2.64628 6.85375C2.57627 6.78382 2.52859 6.6947 2.50926 6.59765C2.48994 6.50061 2.49984 6.40002 2.53772 6.3086C2.57559 6.21719 2.63974 6.13908 2.72204 6.08414C2.80433 6.0292 2.90108 5.99992 3.00003 6L13 6C13.099 5.99992 13.1957 6.0292 13.278 6.08414C13.3603 6.13908 13.4245 6.21719 13.4623 6.3086C13.5002 6.40002 13.5101 6.50061 13.4908 6.59765C13.4715 6.6947 13.4238 6.78382 13.3538 6.85375Z" fill="%23201F24"/></svg>');
    }
  }

  & input {
    padding: var(--spacing-75) var(--spacing-125);
    height: 47px;
    border-radius: var(--spacing-50);
    border: 1px solid var(--clr-beige-500);
    outline: none;
  }

  & input:hover {
    border: 1px solid var(--clr-grey-500);
    color: var(--clr-grey-900);
  }

  & input:active {
    border: 1px solid var(--clr-grey-900);
    color: var(--clr-grey-900);
  }

  & .vs__actions {
    display: none;
  }

  & .vs__dropdown-option--selected,
  .vs__dropdown-option--highlight {
    font-weight: var(--fw-700);
  }

  & ul {
    color: var(--clr-grey-900);
    position: absolute;
    list-style: none;
    width: 100%;
    box-shadow: 0px 4px 24px 0px rgba(0, 0, 0, 0.25);
    padding: var(--spacing-75) var(--spacing-125);
    background-color: white;
    z-index: 2;
    border-radius: var(--spacing-50);

    & li:not(:last-child) {
      padding-bottom: var(--spacing-75);
      padding-top: var(--spacing-75);
      border-bottom: 1px solid var(--clr-grey-100);
    }

    & li:last-child {
      padding-top: var(--spacing-75);
    }
  }
}

.select-wrapper:has(.vs__selected) {
  color: var(--clr-grey-900);
}

.sort {
  & input {
    max-width: 20px;
    max-height: 20px;
    padding: 0;
    border-radius: 0;
    border: 0;
    background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none"><path d="M16.25 3L3.75 3C3.41848 3 3.10054 3.1317 2.86612 3.36612C2.6317 3.60054 2.5 3.91848 2.5 4.25L2.5 16.75C2.5 17.0815 2.6317 17.3995 2.86612 17.6339C3.10054 17.8683 3.41848 18 3.75 18H16.25C16.5815 18 16.8995 17.8683 17.1339 17.6339C17.3683 17.3995 17.5 17.0815 17.5 16.75V4.25C17.5 3.91848 17.3683 3.60054 17.1339 3.36612C16.8995 3.1317 16.5815 3 16.25 3ZM5.625 6.125L13.125 6.125C13.2908 6.125 13.4497 6.19085 13.5669 6.30806C13.6842 6.42527 13.75 6.58424 13.75 6.75C13.75 6.91576 13.6842 7.07473 13.5669 7.19194C13.4497 7.30915 13.2908 7.375 13.125 7.375L5.625 7.375C5.45924 7.375 5.30027 7.30915 5.18306 7.19194C5.06585 7.07473 5 6.91576 5 6.75C5 6.58424 5.06585 6.42527 5.18306 6.30806C5.30027 6.19085 5.45924 6.125 5.625 6.125ZM8.75 14.875L5.625 14.875C5.45924 14.875 5.30027 14.8092 5.18306 14.6919C5.06585 14.5747 5 14.4158 5 14.25C5 14.0842 5.06585 13.9253 5.18306 13.8081C5.30027 13.6908 5.45924 13.625 5.625 13.625L8.75 13.625C8.91576 13.625 9.07473 13.6908 9.19194 13.8081C9.30915 13.9253 9.375 14.0842 9.375 14.25C9.375 14.4158 9.30915 14.5747 9.19194 14.6919C9.07473 14.8092 8.91576 14.875 8.75 14.875ZM9.375 11.125L5.625 11.125C5.45924 11.125 5.30027 11.0592 5.18306 10.9419C5.06585 10.8247 5 10.6658 5 10.5C5 10.3342 5.06585 10.1753 5.18306 10.0581C5.30027 9.94085 5.45924 9.875 5.625 9.875H9.375C9.54076 9.875 9.69973 9.94085 9.81694 10.0581C9.93415 10.1753 10 10.3342 10 10.5C10 10.6658 9.93415 10.8247 9.81694 10.9419C9.69973 11.0592 9.54076 11.125 9.375 11.125ZM15.4422 13.4422L13.5672 15.3172C13.5091 15.3753 13.4402 15.4214 13.3643 15.4529C13.2885 15.4843 13.2071 15.5005 13.125 15.5005C13.0429 15.5005 12.9615 15.4843 12.8857 15.4529C12.8098 15.4214 12.7409 15.3753 12.6828 15.3172L10.8078 13.4422C10.6905 13.3249 10.6247 13.1659 10.6247 13C10.6247 12.8341 10.6905 12.6751 10.8078 12.5578C10.9251 12.4405 11.0841 12.3747 11.25 12.3747C11.4159 12.3747 11.5749 12.4405 11.6922 12.5578L12.5 13.3664V9.875C12.5 9.70924 12.5658 9.55027 12.6831 9.43306C12.8003 9.31585 12.9592 9.25 13.125 9.25C13.2908 9.25 13.4497 9.31585 13.5669 9.43306C13.6842 9.55027 13.75 9.70924 13.75 9.875V13.3664L14.5578 12.5578C14.6751 12.4405 14.8341 12.3747 15 12.3747C15.1659 12.3747 15.3249 12.4405 15.4422 12.5578C15.5595 12.6751 15.6253 12.8341 15.6253 13C15.6253 13.1659 15.5595 13.3249 15.4422 13.4422Z" fill="%23201F24"/></svg>');

    @media screen and (min-width: 768px) {
      padding: var(--spacing-75) var(--spacing-125);
      max-width: 114px;
      max-height: unset;
      background-image: unset;
      border-radius: var(--spacing-50);
      border: 1px solid var(--clr-beige-500);
    }
  }

  & ul {
    min-width: 114px;
    left: -50px;

    @media screen and (min-width: 768px) {
      max-width: 114px;
      left: unset;
    }
  }
}

.category-sort {
  & input {
    max-width: 20px;
    max-height: 20px;
    padding: 0;
    border-radius: 0;
    border: 0;
    background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none"><path d="M17.7976 5.71563L17.7914 5.72266L12.5 11.3727V15.7078C12.5003 15.914 12.4496 16.117 12.3524 16.2989C12.2552 16.4807 12.1145 16.6357 11.9429 16.75L9.44295 18.4172C9.25455 18.5427 9.03561 18.6147 8.8095 18.6254C8.5834 18.6362 8.3586 18.5854 8.15912 18.4784C7.95964 18.3714 7.79296 18.2122 7.67687 18.0179C7.56078 17.8236 7.49964 17.6014 7.49998 17.375L7.49998 11.3727L2.20857 5.72266L2.20232 5.71563C2.03963 5.53657 1.93238 5.31416 1.8936 5.07536C1.85483 4.83656 1.88618 4.59163 1.98386 4.3703C2.08154 4.14897 2.24135 3.96074 2.4439 3.82844C2.64646 3.69615 2.88305 3.62548 3.12498 3.625L16.875 3.625C17.1171 3.62502 17.354 3.69537 17.5569 3.82749C17.7598 3.9596 17.92 4.14781 18.018 4.36923C18.1159 4.59065 18.1475 4.83576 18.1088 5.07478C18.0701 5.31379 17.9628 5.53643 17.8 5.71563H17.7976Z" fill="%23201F24"/></svg>');

    @media screen and (min-width: 768px) {
      padding: var(--spacing-75) var(--spacing-125);
      max-width: 177px;
      max-height: unset;
      background-image: unset;
      border-radius: var(--spacing-50);
      border: 1px solid var(--clr-beige-500);
    }
  }

  & ul {
    min-width: 177px;
    left: -150px;

    @media screen and (min-width: 768px) {
      max-width: 177px;
      left: unset;
    }
  }
}

.transactions-list-wrapper {
  .vs__selected {
    position: absolute;
    font-size: 0;
    width: 20px;
    height: 20px;

    @media screen and (min-width: 768px) {
      position: absolute;
      font-size: unset;
      left: var(--spacing-125);
      transform: translateY(55%);
      width: unset;
      height: unset;
    }
  }
}

dialog {
  .vs__selected {
    position: absolute;
    font-size: unset;
    left: var(--spacing-125);
    transform: translateY(55%);
    width: unset;
    height: unset;
  }

  .vs__selected-options::after {
    display: block;
    position: absolute;
    content: "";
    right: 20px;
    top: 29%;
    height: 16px;
    width: 16px;
    background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none"><path d="M13.3538 6.85375L8.35378 11.8538C8.30734 11.9002 8.2522 11.9371 8.1915 11.9623C8.1308 11.9874 8.06574 12.0004 8.00003 12.0004C7.93432 12.0004 7.86926 11.9874 7.80856 11.9623C7.74786 11.9371 7.69271 11.9002 7.64628 11.8538L2.64628 6.85375C2.57627 6.78382 2.52859 6.6947 2.50926 6.59765C2.48994 6.50061 2.49984 6.40002 2.53772 6.3086C2.57559 6.21719 2.63974 6.13908 2.72204 6.08414C2.80433 6.0292 2.90108 5.99992 3.00003 6L13 6C13.099 5.99992 13.1957 6.0292 13.278 6.08414C13.3603 6.13908 13.4245 6.21719 13.4623 6.3086C13.5002 6.40002 13.5101 6.50061 13.4908 6.59765C13.4715 6.6947 13.4238 6.78382 13.3538 6.85375Z" fill="%23201F24"/></svg>');
  }
}

</style>