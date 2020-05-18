<template>
    <div>
        <v-card class="mt-3">
            <v-card-title>
                <div class="headline">{{data.user}} </div>
                <small class="ml-2 grey--text">Said <i>{{data.created_at}}</i></small>
                <v-spacer></v-spacer>
                <like :content="data"></like>
            </v-card-title>
            <v-divider></v-divider>
            <v-card-text v-html="body" v-if="!editing"></v-card-text>
            <edit-reply v-else :reply=data></edit-reply>
            <v-divider></v-divider>
            <div v-if="!editing">
                <v-card-actions v-if="own">
                    <v-btn icon @click="edit">
                        <v-icon  color="orange">mdi-pencil</v-icon>
                    </v-btn>
                    <v-btn icon @click="destroy" >
                        <v-icon  color="error">mdi-delete</v-icon>
                    </v-btn>
                </v-card-actions>
            </div>
        </v-card>
    </div>
</template>

<script>
import EditReply from './editReply'
import like from '../Like/like'
export default {
    props:['data','index'],
    components:{EditReply,like},
    data(){
        return{
            editing:false,
            beforeEditingReplyBody: ''
        }
    },
    computed:{
        own(){
            return User.own(this.data.user_id)
        },
        body(){
            return md.parse(this.data.reply)
        },
    },
    created(){
        this.listen()
    },
    methods:{
        destroy(){
            EventBus.$emit('deleteReply',this.index)
        },
        edit(){
            this.editing=true
            this.beforeEditingReplyBody = this.data.reply
        },
        listen(){
            EventBus.$on('cancelEditing', (reply)=>{
                this.editing = false
                if(reply != this.data.reply){
                    this.data.reply = this.beforeEditingReplyBody
                    this.beforeEditingReplyBody = ''
                }
            })
        }
    }
}
</script>

<style>
</style>