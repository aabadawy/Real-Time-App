<template>
  <div>
      <v-btn icon @click="LikeIt">
          <v-icon :color="color">mdi-heart</v-icon> {{count}}
      </v-btn>
  </div>
</template>

<script>
export default {
    props:['content'],
    data(){
        return{
            liked:this.content.hasLiked,
            count:this.content.likes_count
        }
    },
    computed:{
        color(){
            return this.liked ? 'red' : 'red lighten-4'
        }
    },
     methods:{
         LikeIt(){
                if(User.loggedIn)
                {   
                    this.liked ? this.decr() : this.incr()
                    this.liked = !this.liked
                }
         },
         incr(){
            axios.post(`/api/like/${this.content.id}`)
            .then(this.count ++)
         },
         decr(){
            axios.delete(`/api/like/${this.content.id}`)
            .then(this.count --)
         }
     }
}
</script>

<style>

</style>