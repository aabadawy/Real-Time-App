<template>
    <div>
        <v-card class="mt-3">
            <v-card-title>
                <div class="headline">{{data.user}} </div>
                <small class="ml-2 grey--text">Said <i>{{data.created_at}}</i></small>
            </v-card-title>
            <v-divider></v-divider>
            <v-card-text v-html="body"></v-card-text>
            <v-divider></v-divider>
            <v-card-actions v-if="own">
                <v-btn icon >
                    <v-icon  color="orange">mdi-pencil</v-icon>
                </v-btn>
                <v-btn icon @click="destroy" >
                    <v-icon  color="error">mdi-delete</v-icon>
                </v-btn>
            </v-card-actions>
        </v-card>
    </div>
</template>

<script>
export default {
    props:['data','index'],
    data(){
        return{
            own: User.own(this.data.user_id)
        }
    },
    computed:{
        body(){
            return md.parse(this.data.reply)
        },
    },
    methods:{
        destroy(){
            EventBus.$emit('deleteReply',this.index)
        }
    }
}
</script>

<style>
</style>