<script>
export default {
  name: 'BaseInput',
  props: ['modelValue'],
  emits: ['update:modelValue'],

}
</script>
<template>
  <input class="w-full p-2 border border-gray-700"
  :value="modelValue"
  @input="$emit('update:modelValue', $event.target.value)">
</template>