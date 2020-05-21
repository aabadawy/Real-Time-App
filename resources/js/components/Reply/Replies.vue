<template>
    <div v-if="question">
      <reply  v-for="(reply,index) in content" :index=index :key="reply.id" :data="reply" ></reply>
    </div>
</template>

<script>
import Reply from './Reply'
export default {
  props:['question'],
  data(){
    return{
      content:this.question.replies
    }
  },
  components:{Reply},
  created(){
    this.listen()
  },
  methods:{
    listen(){
      EventBus.$on('newReply',(reply)=>{
        this.content.unshift(reply)
      }),
      EventBus.$on('deleteReply' ,(index) =>{
      axios.delete(`/api/question/${this.question.slug}/reply/${this.content[index].id}`)
            this.content.splice(index,1)
      }),
      Echo.private('App.User.' + User.id())
          .notification((notification) => {
              this.content.unshift(notification.reply)
          })

      Echo.channel('DeleteReplyChannel')
        .listen('DeleteReplyEvent', (e) => {
            for(let index = 0 ;index<this.content.length;index++){
              if(this.content[index].id == e.id){
                this.content.splice(index,1)
              }
            }
        })
    },
  }
}
</script>

<style>

</style>