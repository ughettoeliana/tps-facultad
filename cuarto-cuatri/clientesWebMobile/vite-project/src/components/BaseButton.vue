<script>
import Loader from './Loader.vue';

export default {
  name: 'BaseButton',
  props: {
    loading: {
      type: Boolean,
      default: false,
    }
  },
  components:{ Loader },
}
</script>

<template>
  <button class="w-full mt-2 p-1.5 bg-blue-700 text-white rounded hover:bg-blue-600 transition" type="submit"
    :disabled="loading">
    
    <template v-if="!loading">
      <slot>Enviar</slot>
    </template>
    <template v-else>
      <Loader />
    </template>
  </button>
</template>