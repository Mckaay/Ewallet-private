<script setup>
const props = defineProps({
  'text': String,
  'disabled': {
    type: Boolean,
    default: false,
  },
});
</script>

<template>
  <button
      type="button"
      :disabled="disabled"
      class="button pagination-button"
  >
    {{ text }}
  </button>
</template>

<style scoped>
.pagination-button {
  display: flex;
  align-items: center;
  font-size: 0;
  color: var(--clr-grey-900);
  background-color: var(--clr-white);
  padding: var(--spacing-50) var(--spacing-100) var(--spacing-50) var(--spacing-100);
  border-radius: var(--spacing-50);
  border: 1px solid var(--clr-beige-500);
  height: var(--pagination-buttons-size);

  @media screen and (min-width: 768px) {
    font-size: var(--fs-87);
    gap: var(--spacing-100);
  }
}

button:disabled {
  cursor: not-allowed !important;
}

.pagination-button.next {
  &:hover {
    cursor: pointer;
    color: var(--clr-white);
    background-color: var(--clr-beige-500);

    &::after {
      background-image: url('data:image/svg+xml,%3Csvg xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22 width%3D%2216%22 height%3D%2216%22 viewBox%3D%220 0 16 16%22 fill%3D%22none%22%3E%3Cpath d%3D%22M5.85344 3.14647L10.8534 8.14647C10.8999 8.1929 10.9368 8.24805 10.962 8.30875C10.9871 8.36944 11.0001 8.43451 11.0001 8.50022C11.0001 8.56592 10.9871 8.63099 10.962 8.69169C10.9368 8.75238 10.8999 8.80753 10.8534 8.85397L5.85345 13.854C5.78352 13.924 5.69439 13.9717 5.59735 13.991C5.50031 14.0103 5.39971 14.0004 5.3083 13.9625C5.21689 13.9247 5.13877 13.8605 5.08383 13.7782C5.0289 13.6959 4.99962 13.5992 4.99969 13.5002L4.99969 3.50022C4.99962 3.40127 5.0289 3.30452 5.08383 3.22222C5.13877 3.13993 5.21689 3.07578 5.3083 3.0379C5.39971 3.00003 5.50031 2.99013 5.59735 3.00945C5.69439 3.02878 5.78352 3.07646 5.85344 3.14647Z%22 fill%3D%22%23FFFFFF%22%2F%3E%3C%2Fsvg%3E');
      background-repeat: no-repeat;
      background-position-x: center;
      background-position-y: center;
    }
  }

  &::after {
    display: block;
    width: 16px;
    height: 16px;
    content: '';
    background-image: url('data:image/svg+xml,%3Csvg xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22 width%3D%2216%22 height%3D%2216%22 viewBox%3D%220 0 16 16%22 fill%3D%22none%22%3E%3Cpath d%3D%22M5.85344 3.14647L10.8534 8.14647C10.8999 8.1929 10.9368 8.24805 10.962 8.30875C10.9871 8.36944 11.0001 8.43451 11.0001 8.50022C11.0001 8.56592 10.9871 8.63099 10.962 8.69169C10.9368 8.75238 10.8999 8.80753 10.8534 8.85397L5.85345 13.854C5.78352 13.924 5.69439 13.9717 5.59735 13.991C5.50031 14.0103 5.39971 14.0004 5.3083 13.9625C5.21689 13.9247 5.13877 13.8605 5.08383 13.7782C5.0289 13.6959 4.99962 13.5992 4.99969 13.5002L4.99969 3.50022C4.99962 3.40127 5.0289 3.30452 5.08383 3.22222C5.13877 3.13993 5.21689 3.07578 5.3083 3.0379C5.39971 3.00003 5.50031 2.99013 5.59735 3.00945C5.69439 3.02878 5.78352 3.07646 5.85344 3.14647Z%22 fill%3D%22%23696868%22%2F%3E%3C%2Fsvg%3E');
    background-repeat: no-repeat;
    background-position-x: center;
    background-position-y: center;
  }
}

.pagination-button.previous {
  &:hover {
    cursor: pointer;
    color: var(--clr-white);
    background-color: var(--clr-beige-500);

    &::before {
      background-image: url('data:image/svg+xml,%3Csvg xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22 width%3D%2216%22 height%3D%2216%22 viewBox%3D%220%200%2016%2016%22 fill%3D%22none%22%3E%3Cpath d%3D%22M10.1466 12.8535L5.14656 7.85353C5.10007 7.8071 5.06319 7.75195 5.03803 7.69125C5.01286 7.63056 4.99991 7.56549 4.99991 7.49978C4.99991 7.43408 5.01286 7.36901 5.03803 7.30831C5.06319 7.24762 5.10007 7.19247 5.14656 7.14603L10.1466 2.14603C10.2165 2.07603 10.3056 2.02834 10.4027 2.00902C10.4997 1.98969 10.6003 1.9996 10.6917 2.03747C10.7831 2.07535 10.8612 2.1395 10.9162 2.22179C10.9711 2.30409 11.0004 2.40084 11.0003 2.49978L11.0003 12.4998C11.0004 12.5987 10.9711 12.6955 10.9162 12.7778C10.8612 12.8601 10.7831 12.9242 10.6917 12.9621C10.6003 13 10.4997 13.0099 10.4027 12.9905C10.3056 12.9712 10.2165 12.9235 10.1466 12.8535Z%22 fill%3D%22%23FFFFFF%22%2F%3E%3C%2Fsvg%3E');
      background-repeat: no-repeat;
      background-position-x: center;
      background-position-y: center;
    }
  }

  &::before {
    display: block;
    width: 16px;
    height: 16px;
    content: '';
    background-image: url('data:image/svg+xml,%3Csvg xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22 width%3D%2216%22 height%3D%2216%22 viewBox%3D%220%200%2016%2016%22 fill%3D%22none%22%3E%3Cpath d%3D%22M10.1466 12.8535L5.14656 7.85353C5.10007 7.8071 5.06319 7.75195 5.03803 7.69125C5.01286 7.63056 4.99991 7.56549 4.99991 7.49978C4.99991 7.43408 5.01286 7.36901 5.03803 7.30831C5.06319 7.24762 5.10007 7.19247 5.14656 7.14603L10.1466 2.14603C10.2165 2.07603 10.3056 2.02834 10.4027 2.00902C10.4997 1.98969 10.6003 1.9996 10.6917 2.03747C10.7831 2.07535 10.8612 2.1395 10.9162 2.22179C10.9711 2.30409 11.0004 2.40084 11.0003 2.49978L11.0003 12.4998C11.0004 12.5987 10.9711 12.6955 10.9162 12.7778C10.8612 12.8601 10.7831 12.9242 10.6917 12.9621C10.6003 13 10.4997 13.0099 10.4027 12.9905C10.3056 12.9712 10.2165 12.9235 10.1466 12.8535Z%22 fill%3D%22%23696868%22%2F%3E%3C%2Fsvg%3E');
    background-repeat: no-repeat;
    background-position-x: center;
    background-position-y: center;
  }
}

</style>
