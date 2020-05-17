<template>
  <v-card>
    <v-card-title primary-title>
      <div>
        <h3 class="headline mb-0">
            <router-link :to="data.path">
                {{data.title}}
            </router-link>
            </h3>
        <div class="grey--text"><small>Posted {{data.created_at}} by {{data.user}}</small></div>
      </div>
    </v-card-title>
    <v-card-text v-html="body">
    </v-card-text>
  </v-card>
</template>

<script>
export default {
    props:['data'],
    computed:{
        body(){
            return md.parse(this.data.body)
        },
    }
}

</script>

<style>

</style>