<template>
  <textarea
    :id="`form-${field.column_name}`"
    class="text-base py-3 px-3 shadow-sm block mt-1 border w-full"
    v-model="selected"
    :class="{ 'border-red-500': errors[field.column_name].is, 'border-gray-300': !errors[field.column_name].is }"
  />
</template>

<script>
export default {
  props: [
    'value',
    'field',
    'errors',
    'formMeta',
    'model',
    'module',
    'action'
  ],

  watch: {
    value (newVal, oldVal) {
      if (newVal !== oldVal) {
        this.selected = newVal
      }
    },

    selected (newVal, oldVal) {
      if (newVal !== oldVal) {
        this.$emit('input', newVal)
      }
    }
  },

  data () {
    return {
      selected: null
    }
  },

  mounted () {
    if (!this.selected) {
      this.selected = this.value
    }
  }
}
</script>
