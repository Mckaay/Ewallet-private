<script setup>
const props = defineProps({
  'text': String,
});
</script>

<template>
  <button class="button">{{ props.text }}</button>
</template>


<style scoped>
.button {
  display: flex;
  justify-content: center;
  border: none;
  padding: var(--spacing-100);
  background-color: var(--clr-white);
  font-size: var(--fs-87);
  font-weight: var(--fw-700);
  color: var(--clr-grey-900);
  line-height: 1.5;
  border-radius: var(--spacing-50);
}

.button:hover {
  cursor: pointer;
}

.button-primary {
  background-color: var(--clr-grey-900);
  color: var(--clr-white);
}

.button-primary:hover {
  background-color: var(--clr-grey-500);
}

.button-secondary {
  background-color: var(--clr-beige-100);
}

.button-secondary:hover {
  background-color: var(--clr-white);
  outline: 1px solid var(--clr-beige-500);
}

.button-tertiary {
  background-color: inherit;
  font-weight: var(--fw-400);
  color: var(--clr-grey-500);
  padding: unset;
  gap: var(--spacing-75);
  align-items: center;
}

.button-tertiary:hover {
  color: var(--clr-grey-900);
}

.button-tertiary::after {
  content: '';
  display: block;
  width: 12px;
  height: 12px;
  background-image: url('data:image/svg+xml;utf8,<svg fill="none" height="11" viewBox="0 0 6 11" width="6" xmlns="http://www.w3.org/2000/svg"><path d="m.853506.146465 5.000004 5.000005c.04648.04643.08336.10158.10853.16228.02516.06069.03811.12576.03811.19147 0 .0657-.01295.13077-.03811.19147-.02517.06069-.06205.11584-.10853.16228l-5.000004 5.00003c-.069927.07-.159054.1177-.256097.137-.097042.0193-.197637.0094-.289048-.0285-.091412-.0378-.16953-.102-.2244652-.1843-.0549354-.0823-.08421767-.179-.08413981-.278l-.00000043-9.999984c-.00007788-.098949.02920444-.195695.08413984-.277992.0549356-.082297.1330536-.1464431.2244646-.1843193.091412-.03787611.192007-.04777907.289049-.02845381.097042.01932521.186169.06700801.256097.13701411z" fill="%23696868"/></svg>');
  background-repeat: no-repeat;
  background-position-x: center;
  background-position-y: center;
}

.button-tertiary:hover:after {
  background-image: url('data:image/svg+xml;utf8,<svg fill="none" height="11" viewBox="0 0 6 11" width="6" xmlns="http://www.w3.org/2000/svg"><path d="m.853506.146465 5.000004 5.000005c.04648.04643.08336.10158.10853.16228.02516.06069.03811.12576.03811.19147 0 .0657-.01295.13077-.03811.19147-.02517.06069-.06205.11584-.10853.16228l-5.000004 5.00003c-.069927.07-.159054.1177-.256097.137-.097042.0193-.197637.0094-.289048-.0285-.091412-.0378-.16953-.102-.2244652-.1843-.0549354-.0823-.08421767-.179-.08413981-.278l-.00000043-9.999984c-.00007788-.098949.02920444-.195695.08413984-.277992.0549356-.082297.1330536-.1464431.2244646-.1843193.091412-.03787611.192007-.04777907.289049-.02845381.097042.01932521.186169.06700801.256097.13701411z" fill="%23201F24"/></svg>');
}

.button-destroy {
  background-color: var(--clr-red);
  color: var(--clr-white);
}

.button-destroy:hover {
  background: linear-gradient(0deg, rgba(255, 255, 255, 0.20) 0%, rgba(255, 255, 255, 0.20) 100%), var(--clr-red, #C94736);
}

</style>
