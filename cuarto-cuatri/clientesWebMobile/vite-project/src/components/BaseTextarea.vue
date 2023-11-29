<script>
export default {
  name: 'BaseTextarea',
  props: ['modelValue'],
  emits: ['update:modelValue'],

}
</script>
<template>
  <textarea class="w-full p-2 border border-gray-700" :value="modelValue"
    @input="$emit('update:modelValue', $event.target.value)"></textarea>
</template>