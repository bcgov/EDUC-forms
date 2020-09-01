<template>
  <div id="app">
    <BCHeader/>
    <router-view/>
  </div>
</template>

<script>
// @ is an alias to /src
import BCHeader from '@/components/BCHeader.vue'

export default {
  components: {
    BCHeader
  }
}
</script>