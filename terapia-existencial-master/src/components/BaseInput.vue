<script>
export default {
  name: 'BaseInput',
  props: ['modelValue'],
  emits: ['update:modelValue'],

}
</script>
<template>
  <input  class="form-control" 
  :value="modelValue"
  @input="$emit('update:modelValue', $event.target.value)">
</template>