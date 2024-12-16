<script setup>
import {useLoadingStore} from "@/stores/loading.js";

const loadingStore = useLoadingStore();
</script>
<template>
  <div v-if="loadingStore.loading" class="loader"></div>
</template>

<style scoped>
.loader {
  border: 5px solid #f3f3f3;
  border-top: 5px solid var(--clr-grey-900);
  border-radius: 50%;
  width: 30px;
  height: 30px;
  animation: spin 1s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>