<template>
  <div class="flex-col">
    <!-- Any options you want to have when a package field is created with this field. ex: a select field would have an input to enter in comma separated options available -->
  </div>
</template>

<script>
export default {
  props: [
    'value',
    'field',
    'package',
    'errors',
    'fields'
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
    if (this.value) {
      this.selected = this.value
    }
  }
}
</script>
