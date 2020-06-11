<template>
    <v-card >
        <v-container fluid>
            <v-card-title>
                <div>
                    <div class="headline">
                        {{data.title}}
                    </div>
                    <span class="grey--text">Posted {{data.created_at}} By {{data.user}}</span>
                </div>
                <v-spacer></v-spacer>
                <v-btn color="success">{{replyCount}} replies</v-btn>
            </v-card-title>
            <v-card-text v-html="body"></v-card-text>
            <v-card-actions v-if="own" @click="edit">
                <v-btn icon >
                    <v-icon  color="warning">mdi-pencil</v-icon>
                </v-btn>
                <v-btn icon @click="Delete">
                    <v-icon  color="error">mdi-delete</v-icon>
                </v-btn>
            </v-card-actions>
        </v-container>
    </v-card>
</template>

<script>
export default {
    props:['data'],
    data(){
        return{
            own : User.own(this.data.user_id),
            replyCount : this.data.reply_count,
        }
    },
    computed:{
        body(){
            return md.parse(this.data.body)
        },
    },
    created(){
        EventBus.$on('newReply', ()=>{
            this.replyCount++;
        });

        Echo.private('App.User.' + User.id())
          .notification((notification) => {
              this.replyCount++;
          })

        Echo.channel('DeleteReplyChannel')
        .listen('DeleteReplyEvent', (e) => {
            this.replyCount--;
        });

        EventBus.$on('deleteReply',()=>{
            this.replyCount--;
        });
    },
    methods:{
        Delete(){
            axios.delete(`/api/question/${this.data.slug}`)
            .then(res => this.$router.push('/forum'))
            .catch(error => console.log(error.response.data))
        },
        edit(){
            EventBus.$emit('startEditing')
        }
    }
}
</script>

<style>

</style>