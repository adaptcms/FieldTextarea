<template>
  <div>
    <div v-html="value" />
  </div>
</template>

<script>
export default {
  props: [
    'value',
    'field',
    'model',
    'package',
    'action'
  ]
}
</script>
