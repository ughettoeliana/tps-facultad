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
  <button class="btn btn-primary " type="submit"
    :disabled="loading">
    
    <template v-if="!loading">
      <slot>Enviar</slot>
    </template>
    <template v-else>
      <Loader />
    </template>
  </button>
</template>