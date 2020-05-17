<template>
  <v-container>
    <div v-if="replies">
      <reply  v-for="reply in replies" :key="reply.id" :data="reply" ></reply>
    </div>
  </v-container>  
</template>

<script>
import Reply from './Reply'
export default {
  props:['replies'],
  components:{Reply}
}
</script>

<style>

</style>