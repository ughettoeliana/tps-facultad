<script>
export default {
  name: 'BaseTextarea',
  props: ['modelValue'],
  emits: ['update:modelValue'],

}
</script>
<template>
  <textarea class="bg-light form-control" :value="modelValue"
    @input="$emit('update:modelValue', $event.target.value)"></textarea>
</template>